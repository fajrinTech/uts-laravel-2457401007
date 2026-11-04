@extends('layouts.app')

@section('title', 'Ubah Menu: ' . $menu->name)

@section('content')
<div class="bistro-card" style="max-width: 680px; margin: 0 auto;">
    <div class="card-header-row">
        <div>
            <h1 class="card-title">✏️ Ubah Menu Restoran</h1>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">Perbarui rincian informasi hidangan {{ $menu->name }}</p>
        </div>
        <a href="{{ route('menus.index') }}" class="btn btn-outline btn-sm">&larr; Kembali</a>
    </div>

    <form action="{{ route('menus.update', $menu) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nama Menu <span style="color: #dc2626;">*</span></label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $menu->name) }}">
            @error('name')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category" class="form-label">Kategori Hidangan <span style="color: #dc2626;">*</span></label>
            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option value="">-- Pilih Kategori Menu --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat }}" {{ old('category', $menu->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
                <label for="price" class="form-label">Harga Satuan (Rp) <span style="color: #dc2626;">*</span></label>
                <input type="number" name="price" id="price" step="500" min="0" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', (int)$menu->price) }}">
                @error('price')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cook_minutes" class="form-label">Waktu Masak (Menit) <span style="color: #dc2626;">*</span></label>
                <input type="number" name="cook_minutes" id="cook_minutes" min="1" class="form-control @error('cook_minutes') is-invalid @enderror" value="{{ old('cook_minutes', $menu->cook_minutes) }}">
                @error('cook_minutes')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="added_at" class="form-label">Tanggal Ditambahkan <span style="color: #dc2626;">*</span></label>
            <input type="date" name="added_at" id="added_at" class="form-control @error('added_at') is-invalid @enderror" value="{{ old('added_at', \Carbon\Carbon::parse($menu->added_at)->format('Y-m-d')) }}">
            @error('added_at')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group" style="padding: 12px 16px; background-color: #fafaf9; border: 1px solid var(--border-soft); border-radius: 8px;">
            <label class="checkbox-label">
                <input type="checkbox" name="is_spicy" value="1" {{ old('is_spicy', $menu->is_spicy) ? 'checked' : '' }}>
                <span>🌶️ Memiliki Cita Rasa Pedas</span>
            </label>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi Menu (Opsional)</label>
            <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $menu->description) }}</textarea>
            @error('description')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; gap: 12px; margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--border-soft);">
            <button type="submit" class="btn btn-amber">Perbarui Menu</button>
            <a href="{{ route('menus.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
