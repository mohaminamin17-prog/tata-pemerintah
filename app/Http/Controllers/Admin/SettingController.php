<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Helpers\SupabaseStorage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $keys = ['hero_title', 'hero_description', 'hero_image', 'visi', 'misi', 'sambutan'];
        $settings = Setting::whereIn('key', $keys)->pluck('value', 'key');

        $hero_title = $settings['hero_title'] ?? 'Selamat Datang di Portal Resmi Tata Pemerintahan Kabupaten Tojo Una-Una';
        $hero_description = $settings['hero_description'] ?? 'Menyediakan akses informasi publik terkait tata kelola pemerintahan, evaluasi kinerja, dan pelayanan administrasi wilayah bagi masyarakat Kabupaten Tojo Una-Una.';
        $hero_image = $settings['hero_image'] ?? null;
        
        $visi = $settings['visi'] ?? 'Terwujudnya Kabupaten Tojo Una-Una yang Mandiri, Sejahtera dan Berdaya Saing.';
        $misi = $settings['misi'] ?? "1. Meningkatkan tata kelola pemerintahan yang profesional.\n2. Mengoptimalkan potensi sumber daya alam daerah.\n3. Mewujudkan pemerataan infrastruktur wilayah.\n4. Peningkatan kualitas pelayanan publik dasar.";
        $sambutan = $settings['sambutan'] ?? 'Assalamualaikum Warahmatullahi Wabarakatuh, Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa atas rahmat-Nya portal informasi ini hadir untuk mendekatkan pelayanan kepada seluruh lapisan masyarakat...';

        $all_settings = Setting::all();

        return view('admin.settings.index', compact('hero_title', 'hero_description', 'hero_image', 'visi', 'misi', 'sambutan', 'all_settings'));
    }

    public function updateHero(Request $request): RedirectResponse
    {
        $request->validate([
            'hero_title' => 'required|string',
            'hero_description' => 'required|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Setting::updateOrCreate(['key' => 'hero_title'], ['value' => $request->hero_title]);
        Setting::updateOrCreate(['key' => 'hero_description'], ['value' => $request->hero_description]);

        if ($request->hasFile('hero_image')) {
            if (config('services.supabase.url')) {
                $url = SupabaseStorage::upload($request->file('hero_image'), 'settings');
                Setting::updateOrCreate(['key' => 'hero_image'], ['value' => $url]);
            } elseif (app()->environment('local')) {
                $imageName = time().'.'.$request->hero_image->extension();  
                $request->hero_image->move(public_path('uploads/settings'), $imageName);
                Setting::updateOrCreate(['key' => 'hero_image'], ['value' => 'uploads/settings/' . $imageName]);
            } else {
                return redirect()->back()->withErrors(['hero_image' => 'Penyimpanan file gagal: Supabase tidak terkonfigurasi pada environment ini.'])->withInput();
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Hero section berhasil diperbarui.');
    }

    public function updateVisiMisi(Request $request): RedirectResponse
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
            'sambutan' => 'required|string',
        ]);

        Setting::updateOrCreate(['key' => 'visi'], ['value' => $request->visi]);
        Setting::updateOrCreate(['key' => 'misi'], ['value' => $request->misi]);
        Setting::updateOrCreate(['key' => 'sambutan'], ['value' => $request->sambutan]);

        return redirect()->route('admin.settings.index')->with('success', 'Visi, Misi & Sambutan berhasil diperbarui.');
    }

    public function create(): View
    {
        return view('admin.settings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'required|string',
        ]);

        Setting::create($request->all());
        return redirect()->route('admin.settings.index')->with('success', 'Setting baru berhasil ditambahkan.');
    }

    public function edit(Setting $setting): View
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting): RedirectResponse
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key,' . $setting->id,
            'value' => 'required|string',
        ]);

        $setting->update($request->all());
        return redirect()->route('admin.settings.index')->with('success', 'Setting berhasil diperbarui.');
    }

    public function destroy(Setting $setting): RedirectResponse
    {
        $setting->delete();
        return redirect()->route('admin.settings.index')->with('success', 'Setting berhasil dihapus.');
    }
}
