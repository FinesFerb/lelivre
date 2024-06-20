<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MyBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $id = auth()->id();

        $user = User::find($id);
        $books = $user->books;

        return view('pages.library', compact('books'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function store(int $id): RedirectResponse
    {
        $auth = auth()->id();
        $user = User::find($auth);

        if (!$user->books->contains($id)) {
            $user->books()->attach($id);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $auth = auth()->id();
        $user = User::find($auth);

        $user->books()->detach($id);
        return back();
    }
}
