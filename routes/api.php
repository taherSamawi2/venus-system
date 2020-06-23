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
auth()->loginUsingId(1);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('/projects', "ProjectController@index")->middleware('can:Project_viewAny');
    Route::get('/project/{project}',"ProjectController@show")->middleware('can:Project_view');
    Route::post('/project/store',"ProjectController@store")->middleware('can:Project_create');
    Route::put('/project/{project}',"ProjectController@update")->middleware('can:Project_update');
    Route::delete('/project/{project}',"ProjectController@delete")->middleware('can:Project_delete');


    Route::get('/customers', "CustomerController@index");
    Route::get('/customer/{customer}', "CustomerController@show");
    Route::post('/customer/store', "CustomerController@store");
    Route::put('/customer/{customer}', "CustomerController@update");
    Route::delete('/customer/{customer}', "CustomerController@delete");

    Route::get('/contacts', "CustomerContactsController@index");
    Route::post('/contact/store', "CustomerContactsController@store");
    Route::get('/contact/{contact}', "CustomerContactsController@show");
    Route::put('/contact/{contact}', "CustomerContactsController@update");
    Route::delete('/contact/{contact}', "CustomerContactsController@delete");

    Route::get('/groups', "GroupController@index");
    Route::post('/group/store', "GroupController@store");
    Route::get('/group/{group}', "GroupController@show");
    Route::put('/group/{group}', "GroupController@update");
    Route::delete('/group/{group}', "GroupController@delete");

    Route::get('/tags', "TagController@index");
    Route::post('/tag/store', "TagController@store");
    Route::get('/tag/{tag}', "TagController@show");
    Route::put('/tag/{tag}', "TagController@update");
    Route::delete('/tag/{tag}', "TagController@delete");


    Route::get('/getAllCountries', function()
    {
        return Countries::getList('en', 'json');
    });





