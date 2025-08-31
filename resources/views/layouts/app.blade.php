<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projects Management System')</title>

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AdminLTE CSS (optional, can keep for components) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #2c3e50;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home mr-1"></i> Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @yield('navbar-right')
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-0" style="background: linear-gradient(180deg, #1e2936 0%, #243440 100%);">
        <a href="{{ route('home') }}" class="brand-link text-center mb-3">
            <i class="fas fa-project-diagram brand-image"></i>
            <span class="brand-text font-weight-light ml-2">PMS</span>
        </a>
        <div class="sidebar">
            @yield('sidebar-user')
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('programs.index') }}" class="nav-link {{ Request::routeIs('programs.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-project-diagram"></i>
                            <p>Manage Programs</p>
                        </a>
                    </li>
                    @yield('sidebar-menu')
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @hasSection('page-title')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-normal">@yield('page-title')</h1>
                    </div>
                    @hasSection('breadcrumb')
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer text-center" style="background: linear-gradient(90deg, #1e2936 0%, #2d4a5c 100%); color: #b8c5d1;">
        @yield('footer', '<strong>Projects Management System</strong> &copy; ' . date('Y'))
    </footer>
</div>

<!-- AdminLTE JS (optional, for components like sidebar toggle) -->
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@yield('scripts')
</body>
</html>
