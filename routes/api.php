<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

// ---> Rutas de prueba para uso de scopes
Route::group(['middleware' => ['auth:api', 'scope:get-post']], function (){
   Route::get('posts', function (){
       return App\Post::all();
   });
});

Route::group(['middleware' => ['auth:api', 'scope:get-two-posts']], function (){
    Route::get('two-posts', function (){
        return App\Post::limit(2)->get();
    });
});// Rutas de prueba para uso de scopes <----


// ---> Rutas para passport external manual admin
Route::get('posts', function(){
   return App\Post::all();
})->middleware('auth:api');

Route::get('clients/posts', function (){
    return App\Post::all();
})->middleware('client');

Route::post('clients/posts', function (Request $request){
    App\Post::create([
        'title' => $request->input('tittle'),
        'body' => $request->input('body')
    ]);
    return ['status' => 200];
})->middleware('client'); //  Rutas para passport external manual admin <---

