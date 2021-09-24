<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
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
    // event(new App\Events\RealTimeMessage('Hello World'));
    return view('welcome');
});

Route::get('/ejecutar', [DashboardController::class, 'index']);


Route::get('/chat1', function () {
    // event(new App\Events\RealTimeMessage('Hello World'));
    return view('chat1');
});
Route::get('/chat2', function () {
    // event(new App\Events\RealTimeMessage('Hello World'));
    return view('chat2');
});

Route::post('/sendchat', [ChatController::class, 'sendChat']);