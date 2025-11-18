@extends('layouts.frontend')

@section('title', 'Galeri')

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
                    <li><a href="{{ route('galeri.public') }}" class="active">GALERI</a></li>
                    <li><a href="{{ route('informasi.public') }}">BERITA</a></li>
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
            <span>Galeri</span>
        </nav>
    </div>
</section>

<!-- Gallery Content -->
<section class="gallery-content-section">
    <div class="container">
        <div class="gallery-header">
            <h2>
                <i class="fas fa-images"></i>
                Koleksi Galeri
            </h2>
            <p>Jelajahi berbagai momen berharga dan kegiatan yang telah dilaksanakan</p>
        </div>
        
        <!-- Category Tabs & Search Section -->
        <div class="category-filter-section">
            <div class="filter-wrapper">
                <!-- Search Bar -->
                <div class="search-wrapper">
                    <form method="GET" action="{{ route('galeri.public') }}" class="search-form">
                        <div class="search-input-group">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="search" class="search-input" placeholder="Cari galeri..." value="{{ request('search') }}">
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
                    <a href="{{ route('galeri.public', ['search' => request('search')]) }}" 
                       class="category-tab {{ !request('kategori') || request('kategori') == 'all' ? 'active' : '' }}">
                        <i class="fas fa-images"></i>
                        <span>Semua</span>
                    </a>
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
                        <a href="{{ route('galeri.public', ['kategori' => $kat->id_kategori, 'search' => request('search')]) }}" 
                           class="category-tab {{ request('kategori') == $kat->id_kategori ? 'active' : '' }}">
                            <i class="{{ $icon }}"></i>
                            <span>{{ $kat->nama_kategori }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="solutions-grid" id="galleryGrid">
            @forelse($data as $gallery)
                <div class="solution-card d-flex flex-column latest-gallery-card" 
                     onclick="openLightbox({{ $loop->index }})" 
                     style="cursor: pointer; --index: {{ $loop->index }};">
                    <div class="solution-image">
                        <img src="{{ asset('uploads/'.$gallery->gambar) }}" alt="{{ $gallery->judul }}" loading="lazy">
                            </div>
                    <div class="solution-content d-flex flex-column flex-grow-1">
                        <div class="gallery-meta d-flex justify-content-between flex-wrap">
                            <span><i class="fas fa-tag"></i> {{ $gallery->kategori->nama_kategori ?? 'Umum' }}</span>
                            <span><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($gallery->tanggal_upload)->translatedFormat('d M Y') }}</span>
                        </div>
                        <h3>{{ $gallery->judul }}</h3>
                    </div>
                </div>
            @empty
                <div class="empty-state-wrapper">
                    <div class="empty-state">
                        <i class="fas fa-images"></i>
                        <h3>Belum Ada Galeri</h3>
                        <p>Galeri akan segera ditambahkan</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Lightbox Modal -->
        <div id="lightbox" class="lightbox" onclick="closeLightbox()">
            <div class="lightbox-content insta-layout" onclick="event.stopPropagation()">
                <button class="lightbox-close" onclick="closeLightbox()">
                    <i class="fas fa-times"></i>
                </button>
                <button class="lightbox-prev" onclick="changeImage(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="lightbox-next" onclick="changeImage(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>

                <!-- Left: Image -->
                <div class="lightbox-main">
                    <div class="lightbox-image-container">
                        <img id="lightbox-image" src="" alt="">
                    </div>
                </div>

                <!-- Right: Panel -->
                <aside class="lightbox-side">
                    <div class="side-header">
                        <h3 id="lightbox-title" class="mb-2"></h3>
                        <div class="lightbox-meta">
                            <span id="lightbox-category"></span>
                            <span id="lightbox-date"></span>
                        </div>
                    </div>
                    <div class="side-actions">
                        <button id="like-btn" class="like-btn" onclick="toggleLike()">
                            <i class="far fa-heart" id="like-icon"></i>
                            <span id="like-count">0</span>
                        </button>
                        <a id="download-btn" class="download-btn" href="#" download>
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                    <div class="side-body">
                        <div class="comment-form-wrapper">
                            <form id="comment-form" onsubmit="submitComment(event)">
                                @csrf
                                <div class="form-row">
                                    <input type="text" id="comment-nama" name="nama" placeholder="Nama Anda" required>
                                    <input type="email" id="comment-email" name="email" placeholder="Email (opsional)">
                                </div>
                                <textarea id="comment-komentar" name="komentar" placeholder="Tulis komentar Anda..." required></textarea>
                                <button type="submit" class="comment-submit-btn">
                                    <i class="fas fa-paper-plane"></i> Kirim Komentar
                                </button>
                            </form>
                        </div>
                        <div class="lightbox-comments">
                            <h4><i class="fas fa-comments"></i> Komentar</h4>
                            <div class="comments-toggle-row">
                                <button id="comments-toggle" type="button" class="comments-toggle">
                                    <i class="fas fa-chevron-down"></i>
                                    <span>Tampilkan Komentar</span>
                                    <span id="comments-count" class="comments-count">(0)</span>
                                </button>
                            </div>
                            <div id="comments-list" class="comments-list" style="display:none"></div>
                        </div>
                    </div>
                </aside>
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

<style>
/* Breadcrumb Section */
.breadcrumb-section {
    padding: 20px 0;
    background: white;
    border-bottom: 1px solid #e5e7eb;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 0.95rem;
    color: var(--light-text);
}

.breadcrumb-nav a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.breadcrumb-nav a:hover {
    color: var(--dark-teal);
}

.breadcrumb-nav i {
    font-size: 0.75rem;
    color: var(--light-text);
}

.breadcrumb-nav span {
    color: var(--dark-text);
    font-weight: 600;
}

/* Gallery Header */
.gallery-header {
    margin-bottom: 0;
    padding: 50px 0 30px 0;
    text-align: center;
}

.gallery-header h2 {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-teal);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
}

