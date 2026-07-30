<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // All Books
   public function index()
{
    $books = Book::with('category')->get();

    return view('books.index', compact('books'));
}
public function booksPage(Request $request)
{
    $search = $request->search;

    $books = Book::with('category')
        ->when($search, function ($query) use ($search) {

            $query->where('title','LIKE',"%{$search}%")
                  ->orWhere('author','LIKE',"%{$search}%")
                  ->orWhereHas('category', function($q) use ($search){
                      $q->where('name','LIKE',"%{$search}%");
                  });

        })->get();

    return view('books', compact('books'));
}
public function create()
{
    $categories = Category::all();

    return view('books.create', compact('categories'));
}
    // Save Book
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required',
            'book_image' => 'required|image',
        ]);

        $image = $request->file('book_image')->store('books', 'public');

        $pdf = null;

        if ($request->hasFile('pdf_file')) {
            $pdf = $request->file('pdf_file')->store('pdfs', 'public');
        }

        Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'book_image' => $image,
            'pdf_file' => $pdf,
            'is_free' => $request->has('is_free'),
        ]);

        return redirect()->route('books.index')
        ->with('success', 'Book Added Successfully');
    }

    // Show Single Book
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Edit Form
    public function edit(Book $book)
    {
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    // Update Book
   public function update(Request $request, Book $book)
{
    $request->validate([
        'category_id' => 'required',
        'title' => 'required',
        'author' => 'required',
        'description' => 'required',
        'price' => 'required',
        'type' => 'required',
    ]);

    $image = $book->book_image;

    if ($request->hasFile('book_image')) {
        $image = $request->file('book_image')->store('books', 'public');
    }

    $pdf = $book->pdf_file;

    if ($request->hasFile('pdf_file')) {
        $pdf = $request->file('pdf_file')->store('pdfs', 'public');
    }

    $book->update([
        'category_id' => $request->category_id,
        'title' => $request->title,
        'author' => $request->author,
        'description' => $request->description,
        'price' => $request->price,
        'type' => $request->type,
        'book_image' => $image,
        'pdf_file' => $pdf,
        'is_free' => $request->has('is_free'),
    ]);

    return redirect()->route('books.index')
        ->with('success', 'Book Updated Successfully');
}

        // Delete Book
   public function destroy(Book $book)
{
    if ($book->orders()->count() > 0) {
        return back()->with('error', 'This book cannot be deleted because orders already exist.');
    }

    $book->delete();

    return back()->with('success', 'Book Deleted Successfully');
}
    public function authors()
{
    $authors = Book::select('author')
        ->distinct()
        ->get();

    return view('author', compact('authors'));
}
public function authorBooks($author)
{
    $books = Book::where('author', $author)->get();

    return view('author-books', compact('books', 'author'));
}

}
