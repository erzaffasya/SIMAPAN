<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\FastLinkController;
use App\Http\Controllers\ForumArtikelController;
use App\Http\Controllers\ForumKategoriArtikelController;
use App\Http\Controllers\ForumKategoriGaleriController;
use App\Http\Controllers\ForumPengurusController;
use App\Http\Controllers\JumlahAnakController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TinyMceController;
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

Route::get('/', function () {
    return view('landingpage.portal');
});

Route::get('/portal', function () {
    return view('landingpage.portal2');
});


Route::get('/artikel-detail', function () {
    return view('landingpage.artikeldetail');
});


Route::get('/artikel-index', function () {
    return view('landingpage.artikelindex');
});

Route::get('/forum', function () {
    return view('landingpage.forum');
});
Route::get('/profil', function () {
    return view('landingpage.profil');
});
Route::get('/simapan', function () {
    return view('landingpage.simapan');
});

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Route::get('/', [LandingpageController::class, 'index'])->name('index');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('tentang', TentangController::class)->only('index', 'store');
    Route::resource('kantor', KantorController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kategori-artikel', KategoriArtikelController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('fastlink', FastLinkController::class);
    Route::resource('jumlahanak', JumlahAnakController::class)->only('index', 'store');
    Route::resource('forum-pengurus', ForumPengurusController::class);
    Route::resource('forum-kategori-artikel', ForumKategoriArtikelController::class);
    Route::resource('forum-artikel', ForumArtikelController::class);
    Route::resource('forum-kategori-galeri', ForumKategoriGaleriController::class);

    //tini=y mce upload
    Route::post('tiny-upload', [TinyMceController::class, "upload"])->name('tiny-upload');
});

require __DIR__ . '/auth.php';
