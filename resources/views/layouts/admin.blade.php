<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #212529;
            color: white;
            flex-shrink: 0;
            transition: width 0.3s;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar a {
            color: white;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a i {
            margin-right: 10px;
            min-width: 20px;
            text-align: center;
        }
        .sidebar a:hover {
            background-color: #343a40;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="d-flex align-items-center p-3 border-bottom">
            <h4 class="m-0 flex-grow-1">Admin</h4>
            <button class="toggle-btn" id="toggleBtn"><i class="fas fa-bars"></i></button>
        </div>
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        <a href="{{ route('galeri.index') }}"><i class="fas fa-image"></i> <span>Kelola Galeri</span></a>
        <a href="{{ route('informasi.index') }}"><i class="fas fa-info-circle"></i> <span>Informasi Sekolah</span></a>
        <a href="{{ route('kategori.index') }}"><i class="fas fa-list"></i> <span>Kategori</span></a>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleBtn');
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
