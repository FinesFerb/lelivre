<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function add(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                'book_id' => 'required|exists:books,id',
                'rating' => 'required|integer|min:1|max:5',
            ]);

            $rating = Rating::updateOrCreate(
                ['user_id' => auth()->id(), 'book_id' => $request['book_id']],
                ['rating' => $request['rating']]
            );

            return response()->json(['message' => 'Rating saved successfully', 'rating' => $rating]);
        }
        return response()->json(['message' => 'Unauthorized', 'redirect' => route('login')], 401);
    }

    public function currentRating($book)
    {
        $rating = Rating::where('user_id', auth()->id())
                        ->where('book_id', $book)
                        ->first();

        return response()->json(['rating' => $rating ? $rating->rating : null]);
    }

    public function delete(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                'book_id' => 'required|exists:books,id'
            ]);

            $rating = Rating::where('book_id', $request['book_id'])
                            ->where('user_id', auth()->id())
                            ->first();
            $rating->delete();
            return response()->json(['success' => 'delete rating']);
        }
        return response()->json(['error' => 'not auth']);
    }
}
