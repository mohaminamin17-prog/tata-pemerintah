<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExternalLink;
use Illuminate\Http\Request;

class ExternalLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = ExternalLink::pluck('url', 'module_name')->toArray();
        return view('admin.external-links.index', compact('links'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lppd' => 'nullable|url',
            'lkpj' => 'nullable|url',
            'spm' => 'nullable|url',
        ]);

        $modules = ['lppd', 'lkpj', 'spm'];

        foreach ($modules as $module) {
            if ($request->has($module)) {
                ExternalLink::updateOrCreate(
                    ['module_name' => $module],
                    ['url' => $request->$module]
                );
            }
        }

        return redirect()->route('admin.external-links.index')->with('success', 'External Links updated successfully.');
    }
}
