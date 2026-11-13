<div class="detail-split">
    <div>
        <div class="checkout-step">
            <div class="checkout-step__head">
                <span class="checkout-step__num">01</span>
                <span class="checkout-step__title">Identitas Buku</span>
            </div>

            <div class="field">
                <label class="field__label" for="title">Judul Buku</label>
                <input id="title" type="text" name="title" maxlength="200"
                       value="{{ old('title', $book->title ?? '') }}"
                       class="field__input @error('title') is-error @enderror">
                @error('title') <span class="field__error">{{ $message }}</span> @enderror
            </div>

            <div class="field-row">
                <div class="field">
                    <label class="field__label" for="category_id">Kategori</label>
                    <select id="category_id" name="category_id"
                            class="field__select @error('category_id') is-error @enderror">
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @selected(old('category_id', $book->category_id ?? '') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="field__error">{{ $message }}</span> @enderror
                </div>

                <div class="field">
                    <label class="field__label" for="author">Penulis</label>
                    <input id="author" type="text" name="author" maxlength="100"
                           value="{{ old('author', $book->author ?? '') }}"
                           class="field__input @error('author') is-error @enderror">
                    @error('author') <span class="field__error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="checkout-step">
            <div class="checkout-step__head">
                <span class="checkout-step__num">02</span>
                <span class="checkout-step__title">Penerbitan</span>
            </div>

            <div class="field-row">
                <div class="field">
                    <label class="field__label" for="publisher">Penerbit</label>
                    <input id="publisher" type="text" name="publisher" maxlength="100"
                           value="{{ old('publisher', $book->publisher ?? '') }}" class="field__input">
                </div>
                <div class="field">
                    <label class="field__label" for="year">Tahun Terbit</label>
                    <input id="year" type="number" name="year" min="1900" max="{{ date('Y') + 1 }}"
                           value="{{ old('year', $book->year ?? '') }}" class="field__input">
                </div>
            </div>

            <div class="field">
                <label class="field__label" for="isbn">ISBN</label>
                <input id="isbn" type="text" name="isbn" maxlength="20"
                       value="{{ old('isbn', $book->isbn ?? '') }}" class="field__input">
            </div>
        </div>

        <div class="checkout-step">
            <div class="checkout-step__head">
                <span class="checkout-step__num">03</span>
                <span class="checkout-step__title">Harga &amp; Stok</span>
            </div>

            <div class="field-row">
                <div class="field">
                    <label class="field__label" for="price">Harga (Rp)</label>
                    <input id="price" type="number" name="price" min="0" step="500"
                           value="{{ old('price', $book->price ?? '') }}"
                           class="field__input @error('price') is-error @enderror">
                    @error('price') <span class="field__error">{{ $message }}</span> @enderror
                </div>
                <div class="field">
                    <label class="field__label" for="stock">Stok</label>
                    <input id="stock" type="number" name="stock" min="0"
                           value="{{ old('stock', $book->stock ?? 0) }}"
                           class="field__input @error('stock') is-error @enderror">
                    @error('stock') <span class="field__error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="field">
                <label class="field__label" for="description">Deskripsi</label>
                <textarea id="description" name="description" rows="4" maxlength="2000"
                          class="field__textarea">{{ old('description', $book->description ?? '') }}</textarea>
            </div>

            <div class="field" style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_active" value="1" id="is_active" style="accent-color: var(--accent);"
                       @checked(old('is_active', $book->is_active ?? true))>
                <label for="is_active" class="small" style="margin: 0;">Tampilkan di katalog</label>
            </div>
        </div>
    </div>

    <div>
        <div class="checkout-step">
            <div class="checkout-step__head">
                <span class="checkout-step__num">04</span>
                <span class="checkout-step__title">Cover</span>
            </div>

            <div class="field">
                <label class="field__label" for="cover_image">Berkas Cover</label>
                <input id="cover_image" type="file" name="cover_image" accept="image/*"
                       class="field__input @error('cover_image') is-error @enderror">
                <span class="field__hint">JPG, PNG, atau WEBP. Maksimal 2 MB.</span>
                @error('cover_image') <span class="field__error">{{ $message }}</span> @enderror
            </div>

            @isset($book)
                @if($book->cover_image)
                    <div class="field">
                        <span class="field__label">Cover Saat Ini</span>
                        <img src="{{ asset('storage/'.$book->cover_image) }}" alt="Cover saat ini"
                             class="book-cover" style="max-width: 220px;">
                    </div>
                @endif
            @endisset
        </div>
    </div>
</div>
