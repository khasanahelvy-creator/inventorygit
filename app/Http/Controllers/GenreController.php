<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return response()->json(['test' => 'OK MASUK API']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json($genre, 201);
    }

    public function show($id)
    {
        return response()->json(Genre::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);

        $genre->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json($genre);
    }

    public function destroy($id)
    {
        Genre::destroy($id);

        return response()->json([
            'message' => 'deleted'
        ]);
    }
    
}