<?php

use App\Task;
use Illuminate\Http\Request;

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

//Route::get('/', function () {
//    return view('welcome');
//});

// список :
 Route::get ('/', 'TaskController@show');
    

// добавить task :
 Route::post ('/task', 'TaskController@create');
  

// удалить task:
 Route::delete ('/task/{id}', 'TaskController@delete');

Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');

/*
Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

Route::get('/tasks', 'TaskController@show');
Route::post('/task', 'TaskController@create');
Route::delete('/task/{id}', 'TaskController@delete');
// Route::auth();
});
*/

















//Route::get ('/tasks', function () {
//    $tasks = App\Task::all();

    // dd($tasks);
  
//    return redirect('/');
//  });


/*
Route::match(['get', 'post'], '/', function () {
    return view('welcome');
});
*/

/*
Route::post('/com', function () {
    print_r($_POST);
});
*/


