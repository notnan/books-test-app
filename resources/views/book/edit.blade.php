@extends('layout.main')

@section('content')
<div>
    <hr>

    <div>
        <form action="{{ route('books.update', $book->id) }}" method="Post">
            @csrf
            @method('Patch')
            <div style="margin-bottom: 15px;"><input type="text" name="title" value="{{ old('title') ?? $book->title }}"
                                                     placeholder="Название">
                @error('title')
                <div>
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div style="margin-bottom: 15px;"><input type="text" name="author"
                                                     value="{{ old('author') ?? $book->author }}"
                                                     placeholder="Автор">
                @error('author')
                <div>
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div style="margin-bottom: 15px;"><input type="number" name="pub_year" value="{{ old('pub_year') ?? $book->age }}"
                                                     placeholder="Год">
                @error('pub_year')
                <div>
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div style="margin-bottom: 15px;"><textarea name="description" placeholder="Описание">
                         {{ old('description') ?? $book->description }}
                    </textarea>

                @error('description')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div style="margin-bottom: 15px;"><input type="submit" value="Сохранить"></div>
        </form>
    </div>
</div>

@endsection
