<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua laporan untuk kebutuhan statistik dan tampilan tabel
        $reports = Report::latest()->paginate(10);

        return view('admin.dashboard', compact('reports'));
    }

    // (Opsional tambahan jika ingin dashboard dipisah dari daftar laporan)
    public function reports()
    {
        $reports = Report::latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('admin.reports.show', compact('report'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
