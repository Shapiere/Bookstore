<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class PageController extends Controller
{
    public function about()
    {
        $stats = [
            'books' => Book::active()->count(),
            'categories' => Category::count(),
            'customers' => User::where('role', 'user')->count(),
            'orders' => Order::count(),
        ];

        return view('pages.about', compact('stats'));
    }
}
