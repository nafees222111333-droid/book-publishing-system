<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function create($id)
    {
        $competition = Competition::findOrFail($id);

        return view('competitions.submit', compact('competition'));
    }

    public function store(Request $request, $id)
    {
        
        $request->validate([
            'document' => 'required|mimes:pdf,doc,docx|max:5120'
        ]);
$alreadySubmitted = Submission::where('competition_id', $id)
    ->where('user_id', Auth::id())
    ->exists();
if ($alreadySubmitted) {
    return back()->with('error', 'You have already submitted this competition.');
}
        $file = $request->file('document')->store('submissions', 'public');

        Submission::create([
            'competition_id' => $id,
            'user_id' => Auth::id(),
            'document' => $file,
            'status' => 'Pending'
        ]);

        return redirect()->route('competitions.index')
            ->with('success','Story Submitted Successfully!');
    }

    public function index()
    {
        $submissions = Submission::with('user','competition')->latest()->get();

        return view('submissions.index',compact('submissions'));
    }

    public function approve($id)
    {
        $submission = Submission::findOrFail($id);

        $submission->status='Winner';

        $submission->save();

        return back()->with('success','Winner Selected Successfully!');
    }
    public function download($id)
{
    $submission = Submission::findOrFail($id);

    return Storage::disk('public')->download($submission->document);
}
public function winner($id)
{
    $submission = Submission::findOrFail($id);

    // Pehle isi competition ke purane winner hata do
    Submission::where('competition_id', $submission->competition_id)
        ->update(['is_winner' => false]);

    // Naya winner
    $submission->is_winner = true;
    $submission->save();

    return redirect()->back()->with('success', 'Winner Selected Successfully');
}
}