@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="bistro-card" style="text-align: center; padding: 48px 32px;">
    <div style="display: inline-flex; align-items: center; justify-content: center; width: 72px; height: 72px; background-color: var(--amber-light); border-radius: 50%; font-size: 2.2rem; margin-bottom: 20px;">
        🍲
    </div>
    <h1 style="font-size: 2rem; color: #1c1917; margin-bottom: 12px; font-weight: 800;">
        Manajemen Menu Restoran
    </h1>
    <p style="font-size: 1.05rem; color: var(--text-muted); max-width: 620px; margin: 0 auto 28px auto;">
        Aplikasi pengelolaan daftar menu hidangan makanan utama, minuman segar, dan makanan penutup di Resto Rasa Nusantara.
    </p>
    <div>
        <a href="{{ route('menus.index') }}" class="btn btn-primary" style="padding: 12px 28px; font-size: 1rem;">
            Lihat Daftar Menu Restoran &rarr;
        </a>
    </div>
</div>
@endsection
