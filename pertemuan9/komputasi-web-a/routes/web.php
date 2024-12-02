<?php

use App\Http\Controllers\BiodataController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo-apa-kabar', function() {
    return 'Halo apa kabar';
});

Route::get('/halo-apa-kabar/{nama}', function($nama) {
    return "Halo apa kabar<br>My name is $nama";
});
Route::get('/home', [BiodataController::class, 'home']);
Route::get('/about', [BiodataController::class, 'about']);