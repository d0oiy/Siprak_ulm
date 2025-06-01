@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Semua Laporan</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pelapor</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->status }}</td>
                    <td>{{ $report->created_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ url('/admin/reports/'.$report->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ url('/admin/reports/'.$report->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus laporan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
