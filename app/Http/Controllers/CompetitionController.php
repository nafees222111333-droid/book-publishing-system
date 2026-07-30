<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $competitions = Competition::with('submissions.user')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('topic', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        return view('competitions.index', compact('competitions'));
    }

    public function create()
    {
        return view('competitions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'topic' => 'required',
            'prize' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);

        Competition::create($request->all());

        return redirect()->route('competitions.index')
            ->with('success', 'Competition Added Successfully!');
    }

    // EDIT

    public function edit($id)
    {
        $competition = Competition::findOrFail($id);

        return view('competitions.edit', compact('competition'));
    }

    // UPDATE

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'topic' => 'required',
            'prize' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);

        $competition = Competition::findOrFail($id);

        $competition->update($request->all());

        return redirect()->route('competitions.index')
            ->with('success', 'Competition Updated Successfully!');
    }

    // DELETE

    public function destroy($id)
    {
        $competition = Competition::findOrFail($id);

        if ($competition->submissions()->count() > 0) {

            return back()->with(
                'error',
                'This competition has submissions and cannot be deleted.'
            );
        }

        $competition->delete();

        return back()->with(
            'success',
            'Competition Deleted Successfully!'
        );
    }
}