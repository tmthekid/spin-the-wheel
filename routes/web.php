<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('home');
Route::post('/', [AppController::class, 'search'])->name('search');
Route::get('client', [AppController::class, 'getClient'])->name('get.client');
Route::post('client', [AppController::class, 'saveClient'])->name('post.client');
Route::get('distributor', [AppController::class, 'getDistributor'])->name('get.distributor');
Route::post('distributor', [AppController::class, 'saveDistributor'])->name('post.distributor');
Route::get('wheel', [AppController::class, 'getWheel'])->name('get.wheel');
Route::post('wheel', [AppController::class, 'saveWheel'])->name('post.wheel');
Route::get('code', [AppController::class, 'getCode'])->name('get.code');
Route::get('results', [AppController::class, 'getResults'])->name('get.results');
Route::get('pdf', [AppController::class, 'downloadPDF'])->name('dowload.pdf');