<div class="checkout-step">
    <div class="checkout-step__head">
        <span class="checkout-step__num">01</span>
        <span class="checkout-step__title">Identitas Kategori</span>
    </div>

    <div class="field">
        <label class="field__label" for="name">Nama Kategori</label>
        <input id="name" type="text" name="name" maxlength="100"
               value="{{ old('name', $category->name ?? '') }}"
               class="field__input @error('name') is-error @enderror">
        @error('name') <span class="field__error">{{ $message }}</span> @enderror
    </div>

    <div class="field">
        <label class="field__label" for="description">Deskripsi</label>
        <textarea id="description" name="description" rows="3" maxlength="500"
                  class="field__textarea @error('description') is-error @enderror">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description') <span class="field__error">{{ $message }}</span> @enderror
    </div>
</div>
