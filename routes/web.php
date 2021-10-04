<?php
use Illuminate\Support\Facades\Route;

/*
Route::get('/','PostController@index');|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::httpメソッド(URL,使われるコントローラー@そのメソッド)
Route::get('/', 'BlogController@index')->middleware('auth');
Route::POST('/blogs/search', 'BlogController@search')->name('blogs.search');
//順番が大事。1つに定まるものは先に{}系の複数当てはまるものは後にする。
Route::get('/blogs/create', 'BlogController@create');
Route::post('/blogs', 'BlogController@store');
//画像ファイルをアップロードするボタンを設置するページへのルーティング
Route::get('/upload/image', 'ImageController@input');
//画像ファイルをアップロードする処理のルーティング
Route::post('/upload/image', 'ImageController@upload');
//アップロードした画像ファイルを表示するページのルーティング
Route::get('/output/image', 'ImageController@output');
//極論blogsはなんでもいいpostsでも行ける。レストフルなURL設定を心掛ける。
//id指定の{}の中はテーブルとモデルに対応させる。小文字単数。laravelの機能diを用いる。
Route::get('/blogs/{blog}/edit', 'BlogController@edit');
Route::put('/blogs/{blog}', 'BlogController@update');
Route::get('/blogs/{blog}', 'BlogController@show');
Route::delete('/blogs/{blog}', 'BlogController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('blogs/{blog}/favorites', 'FavoriteController@store')->name('favorites');
Route::post('blogs/{blog}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');