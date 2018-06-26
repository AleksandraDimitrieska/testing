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

Route::get('/Technology/Create', 'TechnologyController@create')->name('createTechnology');

Route::get('/', 'TechnologyController@index');
Route::get('/Technology/{id}', 'TechnologyController@single')->name('singleTechnology');
Route::post('/Save', 'TechnologyController@save')->name('saveTechnology');
Route::get('/Edit/{id}', 'TechnologyController@edit')->name('editTechnology');
Route::put('/Update/{id}', 'TechnologyController@update')->name('updateTechnology');

Route::post('/questions/IsPublished/{id}', 'QuestionController@isPublished')->name('publish');
Route::get('/Search/{id}', 'TechnologyController@search')->name('searchTechnology');

Route::get('/Tag/Create', 'TagController@create')->name('createTag');
Route::post('/SaveTag', 'TagController@save')->name('saveTag');
Route::get('/tags', 'TagController@index')->name('allTags');
Route::get('/Tag/{id}', 'TagController@single')->name('singleTag');
Route::get('/TagEdit/{id}', 'TagController@edit')->name('editTag');
Route::put('/TagUpdate/{id}', 'TagController@update')->name('updateTag');

Route::get('/Book/Create', 'BookController@create')->name('createBook');
Route::post('/Book/Save', 'BookController@save')->name('saveBook');
Route::get('/Books', 'BookController@index')->name('allBooks');
Route::get('/Book/{id}', 'BookController@single')->name('singleBook');
Route::get('/BookEdit/{id}', 'BookController@edit')->name('editBook');
Route::post('/BookUpdate/{id}', 'BookController@update')->name('updateBook');