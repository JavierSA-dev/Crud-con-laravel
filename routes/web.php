<?php

use Illuminate\Support\Facades\Auth;
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
    return view('layouts.app');
});

Auth::routes();
Route::get('/todos', [App\Http\Controllers\TodosController::class, 'index'])->name('home');

Route::get('/todos/edit/{id}', [App\Http\Controllers\TodosController::class, 'edit'])->name('todos.edit');

Route::post('/todos/edit/{id}', [App\Http\Controllers\TodosController::class, 'edit'])->name('todos.edit');

Route::delete('/todos/destroy/{id}', [App\Http\Controllers\TodosController::class, 'destroy'])->name('todos.destroy');

Route::get('/todos/create', [App\Http\Controllers\TodosController::class, 'create'])->name('todos.create');

Route::post('/todos/create', [App\Http\Controllers\TodosController::class, 'create'])->name('todos.create');