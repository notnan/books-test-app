<?php

namespace App\Http\Filters\Book;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Author extends  AbstractFilter
{
    public function applyFilter(Builder $builder)
    {
        $value = request('author');
        $builder->where('title', 'like', "%{$value}%");
    }
}



