<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWIO Admin Panel - @yield('title', 'Dashboard')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --admin-primary: #0066cc;
            --admin-secondary: #6c757d;
            --admin-success: #198754;
            --admin-danger: #dc3545;
            --admin-warning: #ffc107;
            --admin-info: #0dcaf0;
            --admin-dark: #212529;
            --admin-light: #f8f9fa;
            --admin-sidebar-bg: #1a1d29;
            --admin-sidebar-hover: #2d303f;
            --admin-sidebar-active: #0066cc;
            --admin-header-bg: #ffffff;
            --admin-card-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--admin-light);
            color: var(--admin-dark);
            line-height: 1.6;
        }

        /* Admin Header */
        .admin-header {
            background: var(--admin-header-bg);
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .admin-header .navbar-brand {
            font-weight: 700;
            color: var(--admin-primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .admin-header .navbar-brand i {
            font-size: 1.5rem;
        }

        .admin-header .nav-link {
            color: var(--admin-secondary);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .admin-header .nav-link:hover {
            background: var(--admin-light);
            color: var(--admin-primary);
        }

        .admin-header .btn-logout {
            background: var(--admin-danger);
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .admin-header .btn-logout:hover {
            background: #c82333;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        /* Sidebar */
        .admin-sidebar {
            background: var(--admin-sidebar-bg);
            min-height: calc(100vh - 70px);
            position: sticky;
            top: 70px;
            border-right: 1px solid #2d303f;
            transition: all 0.3s ease;
        }

        .admin-sidebar .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid #2d303f;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .admin-sidebar .nav-link {
            color: #a8b3cf;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            margin: 0.25rem 0.75rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            text-decoration: none;
        }

        .admin-sidebar .nav-link:hover {
            background: var(--admin-sidebar-hover);
            color: white;
            transform: translateX(3px);
        }

        .admin-sidebar .nav-link.active {
            background: var(--admin-sidebar-active);
            color: white;
            box-shadow: 0 4px 8px rgba(0, 102, 204, 0.3);
        }

        .admin-sidebar .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .admin-sidebar .nav-divider {
            height: 1px;
            background: #2d303f;
            margin: 1rem 0.75rem;
        }

        /* Main Content */
        .admin-main {
            padding: 2rem;
            min-height: calc(100vh - 70px);
        }

        /* Cards */
        .admin-card {
            background: white;
            border-radius: 1rem;
            box-shadow: var(--admin-card-shadow);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .admin-card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .admin-card .card-header {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-bottom: 1px solid #e9ecef;
            padding: 1.25rem;
            font-weight: 600;
            color: var(--admin-dark);
        }

        .admin-card .card-body {
            padding: 1.5rem;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: var(--admin-card-shadow);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--admin-primary);
        }

        .stat-card.success::before { background: var(--admin-success); }
        .stat-card.warning::before { background: var(--admin-warning); }
        .stat-card.danger::before { background: var(--admin-danger); }
        .stat-card.info::before { background: var(--admin-info); }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
        }

        .stat-card .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-card .stat-icon.primary { background: rgba(0, 102, 204, 0.1); color: var(--admin-primary); }
        .stat-card .stat-icon.success { background: rgba(25, 135, 84, 0.1); color: var(--admin-success); }
        .stat-card .stat-icon.warning { background: rgba(255, 193, 7, 0.1); color: var(--admin-warning); }
        .stat-card .stat-icon.danger { background: rgba(220, 53, 69, 0.1); color: var(--admin-danger); }
        .stat-card .stat-icon.info { background: rgba(13, 202, 240, 0.1); color: var(--admin-info); }

        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--admin-dark);
            margin-bottom: 0.25rem;
        }

        .stat-card .stat-label {
            color: var(--admin-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Buttons */
        .btn-admin {
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-admin-primary {
            background: var(--admin-primary);
            color: white;
        }

        .btn-admin-primary:hover {
            background: #0052a3;
        }

        .btn-admin-success {
            background: var(--admin-success);
            color: white;
        }

        .btn-admin-danger {
            background: var(--admin-danger);
            color: white;
        }

        .btn-admin-warning {
            background: var(--admin-warning);
            color: var(--admin-dark);
        }

        /* Tables */
        .admin-table {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: var(--admin-card-shadow);
        }

        .admin-table .table {
            margin: 0;
        }

        .admin-table .table th {
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
            font-weight: 600;
            color: var(--admin-dark);
            padding: 1rem;
        }

        .admin-table .table td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f5;
        }

        .admin-table .table tbody tr:hover {
            background: #f8f9fa;
        }

        /* Forms */
        .admin-form .form-control,
        .admin-form .form-select {
            border: 2px solid #e9ecef;
            border-radius: 0.5rem;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .admin-form .form-control:focus,
        .admin-form .form-select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.25);
        }

        .admin-form .form-label {
            font-weight: 600;
            color: var(--admin-dark);
            margin-bottom: 0.5rem;
        }

        /* Alerts */
        .admin-alert {
            border-radius: 0.75rem;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                position: fixed;
                top: 70px;
                left: -250px;
                width: 250px;
                height: calc(100vh - 70px);
                z-index: 1020;
                transition: left 0.3s ease;
            }

            .admin-sidebar.show {
                left: 0;
            }

            .admin-main {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: block !important;
            }
        }

        @media (min-width: 769px) {
            .mobile-menu-toggle {
                display: none !important;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Loading Spinner */
        .spinner-admin {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--admin-primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Admin Header -->
    <header class="admin-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler mobile-menu-toggle border-0 bg-white p-2 me-3" type="button" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-shield-check"></i>
                    NWIO Admin
                </a>
                
                <div class="ms-auto d-flex align-items-center gap-3">
                    <div class="dropdown">
                        <button class="btn btn-link text-decoration-none text-dark dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                    <a href="{{ route('website.home') }}" class="btn btn-admin btn-admin-primary" target="_blank">
                        <i class="bi bi-eye"></i>
                        View Site
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-header">
                Navigation Menu
            </div>
            
            <nav class="nav flex-column">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
                
                <div class="nav-divider"></div>
                
                <a href="{{ route('admin.about') }}" class="nav-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
                    <i class="bi bi-info-circle"></i>
                    About Us
                </a>
                
                <a href="{{ route('admin.programs') }}" class="nav-link {{ request()->routeIs('admin.programs*') ? 'active' : '' }}">
                    <i class="bi bi-book"></i>
                    Programs
                </a>
                
                <a href="{{ route('admin.projects') }}" class="nav-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <i class="bi bi-folder"></i>
                    Projects
                </a>
                
                <a href="{{ route('admin.research') }}" class="nav-link {{ request()->routeIs('admin.research*') ? 'active' : '' }}">
                    <i class="bi bi-microscope"></i>
                    Research
                </a>
                
                <a href="{{ route('admin.news') }}" class="nav-link {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i>
                    News
                </a>
                
                <a href="{{ route('admin.events') }}" class="nav-link {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i>
                    Events
                </a>
                
                <a href="{{ route('admin.team') }}" class="nav-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    Team
                </a>
                
                <a href="{{ route('admin.gallery') }}" class="nav-link {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i>
                    Gallery
                </a>
                
                <a href="{{ route('admin.get-involved') }}" class="nav-link {{ request()->routeIs('admin.get-involved*') ? 'active' : '' }}">
                    <i class="bi bi-heart"></i>
                    Get Involved
                </a>
                
                <div class="nav-divider"></div>
                
                <a href="{{ route('admin.messages') }}" class="nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                    <i class="bi bi-envelope"></i>
                    Messages
                </a>
                
                <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="bi bi-person-gear"></i>
                    Users
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main flex-grow-1">
            <!-- Session Messages -->
            @if(session('success'))
                <div class="alert alert-success admin-alert alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger admin-alert alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('adminSidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('adminSidebar');
            const toggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });

        // Auto-hide sidebar on window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('adminSidebar');
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>
