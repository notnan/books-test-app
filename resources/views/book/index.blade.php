@extends('layout.main')

@section('content')

    <div>
        <hr>

        @can('create', \App\Models\Book::class)
            <div>
                <a href="{{ route('books.create') }}">Добавить</a>
            </div>
        @endcan
        <hr>
        <div>
            <form action="{{ route('books.index') }}">
                <input type="text" name="title" placeholder="Название" value="{{ request()->get('title') }}">
                <input type="text" name="author" placeholder="Автор" value="{{ request()->get('author') }}">
                <input type="number" name="from" placeholder="Год от" value="{{ request()->get('from') }}">
                <input type="number" name="to" placeholder="Год до" value="{{ request()->get('to') }}">
                <input type="text" name="description" placeholder="Описание"
                       value="{{ request()->get('description') }}">

                <input type="submit">
                <a href="{{ route('books.index') }}">Сбросить</a>
            </form>
            <a href="{{ route('books.export', request()->query()) }}" class="btn btn-secondary">Export to CSV</a>
        </div>
        <hr>
        @foreach($books as $book)
            <div>
                <div>Название: {{ $book->title }}</div>
                <div>Автор: {{ $book->author }}</div>
                <div>Год: {{ $book->pub_year }}</div>
                <div>Описание: {{ $book->description }}</div>
                <div>
                    <a href="{{ route('books.show', $book->id) }}">Просмотреть</a>
                    @can('update', $book)
                        <div>
                            <a href="{{ route('books.edit', $book->id) }}">Редактировать</a>
                        </div>
                    @endcan
                    @can('delete', $book)
                        <div>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                @csrf
                                @method('Delete')
                                <input type="submit" value="Удалить">
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
            <hr>
        @endforeach
        <div class="my-nav">
            {{ $books->withQueryString()->links() }}
        </div>
    </div>

@endsection
