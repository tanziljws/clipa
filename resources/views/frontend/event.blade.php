@extends('layouts.frontend')

@section('title', 'Event')

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
                    <li><a href="{{ route('event') }}" class="active">EVENT</a></li>
                    <li><a href="{{ route('berita') }}">BERITA</a></li>
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
        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Event Hero">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="hero-title">Event & Kegiatan</h1>
                    <p class="hero-subtitle">Ikuti berbagai kegiatan menarik yang diselenggarakan Bellford Academy</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Content -->
<section class="event-content-section">
    <div class="container">
        <div class="event-header">
            <h2>Event Mendatang</h2>
            <p>Jangan lewatkan berbagai kegiatan menarik yang akan diselenggarakan</p>
        </div>
        
        <div class="event-grid">
            <div class="event-item">
                <div class="event-date">
                    <span class="day">15</span>
                    <span class="month">MAR</span>
                </div>
                <div class="event-content">
                    <h3>Open House 2024</h3>
                    <p>Kunjungi Bellford Academy dan lihat fasilitas serta program keahlian yang tersedia</p>
                    <div class="event-meta">
                        <span><i class="fas fa-clock"></i> 08:00 - 15:00 WIB</span>
                        <span><i class="fas fa-map-marker-alt"></i> Bellford Academy</span>
                    </div>
                </div>
            </div>
            
            <div class="event-item">
                <div class="event-date">
                    <span class="day">22</span>
                    <span class="month">MAR</span>
                </div>
                <div class="event-content">
                    <h3>Workshop Teknologi</h3>
                    <p>Pelatihan intensif tentang teknologi terbaru untuk siswa dan masyarakat</p>
                    <div class="event-meta">
                        <span><i class="fas fa-clock"></i> 09:00 - 16:00 WIB</span>
                        <span><i class="fas fa-map-marker-alt"></i> Lab Komputer Bellford Academy</span>
                    </div>
                </div>
            </div>
            
            <div class="event-item">
                <div class="event-date">
                    <span class="day">05</span>
                    <span class="month">APR</span>
                </div>
                <div class="event-content">
                    <h3>Pameran Karya Siswa</h3>
                    <p>Pameran hasil karya terbaik siswa dari berbagai program keahlian</p>
                    <div class="event-meta">
                        <span><i class="fas fa-clock"></i> 08:00 - 17:00 WIB</span>
                        <span><i class="fas fa-map-marker-alt"></i> Aula Bellford Academy</span>
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
