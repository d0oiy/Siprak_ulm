@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Buat Laporan Gangguan</h2>
    <form action="{{ route('reports.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Laporan</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Masalah</label>
            <textarea class="form-control" name="description" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim Laporan</button>
    </form>
</div>
@endsection
