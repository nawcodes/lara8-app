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
    return view('welcome');
});

Route::group(['prefix' => 'telegram'], function() {
    Route::get('/', 'App\Http\Controllers\TelegramController@index');
    Route::get('/send_message', 'App\Http\Controllers\TelegramController@sendMessage');
    Route::get('/set_webhook', 'App\Http\Controllers\TelegramController@setWebhook');
    Route::post('webhook/{token}', 'App\Http\Controllers\TelegramController@webhook');
});
