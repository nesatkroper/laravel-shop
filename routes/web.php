<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('test');
})->name('test');


Route::resource('pro', 'App\Http\Controllers\app\ProductController');
Route::get('pro/{get}/add', [App\Http\Controllers\app\ProductController::class, 'add'])->name('pro.add');
Route::post('pro/{post}/addto', [App\Http\Controllers\app\ProductController::class, 'addto'])->name('pro.addto');
