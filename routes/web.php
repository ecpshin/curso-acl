<?php

use App\Http\Controllers\PostController;
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

Route::prefix('/admin/posts')->name('posts.')
    ->middleware(['auth'])
    ->controller(PostController::class)
    ->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/nova-postagem', 'create')->name('create');
    Route::post('/nova-postagem', 'store')->name('store');
    Route::get('/{post}/editar-postagem', 'edit')->name('edit');
    Route::put('/{post}/editar-postagem', 'update')->name('update');
    Route::put('/{post}/excluir-postagem', 'destroy')->name('delete');
    Route::get('/{post}/exibir-postagem', 'show')->name('show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
