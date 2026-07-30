<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;

Route::get('/', [HomeController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {

        if (Auth::id()) {

            if (Auth::user()->user_role == "0") {

                $books = App\Models\Book::latest()->take(6)->get();
                $categories = App\Models\Category::all();

                return view('user.index', compact('books', 'categories'));

            } elseif (Auth::user()->user_role == "1") {

                return app(\App\Http\Controllers\BookController::class)->authors();

            } else {

                return app(\App\Http\Controllers\AdminController::class)->index();

            }

        }

        return redirect()->back();

    })->name('dashboard');

});
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class); 
Route::resource('blogs', BlogController::class);  
use App\Http\Controllers\AboutController;

Route::resource('abouts', AboutController::class);



Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/coming-soon', [HomeController::class,'comingsoon'])->name('comingsoon');
Route::get('/top-seller', [HomeController::class,'topseller'])->name('topseller');
Route::get('/books-list', [HomeController::class,'books'])->name('bookslist');
Route::get('/authors', [HomeController::class,'authors'])->name('authors');
Route::get('/blog', [HomeController::class,'blog'])->name('blog');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/coming-soon', 'coming-soon')->name('coming-soon');
Route::view('/top-seller', 'top-seller')->name('top-seller');
// Route::view('/blog', 'blog')->name('blog');
Route::view('/contact', 'contact')->name('contact');
Route::get('/author', [BookController::class, 'authors'])
    ->name('author');
Route::get('/books-page', [BookController::class,'booksPage'])->name('books.page');
Route::get('/books/{book}', [BookController::class,'show'])->name('books.show');
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');
Route::middleware('auth')->group(function () {

    Route::post('/order/{id}', [OrderController::class, 'store'])
        ->name('order.store');
Route::get('/books-page', [BookController::class,'booksPage'])
    ->name('books.page');
});
Route::middleware('auth')->group(function () {

    Route::get('/my-orders', [MyOrderController::class, 'index'])
        ->name('my.orders');

});
Route::get('/admin/orders', [OrderController::class,'index'])->name('orders.index');


Route::get('/admin/orders/{id}/approve', [OrderController::class, 'approve'])->name('orders.approve');

Route::get('/admin/orders/{id}/reject', [OrderController::class, 'reject'])->name('orders.reject');
Route::get('/payment/{id}', [PaymentController::class, 'create'])
    ->name('payment.create');

Route::post('/payment/store', [PaymentController::class, 'store'])
    ->name('payment.store');
    Route::get('/download/{id}', [DownloadController::class, 'download'])
    ->name('download.pdf');
    Route::get('/competitions', [CompetitionController::class,'index'])
    ->name('competitions.index');

Route::get('/competitions/create', [CompetitionController::class,'create'])
    ->name('competitions.create');

Route::post('/competitions/store', [CompetitionController::class,'store'])
    ->name('competitions.store');
    Route::get('/competitions/{id}/edit',
    [CompetitionController::class,'edit'])
    ->name('competitions.edit');

Route::put('/competitions/{id}',
    [CompetitionController::class,'update'])
    ->name('competitions.update');

Route::delete('/competitions/{id}',
    [CompetitionController::class,'destroy'])
    ->name('competitions.destroy');
    Route::get('/competition/{id}/submit', [SubmissionController::class, 'create'])
    ->name('submission.create');

Route::post('/competition/{id}/submit', [SubmissionController::class, 'store'])
    ->name('submission.store');
    Route::get('/admin/submissions',
    [SubmissionController::class,'index'])
    ->name('submissions.index');
    Route::get('/admin/submission/{id}/approve',
    [SubmissionController::class,'approve'])
    ->name('submissions.approve');
    Route::middleware('auth')->group(function () {

    Route::get('/competition/{id}/submit',[SubmissionController::class,'create'])
        ->name('submission.create');

    Route::post('/competition/{id}/submit',[SubmissionController::class,'store'])
        ->name('submission.store');

});

Route::get('/admin/submissions',[SubmissionController::class,'index'])
    ->name('submissions.index');

Route::get('/admin/submission/{id}/approve',[SubmissionController::class,'approve'])
    ->name('submissions.approve');
    Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.dashboard');
    Route::get('/submission/{id}/download',
    [SubmissionController::class,'download'])
    ->name('submissions.download');
    Route::get('/author/{author}', [BookController::class, 'authorBooks'])
    ->name('author.books');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/blog/{blog}', [App\Http\Controllers\BlogController::class,'show'])
    ->name('blogs.show');
    Route::get('/blog/{id}', [BlogController::class,'show'])->name('blog.show');
    Route::get('/submission/{id}/winner',
    [SubmissionController::class,'winner'])
    ->name('submission.winner');
    use App\Http\Controllers\WinnerController;

Route::get('/winners',[WinnerController::class,'index'])
    ->name('winners');
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});
