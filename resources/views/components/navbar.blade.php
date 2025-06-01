<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">SIPRAK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
                <ul class="navbar-nav ms-auto">
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard Admin</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Keluar</button>
                        </form>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
