<?php


namespace App\Http\Filters\Book;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class To extends  AbstractFilter
{
    public function applyFilter(Builder $builder)
    {
        $builder->where('pub_year', '<', request('to'));
    }
}



