<?php

use App\Http\Controllers\HalController;
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


Route::get('/', action: function () {
    return view('home');
});

Route::get('/halo-apa-kabar', function() {
    return 'Halo apa kabar';
});

Route::get('/halo-apa-kabar/{nama}', function($nama) {
    return "Halo apa kabar<br>My name is $nama";
});

// BiodataController
Route::get('/', [BiodataController::class, 'home']);
Route::get('/contact', [BiodataController::class, 'contact']);
Route::get('/about', [BiodataController::class, 'about']);

// Tanpa Controller
Route::get('/web', function(){
    return view('home');
})->name('home');

Route::get('/web/about', function() {
    return view('about');
})->name('about');

Route::get('/web/contact', function() {
    return view('contact');
})->name('contact');

// HalController
Route::get('/baru/home', [HalController::class, 'index'])->name('homebaru');
Route::get('/baru/about', [HalController::class, 'about'])->name('aboutbaru');
Route::get('/baru/contact', [HalController::class, 'contact'])->name('contactbaru');
