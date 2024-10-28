 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
 use App\Http\Controllers\ResourceController;
 use App\Http\Controllers\ApiController;
 use App\Http\Controllers\InvokableController;
 use App\Http\Controllers\RelationshipController;
 use App\Http\Controllers\ReaderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('first-route',function(){
    return "Hello this is my first route";
});

Route::get('second-route',function (){
    return 12345;
});

 Route::get('third-route',function (){
     return true;
 });

 Route::get('route4',function(){
     return response()->json(['name'=>'ali ibrahim','gender'=>'male']);
 });

 Route::get('route-with-header',function(){
     return response()->json(['message'=>'this is my route with headers'])
         ->header('mykey','this is my secret key');
 });


 Route::get('route-with-headers',function(){
     return response()->json(['message'=>'this is my route with headers'])
         ->header('mykey1','this is my secret key')
         ->header('mykey2','this is my secret key 2');
 });

 Route::get('route-with-headers-method-2',function(){
     return response()->json(['message'=>'this is my route with headers'])
     ->withHeaders([
         'key1'=>'hello',
         'key2'=>'team'
     ]);
 });


 Route::get('route5/{id}',function($id){
   return "the parameter is:" .$id;
 });

 Route::get('route6/{id}/{name}',function($id,$name){
     return "the parameter is:" .$id ." and the name is:".$name;
 });


Route::get('route7/{id?}',function($id=0){
    return "the parameter is:" .$id;
});


Route::get('route-eight',function(){
    return "hi";
})->name('my-route');


Route::get('route9',[FirstController::class,'myfunction']);
//same as the above
Route::get('route11','App\Http\Controllers\FirstController@myfunction');

Route::get('route10',[FirstController::class,'myfunction2']);
 //same as the above
 Route::get('route12','App\Http\Controllers\FirstController@myfunction2')->name('route-name');

//deprecated
Route::get('old-route-dont-use',[
   'uses'=>'App\Http\Controllers\FirstController@myfunction',
    'as'=>'route-name'
]);

Route::get('route13',[FirstController::class,'myfunction3']);
Route::resource('test',ResourceController::class);
// Route::resource('test',ResourceController::class)->only(['index','create']);
// Route::resource('test',ResourceController::class)->except(['index','create']);
Route::apiResource('api',ApiController::class);
Route::get('invokable',InvokableController::class);


Route::post('route-14',[FirstController::class,'myfunction4']);
Route::put('route-15',[FirstController::class,'myfunction4']);


Route::get('test1',[RelationshipController::class,'getBooksFromAuthor']);
 Route::get('test2',[RelationshipController::class,'getAuthorFromBook']);
 Route::get('test3',[RelationshipController::class,'getDetailsFromBook']);
 Route::get('test4',[RelationshipController::class,'getBookFromDetails']);
 Route::get('test5',[RelationshipController::class,'getReadersFromBook']);
 Route::get('test6',[RelationshipController::class,'getBooksFromReader']);


Route::get('getAllReaders',[ReaderController::class,'getAllReaders']);
Route::get('getReaderById/{id}',[ReaderController::class,'getReaderById']);
Route::get('getReadersHavingNb1',[ReaderController::class,'getReadersHavingNb1']);
Route::get('getReadersHavingNbgt1',[ReaderController::class,'getReadersHavingNbgt1']);
Route::get('getReadersByNbAndId',[ReaderController::class,'getReadersByNbAndId']);
Route::get('getReadersHavingNbgt1Take1',[ReaderController::class,'getReadersHavingNbgt1Take1']);
Route::get('getReadersByNbAndIdTake3',[ReaderController::class,'getReadersByNbAndIdTake3']);
Route::get('getReadersWhereNbGt1OrIdgt2',[ReaderController::class,'getReadersWhereNbGt1OrIdgt2']);
Route::get('getReaderWhereIdIn',[ReaderController::class,'getReaderWhereIdIn']);
Route::get('getReadersWhereIdBetween1And3',[ReaderController::class,'getReadersWhereIdBetween1And3']);
Route::get('getNameFromReadersWhereNbGt1',[ReaderController::class,'getNameFromReadersWhereNbGt1']);
Route::get('getNameAndBioFromReadersWhereNbGt1',[ReaderController::class,'getNameAndBioFromReadersWhereNbGt1']);
Route::get('getReadereOrderByIddesc',[ReaderController::class,'getReadereOrderByIddesc']);
 Route::get('getReadereOrderByIdAsc',[ReaderController::class,'getReadereOrderByIdAsc']);
 Route::get('getReadersGroupBynbofbooks',[ReaderController::class,'getReadersGroupBynbofbooks']);
 Route::get('getMaxNbOfBooks',[ReaderController::class,'getMaxNbOfBooks']);
 Route::get('getMinNbOfBooks',[ReaderController::class,'getMinNbOfBooks']);
 Route::get('getcountNbOfBooks',[ReaderController::class,'getcountNbOfBooks']);

 Route::get('getSumNbOfBooks',[ReaderController::class,'getSumNbOfBooks']);
 Route::get('getAvgNbOfBooks',[ReaderController::class,'getAvgNbOfBooks']);
 Route::get('findByIdOrFail/{id}',[ReaderController::class,'findByIdOrFail']);

 Route::get('firstOrFail',[ReaderController::class,'firstOrFail']);

 Route::get('findOrMessage/{id}',[ReaderController::class,'findOrMessage']);
 Route::get('firstOrMessage',[ReaderController::class,'firstOrMessage']);
 Route::get('getJoinData',[ReaderController::class,'getJoinData']);
 Route::get('getJoinData2',[ReaderController::class,'getJoinData2']);
 Route::get('addReader',[ReaderController::class,'addReader']);
 Route::post('addReaderFromApi',[ReaderController::class,'addReaderFromApi']);

 Route::get('addReaderMethod2',[ReaderController::class,'addReaderMethod2']);
 Route::post('addReaderMethod2FromPostman',[ReaderController::class,'addReaderMethod2FromPostman']);
 Route::post('addReader3',[ReaderController::class,'addReader3']);



