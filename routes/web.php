 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
 use App\Http\Controllers\ResourceController;
 use App\Http\Controllers\ApiController;
 use App\Http\Controllers\InvokableController;
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


