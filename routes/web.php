<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/appointments', function () {
    return view('appointments.index');
})->name('appointments');

Route::get('/patients/{id?}', function ($id = 1) {
    return view('patients.show', ['id' => $id]);
})->name('patients.show');

Route::get('/billing', function () {
    return view('billing.index');
})->name('billing');
