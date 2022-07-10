<?php

use App\Http\Controllers\TitleUserController;
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
    if (auth()->user()) {
        return redirect('/series');
    }
    return view('welcome');
});

Route::controller(TitleUserController::class)->group(function () {
    Route::get('/{type}', 'index')->where('type', 'series|filmes')->name('user.home');
    Route::get('/add/{type}', 'create')->where('type', 'series|filmes')->name('user.create');
});

Route::controller(TitleController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin');
    Route::get('/admin/{type}', 'index')->where('type', 'series|filmes')->name('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
