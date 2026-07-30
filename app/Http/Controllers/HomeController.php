<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
{
    $books = Book::latest()->take(6)->get();

    $categories = Category::all();

    $blogs = Blog::latest()->take(3)->get();

    return view('welcome', compact(
        'books',
        'categories',
        'blogs'
    ));
}
    public function about()
{
    return view('about');
}

public function comingsoon()
{
    return view('coming-soon');
}

public function topseller()
{
    return view('top-seller');
}

public function books()
{
    $books = Book::all();
    return view('books', compact('books'));
}

public function authors()
{
    return view('author');
}

public function blog()
{
    $blogs = Blog::latest()->get();

    return view('blog', compact('blogs'));
}

public function contact()
{
    return view('contact');
}
}