<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cart)
    {
    }

    public function index()
    {
        $items = $this->cart->items(auth()->user());
        $total = $items->sum(fn ($item) => $item->book->price * $item->qty);
        $totalQty = $items->sum('qty');

        // Rekomendasi saat keranjang kosong
        $suggestions = $items->isEmpty()
            ? Book::with('category')->active()->latest()->take(4)->get()
            : collect();

        return view('cart.index', compact('items', 'total', 'totalQty', 'suggestions'));
    }

    public function add(Request $request, Book $book)
    {
        $request->validate([
            'qty' => ['nullable', 'integer', 'min:1'],
        ]);

        if ($book->stock < 1) {
            return back()->with('error', 'Stok buku ini sedang habis.');
        }

        $this->cart->add(auth()->user(), $book, (int) $request->input('qty', 1));

        return back()->with('success', 'Buku berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, int $cart)
    {
        $request->validate([
            'qty' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $this->cart->update(auth()->user(), $cart, (int) $request->input('qty'));

        return back()->with('success', 'Jumlah buku diperbarui.');
    }

    public function remove(int $cart)
    {
        $this->cart->remove(auth()->user(), $cart);

        return back()->with('success', 'Buku dihapus dari keranjang.');
    }
}
