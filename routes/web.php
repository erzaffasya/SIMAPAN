<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FastLinkController;
use App\Http\Controllers\ForumPengurusController;
use App\Http\Controllers\JumlahAnakController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\TentangController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/', [LandingpageController::class, 'index'])->name('index');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('tentang', TentangController::class)->only('index', 'store');
    Route::resource('kantor', KantorController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kategori-artikel', KategoriArtikelController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('fastlink', FastLinkController::class);
    Route::resource('jumlahanak', JumlahAnakController::class)->only('index', 'store');
    Route::resource('forum-pengurus', ForumPengurusController::class);
});

require __DIR__ . '/auth.php';