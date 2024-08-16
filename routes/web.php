<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'index')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('register');
});
Route::controller(SessionController::class)->group(function (){
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'store')->name('login');
    Route::post('/logout', 'destroy')->name('logout');
});
Route::controller(TaskController::class)->group(function (){
   Route::get('/tasks', 'index')->name('tasks')->middleware('auth');
    Route::get('/tasks/{id}', 'show')->middleware('auth');


    Route::post('/tasks', 'store');
    Route::post('/tasks/{id}', 'complete');
    Route::delete('/tasks/{id}', 'destroy');
    Route::patch('/tasks/{id}', 'update');
});
Route::get('/tasks/completed/tasks', [TaskController::class, 'completed'])->name('completed')->middleware('auth');
