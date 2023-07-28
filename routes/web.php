<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('loginView');
    })->name('login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');;
});


Route::get('/', function () {
    if (!(auth()->check())) {
        return redirect()->route('login');
    }
    return redirect()->route('home');
});

Route::get('/register', function () {
    if (!(auth()->check())) {
        return  view('registerView');
    }
    return redirect()->route('home');
});


Route::middleware('auth')->get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
