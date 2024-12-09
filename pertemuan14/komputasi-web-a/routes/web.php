<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;

Route::get('/', [BiodataController::class, 'index']);

Route::resource('biodatas', BiodataController::class);