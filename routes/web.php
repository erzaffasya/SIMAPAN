<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FastLinkController;
use App\Http\Controllers\ForumArtikelController;
use App\Http\Controllers\ForumGaleriController;
use App\Http\Controllers\ForumKategoriArtikelController;
use App\Http\Controllers\ForumKategoriGaleriController;
use App\Http\Controllers\ForumPengurusController;
use App\Http\Controllers\ForumStrukturController;
use App\Http\Controllers\JumlahAnakController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProfilGaleriController;
use App\Http\Controllers\ProfilKategoriGaleriController;
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


Route::get('/kegiatan', [LandingpageController::class, 'kegiatanForum'])->name('kegiatan-forum');
Route::get('/kegiatan/{slug}', [LandingpageController::class, 'kegiatanForumDetail'])->name('kegiatan-forum-detail');
// Route::get('/kegiatan', function () {
//     return view('landingpage.kegiatan');
// });
// Route::get('/kegiatandetail', function () {
//     return view('landingpage.kegiatandetail');
// });

// Route::get('/artikel-index', function () {
//     return view('landingpage.artikelindex');
// });
Route::get('/reload-captcha', [LandingpageController::class, 'reloadCaptcha'])->name('reload-captcha');
Route::get('/simapan', [LandingpageController::class, 'simapan'])->name('simapan');
Route::get('/forum', [LandingpageController::class, 'forum'])->name('forum');
Route::get('/profil', [LandingpageController::class, 'profil'])->name('profil');
Route::get('/artikel', [LandingpageController::class, 'artikel'])->name('landingpage.artikel');
Route::get('/kirim-aspirasi', [AspirasiController::class, 'store'])->name('kirim-aspirasi');

Route::get('/artikel/detail/{slug}', [LandingpageController::class, 'artikelDetail'])->name('landingpage.artikeldetail');
// Route::get('/peta', function () {
//     return view('landingpage.peta');
// });
Route::get('/peta', [LandingpageController::class, 'peta'])->name('peta');
Route::get('/kluster1', function () {
    return view('landingpage.kluster1');
});

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Route::get('/', [LandingpageController::class, 'index'])->name('index');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    //CRUD
    Route::resource('tentang', TentangController::class)->only('index', 'store');
    Route::resource('aspirasi', AspirasiController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('kantor', KantorController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('kategori-artikel', KategoriArtikelController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('fastlink', FastLinkController::class);
    Route::resource('jumlahanak', JumlahAnakController::class)->only('index', 'store');
    Route::resource('forum-struktur', ForumStrukturController::class)->only('index', 'store');
    Route::resource('forum-pengurus', ForumPengurusController::class);
    Route::resource('forum-kategori-artikel', ForumKategoriArtikelController::class);
    Route::resource('forum-galeri', ForumGaleriController::class)->only("destroy");
    Route::resource('forum-artikel', ForumArtikelController::class);
    Route::resource('forum-kategori-galeri', ForumKategoriGaleriController::class);
    Route::resource('profil-kelembagaan', KelembagaanController::class)->only('index', 'store');

    //tiny mce upload
    Route::post('tiny-upload', [TinyMceController::class, "upload"])->name('tiny-upload');
});

$middleware = array_merge(\Config::get('lfm.middlewares'), [
    '\UniSharp\LaravelFilemanager\Middlewares\MultiUser',
    '\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder',
]);
$prefix = \Config::get('lfm.url_prefix', \Config::get('lfm.prefix', 'laravel-filemanager'));
$as = 'unisharp.lfm.';
$namespace = '\UniSharp\LaravelFilemanager\Controllers';

// make sure authenticated
Route::group(compact('middleware', 'prefix', 'as', 'namespace'), function () {

    // Show LFM
    Route::get('/', [
        'uses' => 'LfmController@show',
        'as' => 'show',
    ]);

    // Show integration error messages
    Route::get('/errors', [
        'uses' => 'LfmController@getErrors',
        'as' => 'getErrors',
    ]);

    // upload
    Route::any('/upload', [
        'uses' => 'UploadController@upload',
        'as' => 'upload',
    ]);

    // list images & files
    Route::get('/jsonitems', [
        'uses' => 'ItemsController@getItems',
        'as' => 'getItems',
    ]);

    // folders
    Route::get('/newfolder', [
        'uses' => 'FolderController@getAddfolder',
        'as' => 'getAddfolder',
    ]);
    Route::get('/deletefolder', [
        'uses' => 'FolderController@getDeletefolder',
        'as' => 'getDeletefolder',
    ]);
    Route::get('/folders', [
        'uses' => 'FolderController@getFolders',
        'as' => 'getFolders',
    ]);

    // crop
    Route::get('/crop', [
        'uses' => 'CropController@getCrop',
        'as' => 'getCrop',
    ]);
    Route::get('/cropimage', [
        'uses' => 'CropController@getCropimage',
        'as' => 'getCropimage',
    ]);
    Route::get('/cropnewimage', [
        'uses' => 'CropController@getNewCropimage',
        'as' => 'getCropimage',
    ]);

    // rename
    Route::get('/rename', [
        'uses' => 'RenameController@getRename',
        'as' => 'getRename',
    ]);

    // scale/resize
    Route::get('/resize', [
        'uses' => 'ResizeController@getResize',
        'as' => 'getResize',
    ]);
    Route::get('/doresize', [
        'uses' => 'ResizeController@performResize',
        'as' => 'performResize',
    ]);

    // download
    Route::get('/download', [
        'uses' => 'DownloadController@getDownload',
        'as' => 'getDownload',
    ]);

    // delete
    Route::get('/delete', [
        'uses' => 'DeleteController@getDelete',
        'as' => 'getDelete',
    ]);

    // Route::get('/demo', 'DemoController@index');
});

Route::group(compact('prefix', 'as', 'namespace'), function () {
    // Get file when base_directory isn't public
    $images_url = '/' . \Config::get('lfm.images_folder_name') . '/{base_path}/{image_name}';
    $files_url = '/' . \Config::get('lfm.files_folder_name') . '/{base_path}/{file_name}';
    Route::get($images_url, 'RedirectController@getImage')
        ->where('image_name', '.*');
    Route::get($files_url, 'RedirectController@getFile')
        ->where('file_name', '.*');
});

require __DIR__ . '/auth.php';