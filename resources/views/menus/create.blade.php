@extends('layouts.app')

@section('title', 'Tambah Menu Baru')

@section('content')
<div class="bistro-card" style="max-width: 680px; margin: 0 auto;">
    <div class="card-header-row">
        <div>
            <h1 class="card-title">✨ Tambah Menu Restoran</h1>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">Lengkapi seluruh informasi hidangan baru di bawah ini</p>
        </div>
        <a href="{{ route('menus.index') }}" class="btn btn-outline btn-sm">&larr; Kembali</a>
    </div>

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nama Menu <span style="color: #dc2626;">*</span></label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: Nasi Goreng Spesial">
            @error('name')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category" class="form-label">Kategori Hidangan <span style="color: #dc2626;">*</span></label>
            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                <option value="">-- Pilih Kategori Menu --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
                <label for="price" class="form-label">Harga Satuan (Rp) <span style="color: #dc2626;">*</span></label>
                <input type="number" name="price" id="price" step="500" min="0" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Contoh: 25000">
                @error('price')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cook_minutes" class="form-label">Waktu Masak (Menit) <span style="color: #dc2626;">*</span></label>
                <input type="number" name="cook_minutes" id="cook_minutes" min="1" class="form-control @error('cook_minutes') is-invalid @enderror" value="{{ old('cook_minutes') }}" placeholder="Contoh: 15">
                @error('cook_minutes')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="added_at" class="form-label">Tanggal Ditambahkan <span style="color: #dc2626;">*</span></label>
            <input type="date" name="added_at" id="added_at" class="form-control @error('added_at') is-invalid @enderror" value="{{ old('added_at') }}">
            @error('added_at')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 18px;">
            <div style="padding: 12px 16px; background-color: #fafaf9; border: 1px solid var(--border-soft); border-radius: 8px;">
                <label class="checkbox-label">
                    <input type="checkbox" name="is_spicy" value="1" {{ old('is_spicy') ? 'checked' : '' }}>
                    <span>🌶️ Cita Rasa Pedas</span>
                </label>
            </div>
            <div style="padding: 12px 16px; background-color: #fffbeb; border: 1px solid #fde68a; border-radius: 8px;">
                <label class="checkbox-label" style="color: #92400e;">
                    <input type="checkbox" name="is_best_seller" value="1" {{ old('is_best_seller') ? 'checked' : '' }}>
                    <span>⭐ Menu Best Seller</span>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Deskripsi Menu (Opsional)</label>
            <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Tuliskan catatan bahan utama, lauk pendamping, atau keterangan sajian...">{{ old('description') }}</textarea>
            @error('description')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div style="display: flex; gap: 12px; margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--border-soft);">
            <button type="submit" class="btn btn-primary">Simpan Menu</button>
            <a href="{{ route('menus.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
@endsection
