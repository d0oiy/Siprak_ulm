<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        $filename = 'laporan_siprak_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new ReportsExport, $filename);
    }
}
