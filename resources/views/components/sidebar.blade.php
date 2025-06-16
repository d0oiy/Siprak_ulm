<style>
    /* Container sidebar */
    .sidebar-container {
        width: 250px;
        height: 100vh;
        background: linear-gradient(180deg, #ffc107, #ffca2c);
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15);
    }

    /* Logo dan header */
    .sidebar-header img {
        width: 70px;
        border-radius: 10px;
    }

    .sidebar-header h5 {
        margin-top: 10px;
        font-weight: bold;
    }

    .sidebar-menu .nav-link {
        padding: 10px 20px;
        margin-bottom: 8px;
        border-radius: 10px;
        transition: all 0.2s ease-in-out;
        color: #212529;
        font-weight: 500;
    }

    .sidebar-menu .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.3);
        font-weight: 600;
    }

    .sidebar-menu .nav-link.active {
        background-color: #fff;
        color: #000;
        font-weight: bold;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    }

    .logout-btn {
        margin-top: auto;
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 500;
    }
</style>

<nav class="d-flex flex-column sidebar-container p-3">
    <div class="sidebar-header text-center mb-4">
        <img src="{{ asset('images/ULM.png') }}" alt="Logo ULM">
        <h5 class="text-dark">SIPRAK</h5>
        <small class="text-dark">Sistem Informasi Pelaporan</small>
    </div>

    <div class="sidebar-menu flex-grow-1">
        @if(auth()->user()->role === 'admin')
            <h6 class="text-dark mb-3 text-uppercase">Menu Admin</h6>
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('admin/reports*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}">
                        Kelola Laporan
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                        Kategori
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        Pengguna
                    </a>
                </li>
            </ul>
        @else
            <h6 class="text-dark mb-3 text-uppercase">Menu Pengguna</h6>
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('reports/create') ? 'active' : '' }}" href="{{ route('reports.create') }}">
                        Buat Laporan
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->is('reports') ? 'active' : '' }}" href="{{ route('reports.index') }}">
                        Laporan Saya
                    </a>
                </li>
            </ul>
        @endif
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="w-100">
        @csrf
        <button type="submit" class="btn btn-outline-dark logout-btn w-100">Logout</button>
    </form>
</nav>
