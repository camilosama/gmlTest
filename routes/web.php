<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemController;

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


Route::controller(SystemController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/roles', 'roles');
    Route::post('/dataSave', 'dataSave');
    Route::post('/userInfo', 'userInfo');
});