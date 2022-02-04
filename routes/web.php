<?php

use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/{any}', function () {
    return view('dashboard');
})->where("any", ".*");
