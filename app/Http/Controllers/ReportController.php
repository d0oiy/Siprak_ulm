<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Menampilkan daftar laporan milik user yang sedang login.
     */
   // app/Http/Controllers/ReportController.php
public function index()
{
    $reports = \App\Models\Report::where('user_id', auth()->id())->latest()->paginate(10);
    return view('user.dashboard', compact('reports'));
}


    /**
     * Menampilkan form pembuatan laporan baru.
     */
    public function create()
    {
        $categories = Category::all(); // ambil semua kategori
        return view('user.create', compact('categories'));
    }

    /**
     * Menyimpan laporan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'location' => $request->location,
            'description' => $request->description,
            'status' => 'pending',
            'user_id' => auth()->id(),
        ];

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('report_images', 'public');
        }

        Report::create($data);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dikirim.');
    }

    /**
     * (Opsional) Menampilkan detail laporan - jika dibutuhkan nanti.
     */
    public function show($id)
    {
        $report = Report::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->with('category')
                        ->firstOrFail();

        return view('user.show', compact('report'));
    }
}
