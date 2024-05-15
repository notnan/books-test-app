@extends('layout.main')

@section('content')
<div>
    <hr>

        <div>
            <div>Название: {{ $book->title }}</div>
            <div>Автор: {{ $book->author }}</div>
            <div>Год: {{ $book->pub_year }}</div>
            <div>Описание: {{ $book->description }}</div>
            <div>
                <a href="{{ route('books.index') }}">Назад</a>
            </div>
        </div>
        <hr>
</div>

@endsection
