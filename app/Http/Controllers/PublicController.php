<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Setting;
use App\Models\ExternalLink;
use App\Models\EkkScore;
use App\Models\KerjaSama;
use App\Models\Dokumentasi;
use App\Models\Pejabat;
use Illuminate\Support\Collection;

class PublicController extends Controller
{
    /**
     * Get batch settings from database.
     */
    protected function getSettings(array $keys): Collection
    {
        return Setting::whereIn('key', $keys)->pluck('value', 'key');
    }

    public function beranda(): View
    {
        $keys = ['hero_title', 'hero_description', 'hero_image', 'visi', 'misi'];
        $settings = $this->getSettings($keys);

        $hero_title = $settings['hero_title'] ?? 'Bagian Tata Pemerintahan Kabupaten Tojo Una-Una';
        $hero_description = $settings['hero_description'] ?? 'Pusat integrasi data, koordinasi wilayah, dan layanan administrasi digital untuk mewujudkan tata kelola pemerintahan yang transparan dan akuntabel.';
        $hero_image = $settings['hero_image'] ?? null;
        $visi = $settings['visi'] ?? null;
        $misi = $settings['misi'] ?? null;
        
        $latest_dokumentasi = Dokumentasi::latest()->take(3)->get();

        return view('pages.beranda', compact('hero_title', 'hero_description', 'hero_image', 'visi', 'misi', 'latest_dokumentasi'));
    }

    public function profil(): View
    {
        $keys = ['total_pegawai', 'jumlah_divisi', 'jabatan_kosong', 'pendidikan_s1', 'struktur_org_img'];
        $settings = $this->getSettings($keys);

        $total_pegawai = $settings['total_pegawai'] ?? 42;
        $jumlah_divisi = $settings['jumlah_divisi'] ?? 3;
        $jabatan_kosong = $settings['jabatan_kosong'] ?? 0;
        $pendidikan_s1 = $settings['pendidikan_s1'] ?? '70%';
        $struktur_organisasi = $settings['struktur_org_img'] ?? null;
        
        $pejabats = Pejabat::orderBy('order_num')->get();

        return view('pages.profil', compact('total_pegawai', 'jumlah_divisi', 'jabatan_kosong', 'pendidikan_s1', 'struktur_organisasi', 'pejabats'));
    }

    public function otda(): View
    {
        $lppd_link = ExternalLink::where('module_name', 'lppd')->value('url');
        $kerja_samas = KerjaSama::orderBy('tanggal', 'desc')->get();
        
        $features = [
            ['icon' => 'description', 'title' => 'Fasilitasi Kebijakan', 'description' => 'Mengkoordinasikan perumusan dan pelaksanaan kebijakan otonomi daerah yang adaptif serta sesuai regulasi nasional.'],
            ['icon' => 'handshake', 'title' => 'Kerja Sama Antar Lembaga', 'description' => 'Membangun sinergi strategis melalui kemitraan daerah yang berkelanjutan untuk meningkatkan pelayanan publik.'],
            ['icon' => 'analytics', 'title' => 'Evaluasi Kinerja', 'description' => 'Melakukan monitoring, evaluasi, dan pelaporan capaian kinerja penyelenggaraan pemerintahan daerah secara berkala.']
        ];

        $documents = [
            ['name' => 'LPPD Kabupaten 2023.pdf', 'icon' => 'picture_as_pdf', 'color' => 'text-red-500'],
            ['name' => 'Format Data IKK 2024.xlsx', 'icon' => 'description', 'color' => 'text-blue-500'],
            ['name' => 'Ringkasan LKPJ 2023.pdf', 'icon' => 'picture_as_pdf', 'color' => 'text-red-500'],
            ['name' => 'Lampiran SPM 2023.zip', 'icon' => 'folder_zip', 'color' => 'text-orange-500']
        ];

        return view('pages.sub-bagian.otda', compact('lppd_link', 'kerja_samas', 'features', 'documents'));
    }

    public function pemerintahan(): View
    {
        $ekk_scores = EkkScore::orderBy('score', 'desc')->get();
        $spm_link = ExternalLink::where('module_name', 'spm')->value('url');
        return view('pages.sub-bagian.pemerintahan', compact('ekk_scores', 'spm_link'));
    }

    public function kewilayahan(): View
    {
        $lkpj_link = ExternalLink::where('module_name', 'lkpj')->value('url');
        $rupabumi_link = ExternalLink::where('module_name', 'rupabumi')->value('url') ?? '#';
        
        return view('pages.sub-bagian.kewilayahan', compact('lkpj_link', 'rupabumi_link'));
    }

    public function dokumentasi(): View
    {
        $dokumentasis = Dokumentasi::latest()->get();
        return view('pages.dokumentasi', compact('dokumentasis'));
    }
}
