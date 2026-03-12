<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EkkScore;
use App\Models\KerjaSama;
use App\Models\Dokumentasi;
use App\Models\StrukturOrganisasi;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'ekk_count' => EkkScore::count(),
            'kerja_sama_count' => KerjaSama::count(),
            'dokumentasi_count' => Dokumentasi::count(),
        ];

        $recent_dokumentasi = Dokumentasi::latest()->take(6)->get();
        $top_ekk = EkkScore::orderByDesc('score')->take(5)->get();

        return view('dashboard', compact('stats', 'recent_dokumentasi', 'top_ekk'));
    }
}
