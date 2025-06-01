@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Laporan</h2>

    <form action="{{ url('/admin/reports/' . $report->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Judul Laporan -->
        <div class="mb-3">
            <label for="title" class="form-label">Judul Laporan</label>
            <input type="text" name="title" value="{{ $report->title }}" class="form-control" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $report->description }}</textarea>
        </div>

        <!-- Lokasi -->
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" value="{{ $report->location }}" class="form-control" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $report->status == 'in_progress' ? 'selected' : '' }}>Sedang Diproses</option>
                <option value="resolved" {{ $report->status == 'resolved' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <!-- Tampilkan Gambar Bukti -->
        @if($report->image_path)
        <div class="mb-3">
            <label class="form-label">Foto Bukti Saat Ini</label><br>
            <img src="{{ asset('storage/' . $report->image_path) }}" alt="Bukti Laporan" style="max-width: 300px;" class="img-thumbnail">
        </div>
        @endif

        <!-- Upload Foto Baru -->
        <div class="mb-3">
            <label for="image" class="form-label">Unggah Foto Baru (Opsional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
@endsection
