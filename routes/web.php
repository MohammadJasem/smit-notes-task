<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index')->name('home');

Route::resource('notes', 'NotesController');
Route::get('notes/view/{slug}', 'NotesController@view');
Route::get('my-notes', 'NotesController@myNotes');
Route::resource('comments', 'CommentsController');

Auth::routes();
