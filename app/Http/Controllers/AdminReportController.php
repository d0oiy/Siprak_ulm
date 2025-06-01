<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(10);
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'location' => 'required',
            'image' => 'nullable|image|max:2048', // validasi gambar
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('report_images', 'public');
        }

        Report::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'location' => $request->location,
            'user_id' => auth()->id(),
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    public function show(Report $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'location' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'location' => $request->location,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($report->image_path && Storage::disk('public')->exists($report->image_path)) {
                Storage::disk('public')->delete($report->image_path);
            }

            $data['image_path'] = $request->file('image')->store('report_images', 'public');
        }

        $report->update($data);

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Report $report)
    {
        // Hapus gambar dari storage jika ada
        if ($report->image_path && Storage::disk('public')->exists($report->image_path)) {
            Storage::disk('public')->delete($report->image_path);
        }

        $report->delete();

        return redirect()->route('admin.reports.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
