@extends('layouts.frontend')

@section('title', 'Informasi')

@section('content')

<!-- Main Navigation -->
<nav class="main-nav">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="logo">
                        <div class="logo-icon">
                            <img src="{{ asset('images/logo.png') }}" alt="Bellford Academy Logo" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div class="logo-text">
                            <span class="logo-title">Bellford Academy</span>
                            <span class="logo-subtitle">Gallery</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}">BERANDA</a></li>
                    <li><a href="{{ route('galeri.public') }}">GALERI</a></li>
                    <li><a href="{{ route('informasi.public') }}" class="active">BERITA</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="secondary-links">
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <nav class="breadcrumb-nav">
            <a href="{{ route('home') }}">Beranda</a>
            <i class="fas fa-chevron-right"></i>
            <span>Berita</span>
        </nav>
    </div>
</section>

<!-- Information Content -->
<section class="information-content-section">
    <div class="container">
        <div class="gallery-header">
            <h2>
                <i class="fas fa-newspaper"></i>
                Berita Terbaru
            </h2>
            <p>Ikuti perkembangan terbaru dari Bellford Academy</p>
        </div>

        <!-- Category Tabs & Search Section -->
        <div class="category-filter-section">
            <div class="filter-wrapper">
                <!-- Search Bar -->
                <div class="search-wrapper">
                    <form method="GET" action="{{ route('informasi.public') }}" class="search-form">
                        <div class="search-input-group">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="search" class="search-input" placeholder="Cari berita..." value="{{ request('search') }}">
                            @if(request('kategori'))
                                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                            @endif
                            <button type="submit" class="search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Category Tabs -->
                <div class="category-tabs">
                    <a href="{{ route('informasi.public', ['search' => request('search')]) }}" 
                       class="category-tab {{ !request('kategori') || request('kategori') == 'all' ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Semua</span>
                    </a>
                    @if(isset($kategori))
                        @foreach($kategori as $kat)
                            @php
                                $icon = 'fas fa-folder';
                                $namaLower = strtolower($kat->nama_kategori);
                                if (strpos($namaLower, 'eskul') !== false || strpos($namaLower, 'ekstra') !== false) {
                                    $icon = 'fas fa-school';
                                } elseif (strpos($namaLower, 'event') !== false || strpos($namaLower, 'acara') !== false) {
                                    $icon = 'fas fa-calendar-alt';
                                } elseif (strpos($namaLower, 'pengumuman') !== false || strpos($namaLower, 'announcement') !== false) {
                                    $icon = 'fas fa-bullhorn';
                                }
                            @endphp
                            <a href="{{ route('informasi.public', ['kategori' => $kat->id_kategori, 'search' => request('search')]) }}" 
                               class="category-tab {{ request('kategori') == $kat->id_kategori ? 'active' : '' }}">
                                <i class="{{ $icon }}"></i>
                                <span>{{ $kat->nama_kategori }}</span>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="solutions-grid">
            @forelse($informasi as $info)
                <div class="solution-card d-flex flex-column latest-gallery-card">
                    <div class="solution-image">
                        <img src="{{ !empty($info->gambar) ? secure_asset('uploads/'.$info->gambar) : secure_asset('images/placeholder.jpg') }}" alt="{{ $info->judul }}" loading="lazy">
                    </div>
                    <div class="solution-content d-flex flex-column flex-grow-1">
                        <div class="gallery-meta d-flex justify-content-between flex-wrap">
                            <span><i class="fas fa-tag"></i> {{ $info->kategori->nama_kategori ?? 'Umum' }}</span>
                            <span><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d M Y') }}</span>
                        </div>
                        <h3>{{ $info->judul }}</h3>
                        <p style="margin-top:8px;color:#6b7280">{{ Str::limit(strip_tags($info->deskripsi), 140) }}</p>
                        <div class="mt-auto">
                            <a href="{{ route('informasi.detail', $info->id_info) }}" class="information-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state-wrapper">
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>Belum Ada Berita</h3>
                        <p>Berita akan segera ditambahkan</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        @if($informasi->hasPages())
            <div class="pagination-wrapper">
                {{ $informasi->links() }}
            </div>
        @endif
    </div>
</section>

<!-- Footer -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer-brand">
                    <h3>Bellford Academy</h3>
                    <p>Bellford Academy</p>
                    <div class="footer-contact">
                        <p>Jl. Raya Tajur No. 168, Bogor</p>
                        <p>+62 251 123 4567</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Links</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">BERANDA</a></li>
                            <li><a href="{{ route('galeri.public') }}">GALERI</a></li>
                            <li><a href="{{ route('informasi.public') }}">BERITA</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Informasi</h4>
                        <ul></ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Sosial Media</h4>
                        <ul>
                            <li><a href="https://instagram.com/bellfordacademy" target="_blank">INSTAGRAM</a></li>
                            <li><a href="https://facebook.com/bellfordacademy" target="_blank">FACEBOOK</a></li>
                            <li><a href="https://youtube.com/bellfordacademy" target="_blank">YOUTUBE</a></li>
                            <li><a href="https://tiktok.com/@bellfordacademy" target="_blank">TIKTOK</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="social-icons">
                        <a href="https://instagram.com/bellfordacademy" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://facebook.com/bellfordacademy" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://youtube.com/bellfordacademy" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <p>&copy; 2024 Bellford Academy. Semua Hak Dilindungi.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
