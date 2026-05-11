<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::with('genre')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required',
            'genre_id' => 'required'
        ]);

        $book = Book::create($request->only('title','author','year','genre_id'));

        return response()->json($book, 201);
    }

    public function show($id)
    {
        return response()->json(Book::with('genre')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->only('title','author','year','genre_id'));

        return response()->json($book);
    }

    public function destroy($id)
    {
        Book::destroy($id);

        return response()->json(['message' => 'deleted']);
    }
}