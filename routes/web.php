<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/surat');
Route::resource('surat', SuratController::class)->except('edit', 'update');
Route::get('/search/surat', [SuratController::class, 'search'])->name('surat.search');

Route::get('/about', function () {
    return view('about.index');
})->name('about.index');