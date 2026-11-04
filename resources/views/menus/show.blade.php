@extends('layouts.app')

@section('title', 'Detail Menu: ' . $menu->name)

@section('content')
<div class="bistro-card" style="max-width: 740px; margin: 0 auto;">
    <div class="card-header-row">
        <div>
            <div style="margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
                @if ($menu->category === 'Makanan Utama')
                    <span class="pill-badge pill-makanan">🍛 {{ $menu->category }}</span>
                @elseif ($menu->category === 'Minuman')
                    <span class="pill-badge pill-minuman">🍹 {{ $menu->category }}</span>
                @else
                    <span class="pill-badge pill-penutup">🍰 {{ $menu->category }}</span>
                @endif

                @if ($menu->is_spicy)
                    <span class="pill-badge pill-spicy">🌶️ Pedas</span>
                @else
                    <span class="pill-badge pill-mild">Gurih / Segar</span>
                @endif

                @if ($menu->is_best_seller)
                    <span class="pill-badge pill-bestseller">⭐ Rekomendasi Favorit</span>
                @endif
            </div>
            <h1 class="card-title" style="font-size: 1.65rem;">{{ $menu->name }}</h1>
        </div>
        <a href="{{ route('menus.index') }}" class="btn btn-outline btn-sm">&larr; Kembali ke Daftar</a>
    </div>

    <div style="background-color: #fffbeb; border: 1px solid #fde68a; border-radius: 8px; padding: 18px 22px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.04em; color: #92400e; font-weight: 600;">Harga Satuan</div>
            <div style="font-size: 1.8rem; font-weight: 800; color: #b45309;">
                Rp {{ number_format($menu->price, 0, ',', '.') }}
            </div>
        </div>
        <div style="text-align: right;">
            <div style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.04em; color: #92400e; font-weight: 600;">Estimasi Penyajian</div>
            <div style="font-size: 1.2rem; font-weight: 700; color: #78350f;">
                ⏱️ {{ $menu->cook_minutes }} Menit
            </div>
        </div>
    </div>

    <div style="border-top: 1px solid var(--border-soft); border-bottom: 1px solid var(--border-soft); padding: 18px 0; margin-bottom: 24px;">
        <div style="display: grid; grid-template-columns: 180px 1fr; gap: 12px; margin-bottom: 12px; font-size: 0.95rem;">
            <span style="color: var(--text-muted); font-weight: 500;">Status Rekomendasi</span>
            <span>
                @if ($menu->is_best_seller)
                    <strong style="color: #d97706;">⭐ Ya, Menu Best Seller Restoran</strong>
                @else
                    <span style="color: var(--text-muted);">Menu Reguler</span>
                @endif
            </span>
        </div>

        <div style="display: grid; grid-template-columns: 180px 1fr; gap: 12px; margin-bottom: 12px; font-size: 0.95rem;">
            <span style="color: var(--text-muted); font-weight: 500;">Tanggal Ditambahkan</span>
            <strong>{{ \Carbon\Carbon::parse($menu->added_at)->translatedFormat('d F Y') }} ({{ \Carbon\Carbon::parse($menu->added_at)->format('Y-m-d') }})</strong>
        </div>

        <div style="display: grid; grid-template-columns: 180px 1fr; gap: 12px; margin-bottom: 12px; font-size: 0.95rem;">
            <span style="color: var(--text-muted); font-weight: 500;">Tingkat Rasa</span>
            <span>
                @if ($menu->is_spicy)
                    <strong style="color: #dc2626;">Pedas khas Nusantara</strong>
                @else
                    <strong style="color: #44403c;">Tidak pedas (Aman untuk anak / ramah lambung)</strong>
                @endif
            </span>
        </div>

        <div style="display: grid; grid-template-columns: 180px 1fr; gap: 12px; font-size: 0.95rem;">
            <span style="color: var(--text-muted); font-weight: 500;">Deskripsi Sajian</span>
            <span style="color: #292524;">
                {{ $menu->description ?: '(Tidak ada catatan tambahan untuk menu ini)' }}
            </span>
        </div>
    </div>

    <div style="display: flex; gap: 12px; align-items: center;">
        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-amber">
            ✏️ Ubah Menu
        </a>
        <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu {{ $menu->name }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger-outline">
                🗑️ Hapus Menu
            </button>
        </form>
        <a href="{{ route('menus.index') }}" class="btn btn-outline" style="margin-left: auto;">
            Kembali
        </a>
    </div>
</div>
@endsection
