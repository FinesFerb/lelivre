<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Response;

class BookController extends Controller
{
    public function download(int $id)
    {
        $book = Book::where('id', $id)->firstOrFail();
        $path = storage_path('app/public/books/' . $book->epub);
        return response()->download($path);
    }

    public function search(Request $request): RedirectResponse|View
    {
        $query = Book::query();
        if (!empty($request->search)) {
            $search = $request->search;
            $query = Book::where('title', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%");
        }

        if (!empty($request->category)) {
            $query->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            });
        } else {
            $request->query->remove('category');
        }
        $books = $query->orderBy('title')->get();
        return view('pages.search', compact('books'));
    }

    public function showBook(Book $book): View
    {
        $averageRating = $book->averageRating();
        $ratingsCount = $book->ratingsCount();

        return view('pages.product', compact('book', 'averageRating', 'ratingsCount'));
    }

    public function read(Book $book): View
    {
        return view('reader.reader.index', compact('book'));
    }

    public function getBook($filename)
    {
        $path = storage_path('app/public/books/' . $filename);
        if (!File::exists($path)) {
            return response()->json(['error' => 'File not found'], 404)
                ->header('Access-Control-Allow-Origin', '*');
        }

        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);
        $response->header('Access-Control-Allow-Origin', '*');

        return $response;
    }
    public function ratingsSummary(Book $book)
    {
        $averageRating = $book->averageRating();
        $ratingsCount = $book->ratingsCount();

        return response()->json([
            'averageRating' => $averageRating,
            'ratingsCount' => $ratingsCount
        ]);
    }

}
