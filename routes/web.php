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
Route::get('/projects', "ProjectController@index");

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/project/{project}', "ProjectController@show");
Route::post('/project/store', "ProjectController@store");
Route::put('/project/{project}', "ProjectController@update");
Route::delete('/project/{project}', "ProjectController@delete");

Auth::routes();


Route::get('/roles', function (){
    if(Gate::allows('isAdmin',auth()->user())){
        return "You have permission";
    }
    else
        return "You Dont have permission" .auth()->user();

});





