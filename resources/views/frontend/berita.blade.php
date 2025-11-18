@extends('layouts.frontend')

@section('title', 'Berita')

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
                    <li><a href="{{ route('informasi.public') }}">INFORMASI</a></li>
                    <li><a href="{{ route('tentang') }}">TENTANG</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="secondary-links">
                    <li><a href="{{ route('event') }}">EVENT</a></li>
                    <li><a href="{{ route('berita') }}" class="active">BERITA</a></li>
                    <li><a href="{{ route('kontak') }}">KONTAK</a></li>
                    <li><a href="{{ route('kunjungi') }}">KUNJUNGI</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="News Hero">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="hero-title">Berita Terkini</h1>
                    <p class="hero-subtitle">Dapatkan informasi terbaru tentang kegiatan dan prestasi Bellford Academy</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Content -->
<section class="news-content-section">
    <div class="container">
        <div class="news-header">
            <h2>Berita Terbaru</h2>
            <p>Ikuti perkembangan terbaru dari Bellford Academy</p>
        </div>
        
        <div class="news-grid">
            <div class="news-item">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="News">
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-date">15 Maret 2024</span>
                        <span class="news-category">Prestasi</span>
                    </div>
                    <h3>Siswa Bellford Academy Raih Juara 1 LKS Tingkat Provinsi</h3>
                    <p>Siswa Bellford Academy berhasil meraih juara 1 dalam Lomba Kompetensi Siswa tingkat Provinsi Jawa Barat...</p>
                    <a href="#" class="news-link">Baca Selengkapnya</a>
                </div>
            </div>
            
            <div class="news-item">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="News">
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-date">10 Maret 2024</span>
                        <span class="news-category">Kegiatan</span>
                    </div>
                    <h3>Workshop Teknologi Terbaru untuk Siswa</h3>
                    <p>Bellford Academy mengadakan workshop teknologi terbaru yang diikuti oleh seluruh siswa untuk meningkatkan kompetensi...</p>
                    <a href="#" class="news-link">Baca Selengkapnya</a>
                </div>
            </div>
            
            <div class="news-item">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="News">
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-date">05 Maret 2024</span>
                        <span class="news-category">Kerjasama</span>
                    </div>
                    <h3>Kerjasama dengan Perusahaan Teknologi</h3>
                    <p>Bellford Academy menjalin kerjasama dengan perusahaan teknologi ternama untuk memberikan kesempatan magang...</p>
                    <a href="#" class="news-link">Baca Selengkapnya</a>
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
                            <li><a href="{{ route('informasi.public') }}">INFORMASI</a></li>
                            <li><a href="{{ route('event') }}">EVENT</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Informasi</h4>
                        <ul>
                            <li><a href="{{ route('tentang') }}">TENTANG</a></li>
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

@endsection
