<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return BookResource::collection($books)->resolve();
    }

    public function show(Book $book)
    {
        return BookResource::make($book)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $book = Book::create($data);
        return BookResource::make($book)->resolve();
    }

    public function update(Book $book, StoreRequest $request)
    {
        $data = $request->validated();
        $book->update($data);
        $book->fresh();
        return BookResource::make($book)->resolve();
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'book was deleted'
        ]);

    }

}
