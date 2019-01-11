<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view('welcome');
 });

// список :
//Route::get ('/', function () {
   // return view ('tasks');
//});

// добавить task :
Route::post ('/task', function (Request $request) {
    //
});

// удалить task:
Route::delete ('/task/{task}', function (Task $task) {
    //
});


// Route::get('/about/{id}', 'SearchController@show' );

/*
Route::match(['get', 'post'], '/', function () {
    return view('welcome');
});
*/

// Route::get('/test', 'SearchController@curlGet');

//Route::get('/env', function () {
    
    // print_r($_ENV);    pustoy massiv
    //  echo config('app.locale');
     // echo Config::get('app.locale');
    // echo env('APP_ENV');
// });

/*
Route::post('/com', function () {
    print_r($_POST);
});
*/
