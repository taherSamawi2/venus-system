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

Route::get('/api/client', 'ClientController@index');


Route::group(['prefix'=>'admin'],function (){

    Route::get('/projects', "ProjectController@index")->name('projects.index');
    Route::get('/project/create', "ProjectController@create") ->name('project.create');
    Route::post('/project/store', "ProjectController@store")->name('project.store');
    Route::get('/project/{project}', "ProjectController@show")->name('project.show');
    Route::get('/project/{project}/edit', "ProjectController@edit")->name('project.edit');
    Route::put('/project/{project}', "ProjectController@update")->name('project.update');
    Route::delete('/project/{project}', "ProjectController@delete")->name('project.delete');

    Route::get('/customers', "CustomerController@index")->name('Customers.index');
    Route::get('/customer/create', "CustomerController@create") ->name('Customer.create');
    Route::post('/customer/store', "CustomerController@store")->name('Customer.store');
    Route::get('/customer/{customer}', "CustomerController@show")->name('Customer.show');
    Route::get('/customer/{customer}/edit', "CustomerController@edit")->name('Customer.edit');
    Route::put('/customer/{customer}', "CustomerController@update")->name('Customer.update');
    Route::delete('/customer/{customer}', "CustomerController@delete")->name('Customer.delete');

    Route::get('/contacts', "ContactController@index")->name('Contacts.index');
    Route::get('/contact/create', "ContactController@create") ->name('Contact.create');
    Route::post('/contact/store', "ContactController@store")->name('Contact.store');
    Route::get('/contact/{contact}', "ContactController@show")->name('Contact.show');
    Route::get('/contact/{contact}/edit',"ContactController@edit")->name('Contact.edit');
    Route::put('/contact/{contact}', "ContactController@update")->name('Contact.update');
    Route::delete('/contact/{contact}', "ContactController@delete")->name('Contact.delete');

    Route::get('/groups', "GroupController@index")->name('Groups.index');
    Route::get('/group/create', "GroupController@create") ->name('Group.create');
    Route::post('/group/store', "GroupController@store")->name('Group.store');
    Route::get('/group/{group}', "GroupController@show")->name('Group.show');
    Route::get('/group/{group}/edit', "GroupController@edit")->name('Group.edit');
    Route::put('/group/{group}', "GroupController@update")->name('Group.update');
    Route::delete('/group/{group}', "GroupController@delete")->name('Group.delete');

    Route::get('/tags', "TagController@index")->name('Tags.index');
    Route::get('/tag/create', "TagController@create") ->name('Tag.create');
    Route::post('/tag/store', "TagController@store")->name('Tag.store');
    Route::get('/tag/{tag}', "TagController@show")->name('Tag.show');
    Route::get('/tag/{tag}/edit', "TagController@edit")->name('Tag.edit');
    Route::put('/tag/{tag}', "TagController@update")->name('Tag.update');
    Route::delete('/tag/{tag}', "TagController@delete")->name('Tag.delete');


    Route::get('/getAllCountries', function()
    {
        return Countries::getList('en', 'json');
    });

    Route::get('/c', function()
    {
        return Countries::where('name.common', 'United States')->first()->currency;
    });



});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');



