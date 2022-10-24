<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return "programacionde dia";
})->name('programas.home');