<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pejabat;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    public function index()
    {
        $pejabats = Pejabat::orderBy('order_num')->get();
        // Stats
        $total_pegawai = Setting::where('key', 'total_pegawai')->value('value') ?? 42;
        $jumlah_divisi = Setting::where('key', 'jumlah_divisi')->value('value') ?? 6;
        $jabatan_kosong = Setting::where('key', 'jabatan_kosong')->value('value') ?? 2;
        $pendidikan_s1 = Setting::where('key', 'pendidikan_s1')->value('value') ?? '65%';
        $struktur_org_img = Setting::where('key', 'struktur_org_img')->value('value');

        return view('admin.profil.index', compact('pejabats', 'total_pegawai', 'jumlah_divisi', 'jabatan_kosong', 'pendidikan_s1', 'struktur_org_img'));
    }

    public function updateStats(Request $request)
    {
        $request->validate([
            'total_pegawai' => 'required|numeric',
            'jumlah_divisi' => 'required|numeric',
            'jabatan_kosong' => 'required|numeric',
            'pendidikan_s1' => 'required|string',
        ]);

        Setting::updateOrCreate(['key' => 'total_pegawai'], ['value' => $request->total_pegawai]);
        Setting::updateOrCreate(['key' => 'jumlah_divisi'], ['value' => $request->jumlah_divisi]);
        Setting::updateOrCreate(['key' => 'jabatan_kosong'], ['value' => $request->jabatan_kosong]);
        Setting::updateOrCreate(['key' => 'pendidikan_s1'], ['value' => $request->pendidikan_s1]);

        return redirect()->back()->with('success', 'Statistik Profil berhasil diperbarui.');
    }

    public function updateStruktur(Request $request)
    {
        $request->validate([
            'struktur_org_img' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:3048',
        ]);

        if ($request->hasFile('struktur_org_img')) {
            $imageName = time().'.'.$request->struktur_org_img->getClientOriginalExtension();  
            $request->struktur_org_img->move(public_path('uploads/profil'), $imageName);
            Setting::updateOrCreate(
                ['key' => 'struktur_org_img'],
                ['value' => 'uploads/profil/' . $imageName]
            );
        }
        return redirect()->back()->with('success', 'Bagan Struktur Organisasi berhasil diperbarui.');
    }

    public function storePejabat(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'jabatan' => 'required|string',
            'golongan' => 'nullable|string',
            'nip' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $imageName = Str::slug($request->name) . '_' . time() . '.' . $request->foto->getClientOriginalExtension();  
            $request->foto->move(public_path('uploads/profil'), $imageName);
            $data['foto'] = 'uploads/profil/' . $imageName;
        }

        Pejabat::create($data);
        return redirect()->back()->with('success', 'Pejabat berhasil ditambahkan.');
    }

    public function updatePejabat(Request $request, Pejabat $pejabat)
    {
        $request->validate([
            'name' => 'required|string',
            'jabatan' => 'required|string',
            'golongan' => 'nullable|string',
            'nip' => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $imageName = Str::slug($request->name) . '_' . time() . '.' . $request->foto->getClientOriginalExtension();  
            $request->foto->move(public_path('uploads/profil'), $imageName);
            $data['foto'] = 'uploads/profil/' . $imageName;
        }

        $pejabat->update($data);
        return redirect()->back()->with('success', 'Data Pejabat berhasil diperbarui.');
    }

    public function destroyPejabat(Pejabat $pejabat)
    {
        $pejabat->delete();
        return redirect()->back()->with('success', 'Pejabat berhasil dihapus.');
    }
}
