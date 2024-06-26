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
Route::get('/post/{slug}', [App\Http\Controllers\HomeController::class, 'showpostportal'])->name('showpostportal');
//Route search
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/{tenant}/page/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/{tenant}/page/galeri', [App\Http\Controllers\HomeController::class, 'galeri'])->name('galeri');
Route::get('/{tenant}/galeri/{slug}', [App\Http\Controllers\HomeController::class, 'singlegaleri'])->name('singlegaleri');
Route::get('/{tenant}/page/{slug}', [App\Http\Controllers\HomeController::class, 'showpage'])->name('showpage');
Route::get('/{tenant}/post/{slug}', [App\Http\Controllers\HomeController::class, 'showpost'])->name('showpost');
Route::get('/{tenant}/pelayanan', [App\Http\Controllers\HomeController::class, 'showlistpelayanan'])->name('showlistpelayanan');
Route::get('/{tenant}/pelayanan/{slug}', [App\Http\Controllers\HomeController::class, 'showpelayanan'])->name('showpelayanan');
Route::get('/{tenant}/sarana', [App\Http\Controllers\HomeController::class, 'showsarana'])->name('showsarana');
Route::get('/{tenant}/pengaduan', [App\Http\Controllers\HomeController::class, 'showpengaduan'])->name('showpengaduan');
Route::get('/tes', Frontend::class);
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
});
Route::get('/clearcache', function () {
    Artisan::call('route:clear');
});
