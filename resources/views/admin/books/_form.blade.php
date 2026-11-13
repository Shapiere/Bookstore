<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <label class="form-label">Judul Buku <span class="text-danger">*</span></label>
            <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}"
                   class="form-control @error('title') is-invalid @enderror" maxlength="200">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $book->category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Penulis <span class="text-danger">*</span></label>
                <input type="text" name="author" value="{{ old('author', $book->author ?? '') }}"
                       class="form-control @error('author') is-invalid @enderror" maxlength="100">
                @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="publisher" value="{{ old('publisher', $book->publisher ?? '') }}" class="form-control" maxlength="100">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="year" value="{{ old('year', $book->year ?? '') }}" class="form-control" min="1900" max="{{ date('Y')+1 }}">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" class="form-control" maxlength="20">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                <input type="number" name="price" value="{{ old('price', $book->price ?? '') }}"
                       class="form-control @error('price') is-invalid @enderror" min="0" step="500">
                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Stok <span class="text-danger">*</span></label>
                <input type="number" name="stock" value="{{ old('stock', $book->stock ?? 0) }}"
                       class="form-control @error('stock') is-invalid @enderror" min="0">
                @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" rows="4" class="form-control" maxlength="2000">{{ old('description', $book->description ?? '') }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                   @checked(old('is_active', $book->is_active ?? true))>
            <label class="form-check-label" for="is_active">Tampilkan di katalog</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Cover Buku</label>
            <input type="file" name="cover_image" accept="image/*"
                   class="form-control @error('cover_image') is-invalid @enderror">
            @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            <small class="text-muted">JPG/PNG/WEBP, maks 2 MB.</small>
        </div>

        @isset($book)
            @if($book->cover_image)
                <img src="{{ asset('storage/'.$book->cover_image) }}" class="img-fluid rounded border" alt="Cover">
            @endif
        @endisset
    </div>
</div>
