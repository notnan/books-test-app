<?php

namespace App\Models;

use App\Http\Filters\Book\Author;
use App\Http\Filters\Book\Title;
use App\Http\Filters\Book\AbstractFilter;
use App\Http\Filters\Book\From;
use App\Http\Filters\Book\To;
use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use HasFilter;

    protected $table = 'books';

    protected $guarded = false;

    public function getFilters(): array
    {
        return
            [
                From::class,
                To::class,
                Title::class,
                Author::class
            ];
    }

    protected static function booted()
    {

    }
}
