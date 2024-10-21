<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetails extends Model
{
    use HasFactory;

    function getBook(){
        return $this->belongsTo(Book::class,'book_id','id');
    }
}
