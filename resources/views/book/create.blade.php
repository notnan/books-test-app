@extends('layout.main')

@section('content')
<div>
    <hr>

    <div>
        <form action="{{ route('books.store') }}" method="Post">
            @csrf
            <div style="margin-bottom: 15px;">
                <input type="text" name="title"
                       placeholder="Название" value="{{ old('title') }}">
                @error('title')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;"><input type="text" name="author"
                                                     placeholder="Автор"
                value="{{ old('author') }}"
                >

                @error('author')
                <div>
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div style="margin-bottom: 15px;"><input type="number" name="pub_year"
                                                     placeholder="Год"
                                                     value="{{ old('pub_year') }}"
                >
                @error('pub_year')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;"><textarea name="description" placeholder="Описание">
                    {{ old('description') }}
                </textarea>

                @error('description')
                <div>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div style="margin-bottom: 15px;"><input type="submit" value="Добавить"></div>
        </form>
    </div>
</div>

@endsection
