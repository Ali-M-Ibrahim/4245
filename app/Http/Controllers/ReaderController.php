<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;
use DB;

class ReaderController extends Controller
{
    function getAllReaders()
    {
        // SELECT * FROM READERS
        $data = Reader::all();
        return $data;
    }

    function getReaderById($id){
        // SELECT * FROM READERS WHERE ID=?
        $data= Reader::find($id);
        return $data;
    }

    function getReadersHavingNb1(){
        //SELECT * FROM READERS WHERE nbofbooks =1
        $data = Reader::where('nbofbooks',1)->get();
        return $data;
    }

    function getReadersHavingNbgt1(){
        //SELECT * FROM READERS WHERE nbofbooks > 1
        $data = Reader::where('nbofbooks','>' ,1)->get();
        return $data;
    }

    function getReadersByNbAndId(){
        // SELECT * FROM READERS WHERE nbofbooks > 1 AND ID <3;
        $data = Reader::where('nbofbooks','>',1)
            ->where('id','<',3)
            ->get();
        return $data;
    }

    function getReadersHavingNbgt1Take1(){
        //SELECT * FROM READERS WHERE nbofbooks > 1 limit 1
        $data = Reader::where('nbofbooks','>' ,1)->first();
        return $data;
    }


    function getReadersByNbAndIdTake3(){
        // SELECT * FROM READERS WHERE nbofbooks > 0 limit 3;
        $data = Reader::where('nbofbooks','>',0)
             ->take(3)
            ->get();
        return $data;
    }


    function getReadersWhereNbGt1OrIdgt2(){
        //SELECT * FROM READERS WHERE nbofbooks>1 OR ID>2;
        $data= Reader::where('nbofbooks','>',1)
            ->OrWhere('id','>',2)
            ->get();
        return $data;
    }

    function getReaderWhereIdIn(){
        //select * from readers where id in (1,2,3)
        $data = Reader::whereIn('id',[1,2,3])
            ->get();
        return $data;
    }

    function getReadersWhereIdBetween1And3(){
        //select * from readers where id between 1 and 3;
        $data = Reader::whereBetween('id',[1,3])
            ->get();
        return $data;
    }


    function getNameFromReadersWhereNbGt1(){
        // select name from readers where nbofbooks>1;
        $data= Reader::where('nbofbooks','>',1)
            ->select(['name'])
            ->get();
        return $data;
    }

    function getNameAndBioFromReadersWhereNbGt1(){
        // select name from readers where nbofbooks>1;
        $data= Reader::where('nbofbooks','>',1)
            ->select(['name','biography'])
            ->get();
        return $data;
    }

    function getReadereOrderByIddesc(){
        // select * from readers where id>0 order by id desc
        $data = Reader::where('id','>',0)
            ->orderBy('id','desc')
            ->get();
        return $data;
    }

    function getReadereOrderByIdAsc(){
        // select * from readers where id>0 order by id asc
        $data = Reader::where('id','>',0)
            ->orderBy('id','asc')
            ->get();
        return $data;
    }

    function getReadersGroupBynbofbooks(){
        // select count(1), country from readers group by country;
        $data = Reader::select(['country',DB::raw('count(*) as total')])
            ->groupBy('country')
            ->get();
        return $data;
    }

    function getMaxNbOfBooks(){
        //select max(nbofbooks) from readers;
        $data = Reader::where('id','>',0)->max('nbofbooks');
        return $data;
    }

    function getMinNbOfBooks(){
        //select min(nbofbooks) from readers;
        $data = Reader::where('id','>',0)->min('nbofbooks');
        return $data;
    }

    function getcountNbOfBooks(){
        //select count(nbofbooks) from readers;
        $data = Reader::where('id','>',0)->count('nbofbooks');
        return $data;
    }

    function getSumNbOfBooks(){
        //select sum(nbofbooks) from readers;
        $data = Reader::where('id','>',0)->sum('nbofbooks');
        return $data;
    }

    function getAvgNbOfBooks(){
        //select avg(nbofbooks) from readers;
        $data = Reader::where('id','>',0)->avg('nbofbooks');
        return $data;
    }

    function findByIdOrFail($id){
        //select * from readers where id=?;
        $data = Reader::findOrFail($id);
        return $data;
    }

    function firstOrFail(){
        $data = Reader::where('nbofbooks','>' ,10000)->firstOrFail();
        return $data;
    }

    function findOrMessage($id){
        $data = Reader::findOr($id,function(){
            return "The id provided does not exist in the database";
        });
        return $data;
    }

    function firstOrMessage(){
        $data = Reader::where('nbofbooks','>' ,10000)->firstOr(function(){
            return "the id does not exist";
        });
        return $data;
    }


    function getJoinData(){
        // select books.title, authors.name from books, authors where books.author_id= authors.id
        $data = Author::join('books','books.author_id','authors.id')
            ->select(['books.title','authors.name'])
            ->get();
        return $data;
    }


    function getJoinData2(){
        // select books.title, authors.name from books, authors where books.author_id= authors.id
        $data = Book::join('authors','books.author_id','authors.id')
            ->select(['books.title','authors.name'])
            ->get();
        return $data;
    }


    function addReader(){
        //insert into readers values(..)
        $data = new Reader();
        $data->name='Reader 5';
        $data->biography= "This is my biography";
        $data->nbofbooks=10;
        $data->country="France";
        $data->save();
        return response()->json(["data"=>"created"]);
    }

    function addReaderFromApi(Request $request){
        $data = new Reader();
        $data->name= $request->name;
        $data->biography= $request->biography;
        $data->nbofbooks=$request->nbofbooks;
        $data->country=$request->country;
        $data->save();
        return response()->json(["data"=>"created"]);
    }

    function addReaderMethod2(){
        Reader::create([
            'name'=>"reader 8",
            'biography'=>"bio",
            'nbofbooks'=>121,
            'country'=>'Lebanon'
        ]);
        return response()->json(["data"=>"created"]);
    }


    function addReaderMethod2FromPostman(Request $request){
        Reader::create([
            'name'=>$request->name,
            'biography'=>$request->biography,
            'nbofbooks'=>$request->nbofbooks,
            'country'=>$request->country
        ]);
        return response()->json(["data"=>"created"]);
    }

    function addReader3(Request $request)
    {
        Reader::create($request->all());
        return response()->json(["data"=>"created"]);
    }
}


