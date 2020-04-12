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
Route::get('/clear-c', 'clear@clear');
Route::get('/clear-r', function(){ 
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});
Route::get('/migrate-r', function(){ 
    Artisan::call('migrate:fresh');
    return "Migrated";
});

Auth::routes();

Route::get('/uploadexcel',function(){
    return view('uploadexcel');
});
Route::get('/downloadexcel',"mahasiswaController@getExcel");
Route::get('/uploadexcelX',function(){
    return view('uploadexcelX');
});
Route::post('/upload',"mahasiswaController@store");
Route::post('/uploadX',"mahasiswaController@storeX");

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
   
    return $response;
    return $arrId;
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/store/video', 'videoController@store');
Route::get('/store/poster', 'posterController@store');

// $updates = Telegram::getWebhookUpdates();



// Example of POST Route:
Route::get('/viewsetwebhook', function () {
   return view("setwebhook");
});
Route::get('/setwebhook', function () {
    Telegram::setwebhook([
        "url" => "https://lomba.ikarin.site/933224605:AAHSQ7mQZfirfXTsDcRpd9PKHaSJgLp-aZ0"
    ]);
});
Route::get('/delwebhook', function () {
    Telegram::deleteWebhook();
});
Route::post('/933224605:AAHSQ7mQZfirfXTsDcRpd9PKHaSJgLp-aZ0', function () {
    // $updates = Telegram::getWebhookUpdates();
    Telegram::sendMessage([
        'chat_id' => "468613362",
        'parse_mode' => 'HTML',
        'text' => " Test message from webhook update, Hinbo Love you"
    ]);

    return 'ok';
});
