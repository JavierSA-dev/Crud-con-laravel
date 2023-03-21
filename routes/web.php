<?php

use Illuminate\Routing\Router;
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

    return view('index');
});

Auth::routes();


Route::get('/todos', [App\Http\Controllers\TodosController::class, 'index'])->name('todos.show')->middleware('logged');

Route::post('/todos', [App\Http\Controllers\TodosController::class, 'index'])->name('todos.show')->middleware('logged');

Route::get('/todos/edit/{id}', [App\Http\Controllers\TodosController::class, 'edit'])->name('todos.edit')->middleware('permission');

Route::post('/todos/edit/{id}', [App\Http\Controllers\TodosController::class, 'edit'])->name('todos.edit')->middleware('permission');

Route::post('/todos/check/{id}', [App\Http\Controllers\TodosController::class, 'check'])->name('todos.check')->middleware('permission');

Route::get('/todos/destroy/{id}', [App\Http\Controllers\TodosController::class, 'destroy'])->name('todos.destroy')->middleware('permission');

Route::get('/todos/create', [App\Http\Controllers\TodosController::class, 'create'])->name('todos.create')->middleware('permission');

Route::post('/todos/create', [App\Http\Controllers\TodosController::class, 'create'])->name('todos.create')->middleware('permission');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.show')->middleware('permission');

Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit')->middleware('permission');

Route::post('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit')->middleware('permission');

Route::get('/users/destroy/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy')->middleware('permission');

Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create')->middleware('permission');

Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.show')->middleware('permission');

Route::get('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categories.create')->middleware('permission');

Route::post('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categories.create')->middleware('permission');

Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('categories.edit')->middleware('permission');

Route::post('/categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('categories.edit')->middleware('permission');

Route::get('/categories/destroy/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('categories.destroy')->middleware('permission');

