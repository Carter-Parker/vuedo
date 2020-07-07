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

/*frontend. Normally I would make more effort to keep the fron end and back end seperate.
For such a small app however I'm not going to bother.
*/
Route::get('/', 'FETaskController@index')->name('index');

Auth::routes(['register' => false]);

//backend
Route::resource('tasks', 'TaskController');

Route::redirect('/home', '/tasks');
