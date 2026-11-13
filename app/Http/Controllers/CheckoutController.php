<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use RuntimeException;

class CheckoutController extends Controller
{
    public function __construct(
        private CartService $cart,
        private OrderService $orders,
        private PaymentService $payment,
    ) {
    }

    public function index()
    {
        $items = $this->cart->items(auth()->user());

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja masih kosong.');
        }

        $total = $items->sum(fn ($item) => $item->book->price * $item->qty);
        $user = auth()->user();

        return view('checkout.index', compact('items', 'total', 'user'));
    }

    public function store(CheckoutRequest $request)
    {
        try {
            $order = $this->orders->create(auth()->user(), $request->validated());
        } catch (RuntimeException $e) {
            return redirect()->route('cart.index')->with('error', $e->getMessage());
        }

        if ($order->payment_method === 'midtrans') {
            $snapToken = $this->payment->createSnapToken($order);

            if ($snapToken) {
                $order->update(['snap_token' => $snapToken]);
            }
        }

        return redirect()->route('checkout.success', $order)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    public function success(int $order)
    {
        $order = auth()->user()->orders()->with('items')->findOrFail($order);

        return view('checkout.success', compact('order'));
    }
}
