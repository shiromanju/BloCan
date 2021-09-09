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
Route::get('/', 'BlogController@index');
//極論blogsはなんでもいいpostsでも行ける。レストフルなURL設定を心掛ける。
//id指定の{}の中はテーブルとモデルに対応させる。小文字単数。laravelの機能diを用いる。
Route::get('/blogs/{blog}', 'BlogController@show');

// Route::post('/blogs', 'BlogController@store');
// Route::get('/blogs/create', 'BlogController@create');
// Route::get('/blogs/{blog}/edit', 'BlogController@edit');
// Route::put('/blogs/{blog}', 'BlogController@update');
// Route::delete('/blogs/{blog}', 'BlogController@destroy');