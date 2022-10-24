<?php

use App\Http\Controllers\Admin\ProgramaController;
use App\Models\Programa;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
Route::resource('/programas', ProgramaController::class)->names('admin.programas');