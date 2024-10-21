<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetails;
use App\Models\Reader;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    function getBooksFromAuthor()
    {
        // select * from authors where id=1;
        $data= Author::find(1);
        $relatedBooks= $data->getBooks;
        return $relatedBooks ;
    }

    function getAuthorFromBook(){
        $book = Book::find(1);
        $relatedAuthor= $book->getAuthor;
        return $relatedAuthor;
    }

    function getDetailsFromBook(){
        $book = Book::find(1);
        $details = $book->getBookDetails;
        return $details;
    }

    function getBookFromDetails(){
        $details = BookDetails::find(1);
        $book = $details->getBook;
        return $book;
    }

    function getReadersFromBook(){
        $book=Book::find(1);
        $relatedReaders= $book->getReaders;
        return $relatedReaders;
    }

    function getBooksFromReader(){
        $reader= Reader::find(1);
        $relatedBooks= $reader->getBooks;
        return $relatedBooks;
    }
}
