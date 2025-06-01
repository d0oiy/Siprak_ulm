<!-- Sidebar responsive dengan collapse -->
<nav class="navbar navbar-expand-lg navbar-light bg-warning vh-100 flex-column p-3" style="width: 250px;">
    <div class="w-100 text-center mb-3">
        <img src="{{ asset('img/logo-ulm.png') }}" alt="Logo ULM" width="60" class="mb-2">
        <h5 class="fw-bold mb-0">SIPRAK</h5>
        <small class="text-dark">Sistem Informasi Pelaporan</small>
    </div>

    <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse flex-column w-100" id="sidebarMenu">
        @if(auth()->user()->role === 'admin')
            <h6 class="text-dark mt-2 mb-2"> MENU ADMIN</h6>
            <ul class="navbar-nav flex-column w-100">
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->is('admin/dashboard') ? 'fw-bold' : '' }}" href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->is('admin/reports*') ? 'fw-bold' : '' }}" href="{{ route('admin.reports.index') }}">
                        Kelola Laporan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->is('admin/categories*') ? 'fw-bold' : '' }}" href="{{ route('admin.categories.index') }}">
                        Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->is('admin/users*') ? 'fw-bold' : '' }}" href="{{ route('admin.users.index') }}">
                         Pengguna
                    </a>
                </li>
            </ul>
        @else
            <h6 class="text-dark mt-2 mb-2"> MENU PENGGUNA</h6>
            <ul class="navbar-nav flex-column w-100">
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->is('user/dashboard') ? 'fw-bold' : '' }}" href="{{ route('user.dashboard') }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->is('reports/create') ? 'fw-bold' : '' }}" href="{{ route('reports.create') }}">
                         Buat Laporan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark {{ request()->is('reports') ? 'fw-bold' : '' }}" href="{{ route('reports.index') }}">
                        Laporan Saya
                    </a>
                </li>
            </ul>
        @endif

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="mt-auto w-100">
            @csrf
            <button type="submit" class="btn btn-outline-dark w-100 mt-4">Logout</button>
        </form>
    </div>
</nav>
