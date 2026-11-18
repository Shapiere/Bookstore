<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CartService;
use App\Services\OrderService;
use RuntimeException;

class CheckoutController extends Controller
{
    public function __construct(
        private CartService $cart,
        private OrderService $orders,
    ) {
    }

    public function index()
    {
        $items = $this->cart->items(auth()->user());

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja masih kosong.');
        }

        $total = $this->cart->total(auth()->user());
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

        return redirect()->route('checkout.success', $order)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    public function success(int $order)
    {
        $order = auth()->user()->orders()->with('items')->findOrFail($order);

        return view('checkout.success', compact('order'));
    }
}
