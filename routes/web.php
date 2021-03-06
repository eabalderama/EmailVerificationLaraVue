<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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
    return view('login');
})->name('login');

Route::get('/apply', function () {
    return view('apply');
})->name('apply');

Route::get('/submit', [RegisterController::class, 'create'])->name('submit');
Route::post('/verify', [RegisterController::class, 'verify'])->name('verify');
Route::get('/resend', [RegisterController::class, 'resend'])->name('resend');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');