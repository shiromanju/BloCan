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

Route::get('/', 'BlogController@index');
Route::get('/blogs/create', 'BlogController@create');
Route::get('/blogs/{post}/edit', 'BlogController@edit');
Route::put('/posts/{post}', 'BlogController@update');
Route::delete('/posts/{post}', 'BlogController@destroy');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');