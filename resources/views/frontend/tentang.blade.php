@extends('layouts.frontend')

@section('title', 'Informasi Sekolah')

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
                    <li><a href="{{ route('informasi.public') }}">BERITA</a></li>
                    <li><a href="{{ route('tentang') }}" class="active">INFORMASI SEKOLAH</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="secondary-links">
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="School Hero">
        <div class="hero-overlay"></div>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="hero-title">Informasi Sekolah</h1>
                    <p class="hero-subtitle">Profil dan Informasi Dasar Bellford Academy</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="about-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="about-content">
                    <h2>Identitas Sekolah</h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <h4>Nama Sekolah</h4>
                            <p>Bellford Academy</p>
                        </div>
                        <div class="info-item">
                            <h4>Alamat</h4>
                            <p>Jl. Raya Tajur No. 168, Bogor, Jawa Barat</p>
                        </div>
                        <div class="info-item">
                            <h4>Telepon</h4>
                            <p>(0251) 1234567</p>
                        </div>
                        <div class="info-item">
                            <h4>Email</h4>
                            <p>info@bellfordacademy.com</p>
                        </div>
                        <div class="info-item">
                            <h4>Website</h4>
                            <p>www.bellfordacademy.com</p>
                        </div>
                        <div class="info-item">
                            <h4>Status</h4>
                            <p>Sekolah Negeri</p>
                        </div>
                    </div>
                    
                    <h2>Visi & Misi</h2>
                    <h3>Visi</h3>
                    <p>"Menjadi sekolah kejuruan unggulan yang menghasilkan lulusan berkarakter, kompeten, dan siap bersaing di era global."</p>
                    
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyelenggarakan pendidikan kejuruan yang berkualitas</li>
                        <li>Mengembangkan kompetensi siswa sesuai dengan kebutuhan industri</li>
                        <li>Membentuk karakter siswa yang berakhlak mulia</li>
                        <li>Menyediakan fasilitas pembelajaran yang memadai</li>
                        <li>Menjalin kerjasama dengan dunia industri</li>
                    </ul>
                    
                    <h2>Program Keahlian</h2>
                    <div class="program-grid">
                        <div class="program-item">
                            <h4>Rekayasa Perangkat Lunak</h4>
                            <p>Mengembangkan aplikasi dan sistem informasi</p>
                        </div>
                        <div class="program-item">
                            <h4>Teknik Komputer Jaringan</h4>
                            <p>Mengelola jaringan komputer dan sistem</p>
                        </div>
                        <div class="program-item">
                            <h4>Desain Komunikasi Visual</h4>
                            <p>Menciptakan desain grafis dan multimedia</p>
                        </div>
                        <div class="program-item">
                            <h4>Teknik Audio Video</h4>
                            <p>Produksi konten audio dan video</p>
                        </div>
                    </div>
                    
                    <h2>Fasilitas Sekolah</h2>
                    <ul>
                        <li>Laboratorium Komputer</li>
                        <li>Studio Audio Video</li>
                        <li>Workshop Desain</li>
                        <li>Perpustakaan Digital</li>
                        <li>Lapangan Olahraga</li>
                        <li>Kantin Sekolah</li>
                        <li>Masjid</li>
                        <li>Parkir Motor dan Mobil</li>
                    </ul>
                    
                    <h2>Jam Operasional</h2>
                    <div class="schedule-info">
                        <p><strong>Senin - Jumat:</strong> 07:00 - 15:00 WIB</p>
                        <p><strong>Sabtu:</strong> 07:00 - 12:00 WIB</p>
                        <p><strong>Minggu:</strong> Libur</p>
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
                        <ul>
                            <li><a href="{{ route('tentang') }}">INFORMASI SEKOLAH</a></li>
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
