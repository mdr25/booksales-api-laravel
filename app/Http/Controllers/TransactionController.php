<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // ADMIN: Read All
    public function index()
    {
        $transactions = Transaction::with(['customer', 'book'])->get();
        return response()->json([
            'status' => 'success',
            'data' => $transactions
        ]);
    }

    // CUSTOMER: Create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::user();
        if (!$user || $user->is_admin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Admin tidak diperbolehkan membeli buku'
            ], 403);
        }

        $book = Book::find($validated['book_id']);
        if (!$book) {
            return response()->json(['status' => 'error', 'message' => 'Book not found'], 404);
        }

        if ($book->stock < $validated['quantity']) {
            return response()->json(['status' => 'error', 'message' => 'Stock not enough'], 400);
        }

        $total = $book->price * $validated['quantity'];
        $orderNumber = 'ORD-' . strtoupper(Str::random(8));

        // Kurangi stok buku
        $book->stock -= $validated['quantity'];
        $book->save();

        $transaction = Transaction::create([
            'order_number' => $orderNumber,
            'customer_id' => $user->id,
            'book_id' => $book->id,
            'quantity' => $validated['quantity'],
            'total_amount' => $total,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $transaction
        ]);
    }

    // CUSTOMER: Show detail transaksi milik sendiri
    public function show($id)
    {
        $user = Auth::user();
        $transaction = Transaction::with(['customer', 'book'])->find($id);

        if (!$transaction) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        if ($transaction->customer_id !== $user->id && $user->role !== 'admin') {
            return response()->json(['status' => 'error', 'message' => 'Forbidden'], 403);
        }

        return response()->json([
            'status' => 'success',
            'data' => $transaction
        ]);
    }

    // CUSTOMER: Update transaksi milik sendiri (misal update quantity)
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        if ($transaction->customer_id !== $user->id) {
            return response()->json(['status' => 'error', 'message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $book = Book::find($transaction->book_id);
        $selisih = $validated['quantity'] - $transaction->quantity;

        if ($book->stock < $selisih) {
            return response()->json(['status' => 'error', 'message' => 'Stock not enough'], 400);
        }

        // Update stok buku
        $book->stock -= $selisih;
        $book->save();

        $transaction->quantity = $validated['quantity'];
        $transaction->total_amount = $book->price * $validated['quantity'];
        $transaction->save();

        return response()->json([
            'status' => 'success',
            'data' => $transaction
        ]);
    }

    // ADMIN: Destroy transaksi
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }
        $transaction->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Transaction deleted successfully'
        ]);
    }
}
