@if($reports->count())
    <table class="table table-bordered table-hover shadow-sm bg-white">
        <thead class="table-light">
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($report->description, 50) }}</td>
                    <td>
                        <span class="badge 
                            {{ $report->status === 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                            {{ ucfirst($report->status) }}
                        </span>
                    </td>
                    <td>{{ $report->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $reports->links() }}
    </div>
@else
    <div class="alert alert-info mt-3">
        Belum ada laporan ditemukan.
    </div>
@endif
