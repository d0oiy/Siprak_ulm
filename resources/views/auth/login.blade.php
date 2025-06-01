@extends('layouts.guest')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <div class="text-center mb-4">
            <img src="{{ asset('logo.png') }}" alt="Logo" width="70" class="mb-3">
            <h4 class="fw-bold">Masuk ke SIPRAK</h4>
            <p class="text-muted small">Sistem Informasi Pelaporan Sarana & Prasarana</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input id="email" class="form-control @error('email') is-invalid @enderror" 
                    type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" class="form-control @error('password') is-invalid @enderror"
                    type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">Ingat saya</label>
            </div>

            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-primary">
                    Masuk
                </button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center">
                    <a href="{{ route('password.request') }}" class="text-decoration-none small">
                        Lupa kata sandi?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
