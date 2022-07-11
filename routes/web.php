<?php

use App\Http\Controllers\TitleController;
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
    Route::get('/{type}', 'index')->where('type', 'series|filmes')->name('users.index');
    Route::get('/adicionar/titulo/{type}', 'addTitle')->where('type', 'series|filmes')->name('users.create');
    Route::post('/armazenar/titulo', 'userStoreOrUpdate')->name('users.store');
});

Route::controller(TitleController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin');
    Route::get('/admin/{type}', 'index')->where('type', 'series|filmes')->name('admin.index');
    Route::get('/admin/criar/{type}', 'create')->where('type', 'serie|filme')->name('admin.create');
    Route::post('/admin/armazenar', 'store')->name('admin.store');
    Route::get('/admin/editar/{id}', 'edit')->where('id', '[0-9]+')->name('admin.edit');
    Route::put('/admin/update', 'update')->name('admin.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
