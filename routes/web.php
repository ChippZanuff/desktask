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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/desk', 'DeskController@index')->name('desk')->middleware('auth');
Route::get('/cabinet', 'CabinetController@index')->name('cabinet')->middleware('auth');
Route::post('/reset_password', 'CabinetController@resetPassword')->name('change_password')->middleware('auth');
Route::post('/reset_email', 'CabinetController@resetEmail')->name('change_email')->middleware('auth');
Route::post('/create', 'DeskController@createDeskItem')->name('create')->middleware('auth');
Route::post('/delete', 'DeskController@deleteDeskItem')->name('delete')->middleware('auth');
Route::post('/edit', 'EditDeskController@index')->name('edit')->middleware('auth');
Route::post('/editItem', 'EditDeskController@EditDeskItem')->name('editItem')->middleware('auth');