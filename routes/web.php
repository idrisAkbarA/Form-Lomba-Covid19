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
Route::get('/submitposter', function () {
    return view('submitposter');
});
Route::get('/takeoff', function () {
    return view('takeoff');
});
Route::get('/peserta', function () {
    return view('peserta');
});
Route::get('/privasi', function () {
    return view('privasi');
});
Route::get('/get/peserta', 'videoController@peserta');

Auth::routes();

Route::get('/testbot',function(){
    $response = Telegram::getUpdates();
    $arrId =[];
    for ($i=0; $i < sizeof($response); $i++) { 
        $id = $response[$i]['message']['from']['id'];
        if(!in_array($id,$arrId)){
            array_push($arrId,$id);
        }
    }
    for ($i=0; $i < sizeof($arrId) ; $i++) { 
        Telegram::sendMessage([
            'chat_id' => "$arrId[$i]",
            'parse_mode' => 'HTML',
            'text' => " Test message, Hinbo Love you"
        ]);
    }
   
    return $arrId;
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store/video', 'videoController@store');
Route::get('/store/poster', 'posterController@store');
