@extends('layouts.app')

@section('title', 'Daftar Menu Restoran')

@section('content')
<div class="bistro-card">
    <div class="card-header-row">
        <div>
            <h1 class="card-title">🍲 Daftar Menu Restoran</h1>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">Kelola menu makanan, minuman, dan hidangan penutup Nusantara</p>
        </div>
        <a href="{{ route('menus.create') }}" class="btn btn-primary">
            + Tambah Menu Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert-flash">
            <span>✅</span>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if ($menus->isEmpty())
        <div class="empty-state">
            <div class="empty-state-icon">🍽️</div>
            <h3 style="font-size: 1.15rem; color: #44403c; margin-bottom: 6px;">Belum ada data menu</h3>
            <p style="margin-bottom: 20px;">Daftar hidangan restoran masih kosong. Silakan tambahkan menu perdana Anda.</p>
            <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm">+ Tambah Menu Sekarang</a>
        </div>
    @else
        <div style="overflow-x: auto;">
            <table class="bistro-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Waktu Masak</th>
                        <th>Tanggal Masuk</th>
                        <th>Rasa</th>
                        <th style="text-align: center; width: 210px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $index => $menu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <strong>{{ $menu->name }}</strong>
                            </td>
                            <td>
                                @if ($menu->category === 'Makanan Utama')
                                    <span class="pill-badge pill-makanan">🍛 {{ $menu->category }}</span>
                                @elseif ($menu->category === 'Minuman')
                                    <span class="pill-badge pill-minuman">🍹 {{ $menu->category }}</span>
                                @else
                                    <span class="pill-badge pill-penutup">🍰 {{ $menu->category }}</span>
                                @endif
                            </td>
                            <td>
                                <strong style="color: var(--primary);">Rp {{ number_format($menu->price, 0, ',', '.') }}</strong>
                            </td>
                            <td>{{ $menu->cook_minutes }} menit</td>
                            <td>{{ \Carbon\Carbon::parse($menu->added_at)->format('Y-m-d') }}</td>
                            <td>
                                @if ($menu->is_spicy)
                                    <span class="pill-badge pill-spicy">🌶️ Pedas</span>
                                @else
                                    <span class="pill-badge pill-mild">Gurih / Manis</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-cell" style="justify-content: center;">
                                    <a href="{{ route('menus.show', $menu) }}" class="btn btn-outline btn-sm">Detail</a>
                                    <a href="{{ route('menus.edit', $menu) }}" class="btn btn-outline btn-sm" style="color: #d97706; border-color: #fde68a;">Ubah</a>
                                    <form action="{{ route('menus.destroy', $menu) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu {{ $menu->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger-outline btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
