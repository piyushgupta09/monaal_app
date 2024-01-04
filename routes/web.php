<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel::pages.welcome');
})->name('panel.welcome');
