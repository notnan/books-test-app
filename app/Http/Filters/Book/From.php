<?php


namespace App\Http\Filters\Book;


use Illuminate\Database\Eloquent\Builder;

class From extends  AbstractFilter
{
    public function applyFilter(Builder $builder)
    {
        $builder->where('pub_year', '>', request('from'));
    }
}
