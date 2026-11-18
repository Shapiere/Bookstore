<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(int $order)
    {
        $order = auth()->user()->orders()->with('items')->findOrFail($order);

        return view('orders.show', compact('order'));
    }
}
