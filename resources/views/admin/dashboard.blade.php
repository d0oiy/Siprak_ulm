@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"> Dashboard Admin</h2>

    <!-- Statistik Ringkasan -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Laporan</h5>
                    <h2>{{ $reports->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary shadow">
                <div class="card-body">
                    <h5 class="card-title">Terverifikasi</h5>
                    <h2>{{ $reports->where('status', 'verified')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5 class="card-title">Diproses</h5>
                    <h2>{{ $reports->where('status', 'in_progress')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <h2>{{ $reports->where('status', 'resolved')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Export -->
    <a href="{{ route('admin.dashboard.exportReports') }}" class="btn btn-success mb-3">
         Export Laporan ke Excel
    </a>

    <!-- Daftar Laporan -->
    <h4 class="mb-3">Semua Laporan</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ $report->location }}</td>
                    <td>
                        <span class="badge bg-{{
                            $report->status === 'resolved' ? 'success' :
                            ($report->status === 'in_progress' ? 'info' :
                            ($report->status === 'verified' ? 'warning' : 'secondary'))
                        }}">
                            {{ ucfirst(str_replace('_', ' ', $report->status)) }}
                        </span>
                    </td>
                    <td>{{ $report->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.reports.edit', $report->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus laporan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $reports->links() }}
        </div>
    </div>
</div>
@endsection
