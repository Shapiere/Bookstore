<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Collection;

class CartService
{
    /**
     * Tambah buku ke keranjang. Jika sudah ada, jumlahnya ditambah.
     */
    public function add(User $user, Book $book, int $qty = 1): void
    {
        $item = $user->carts()->where('book_id', $book->id)->first();

        if ($item) {
            $newQty = $item->qty + $qty;
            $item->update(['qty' => min($newQty, $book->stock)]);

            return;
        }

        $user->carts()->create([
            'book_id' => $book->id,
            'qty' => min($qty, $book->stock),
        ]);
    }

    /**
     * Ubah jumlah item di keranjang.
     */
    public function update(User $user, int $cartId, int $qty): void
    {
        $item = $user->carts()->with('book')->findOrFail($cartId);

        $item->update(['qty' => min($qty, $item->book->stock)]);
    }

    /**
     * Hapus satu item dari keranjang.
     */
    public function remove(User $user, int $cartId): void
    {
        $user->carts()->where('id', $cartId)->delete();
    }

    /**
     * Kosongkan seluruh keranjang.
     */
    public function clear(User $user): void
    {
        $user->carts()->delete();
    }

    /**
     * Ambil seluruh item keranjang beserta bukunya.
     */
    public function items(User $user): Collection
    {
        return $user->carts()->with('book.category')->get();
    }

    /**
     * Hitung total harga keranjang.
     */
    public function total(User $user): float
    {
        return $this->items($user)->sum(fn ($item) => $item->book->price * $item->qty);
    }

    /**
     * Hitung total jumlah buku di keranjang.
     */
    public function count(User $user): int
    {
        return $user->carts()->sum('qty');
    }
}
