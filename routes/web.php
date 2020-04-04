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

Route::get('/', function () {
    return view('home');
});

Route::get('/testapi', function () {
    return view('testapi');
});
Route::get('/submit', function () {
    return view('submit');
});
Route::get('/takeoff', function () {
    return view('takeoff');
});
Route::get('/peserta', function () {
    return view('peserta');
});
Route::get('/get/peserta', 'videoController@peserta');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store/video', 'videoController@store');
Route::get('/store/poster', 'posterController@store');
