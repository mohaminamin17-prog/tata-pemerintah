<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumentasis = Dokumentasi::latest()->get();
        return view('admin.dokumentasis.index', compact('dokumentasis'));
    }

    public function create()
    {
        return view('admin.dokumentasis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:photo,video',
            'youtube_url' => 'nullable|url|required_if:type,video',
            'file_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|required_if:type,photo',
        ]);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'youtube_url' => $request->type === 'video' ? $request->youtube_url : null,
        ];

        if ($request->hasFile('file_path') && $request->type === 'photo') {
            $imageName = time().'.'.$request->file_path->extension();  
            $request->file_path->move(public_path('uploads/dokumentasi'), $imageName);
            $data['file_path'] = 'uploads/dokumentasi/' . $imageName;
        }

        Dokumentasi::create($data);

        return redirect()->route('admin.dokumentasis.index')->with('success', 'Dokumentasi added successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        return view('admin.dokumentasis.edit', compact('dokumentasi'));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:photo,video',
            'youtube_url' => 'nullable|url|required_if:type,video',
            'file_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'type' => $request->type,
            'youtube_url' => $request->type === 'video' ? $request->youtube_url : null,
        ];

        if ($request->type === 'photo') {
            if ($request->hasFile('file_path')) {
                $imageName = time().'.'.$request->file_path->extension();  
                $request->file_path->move(public_path('uploads/dokumentasi'), $imageName);
                $data['file_path'] = 'uploads/dokumentasi/' . $imageName;
            } else {
                $data['file_path'] = $dokumentasi->file_path;
            }
        } else {
            $data['file_path'] = null;
        }

        $dokumentasi->update($data);

        return redirect()->route('admin.dokumentasis.index')->with('success', 'Dokumentasi updated successfully.');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        $dokumentasi->delete();
        return redirect()->route('admin.dokumentasis.index')->with('success', 'Dokumentasi deleted successfully.');
    }
}
