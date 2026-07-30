<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\Competition;
use App\Models\Submission;
use App\Models\Blog;


class AdminController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalAuthors = Book::distinct('author')->count('author');
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalCompetitions = Competition::count();
        $totalSubmissions = Submission::count();
        $totalRevenue = Order::where('status', 'Approved')->sum('total_price');

        $latestBooks = Book::latest()->take(5)->get();
        $latestCompetitions = Competition::latest()->take(5)->get();
        $latestSubmissions = Submission::latest()->take(5)->get();
        $totalOrders = Order::count();
        $latestOrders = Order::with('user')

    ->latest()
    ->take(5)
    ->get();
    $pendingOrders = Order::where('status', 'Pending')->count();
$pendingSubmissions = Submission::where('status', 'Pending')->count();
return view('admin.index', compact(
    'totalBooks',
    'totalAuthors',
    'totalOrders',
    'totalUsers',
    'totalCategories',
    'totalCompetitions',
    'totalSubmissions',
    'totalRevenue',
    'latestBooks',
    'latestOrders',
    'latestCompetitions',
    'pendingOrders',
'pendingSubmissions',
    'latestSubmissions'

));
    }
}