/* Breadcrumb Section (copy from galeri) */
.breadcrumb-section { padding: 20px 0; background: white; border-bottom: 1px solid #e5e7eb; }
.breadcrumb-nav { display: flex; align-items: center; gap: 12px; font-size: .95rem; color: var(--light-text); }
.breadcrumb-nav a { color: var(--primary-color); text-decoration: none; font-weight: 500; transition: color .3s ease; }
.breadcrumb-nav a:hover { color: var(--dark-teal); }
.breadcrumb-nav i { font-size: .75rem; color: var(--light-text); }
.breadcrumb-nav span { color: var(--dark-text); font-weight: 600; }

/* Header & sections */
.gallery-header { margin-bottom: 0; padding: 50px 0 30px 0; text-align: center; }
.gallery-header h2 { font-size: 2.5rem; font-weight: 800; color: var(--dark-teal); margin-bottom: 20px; display: flex; align-items: center; justify-content: center; gap: 16px; }
.gallery-header h2 i { color: var(--accent-color); font-size: 2.2rem; }
.gallery-header p { font-size: 1.1rem; color: #6b7280; margin: 0; line-height: 1.6; }
.information-content-section { background: #f9fafb; padding: 40px 0 60px 0; }

/* Filter & tabs */
.category-filter-section { padding: 20px 0 40px 0; background: white; }
.filter-wrapper { display: flex; flex-direction: column; gap: 20px; align-items: center; }
.search-wrapper { width: 100%; max-width: 600px; }
.search-form { width: 100%; }
.search-input-group { position: relative; display: flex; align-items: center; background: white; border: 2px solid #e5e7eb; border-radius: 12px; padding: 0; transition: all .3s ease; box-shadow: 0 2px 8px rgba(0,0,0,.08); }
.search-input-group:focus-within { border-color: var(--primary-color); box-shadow: 0 4px 16px rgba(15,76,117,.15); }
.search-icon { position: absolute; left: 18px; color: var(--light-text); font-size: 1rem; pointer-events: none; z-index: 1; }
.search-input { flex: 1; border: none; background: transparent; padding: 16px 70px 16px 48px; font-size: 1rem; color: var(--dark-text); outline: none; font-family: 'Inter', sans-serif; }
.search-input::placeholder { color: var(--light-text); }
.search-btn { position: absolute; right: 6px; background: #004f83; border: none; border-radius: 8px; padding: 12px 20px; color: white; cursor: pointer; transition: all .3s ease; display: flex; align-items: center; justify-content: center; font-size: 1rem; }
.search-btn:hover { background: var(--dark-teal); transform: scale(1.05); box-shadow: 0 4px 12px rgba(0,79,131,.3); }
.category-tabs { display: flex; justify-content: center; flex-wrap: wrap; gap: 10px; padding: 0; width: 100%; max-width: 800px; }
.category-tab { display: inline-flex; align-items: center; gap: 8px; padding: 12px 20px; background: var(--light-bg); border: 2px solid #e5e7eb; border-radius: 12px; color: var(--dark-text); text-decoration: none; font-weight: 600; font-size: .95rem; transition: all .3s ease; cursor: pointer; position: relative; overflow: hidden; }
.category-tab::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,.3), transparent); transition: left .5s; }
.category-tab:hover::before { left: 100%; }
.category-tab i { font-size: 1rem; color: var(--primary-color); transition: transform .3s ease; }
.category-tab:hover { border-color: var(--primary-color); background: rgba(15,76,117,.08); transform: translateY(-3px); box-shadow: 0 6px 16px rgba(15,76,117,.15); }
.category-tab:hover i { transform: scale(1.1); }
.category-tab.active { background: var(--primary-color); border-color: var(--primary-color); color: white; box-shadow: 0 4px 12px rgba(15,76,117,.3); }
.category-tab.active i { color: white; }

/* Cards (reuse gallery styles) */
.solutions-grid { margin-top: 30px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.empty-state-wrapper { grid-column: 1 / -1; text-align: center; padding: 60px 20px; }
.empty-state i { font-size: 4rem; color: var(--light-text); margin-bottom: 20px; }
.empty-state h3 { font-size: 1.5rem; color: var(--dark-text); margin-bottom: 10px; }
.empty-state p { color: var(--light-text); font-size: 1rem; }
.latest-gallery-card { transition: all .4s cubic-bezier(0.4,0,0.2,1); opacity: 0; animation: fadeInUp .6s ease forwards; }
@keyframes fadeInUp { from {opacity:0; transform: translateY(30px);} to {opacity:1; transform: translateY(0);} }
.latest-gallery-card:hover { transform: translateY(-12px) scale(1.02); box-shadow: 0 24px 48px rgba(0,0,0,.15); }
.solution-image { position: relative; overflow: hidden; height: 250px; }
.solution-image img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
.latest-gallery-card:hover .solution-image img { transform: scale(1.1); }
.solution-image::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,.1) 100%); opacity: 0; transition: opacity .3s ease; }
.latest-gallery-card:hover .solution-image::after { opacity: 1; }
.solution-content { padding: 20px; background: white; }
.gallery-meta { font-size: .9rem; color: var(--light-text); margin-bottom: 12px; }
.gallery-meta span { display: flex; align-items: center; gap: 6px; }
.gallery-meta i { color: var(--primary-color); }
.information-link { color: #ff6b35; text-decoration: none; font-weight: 600; }
.information-link:hover { color: #ff8c5a; }

@media (max-width: 992px) { .solutions-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; } }
@media (max-width: 768px) { .category-filter-section { padding: 30px 0; } .search-wrapper { max-width: 100%; padding: 0 15px; } .category-tabs { padding: 0 15px; gap: 8px; } .category-tab { padding: 10px 16px; font-size: .85rem; } .solutions-grid { grid-template-columns: 1fr; gap: 20px; } }
</style>

@endsection