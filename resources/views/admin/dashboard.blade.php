@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <link href="{{ secure_asset('css/dashboard.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="dashboard-container">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <div class="welcome-card">
            <div class="welcome-content">
                <div class="welcome-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="welcome-text">
                    <h1 class="welcome-title">Selamat Datang!</h1>
                    <p class="welcome-subtitle">Kelola konten web galeri dengan mudah dan efisien</p>
                </div>
                <div class="welcome-stats">
                    <div class="stat-item">
                        <span class="stat-number">{{ $totalGaleri + $totalInformasi + $totalKategori }}</span>
                        <span class="stat-label">Total Konten</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-row">
        <!-- Total Galeri -->
        <div class="stats-card galeri-card">
            <a href="{{ route('galeri.index') }}" class="dashboard-link">
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <div class="card-info">
                        <h2 class="card-number">{{ $totalGaleri }}</h2>
                        <p class="card-label">Total Galeri</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Berita -->
        <div class="stats-card informasi-card">
            <a href="{{ route('informasi.index') }}" class="dashboard-link">
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="card-info">
                        <h2 class="card-number">{{ $totalInformasi }}</h2>
                        <p class="card-label">Total Berita</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Kategori -->
        <div class="stats-card kategori-card">
            <a href="{{ route('kategori.index') }}" class="dashboard-link">
                <div class="card-content">
                    <div class="card-icon">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <div class="card-info">
                        <h2 class="card-number">{{ $totalKategori }}</h2>
                        <p class="card-label">Total Kategori</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions-section">
        <h3 class="section-title">Quick Actions</h3>
        <div class="actions-grid">
            <a href="{{ route('galeri.create') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-plus"></i>
                </div>
                <h4>Tambah Galeri</h4>
                <p>Upload foto baru</p>
            </a>
            
            <a href="{{ route('informasi.create') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <h4>Buat Berita</h4>
                <p>Post berita terbaru</p>
            </a>
            
            <a href="{{ route('kategori.index') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h4>Kelola Kategori</h4>
                <p>Organisir konten</p>
            </a>
            
            <a href="{{ route('admin.manage.create') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h4>Tambah Akun</h4>
                <p>Buat akun admin baru</p>
            </a>
        </div>
    </div>
</div>
@endsection
