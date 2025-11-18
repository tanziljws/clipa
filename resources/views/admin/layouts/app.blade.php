<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #0f4c75;
            --secondary-color: #3282b8;
            --accent-color: #ff6b35;
            --dark-teal: #0a3d62;
            --light-bg: #f8fafc;
            --dark-text: #1e293b;
            --light-text: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            min-height: 100vh;
            background: var(--light-bg);
            position: relative;
            overflow: hidden; /* lock page scroll, let content area scroll */
            color: var(--dark-text);
        }
        
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--dark-teal) 0%, var(--primary-color) 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            flex-shrink: 0;
            transition: all 0.3s ease;
            box-shadow: 4px 0 20px rgba(10, 61, 98, 0.2);
            position: sticky; /* keep visible */
            top: 0;
            height: 100vh; /* full viewport height */
            overflow-y: auto; /* internal scroll if needed */
            z-index: 100;
        }
        
        .sidebar.collapsed {
            width: 80px;
        }
        
        .sidebar a {
            color: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            padding: 16px 24px;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 6px 16px;
            position: relative;
            overflow: hidden;
            font-weight: 500;
        }
        
        .sidebar a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 107, 53, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .sidebar a:hover::before {
            left: 100%;
        }
        
        .sidebar a i {
            margin-right: 16px;
            min-width: 24px;
            text-align: center;
            font-size: 18px;
            transition: transform 0.3s ease;
        }
        
        .sidebar a:hover {
            background: rgba(255, 107, 53, 0.15);
            color: white;
            transform: translateX(8px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.2);
        }
        
        .sidebar a:hover i {
            transform: scale(1.1);
            color: var(--accent-color);
        }
        
        .sidebar a.active {
            background: rgba(255, 107, 53, 0.25);
            color: white;
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);
            border-left: 4px solid var(--accent-color);
        }
        
        .sidebar a.active i {
            color: var(--accent-color);
        }
        
        .content {
            flex: 1;
            padding: 32px;
            background: var(--light-bg);
            position: relative;
            z-index: 1;
            height: 100vh; /* lock content to viewport height */
            overflow-y: auto; /* enable internal scroll */
        }
        
        .toggle-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 16px;
            padding: 10px 14px;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .toggle-btn:hover {
            background: rgba(255, 107, 53, 0.2);
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }
        
        .sidebar-header {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
        }
        
        .logo {
            width: 36px;
            height: 36px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
        }
        
        .logo img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }
        
        .sidebar-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            line-height: 1;
        }
        
        .sidebar-text h4 {
            font-weight: 800;
            font-size: 1.1rem;
            margin: 0;
            line-height: 1.2;
            color: white;
        }
        
        .sidebar-text small {
            font-size: 0.8rem;
            opacity: 0.8;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.2;
            margin-top: 2px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Table styling */
        .table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .table thead {
            background: var(--primary-color);
            color: white;
        }

        .table thead th {
            border: none;
            padding: 16px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 16px;
            border-color: #e5e7eb;
        }

        .table tbody tr:hover {
            background: rgba(15, 76, 117, 0.05);
        }

        /* Button styling */
        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--dark-teal);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 76, 117, 0.3);
        }

        .btn-warning {
            background: var(--accent-color);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            background: #ff8c5a;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
        }

        .btn-danger {
            background: #dc2626;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background: #b91c1c;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.3);
        }

        /* Alert styling */
        .alert {
            border-radius: 12px;
            border: none;
            padding: 16px 20px;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        /* Container */
        .container {
            background: white;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        h1 {
            color: var(--dark-teal);
            font-weight: 800;
            margin-bottom: 24px;
            font-size: 2rem;
        }

        /* Modern Table */
        .table-modern {
            border-radius: 14px;
            overflow: hidden;
            background: #ffffff;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        }
        .table-modern thead th {
            background: linear-gradient(180deg, #f8fafc, #eef2f7);
            color: #0a3d62;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: .03em;
            border-bottom: 1px solid #e5e7eb;
            padding: 14px 16px;
        }
        .table-modern tbody td {
            border-top: 1px solid #eef2f7;
            padding: 14px 16px;
            vertical-align: middle;
        }
        .table-modern tbody tr:hover {
            background: #f9fbff;
        }
        .table-modern .cell-title { font-weight: 600; color: #0f172a; }

        /* Thumbnail */
        .thumb {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
        }

        /* Badge Kategori */
        .badge-category {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
            background: rgba(15, 76, 117, 0.08);
            color: #0f4c75;
            border: 1px solid rgba(15, 76, 117, 0.15);
        }

        /* Soft Buttons */
        .btn-soft-warning {
            background: #fff7ed;
            color: #b45309;
            border: 1px solid #fde68a;
        }
        .btn-soft-warning:hover { background: #ffedd5; color: #92400e; }
        .btn-soft-danger {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }
        .btn-soft-danger:hover { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="d-flex align-items-center justify-content-between p-4 border-bottom border-white border-opacity-20">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('/images/logo.png') }}" alt="Bellford Academy Logo" style="max-width: 100%; height: auto;">
                </div>
                <div class="sidebar-text">
                    <h4 class="m-0">Bellford Academy</h4>
                    <small class="text-white-50">Gallery Portal</small>
                </div>
            </div>
            <button class="toggle-btn" id="toggleBtn"><i class="fas fa-bars"></i></button>
        </div>

        <!-- Tambahin active sesuai route -->
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
           <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>

        <a href="{{ route('galeri.index') }}"
           class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">
           <i class="fas fa-image"></i> <span>Kelola Galeri</span>
        </a>

        <a href="{{ route('informasi.index') }}"
           class="{{ request()->routeIs('informasi.*') ? 'active' : '' }}">
           <i class="fas fa-newspaper"></i> <span>Berita</span>
        </a>

        <a href="{{ route('kategori.index') }}"
           class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}">
           <i class="fas fa-list"></i> <span>Kategori</span>
        </a>

        <a href="{{ route('admin.manage.index') }}"
           class="{{ request()->routeIs('admin.manage.*') ? 'active' : '' }}">
           <i class="fas fa-user-shield"></i> <span>Kelola Akun</span>
        </a>

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
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
            });
        }
    </script>
</body>
</html>
