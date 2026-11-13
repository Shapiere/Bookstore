<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class OrderService
{
    public function __construct(private CartService $cart)
    {
    }

    /**
     * Buat pesanan dari isi keranjang user.
     *
     * Seluruh proses dibungkus transaksi: jika satu langkah gagal,
     * semua perubahan dibatalkan sehingga stok dan pesanan tetap konsisten.
     */
    public function create(User $user, array $data): Order
    {
        return DB::transaction(function () use ($user, $data) {
            $items = $user->carts()->with('book')->get();

            if ($items->isEmpty()) {
                throw new RuntimeException('Keranjang belanja masih kosong.');
            }

            $subtotal = $items->sum(fn ($item) => $item->book->price * $item->qty);

            $order = Order::create([
                'user_id' => $user->id,
                'order_code' => $this->generateCode(),
                'customer_name' => $data['customer_name'],
                'phone' => $data['phone'],
                'shipping_address' => $data['shipping_address'],
                'subtotal' => $subtotal,
                'shipping_cost' => 0,
                'total_price' => $subtotal,
                'status' => 'pending',
                'payment_method' => $data['payment_method'],
                'payment_status' => 'unpaid',
            ]);

            foreach ($items as $item) {
                // Kunci baris buku agar stok tidak bentrok saat ada pesanan bersamaan.
                $book = Book::lockForUpdate()->find($item->book_id);

                if ($book->stock < $item->qty) {
                    throw new RuntimeException("Stok buku \"{$book->title}\" tidak mencukupi.");
                }

                $order->items()->create([
                    'book_id' => $book->id,
                    'title_snapshot' => $book->title,
                    'price' => $book->price,
                    'qty' => $item->qty,
                    'subtotal' => $book->price * $item->qty,
                ]);

                $book->decrement('stock', $item->qty);
            }

            $this->cart->clear($user);

            return $order;
        });
    }

    /**
     * Tandai pesanan sebagai lunas.
     */
    public function markAsPaid(Order $order): void
    {
        $order->update([
            'payment_status' => 'paid',
            'paid_at' => now(),
        ]);
    }

    /**
     * Batalkan pesanan dan kembalikan stok buku.
     */
    public function cancel(Order $order): void
    {
        DB::transaction(function () use ($order) {
            foreach ($order->items as $item) {
                if ($item->book) {
                    $item->book->increment('stock', $item->qty);
                }
            }

            $order->update(['status' => 'cancelled']);
        });
    }

    /**
     * Buat kode pesanan unik, contoh: INV-20261114-0001
     */
    private function generateCode(): string
    {
        $prefix = 'INV-' . now()->format('Ymd') . '-';

        $lastToday = Order::where('order_code', 'like', $prefix . '%')
            ->orderByDesc('id')
            ->value('order_code');

        $sequence = $lastToday ? ((int) substr($lastToday, -4)) + 1 : 1;

        return $prefix . str_pad((string) $sequence, 4, '0', STR_PAD_LEFT);
    }
}
