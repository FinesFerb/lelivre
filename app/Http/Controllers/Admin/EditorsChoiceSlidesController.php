<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\EditorsChoiceBooks;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EditorsChoiceSlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $editorsChoiceBooks = EditorsChoiceBooks::all();
        return view('admin.sliders.editors_choice_books.index', compact('editorsChoiceBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $books = Book::all();
        return view('admin.sliders.editors_choice_books.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $editorsChoiceBook = new EditorsChoiceBooks();
        $editorsChoiceBook->book()->associate($request->book);
        $editorsChoiceBook->save();
        return redirect()->route('editors_choice_books.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditorsChoiceBooks  $editorsChoiceBook
     * @return View
     */
    public function edit(EditorsChoiceBooks $editorsChoiceBook): View
    {
        $books = Book::all();
        return view('admin.sliders.editors_choice_books.edit', compact('editorsChoiceBook', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  EditorsChoiceBooks  $editorsChoiceBook
     * @return RedirectResponse
     */
    public function update(Request $request, EditorsChoiceBooks $editorsChoiceBook): RedirectResponse
    {
        $editorsChoiceBook->book()->associate($request->book);
        $editorsChoiceBook->save();
        return redirect()->route('editors_choice_books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EditorsChoiceBooks  $editorsChoiceBook
     * @return RedirectResponse
     */
    public function destroy(EditorsChoiceBooks $editorsChoiceBook): RedirectResponse
    {
        $editorsChoiceBook->delete();
        return back();
    }
}
