<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $books_count = Book::all()->count();
        $user_count = User::all()->count();
        $categories_count = Category::all()->count();

        return view('admin.home.index', compact(
            'books_count',
            'user_count',
            'categories_count'));
    }
}
