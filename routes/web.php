<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\EditorsChoiceSlidesController;
use App\Http\Controllers\Admin\MainSliderController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MyBooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\RatingController;
use App\Models\Book;
use App\Models\Category;
use App\Models\EditorsChoiceBooks;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//welcome
Route::get('/', function () {
    $books = Book::all();
    $main_slides = Slider::all();
    $editors_choice_books = EditorsChoiceBooks::all();
    return view('pages.main', compact('books', 'main_slides', 'editors_choice_books'));
})->name('welcome');

//search
Route::get('/search', [BookController::class, 'search'])->name('search');

//list-product
Route::get('/product/{book}', [BookController::class, 'showBook'])->name('book.show');
Route::get('/books/epub/{filename}', [BookController::class, 'getBook']);

//Auth
Route::middleware('auth')->group(function () {
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //reader
    Route::get('/product/{book}/read', [BookController::class, 'read'])->name('book.read');

    //download
    Route::get('/books/{id}/download', [BookController::class, 'download'])->name('book.download');

    //library
    Route::get('/library',[MyBooksController::class, 'index'])->name('library.index');
    Route::get('/library/delete/{id}',[MyBooksController::class, 'destroy'])->name('library.destroy');
    Route::get('/library/store/{id}',[MyBooksController::class, 'store'])->name('library.store');
});

//rating
Route::get('/rating/current/{book}', [RatingController::class, 'currentRating'])->name('ratings.current');
Route::get('/books/{book}/ratings-summary', [BookController::class, 'ratingsSummary'])->name('books.ratingsSummary');
Route::post('/rating/add', [RatingController::class, 'add'])->name('ratings.add');
Route::delete('/rating/delete', [RatingController::class, 'delete'])->name('ratings.delete');

//Admin
Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('AdminHome');
    Route::resource('books', BooksController::class);
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('main_slides', MainSliderController::class);
    Route::resource('editors_choice_books', EditorsChoiceSlidesController::class);
    Route::get('/books/{id}/download', 'App\Http\Controllers\BookController@download')->name('books.download');
});

//SocialAuth
Route::group(['middleware' => 'guest'], function (){
    //Vk
    Route::get('/vk/auth', 'App\Http\Controllers\SocialController@vk')->name('vk.auth');
    Route::get('/vk/auth/callback', 'App\Http\Controllers\SocialController@callbackVk');

    //Google
    Route::get('/google/auth', 'App\Http\Controllers\SocialController@google')->name('google.auth');
    Route::get('/google/auth/callback', 'App\Http\Controllers\SocialController@callbackGoogle');
});


require __DIR__.'/auth.php';
