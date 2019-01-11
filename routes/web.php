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

//Route::get('/', function () {
//    return view('welcome');
//});


// список :
Route::get ('/', function () {
    return view ('tasks', ['tasks' => Task::orderBy('created_at', 'asc')->get()]);

});

// добавить task :
Route::post ('/task', function (Request $request) {
    $validator = Validator::make($request->all(), ['name' => 'required|max:255']);

    if ($validator->fails()) {
        return redirect('/')->withInput()->withErrors($validator);
    }
    // Создание задачи
    $task = new Task;
    $task->name = $request->name;
    $task->save();

  return redirect('/');
});

// удалить task:
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();
    return redirect('/');
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
