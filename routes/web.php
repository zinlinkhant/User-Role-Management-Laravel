<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/users', function () {
    return view('user');
})->name('user');
Route::get('/roles', function () {
    return view('role');
})->name('role');
Route::get('/permissions', function () {
    return view('permission');
})->name('permission');
