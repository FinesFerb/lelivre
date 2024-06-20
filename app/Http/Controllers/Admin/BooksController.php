<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $books = Book::all();
        return view('admin.books.index', ['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBook  $request
     * @return RedirectResponse
     */
    public function store(StoreBook $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $data['cover'] = $cover->getClientOriginalName();
            $cover->storeAs('books_cover', $data['cover'], 'public');
        }
        if ($request->hasFile('epub')) {
            $epub = $request->file('epub');
            $data['epub'] = $epub->getClientOriginalName();
            $epub->storeAs('books', $data['epub'], 'public');
        }
        $book = Book::create($data);
        $book->categories()->attach($request->category);
        return redirect()->route('books.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book  $book
     * @return View
     */
    public function edit(Book $book): View
    {
        return view('admin.books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBook  $request
     * @param  Book  $book
     * @return RedirectResponse
     */
    public function update(UpdateBook $request, Book $book): RedirectResponse
    {
        $data = $request->validated();
        $book->title = $data['title'];

        $cover = $request->file('cover');
        if ($cover !== null) {
            $book->cover = $cover->getClientOriginalName();
            $cover->storeAs('books_cover', $book->cover, 'public');
        }

        $book->author = $data['author'];
        $book->categories()->sync($data['category']);
        $book->page_count = $data['page_count'];
        $book->reading_time = $data['reading_time'];
        $book->year_of_publication = $data['year_of_publication'];
        $book->age_restriction = $data['age_restriction'];
        $book->description = $data['description'];
        $book->date_of_writing = $data['date_of_writing'];
        $book->volume = $data['volume'];
        $book->isbn = $data['isbn'];
        $book->interpreter = $data['interpreter'];

        $epub = $request->file('epub');
        if ($epub !== null) {
            $book->epub = $epub->getClientOriginalName();
            $epub->storeAs('books', $book->epub, 'public');
        }

        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book  $book
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        Storage::delete("books_cover/$book->cover");
        Storage::delete("books/$book->epub");
        $book->delete();
        return back();
    }
}
