@extends('layouts.frontend')

@section('title', 'Beranda')

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
                    <li><a href="{{ route('home') }}" class="active">BERANDA</a></li>
                    <li><a href="{{ route('galeri.public') }}">GALERI</a></li>
                    <li><a href="{{ route('informasi.public') }}">BERITA</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="nav-actions">
                    <a href="#" class="nav-icon"><i class="fas fa-search"></i></a>
                    <a href="#" class="nav-icon"><i class="fas fa-th"></i></a>
                    <div class="profile-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-image-wrapper">
        <div class="hero-overlay"></div>
        <div class="hero-geometric-shape"></div>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="hero-title">Mengabadikan Momen Berharga Sekolah</h1>
                    <p class="hero-description">Portal digital galeri Bellford Academy yang menghadirkan dokumentasi lengkap berbagai kegiatan, prestasi, dan momen berharga dalam perjalanan pendidikan siswa.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-feature-cards">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <h3>Koleksi Lengkap</h3>
                        <p>Dokumentasi lengkap berbagai kegiatan sekolah dengan kualitas tinggi.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3>Prestasi & Pencapaian</h3>
                        <p>Catat setiap prestasi dan pencapaian siswa dalam berbagai bidang.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Arsip Terorganisir</h3>
                        <p>Penyimpanan terorganisir untuk memudahkan pencarian dokumentasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Solutions Section -->
<section class="gallery-solutions-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="solutions-title">Koleksi Galeri Kami</h2>
            </div>
            <div class="col-lg-4">
                <p class="solutions-description">Intip dokumentasi terbaru dari berbagai kegiatan, prestasi, dan momen penting Bellford Academy.</p>
            </div>
        </div>
        <div class="row solutions-grid">
            @forelse($galeri_terbaru as $galeri)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="solution-card d-flex flex-column latest-gallery-card">
                        <div class="solution-image">
                            <img src="{{ asset('uploads/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}">
                        </div>
                        <div class="solution-content d-flex flex-column flex-grow-1">
                            <div class="gallery-meta mb-3 d-flex justify-content-between flex-wrap">
                                <span><i class="fas fa-tag me-2"></i>{{ $galeri->kategori->nama_kategori ?? 'Umum' }}</span>
                                <span><i class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($galeri->tanggal_upload)->translatedFormat('d M Y') }}</span>
                            </div>
                            <h3>{{ $galeri->judul }}</h3>
                            <div class="mt-auto">
                                <a href="{{ route('galeri.public') }}" class="read-more-link">Lihat Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-images"></i>
                        <h3>Belum Ada Galeri</h3>
                        <p>Konten galeri akan segera ditampilkan di halaman ini.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- News Collection Section -->
<section class="gallery-solutions-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="solutions-title">Koleksi Berita</h2>
            </div>
            <div class="col-lg-4">
                <p class="solutions-description">Baca berita terbaru seputar kegiatan dan perkembangan Bellford Academy.</p>
            </div>
        </div>
        <div class="row solutions-grid">
            @forelse($informasi as $info)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="solution-card d-flex flex-column latest-gallery-card">
                        <div class="solution-image">
                            <img src="{{ !empty($info->gambar) ? asset('uploads/'.$info->gambar) : asset('images/placeholder.jpg') }}" alt="{{ $info->judul }}">
                        </div>
                        <div class="solution-content d-flex flex-column flex-grow-1">
                            <div class="gallery-meta mb-3 d-flex justify-content-between flex-wrap">
                                <span><i class="fas fa-tag me-2"></i>{{ $info->kategori->nama_kategori ?? 'Umum' }}</span>
                                <span><i class="fas fa-calendar-alt me-2"></i>{{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d M Y') }}</span>
                            </div>
                            <h3>{{ $info->judul }}</h3>
                            <p style="margin-top:8px;color:#6b7280">{{ Str::limit(strip_tags($info->deskripsi), 120) }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('informasi.detail', $info->id_info) }}" class="read-more-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>Belum Ada Berita</h3>
                        <p>Konten berita akan segera ditampilkan di halaman ini.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    </section>

<!-- Contact Section: Map & Info -->
<section class="contact-form-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="map-wrapper" style="border-radius:16px; overflow:hidden; box-shadow:0 10px 25px rgba(0,0,0,.08); height: 420px;">
                    <iframe 
                        src="https://www.google.com/maps?q=Jl.%20Raya%20Tajur%20No.%20168%2C%20Bogor&output=embed"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-wrapper">
                    <h2>Informasi Kontak</h2>
                    <div class="contact-item d-flex align-items-start mb-3">
                        <div class="me-3" style="font-size:22px;color:#0f4c75"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <strong>WhatsApp</strong>
                            <div><a href="https://wa.me/6285212345678" target="_blank">+62 852 1234 5678</a></div>
                        </div>
                    </div>
                    <div class="contact-item d-flex align-items-start mb-3">
                        <div class="me-3" style="font-size:22px;color:#0f4c75"><i class="fas fa-envelope"></i></div>
                        <div>
                            <strong>Email</strong>
                            <div><a href="mailto:info@bellfordacademy.com">info@bellfordacademy.com</a></div>
                        </div>
                    </div>
                    <div class="contact-item d-flex align-items-start mb-3">
                        <div class="me-3" style="font-size:22px;color:#0f4c75"><i class="fab fa-instagram"></i></div>
                        <div>
                            <strong>Instagram</strong>
                            <div><a href="https://instagram.com/bellfordacademy" target="_blank">@bellfordacademy</a></div>
                        </div>
                    </div>
                    <div class="contact-item d-flex align-items-start">
                        <div class="me-3" style="font-size:22px;color:#0f4c75"><i class="fab fa-facebook"></i></div>
                        <div>
                            <strong>Facebook</strong>
                            <div><a href="https://facebook.com/bellfordacademy" target="_blank">facebook.com/bellfordacademy</a></div>
                        </div>
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

@endsection
