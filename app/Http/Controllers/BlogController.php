<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image'
        ]);

        $image = $request->file('image')->store('blogs','public');

        Blog::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image,
        ]);

        return redirect()->route('blogs.index')
            ->with('success','Blog Added Successfully');
    }
public function show($id)
{
    $blog = Blog::findOrFail($id);

    $recentBlogs = Blog::latest()->take(5)->get();

    return view('blog-single', compact('blog','recentBlogs'));
}

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $image = $blog->image;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('blogs','public');
        }

        $blog->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image,
        ]);

        return redirect()->route('blogs.index')
            ->with('success','Blog Updated Successfully');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back()->with('success','Blog Deleted Successfully');
    }
}