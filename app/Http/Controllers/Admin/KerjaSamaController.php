<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KerjaSama;
use Illuminate\Http\Request;

class KerjaSamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kerja_samas = KerjaSama::latest('tanggal')->get();
        return view('admin.kerja-samas.index', compact('kerja_samas'));
    }

    public function create()
    {
        return view('admin.kerja-samas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'partner' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Proses,Ditandatangani,Selesai',
            'document_url' => 'nullable|url',
            'tanggal' => 'nullable|date',
        ]);

        KerjaSama::create($data);

        return redirect()->route('admin.kerja-samas.index')->with('success', 'Kerja Sama added successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(KerjaSama $kerja_sama)
    {
        return view('admin.kerja-samas.edit', compact('kerja_sama'));
    }

    public function update(Request $request, KerjaSama $kerja_sama)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'partner' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Proses,Ditandatangani,Selesai',
            'document_url' => 'nullable|url',
            'tanggal' => 'nullable|date',
        ]);

        $kerja_sama->update($data);

        return redirect()->route('admin.kerja-samas.index')->with('success', 'Kerja Sama updated successfully.');
    }

    public function destroy(KerjaSama $kerja_sama)
    {
        $kerja_sama->delete();
        return redirect()->route('admin.kerja-samas.index')->with('success', 'Kerja Sama deleted successfully.');
    }
}
