<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $books = Book::with('category')
            ->search($keyword)
            ->when($request->query('category'), fn ($q, $id) => $q->where('category_id', $id))
            ->latest()->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('admin.books.index', compact('books', 'categories', 'keyword'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        if ($pesan = $this->coverUploadError()) {
            return back()->withInput()->withErrors(['cover_image' => $pesan]);
        }

        $data = $request->validated();
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        if ($pesan = $this->coverUploadError()) {
            return back()->withInput()->withErrors(['cover_image' => $pesan]);
        }

        $data = $request->validated();
        $data['slug'] = $this->uniqueSlug($data['title'], $book->id);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

    // Deteksi berkas cover yang dibuang PHP sebelum sempat divalidasi.
    private function coverUploadError(): ?string
    {
        $error = $_FILES['cover_image']['error'] ?? UPLOAD_ERR_NO_FILE;

        if ($error === UPLOAD_ERR_OK || $error === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        return match ($error) {
            UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Ukuran cover melebihi batas server. Maksimal 4 MB.',
            UPLOAD_ERR_PARTIAL => 'Cover hanya terunggah sebagian. Silakan ulangi.',
            UPLOAD_ERR_NO_TMP_DIR, UPLOAD_ERR_CANT_WRITE => 'Server gagal menyimpan cover. Silakan coba lagi.',
            default => 'Cover gagal diunggah. Silakan coba lagi.',
        };
    }

    // Slug unik, diberi akhiran angka bila sudah dipakai.
    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Book::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
