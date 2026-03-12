<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LppdController extends Controller
{
    public function index()
    {
        $laporans = Laporan::orderBy('year', 'desc')->orderBy('created_at', 'desc')->get();
        return view('admin.lppd.index', compact('laporans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:LPPD,LKPJ',
            'year' => 'required|integer',
            'file_path' => 'required|file|mimes:pdf|max:10240', // Max 10MB PDF
            'status' => 'required|in:Draft,Final,Terpublikasi',
        ]);

        $data = $request->except('file_path');

        if ($request->hasFile('file_path')) {
            $fileName = Str::slug($request->title) . '_' . time() . '.' . $request->file_path->extension();  
            $request->file_path->move(public_path('uploads/laporan'), $fileName);
            $data['file_path'] = 'uploads/laporan/' . $fileName;
        }

        Laporan::create($data);
        return redirect()->back()->with('success', 'Laporan berhasil diunggah.');
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => 'required|in:Draft,Final,Terpublikasi',
        ]);

        $laporan->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status Laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