.gallery-header h2 i {
    color: var(--accent-color);
    font-size: 2.2rem;
}

.gallery-header p {
    font-size: 1.1rem;
    color: #6b7280;
    margin: 0;
    line-height: 1.6;
}

/* Category Filter Section */
.category-filter-section {
    padding: 20px 0 40px 0;
    background: white;
}

.filter-wrapper {
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
}

.search-wrapper {
    width: 100%;
    max-width: 600px;
}

.search-form {
    width: 100%;
}

.search-input-group {
    position: relative;
    display: flex;
    align-items: center;
    background: white;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    padding: 0;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.search-input-group:focus-within {
    border-color: var(--primary-color);
    box-shadow: 0 4px 16px rgba(15, 76, 117, 0.15);
}

.search-icon {
    position: absolute;
    left: 18px;
    color: var(--light-text);
    font-size: 1rem;
    pointer-events: none;
    z-index: 1;
}

.search-input {
    flex: 1;
    border: none;
    background: transparent;
    padding: 16px 70px 16px 48px;
    font-size: 1rem;
    color: var(--dark-text);
    outline: none;
    font-family: 'Inter', sans-serif;
}

.search-input::placeholder {
    color: var(--light-text);
}

.search-btn {
    position: absolute;
    right: 6px;
    background: #004f83;
    border: none;
    border-radius: 8px;
    padding: 12px 20px;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.search-btn:hover {
    background: var(--dark-teal);
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0, 79, 131, 0.3);
}

.category-tabs {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    padding: 0;
    width: 100%;
    max-width: 800px;
}

.category-tab {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: var(--light-bg);
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    color: var(--dark-text);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

.category-tab::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.category-tab:hover::before {
    left: 100%;
}

.category-tab i {
    font-size: 1rem;
    color: var(--primary-color);
    transition: transform 0.3s ease;
}

.category-tab:hover {
    border-color: var(--primary-color);
    background: rgba(15, 76, 117, 0.08);
    transform: translateY(-3px);
    box-shadow: 0 6px 16px rgba(15, 76, 117, 0.15);
}

.category-tab:hover i {
    transform: scale(1.1);
}

.category-tab.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    box-shadow: 0 4px 12px rgba(15, 76, 117, 0.3);
}

.category-tab.active i {
    color: white;
}

/* Gallery Grid Enhancements */
.gallery-content-section {
    background: #f9fafb;
    padding: 40px 0 60px 0;
}

.solutions-grid {
    margin-top: 30px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.empty-state-wrapper {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
}

.empty-state {
    display: inline-block;
}

.empty-state i {
    font-size: 4rem;
    color: var(--light-text);
    margin-bottom: 20px;
}

.empty-state h3 {
    font-size: 1.5rem;
    color: var(--dark-text);
    margin-bottom: 10px;
}

.empty-state p {
    color: var(--light-text);
    font-size: 1rem;
}

@media (max-width: 992px) {
    .solutions-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .solutions-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

.latest-gallery-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    opacity: 0;
    animation: fadeInUp 0.6s ease forwards;
    animation-delay: calc(var(--index, 0) * 0.1s);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.latest-gallery-card:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 24px 48px rgba(0, 0, 0, 0.15);
}

.solution-image {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.solution-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.latest-gallery-card:hover .solution-image img {
    transform: scale(1.1);
}

.solution-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.1) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.latest-gallery-card:hover .solution-image::after {
    opacity: 1;
}

.solution-content {
    padding: 20px;
    background: white;
}

.gallery-meta {
    font-size: 0.9rem;
    color: var(--light-text);
    margin-bottom: 12px;
}

.gallery-meta span {
    display: flex;
    align-items: center;
    gap: 6px;
}

.gallery-meta i {
    color: var(--primary-color);
}

.solution-content h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--dark-teal);
    margin: 0;
    line-height: 1.4;
}

