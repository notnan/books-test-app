<?php

namespace App\Http\Controllers;

use App\Http\Filters\Book\From;
use App\Http\Filters\Book\Title;
use App\Http\Filters\Book\Author;
use App\Http\Filters\Book\To;
use App\Http\Requests\Book\IndexRequest;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $booksQuery = $this->filterBooks($request);
        $books = $booksQuery->paginate(4);

        return view('book.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function create()
    {
        $this->authorize('create', Book::class);
        return view('book.create');
    }

    public function store(StoreRequest $request)
    {

        $this->authorize('create', Book::class);

        $data = $request->validated();

        Book::create($data);

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('book.edit', compact('book'));
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $this->authorize('update', $book);

        $data = $request->validated();

        $book->update($data);

        return redirect()->route('books.show', $book->id);
    }

    public function export(Request $request)
    {
        $booksQuery = $this->filterBooks($request);

        return Excel::download(new BooksExport($booksQuery), 'books.csv');
    }


    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return redirect()->route('books.index');
    }

    protected function filterBooks(Request $request)
    {
        return app()->make(Pipeline::class)
            ->send(Book::query())
            ->through([
                Title::class,
                Author::class,
                From::class,
                To::class,
            ])
            ->thenReturn();
    }
}
