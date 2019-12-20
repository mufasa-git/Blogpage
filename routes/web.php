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

Auth::routes();
Route::get('/', 'BlogController@index');
Route::resource('blogs', 'BlogController');
Route::get('/analyze', 'AnalyzeController@index')->name('analyze');
Route::group(['middleware' => ['preventbackbutton']], function(){
	Route::resource('articles', 'ArticleController');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('comments/{article_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);
	Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
});
