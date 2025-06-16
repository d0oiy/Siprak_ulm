@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dashboard</h2>

    <!-- Ringkasan Laporan -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Laporan</h5>
                    <h2>{{ $reports->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5 class="card-title">Pending</h5>
                    <h2>{{ $reports->where('status', 'pending')->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <h2>{{ $reports->where('status', 'resolved')->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Buat Laporan -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4> Daftar Laporan Anda</h4>
        <a href="{{ route('reports.create') }}" class="btn btn-success shadow">
            + Buat Laporan Baru
        </a>
    </div>

    <!-- Filter Status -->
    <div class="mb-3">
        <form id="filterForm" class="form-inline">
            <label class="me-2">Filter Status:</label>
            <select name="status" id="statusFilter" class="form-select w-auto">
                <option value="">Semua</option>
                <option value="pending">Pending</option>
                <option value="selesai">Selesai</option>
            </select>
        </form>
    </div>

    <!-- Tabel Laporan -->
    <div class="table-responsive" id="reportTable">
        @include('user.partials.report_table', ['reports' => $reports])
    </div>
</div>
@endsection

@push('scripts')
<script>
    function loadReports(status = '') {
        fetch(`/reports?status=${status}`)
            .then(res => res.text())
            .then(html => {
                document.getElementById('reportTable').innerHTML = html;
            });
    }

    // Load saat filter berubah
    document.getElementById('statusFilter').addEventListener('change', function () {
        loadReports(this.value);
    });

    // Polling setiap 15 detik untuk pembaruan real-time
    setInterval(() => {
        let status = document.getElementById('statusFilter').value;
        loadReports(status);
    }, 15000);
</script>
@endpush
