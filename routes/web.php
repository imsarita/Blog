<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/blogs/{id}', [BlogController::class, 'index'])->name('blog.index');
Route::post('/blogs/create/', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blogs/{id}/edit/', [BlogController::class, 'edit'])->name('blog.edit');
Route::delete('/blogs/{id}/delete', [BlogController::class, 'delete'])->name('blog.delete');
