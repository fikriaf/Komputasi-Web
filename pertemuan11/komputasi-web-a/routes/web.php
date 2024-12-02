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

Route::get('/', action: function () {
    return view('home');
});

Route::get('/halo-apa-kabar', function() {
    return 'Halo apa kabar';
});

Route::get('/halo-apa-kabar/{nama}', function($nama) {
    return "Halo apa kabar<br>My name is $nama";
});

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

Route::get('/',[BiodataController::class, 'home'])->name('home');
