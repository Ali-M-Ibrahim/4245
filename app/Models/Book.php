<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    function getAuthor(){
        return $this->belongsTo(Author::class,'author_id','id');
    }

    function getBookDetails(){
        return $this->hasOne(BookDetails::class,'book_id','id');
    }

    function getReaders(){
        return $this->belongsToMany(
            Reader::class,
            'reader_books',
        'book_id',
        'reader_id');
    }
}

