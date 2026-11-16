<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Collection;

class CartService
{
    // Tambah buku ke keranjang, jumlah digabung bila sudah ada.
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

    // Ubah jumlah item, dibatasi stok buku.
    public function update(User $user, int $cartId, int $qty): void
    {
        $item = $user->carts()->with('book')->findOrFail($cartId);

        $item->update(['qty' => min($qty, $item->book->stock)]);
    }

    public function remove(User $user, int $cartId): void
    {
        $user->carts()->where('id', $cartId)->delete();
    }

    public function clear(User $user): void
    {
        $user->carts()->delete();
    }

    public function items(User $user): Collection
    {
        return $user->carts()->with('book.category')->get();
    }

    public function total(User $user): float
    {
        return $this->items($user)->sum(fn ($item) => $item->book->price * $item->qty);
    }

    public function count(User $user): int
    {
        return $user->carts()->sum('qty');
    }
}
