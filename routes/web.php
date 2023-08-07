<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');

//-------------------------------- Project

Route::post('/project',[ProjectController::class, 'store'])->middleware(['auth','verified']);
Route::get('/trash/{id}/{nro}', [ProjectController::class, 'toTrashed'])->name('totrash');
Route::get('/tocompleted/{id}', [ProjectController::class, 'toCompleted'])->name('toCompleted');
Route::get('/begin/{id}/work', [ProjectController::class, 'work'])->middleware(['auth','verified'])->name('project.work');
Route::get('/project/{id}/work', [ProjectController::class, 'showWork'])->middleware(['auth','verified'])->name('project.showork');

//views
Route::get('/pending', [ProjectController::class, 'pending'])->middleware(['auth','verified'])->name('pending');
Route::get('/completed', [ProjectController::class, 'completed'])->middleware(['auth','verified'])->name('completed');
Route::get('/trashed', [ProjectController::class, 'trashed'])->middleware(['auth','verified'])->name('trashed');
Route::get('/show/{id}/project', [ProjectController::class, 'showProject'])->middleware(['auth','verified'])->name('showProject');

//-------------------------------- Actions
Route::post('/action/{idproj}',[ActionController::class, 'store'])->middleware(['auth','verified']);
Route::delete('/action/{id}/{proj}', [ActionController::class, 'delAction'])->middleware(['auth','verified'])->name('delAction');
Route::delete('/delete/{list}', [ActionController::class, 'delete'])->middleware(['auth','verified'])->name('delete');
Route::delete('/deleteOne/{id}', [ActionController::class, 'deleteOne'])->middleware(['auth','verified'])->name('deleteOne');

//-------------------------------- Delete account
Route::get('/del-account',[UserController::class, 'deleteAccount'])->name('deleteAccount');