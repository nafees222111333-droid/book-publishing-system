<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class WinnerController extends Controller
{
    public function index()
    {
        $winners = Submission::with('user','competition')
            ->where('is_winner',1)
            ->get();

        return view('winners', compact('winners'));
    }
}