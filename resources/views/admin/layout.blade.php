<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; display: flex; }
        .sidebar {
            width: 250px;
            background-color: #212529;
            color: white;
            flex-shrink: 0;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover { background-color: #343a40; }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center mb-4"><i class="fas fa-user-shield"></i> Admin Panel</h4>
        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('galeri.index') }}"><i class="fas fa-image"></i> Kelola Galeri</a>
        <a href="{{ route('informasi.index') }}"><i class="fas fa-info-circle"></i> Informasi Sekolah</a>
        <a href="{{ route('kategori.index') }}"><i class="fas fa-list"></i> Kategori</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
