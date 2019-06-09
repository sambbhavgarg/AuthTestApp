<?php

use App\Services\Twitter;
use App\Repositories\UserRepository;


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
//
// app()->singleton('App\Services\Twitter',function(){
//   return new \App\Services\Twitter('Sambbhav');
// });

// Route::get('/', function (Twitter $twitter) {
//     // dd(app('foo'));
//     dd($twitter);
//     return redirect('/projects');
// });

// Route::get('/',function(UserRepository $users){
//   dd($users);
// });

Route::get('/','ProjectsController@index');

Route::resource('projects','ProjectsController');

Route::post('/projects/{project}/tasks','ProjectTaskController@store');

Route::post('completed-tasks/{task}','CompletedTasksController@store');
Route::delete('completed-tasks/{task}','CompletedTasksController@destroy');
//The following was replaced by the above for better encapsulation!
//Route::patch('/tasks/{task}','ProjectTaskController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
