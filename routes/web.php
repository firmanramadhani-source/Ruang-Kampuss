<?php

use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortalController::class, 'index'])->name('portal.index');

Route::resource('program', ProgramController::class)->except('show');