/* Lightbox Styles */
.lightbox {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    z-index: 9999;
    animation: fadeIn 0.3s ease;
    overflow: hidden;
}

.lightbox.active {
    display: flex;
    align-items: center;
    justify-content: center;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.lightbox-content { position: relative; max-width: 92%; height: 86vh; display: flex; gap: 0; animation: zoomIn 0.3s ease; }
.insta-layout { background: #0b0b0b; border-radius: 12px; overflow: hidden; }
.lightbox-main { flex: 1 1 auto; background: #000; display:flex; align-items:center; justify-content:center; min-width: 50vw; height: 100%; overflow-y: scroll; overflow-x: hidden; -webkit-overflow-scrolling: touch; scrollbar-gutter: stable; }

@keyframes zoomIn {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.lightbox-image-container { position: relative; max-width: 100%; max-height: 100%; display:flex; align-items:center; justify-content:center; padding: 8px; }

.lightbox-image-container img { max-width: 100%; max-height: 72vh; object-fit: contain; }

.lightbox-close {
    position: absolute;
    top: -50px;
    right: 0;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 20px;
    transition: all 0.3s ease;
    z-index: 10000;
}

.lightbox-close:hover {
    background: var(--accent-color);
    border-color: var(--accent-color);
    transform: rotate(90deg);
}

.lightbox-prev,
.lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: white;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 20px;
    transition: all 0.3s ease;
    z-index: 10000;
}

.lightbox-prev { left: -70px; }

.lightbox-next { right: -70px; }

/* Download button */
.download-btn { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.2); color: #fff; padding: 10px 14px; border-radius: 10px; text-decoration:none; font-weight:700; }
.download-btn:hover { background: rgba(255,255,255,0.15); }

.lightbox-prev:hover,
.lightbox-next:hover {
    background: var(--accent-color);
    border-color: var(--accent-color);
    transform: translateY(-50%) scale(1.1);
}

.lightbox-side { width: 360px; background: #111827; color: #e5e7eb; display:flex; flex-direction:column; height: 100%; overflow: hidden; scrollbar-gutter: stable; }
.side-body { flex: 1 1 auto; overflow-y: auto; -webkit-overflow-scrolling: touch; padding: 12px 18px; }
.side-header { position: sticky; top: 0; background: #111827; z-index: 2; }
.side-actions { position: sticky; top: 64px; background: #111827; z-index: 2; }

/* Visible, slim scrollbars for both panes */
.lightbox-main::-webkit-scrollbar, .side-body::-webkit-scrollbar { width: 12px; height: 12px; }
.lightbox-main::-webkit-scrollbar-track, .side-body::-webkit-scrollbar-track { background: #1f2937; border-radius: 8px; }
.lightbox-main::-webkit-scrollbar-thumb, .side-body::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 8px; border: 2px solid #1f2937; }
.lightbox-main::-webkit-scrollbar-thumb:hover, .side-body::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
.side-body { overscroll-behavior: contain; }
.lightbox-main { overscroll-behavior: contain; }
.side-header { padding: 16px 18px; border-bottom: 1px solid rgba(255,255,255,.08); }
.lightbox-info { text-align: left; color: #e5e7eb; max-width: 100%; padding: 0; }

.lightbox-info h3, .side-header h3 { font-size: 1.2rem; font-weight: 700; margin: 0; color: #fff; }

.lightbox-meta { display:flex; gap: 10px; align-items:center; font-size: .9rem; color: rgba(255,255,255,0.8); }

.lightbox-meta span {
    display: flex;
    align-items: center;
    gap: 8px;
}

.lightbox-meta span:first-child { background: rgba(255, 107, 53, 0.2); padding: 6px 12px; border-radius: 999px; border: 1px solid rgba(255, 107, 53, 0.3); }

.lightbox-meta span:last-child {
    color: rgba(255, 255, 255, 0.7);
}

/* Like Button */
.side-actions { 
    padding: 12px 18px; 
    display:flex; 
    gap: 10px; 
    align-items:center; 
    border-bottom: 1px solid rgba(255,255,255,.08);
}

.like-btn { 
    background: rgba(255,255,255,0.08); 
    border: 1px solid rgba(255,255,255,0.2); 
    color: #fff; 
    padding: 10px 14px; 
    border-radius: 10px; 
    cursor: pointer; 
    display:inline-flex; 
    align-items:center; 
    gap:8px; 
    font-size:.95rem; 
    transition: .2s; 
    font-weight:600; 
}

.like-btn:hover {
    background: rgba(255, 107, 53, 0.25);
    border-color: var(--accent-color);
}

.like-btn.liked { 
    background: rgba(255, 107, 53, 0.4); 
    border-color: var(--accent-color);
}

.like-btn.liked #like-icon {
    color: #ff6b35;
}

.like-btn #like-icon { font-size: 1.1rem; transition: transform 0.2s ease; }

.like-btn:hover #like-icon {
    transform: scale(1.2);
}

/* Comments Section */
.lightbox-comments { margin-top: 0; padding: 14px 18px; border-top: none; max-width: 100%; width: 100%; overflow: hidden; }

.lightbox-comments h4 {
    color: white;
    font-size: 1.3rem;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.comments-list { max-height: 260px; overflow-y: auto; margin-bottom: 14px; padding-right: 8px; }

.comments-list::-webkit-scrollbar {
    width: 6px;
}

.comments-list::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.comments-list::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}

.comment-item {
    background: rgba(255, 255, 255, 0.1);
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 10px;
    border-left: 3px solid var(--accent-color);
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.comment-header strong {
    color: white;
    font-size: 0.95rem;
}

.comment-date {
    color: rgba(255, 255, 255, 0.6);
    font-size: 0.85rem;
}

.comment-body {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
    font-size: 0.95rem;
}

.no-comments {
    color: rgba(255, 255, 255, 0.6);
    text-align: center;
    padding: 20px;
    font-style: italic;
}

/* Comment Form */
.comment-form-wrapper { background: rgba(255,255,255,0.06); padding: 14px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); }

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 10px;
}

.comment-form-wrapper input,
.comment-form-wrapper textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    font-size: 0.95rem;
    font-family: inherit;
    transition: all 0.3s ease;
}

.comment-form-wrapper input::placeholder,
.comment-form-wrapper textarea::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.comment-form-wrapper input:focus,
.comment-form-wrapper textarea:focus {
    outline: none;
    border-color: var(--accent-color);
    background: rgba(255, 255, 255, 0.15);
}

.comment-form-wrapper textarea {
    min-height: 100px;
    resize: vertical;
    margin-bottom: 10px;
}

.comment-submit-btn { width: 100%; background: var(--accent-color); border: none; color: white; padding: 12px 16px; border-radius: 10px; font-size: .95rem; font-weight: 700; cursor: pointer; display:flex; align-items:center; justify-content:center; gap:10px; transition: .2s; }

.comment-submit-btn:hover {
    background: #ff8c5a;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 107, 53, 0.4);
}

/* Responsive */
@media (max-width: 768px) {
    .category-filter-section {
        padding: 30px 0;
    }

    .search-wrapper {
        max-width: 100%;
        padding: 0 15px;
    }

    .category-tabs {
        padding: 0 15px;
        gap: 8px;
    }

    .category-tab {
        padding: 10px 16px;
        font-size: 0.85rem;
    }

    .lightbox-content { max-width: 95%; flex-direction: column; }
    .lightbox-main { min-width: auto; }
    .lightbox-side { width: 100%; }

    .lightbox-prev {
        left: 10px;
    }

    .lightbox-next {
        right: 10px;
    }

    .lightbox-close {
        top: 10px;
        right: 10px;
    }

    .lightbox-info h3 {
        font-size: 1.3rem;
    }

    .lightbox-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .comments-list {
        max-height: 200px;
    }
}
  .comments-toggle-row { display:flex; justify-content:flex-start; margin: 6px 0 12px; }
  .comments-toggle { background: rgba(255,255,255,0.08); color:#e5e7eb; border:1px solid rgba(255,255,255,0.2); padding:8px 12px; border-radius:10px; cursor:pointer; display:inline-flex; align-items:center; gap:8px; font-weight:700; }
  .comments-toggle:hover { background: rgba(255,255,255,0.15); }
  .comments-count { font-weight:700; color:#cbd5e1; }
</style>

<script>
// Gallery data untuk lightbox
const galleryData = [
    @foreach($data as $item)
    {
        id: {{ $item->id_galeri }},
        image: "{{ asset('uploads/'.$item->gambar) }}",
        title: "{{ addslashes($item->judul) }}",
        category: "{{ addslashes($item->kategori->nama_kategori ?? 'Umum') }}",
        date: "{{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d M Y') }}",
        likeCount: {{ $item->likes->count() }}
    }@if(!$loop->last),@endif
    @endforeach
];

let currentImageIndex = 0;
let currentGaleriId = null;

function openLightbox(index) {
    currentImageIndex = index;
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCategory = document.getElementById('lightbox-category');
    const lightboxDate = document.getElementById('lightbox-date');
    const downloadBtn = document.getElementById('download-btn');

    if (galleryData[currentImageIndex]) {
        const item = galleryData[currentImageIndex];
        currentGaleriId = item.id;
        lightboxImage.src = item.image;
        lightboxTitle.textContent = item.title;
        lightboxCategory.innerHTML = `<i class="fas fa-folder"></i> ${item.category}`;
        lightboxDate.innerHTML = `<i class="fas fa-calendar"></i> ${item.date}`;
        if (downloadBtn) { downloadBtn.href = item.image; downloadBtn.setAttribute('download', item.title.replace(/\s+/g,'_')+'.jpg'); }
        
        // Load like status and comments
        checkLikeStatus(item.id);
        loadComments(item.id);
        // reset comments panel state
        const list = document.getElementById('comments-list');
        const toggleBtn = document.getElementById('comments-toggle');
        if (list && toggleBtn) {
            list.style.display = 'none';
            toggleBtn.querySelector('span').textContent = 'Tampilkan Komentar';
            const ico = toggleBtn.querySelector('i');
            if (ico) ico.className = 'fas fa-chevron-down';
        }
    }

    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
}

function changeImage(direction) {
    currentImageIndex += direction;
    
    if (currentImageIndex < 0) {
        currentImageIndex = galleryData.length - 1;
    } else if (currentImageIndex >= galleryData.length) {
        currentImageIndex = 0;
    }

    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxCategory = document.getElementById('lightbox-category');
    const lightboxDate = document.getElementById('lightbox-date');
    const downloadBtn = document.getElementById('download-btn');

    if (galleryData[currentImageIndex]) {
        const item = galleryData[currentImageIndex];
        currentGaleriId = item.id;
        lightboxImage.src = item.image;
        lightboxTitle.textContent = item.title;
        lightboxCategory.innerHTML = `<i class="fas fa-folder"></i> ${item.category}`;
        lightboxDate.innerHTML = `<i class="fas fa-calendar"></i> ${item.date}`;
        if (downloadBtn) { downloadBtn.href = item.image; downloadBtn.setAttribute('download', item.title.replace(/\s+/g,'_')+'.jpg'); }
        
        // Load like status and comments for new image
        checkLikeStatus(item.id);
        loadComments(item.id);
        const list = document.getElementById('comments-list');
        const toggleBtn = document.getElementById('comments-toggle');
        if (list && toggleBtn) {
            list.style.display = 'none';
            toggleBtn.querySelector('span').textContent = 'Tampilkan Komentar';
            const ico = toggleBtn.querySelector('i');
            if (ico) ico.className = 'fas fa-chevron-down';
        }
    }
}

// Like Functions
async function toggleLike() {
    if (!currentGaleriId) return;
    
    try {
        const response = await fetch(`/galeri/${currentGaleriId}/like/toggle`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            }
        });
        
        const data = await response.json();
        updateLikeUI(data.liked, data.likeCount);
    } catch (error) {
        console.error('Error toggling like:', error);
    }
}

async function checkLikeStatus(galeriId) {
    try {
        const response = await fetch(`/galeri/${galeriId}/like/check`);
        const data = await response.json();
        updateLikeUI(data.liked, data.likeCount);
    } catch (error) {
        console.error('Error checking like status:', error);
    }
}

function updateLikeUI(liked, count) {
    const likeIcon = document.getElementById('like-icon');
    const likeCount = document.getElementById('like-count');
    const likeBtn = document.getElementById('like-btn');
    
    if (liked) {
        likeIcon.classList.remove('far');
        likeIcon.classList.add('fas');
        likeBtn.classList.add('liked');
    } else {
        likeIcon.classList.remove('fas');
        likeIcon.classList.add('far');
        likeBtn.classList.remove('liked');
    }
    
    likeCount.textContent = count;
}

// Comment Functions
async function loadComments(galeriId) {
    try {
        const response = await fetch(`/galeri/${galeriId}/comments`);
        const data = await response.json();
        displayComments(data.comments);
    } catch (error) {
        console.error('Error loading comments:', error);
    }
}

function displayComments(comments) {
    const commentsList = document.getElementById('comments-list');
    const countEl = document.getElementById('comments-count');
    if (countEl) countEl.textContent = `(${comments.length || 0})`;
    
    if (comments.length === 0) {
        commentsList.innerHTML = '<p class="no-comments">Belum ada komentar. Jadilah yang pertama!</p>';
        return;
    }
    
    commentsList.innerHTML = comments.map(comment => `
        <div class="comment-item">
            <div class="comment-header">
                <strong>${escapeHtml(comment.nama)}</strong>
                <span class="comment-date">${formatDate(comment.created_at)}</span>
            </div>
            <div class="comment-body">${escapeHtml(comment.komentar)}</div>
        </div>
    `).join('');
}

async function submitComment(event) {
    event.preventDefault();
    
    if (!currentGaleriId) return;
    
    const form = event.target;
    const formData = new FormData(form);
    
    try {
        const response = await fetch(`/galeri/${currentGaleriId}/comment`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}'
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            form.reset();
            // Refresh comments from server to ensure consistency
            if (currentGaleriId) {
                await loadComments(currentGaleriId);
            }
            // Ensure the list is visible and UI label updated
            const list = document.getElementById('comments-list');
            const toggleBtn = document.getElementById('comments-toggle');
            if (list) list.style.display = 'block';
            if (toggleBtn) {
                const ico = toggleBtn.querySelector('i');
                if (ico) ico.className = 'fas fa-chevron-up';
                const label = toggleBtn.querySelector('span');
                if (label) label.textContent = 'Sembunyikan Komentar';
            }
        } else {
            alert(data.message || 'Gagal mengirim komentar');
        }
    } catch (error) {
        console.error('Error submitting comment:', error);
        alert('Gagal mengirim komentar');
    }
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function formatDate(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diff = now - date;
    const minutes = Math.floor(diff / 60000);
    const hours = Math.floor(diff / 3600000);
    const days = Math.floor(diff / 86400000);
    
    if (minutes < 1) return 'Baru saja';
    if (minutes < 60) return `${minutes} menit yang lalu`;
    if (hours < 24) return `${hours} jam yang lalu`;
    if (days < 7) return `${days} hari yang lalu`;
    
    return date.toLocaleDateString('id-ID', { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    });
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    const lightbox = document.getElementById('lightbox');
    if (lightbox.classList.contains('active')) {
        if (e.key === 'Escape') {
            closeLightbox();
        } else if (e.key === 'ArrowLeft') {
            changeImage(-1);
        } else if (e.key === 'ArrowRight') {
            changeImage(1);
        }
    }
});
</script>

@endsection