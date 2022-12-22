<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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
Route::get('/', [TodoController::class, 'index'])->name('home');
Route::get('/error', [TodoController::class, 'error'])->name('error');
Route::get('/login', [TodoController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [TodoController::class, 'loginS'])->middleware('guest');
Route::get('/register', [TodoController::class, 'register'])->middleware('guest');
Route::get('/logout', [TodoController::class, 'logout'])->name('logout');
Route::post('/register', [TodoController::class, 'store'])->middleware('guest');

Route::get('/dashboard', [TodoController::class, 'dashboard'])->middleware('auth', 'CekRole:user,admin')->name('dashboard');
Route::get('/dashboard/completed', [TodoController::class, 'completed'])->middleware('auth', 'CekRole:user')->name('completed');
Route::get('/dashboard/todo/edit/{id}', [TodoController::class, 'edit'])->middleware('auth', 'CekRole:user')->name('todo-edit');
Route::get('/dashboard/add', [TodoController::class, 'createTodo'])->middleware('auth', 'CekRole:user')->name('add');
Route::post('/dashboard/todo/update/{id}', [TodoController::class, 'UpdateTodo'])->middleware('auth', 'CekRole:user')->name('UpdateTodo');
Route::post('/dashboard/add/posts', [TodoController::class, 'addTodo'])->middleware('auth', 'CekRole:user')->name('addTodo');
Route::post('/dashboard/upd/post', [TodoController::class, 'todoUnComplete'])->middleware('auth', 'CekRole:user')->name('todoUnComplete');
Route::post('/dashboard/add/post', [TodoController::class, 'todoComplete'])->middleware('auth', 'CekRole:user')->name('todoComplete');

Route::get('/dashboard/profile', [UserController::class, 'index'])->middleware('auth', 'CekRole:admin,user')->name('dashboard.profile');
Route::post('/dashboard/profile/update/{id}', [UserController::class, 'update'])->middleware('auth', 'CekRole:admin,user')->name('dashboard.profile.update');
Route::get('/dashboard/users', [UserController::class, 'users'])->middleware('auth', 'CekRole:admin,user')->name('dashboard.users');