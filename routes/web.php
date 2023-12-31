<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Frontend;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/portal', [App\Http\Controllers\HomeController::class, 'portal'])->name('homes');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homess');
//Route search
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/{tenant}/page/{slug}', [App\Http\Controllers\HomeController::class, 'showpage'])->name('showpage');
Route::get('/tes', Frontend::class);

