@extends('layouts.frontend')

@section('title', $info->judul)

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
                    <li><a href="{{ route('event') }}">EVENT</a></li>
                    <li><a href="{{ route('berita') }}">BERITA</a></li>
                    <li><a href="{{ route('kontak') }}">KONTAK</a></li>
                    <li><a href="{{ route('kunjungi') }}">KUNJUNGI</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Information Detail Content -->
<section class="information-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="information-detail">
                    <div class="information-meta">
                        <span class="information-date">{{ \Carbon\Carbon::parse($info->tanggal)->format('d M Y') }}</span>
                        <span class="information-category">{{ $info->kategori->nama_kategori ?? 'Umum' }}</span>
                    </div>
                    
                    <h1 class="information-title">{{ $info->judul }}</h1>
                    
                    <div class="information-content">
                        {!! nl2br(e($info->deskripsi)) !!}
                    </div>
                    
                    <div class="information-actions">
                        <a href="{{ route('informasi.public') }}" class="back-btn">
                            <i class="fas fa-arrow-left"></i> Kembali ke Informasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
                            <li><a href="{{ route('event') }}">EVENT</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Informasi</h4>
                        <ul>
                            <li><a href="{{ route('kontak') }}">KONTAK</a></li>
                            <li><a href="{{ route('berita') }}">BERITA</a></li>
                            <li><a href="{{ route('kunjungi') }}">KUNJUNGI</a></li>
                        </ul>
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
.information-detail-section { background: #f9fafb; padding: 60px 0; }
.information-detail { background: #fff; border-radius: 20px; padding: 36px; box-shadow: 0 20px 60px rgba(0,0,0,.08); }
.information-meta { display: flex; gap: 12px; align-items: center; margin-bottom: 14px; }
.information-meta .information-date, .information-meta .information-category { 
    display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px; font-weight: 700; font-size: .9rem;
}
.information-meta .information-date { background: rgba(15,76,117,.12); color: var(--dark-teal); border: 1px solid rgba(15,76,117,.2); }
.information-meta .information-category { background: rgba(255,107,53,.12); color: #ff6b35; border: 1px solid rgba(255,107,53,.25); }
.information-title { color: var(--dark-teal); font-weight: 800; margin: 10px 0 16px; }
.information-content { color: #475569; line-height: 1.8; font-size: 1.05rem; }
.information-actions { margin-top: 26px; }
.back-btn { 
    display: inline-flex; align-items: center; gap: 10px; 
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); 
    color: #fff; padding: 12px 20px; border-radius: 999px; text-decoration: none; font-weight: 700; 
    box-shadow: 0 10px 20px rgba(15,76,117,.25); transition: transform .2s ease, box-shadow .2s ease;
}
.back-btn:hover { transform: translateY(-2px); box-shadow: 0 16px 28px rgba(15,76,117,.35); color: #fff; }

@media (max-width: 576px) { .information-detail { padding: 22px; } }
</style>

@endsection
