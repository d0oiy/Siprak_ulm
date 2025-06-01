@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Buat Laporan Baru</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Judul -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul Laporan</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Contoh: Gangguan Wi-Fi di Lantai 2" required>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori Gangguan</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Lokasi -->
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control" placeholder="Contoh: Gedung F Lantai 1" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Jelaskan masalahnya secara detail..." required></textarea>
        </div>

        <!-- Upload Gambar -->
        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Kirim Laporan</button>
    </form>
</div>
@endsection
