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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//News Routes List
Route::get('/list/create' ,'news_controller@create_form_new_list')->name('createList');
Route::post('/list/create','news_controller@store_list')->name('storeList');
Route::get('/list/all','news_controller@show_all_list')->name('showLists');
Route::get('/list/news/{id}','news_controller@show_news_post_by_list')->name('showNewsPostByList');

//News HeadLines
Route::get('/headlines/all/{id}','news_controller@show_all_headlines')->name('showAllHeadlines');
Route::delete('/headlines/delete/{id}','news_controller@delete_headlines')->name('deleteHeadlines');
Route::put('/headlines/edit/{id}','news_controller@edit_headlines')->name('editHeadlines');

//News Post Routes
Route::get('/news/create' ,'news_controller@news_post_form')->name('createNews');
Route::post('/news/create','news_controller@news_post')->name('storeNews');

//Categories
Route::get('/news/categories','news_controller@categories_display')->name('categories');
Route::get('/news/categories/add','news_controller@categories_form')->name('categories_form');
Route::post('/news/categories/add','news_controller@categories_store')->name('categories_store');
Route::delete('/news/categories/delete/{id}','news_controller@categories_delete')->name('categories_delete');
Route::get('/news/categories/edit/{id}','news_controller@categories_edit')->name('categories_edit');
Route::put('/news/categories/edit/{id}','news_controller@categories_edit_apply')->name('categories_edit_apply');

