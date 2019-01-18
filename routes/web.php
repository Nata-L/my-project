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

// list :
Route::get ('/', 'TaskController@show');
    

// add task :
Route::post ('/task', 'TaskController@create');
  

// delete task:
Route::delete ('/task/{id}', 'TaskController@delete');

// set status:
Route::post ('/task/{id}', 'TaskController@setStatus')->name('completed');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
