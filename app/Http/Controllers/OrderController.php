<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = $user->orders()->with('items.book')->latest()->orderByDesc('id')->paginate(10);
        $since = $user->orders()->min('created_at');

        return view('orders.index', compact('orders', 'since'));
    }

    public function show(int $order)
    {
        $order = auth()->user()->orders()->with('items.book')->findOrFail($order);

        return view('orders.show', compact('order'));
    }
}
