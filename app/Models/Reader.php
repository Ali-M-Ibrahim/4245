<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $fillable=['name','biography','nbofbooks','country'];

    function getBooks()
    {
        return $this->belongsToMany(
            Book::class,
            'reader_books',
            'reader_id',
            'book_id');
    }
}
