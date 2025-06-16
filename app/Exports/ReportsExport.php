<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Report::select('id', 'user_id', 'category_id', 'title', 'description', 'location', 'status', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Kategori ID',
            'Judul',
            'Deskripsi',
            'Lokasi',
            'Status',
            'Tanggal Dibuat',
            'Tanggal Diupdate',
        ];
    }
}
