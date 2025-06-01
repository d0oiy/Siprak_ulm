<!-- resources/views/components/sidebar.blade.php -->
<aside class="vh-100 bg-warning p-3 text-dark" style="width: 250px;">
    <div class="mb-4 text-center">
        <img src="{{ asset('img/logo-ulm.png') }}" alt="Logo ULM" width="60" class="mb-2">
        <h5 class="fw-bold mb-0">SIPRAK</h5>
        <small>Sistem Informasi Pelaporan</small>
    </div>

    @if(auth()->user()->role === 'admin')
        <h6 class="text-dark mt-4 mb-2">MENU ADMIN</h6>
        <ul class="nav flex-column mb-4">
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
        <h6 class="text-dark mt-4 mb-2">MENU PENGGUNA</h6>
        <ul class="nav flex-column mb-4">
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

    <a href="{{ route('logout') }}" class="btn btn-outline-dark w-100 mt-auto"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
</aside>
