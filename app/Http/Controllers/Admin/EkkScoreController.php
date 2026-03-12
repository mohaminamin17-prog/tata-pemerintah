<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EkkScore;
use Illuminate\Http\Request;

class EkkScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function calculateGrade($score)
    {
        if ($score >= 80) return 'A';
        if ($score >= 60) return 'B';
        return 'C';
    }

    public function index()
    {
        $scores = EkkScore::orderBy('score', 'desc')->get();
        return view('admin.ekk-scores.index', compact('scores'));
    }

    public function create()
    {
        return view('admin.ekk-scores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kecamatan_name' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $grade = $this->calculateGrade($request->score);

        EkkScore::create([
            'kecamatan_name' => $request->kecamatan_name,
            'score' => $request->score,
            'grade' => $grade,
        ]);

        return redirect()->route('admin.ekk-scores.index')->with('success', 'EKK Score added successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(EkkScore $ekk_score)
    {
        return view('admin.ekk-scores.edit', compact('ekk_score'));
    }

    public function update(Request $request, EkkScore $ekk_score)
    {
        $request->validate([
            'kecamatan_name' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $grade = $this->calculateGrade($request->score);

        $ekk_score->update([
            'kecamatan_name' => $request->kecamatan_name,
            'score' => $request->score,
            'grade' => $grade,
        ]);

        return redirect()->route('admin.ekk-scores.index')->with('success', 'EKK Score updated successfully.');
    }

    public function destroy(EkkScore $ekk_score)
    {
        $ekk_score->delete();
        return redirect()->route('admin.ekk-scores.index')->with('success', 'EKK Score deleted successfully.');
    }
}
