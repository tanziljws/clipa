@extends('layouts.frontend')

@section('title', 'Kontak')

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
                    <li><a href="{{ route('berita') }}">BERITA</a></li>
                    <li><a href="{{ route('kontak') }}" class="active">KONTAK</a></li>
                    <li><a href="{{ route('kunjungi') }}">KUNJUNGI</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Contact Hero">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="hero-title">Hubungi Kami</h1>
                    <p class="hero-subtitle">Kami siap membantu dan menjawab pertanyaan Anda</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Content -->
<section class="contact-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="map-wrapper" style="border-radius:16px; overflow:hidden; box-shadow:0 10px 25px rgba(0,0,0,.08); height: 520px;">
                    <iframe 
                        src="https://www.google.com/maps?q=Jl.%20Raya%20Tajur%20No.%20168%2C%20Bogor&output=embed"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info">
                    <h2>Informasi Kontak</h2>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-details">
                            <h4>WhatsApp</h4>
                            <p><a href="https://wa.me/6285212345678" target="_blank">+62 852 1234 5678</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p><a href="mailto:info@bellfordacademy.com">info@bellfordacademy.com</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Instagram</h4>
                            <p><a href="https://instagram.com/bellfordacademy" target="_blank">@bellfordacademy</a></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Facebook</h4>
                            <p><a href="https://facebook.com/bellfordacademy" target="_blank">facebook.com/bellfordacademy</a></p>
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
