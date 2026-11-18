<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::withCount('books')->get();
        $latest = Book::with('category')->active()->latest()->orderByDesc('id')->take(8)->get();

        // Pilihan editor, bisa difilter tab kategori lewat ?pilih=slug
        $activeSlug = $request->query('pilih');

        $curation = Book::with('category')
            ->active()
            ->when($activeSlug, fn ($q) => $q->whereHas(
                'category',
                fn ($c) => $c->where('slug', $activeSlug)
            ))
            ->latest()
            ->orderByDesc('id')
            ->take(6)
            ->get();

        $feature = $curation->first();
        $others = $curation->slice(1)->values();
        $activeCategory = $activeSlug ? $categories->firstWhere('slug', $activeSlug) : null;

        // Rak buku terbaru, bisa difilter tab kategori lewat ?rak=slug
        $latestSlug = $request->query('rak');
        $latestCategory = $latestSlug ? $categories->firstWhere('slug', $latestSlug) : null;

        $latestBooks = Book::with('category')
            ->active()
            ->when($latestCategory, fn ($q) => $q->where('category_id', $latestCategory->id))
            ->latest()->orderByDesc('id')
            ->take(8)
            ->get();

        return view('home', compact(
            'latest', 'categories', 'feature', 'others', 'activeSlug', 'activeCategory',
            'latestBooks', 'latestSlug'
        ));
    }

    // Potongan HTML rak buku terbaru untuk pemuatan tanpa reload.
    public function latestBooks(Request $request)
    {
        $categories = Category::withCount('books')->get();
        $latestSlug = $request->query('rak');
        $latestCategory = $latestSlug ? $categories->firstWhere('slug', $latestSlug) : null;

        $latestBooks = Book::with('category')
            ->active()
            ->when($latestCategory, fn ($q) => $q->where('category_id', $latestCategory->id))
            ->latest()->orderByDesc('id')
            ->take(8)
            ->get();

        return response()
            ->view('partials.latest-books', compact('categories', 'latestBooks', 'latestSlug'))
            ->header('Cache-Control', 'no-store');
    }

    // Potongan HTML paling dicari untuk pemuatan tanpa reload.
    public function curation(Request $request)
    {
        $categories = Category::withCount('books')->get();

        $activeSlug = $request->query('pilih');
        $activeCategory = $activeSlug ? $categories->firstWhere('slug', $activeSlug) : null;

        $books = Book::with('category')
            ->active()
            ->when($activeCategory, fn ($q) => $q->where('category_id', $activeCategory->id))
            ->latest()
            ->orderByDesc('id')
            ->take(6)
            ->get();

        $feature = $books->first();
        $others = $books->slice(1)->values();

        return response()
            ->view('partials.curation', compact(
                'categories', 'feature', 'others', 'activeSlug', 'activeCategory'
            ))
            ->header('Cache-Control', 'no-store');
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
            ->when($sort === 'price_asc', fn ($q) => $q->orderBy('price', 'asc')->orderByDesc('id'))
            ->when($sort === 'price_desc', fn ($q) => $q->orderBy('price', 'desc')->orderByDesc('id'))
            ->when($sort === 'latest', fn ($q) => $q->latest()->orderByDesc('id'))
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
