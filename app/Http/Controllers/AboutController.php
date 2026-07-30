<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $image = $request->file('image')->store('abouts', 'public');

        About::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('abouts.index')
            ->with('success', 'About Added Successfully');
    }
}