<?php


namespace App\Http\Filters\Book;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Title extends  AbstractFilter
{
    public function applyFilter(Builder $builder)
    {
        $value = request('title');
        $builder->where('title', 'like', "%{$value}%");
    }
}



