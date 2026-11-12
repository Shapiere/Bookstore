<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function home()
    {
        $latest = Book::with('category')->active()->latest()->take(8)->get();
        $categories = Category::withCount('books')->get();

        return view('home', compact('latest', 'categories'));
    }

    public function index(Request $request)
    {
        $keyword = $request->query('q');
        $categoryId = $request->query('category');
        $sort = $request->query('sort', 'latest');

        $books = Book::with('category')
            ->active()
            ->search($keyword)
            ->when($categoryId, fn ($q) => $q->where('category_id', $categoryId))
            ->when($sort === 'price_asc', fn ($q) => $q->orderBy('price', 'asc'))
            ->when($sort === 'price_desc', fn ($q) => $q->orderBy('price', 'desc'))
            ->when($sort === 'latest', fn ($q) => $q->latest())
            ->paginate(12)
            ->withQueryString();

        $categories = Category::withCount('books')->get();

        return view('catalog.index', compact('books', 'categories', 'keyword', 'categoryId', 'sort'));
    }

    public function show(Book $book)
    {
        $book->load('category');
        $related = Book::active()
            ->where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->take(4)
            ->get();

        return view('catalog.show', compact('book', 'related'));
    }
}
