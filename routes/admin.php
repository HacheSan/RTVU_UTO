<?php

use App\Http\Controllers\Admin\ProgramaController;
use App\Models\Programa;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
//Route::resource('/programas', ProgramaController::class)->names('admin.programas');

//Route::resource('/programas', ProgramaController::class)->names('admin.programas');
//Route::get('/programas', [ProgramaController::class, 'admin.programas']);

Route::get('/programas', function () {
    return 'prograacion de dia';
});