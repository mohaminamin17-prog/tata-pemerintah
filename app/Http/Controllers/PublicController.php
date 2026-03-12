<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\ExternalLink;
use App\Models\EkkScore;
use App\Models\KerjaSama;
use App\Models\Dokumentasi;

class PublicController extends Controller
{
    public function beranda()
    {
        $hero_title = Setting::where('key', 'hero_title')->value('value') ?? 'Bagian Tata Pemerintahan Kabupaten Tojo Una-Una';
        $hero_description = Setting::where('key', 'hero_description')->value('value') ?? 'Pusat integrasi data, koordinasi wilayah, dan layanan administrasi digital untuk mewujudkan tata kelola pemerintahan yang transparan dan akuntabel.';
        $hero_image = Setting::where('key', 'hero_image')->value('value');
        $visi = Setting::where('key', 'visi')->value('value');
        $misi = Setting::where('key', 'misi')->value('value');
        $latest_dokumentasi = Dokumentasi::latest()->take(3)->get();

        return view('pages.beranda', compact('hero_title', 'hero_description', 'hero_image', 'visi', 'misi', 'latest_dokumentasi'));
    }

    public function profil()
    {
        $total_pegawai = Setting::where('key', 'total_pegawai')->value('value') ?? 42;
        $jumlah_divisi = Setting::where('key', 'jumlah_divisi')->value('value') ?? 3;
        $jabatan_kosong = Setting::where('key', 'jabatan_kosong')->value('value') ?? 0;
        $pendidikan_s1 = Setting::where('key', 'pendidikan_s1')->value('value') ?? '70%';
        $struktur_organisasi = Setting::where('key', 'struktur_org_img')->value('value');
        $pejabats = \App\Models\Pejabat::orderBy('order_num')->get();

        return view('pages.profil', compact('total_pegawai', 'jumlah_divisi', 'jabatan_kosong', 'pendidikan_s1', 'struktur_organisasi', 'pejabats'));
    }

    public function otda()
    {
        $lppd_link = ExternalLink::where('module_name', 'lppd')->value('url');
        $kerja_samas = KerjaSama::orderBy('tanggal', 'desc')->get();
        return view('pages.sub-bagian.otda', compact('lppd_link', 'kerja_samas'));
    }

    public function pemerintahan()
    {
        $ekk_scores = EkkScore::orderBy('score', 'desc')->get();
        $spm_link = ExternalLink::where('module_name', 'spm')->value('url');
        return view('pages.sub-bagian.pemerintahan', compact('ekk_scores', 'spm_link'));
    }

    public function kewilayahan()
    {
        $lkpj_link = ExternalLink::where('module_name', 'lkpj')->value('url');
        // Rupa bumi might just use a placeholder link if not in db, or we can use another external link.
        // I will use another external link module for Rupa Bumi if it doesn't exist.
        $rupabumi_link = ExternalLink::where('module_name', 'rupabumi')->value('url') ?? '#';
        
        return view('pages.sub-bagian.kewilayahan', compact('lkpj_link', 'rupabumi_link'));
    }

    public function dokumentasi()
    {
        $dokumentasis = Dokumentasi::latest()->get();
        return view('pages.dokumentasi', compact('dokumentasis'));
    }
}
