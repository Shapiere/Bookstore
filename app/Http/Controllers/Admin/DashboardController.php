<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'books' => Book::count(),
            'categories' => Category::count(),
            'users' => User::where('role', 'user')->count(),
            'orders' => Order::count(),
            'revenue' => Order::where('payment_status', 'paid')->sum('total_price'),
            'pending' => Order::where('status', 'pending')->count(),
        ];

        $recentOrders = Order::with('user')->latest()->take(5)->get();

        $topBooks = Book::withCount(['orderItems as sold' => function ($q) {
            $q->select(\DB::raw('sum(qty)'));
        }])->orderByDesc('sold')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'topBooks'));
    }
}
