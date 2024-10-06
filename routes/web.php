<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ArtikelKlusterController;
use App\Http\Controllers\ArtikelKlusterDetailController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\EmergencyController;
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
use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\KebijakanDetailController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\Kluster1Controller;
use App\Http\Controllers\Kluster2Controller;
use App\Http\Controllers\Kluster3Controller;
use App\Http\Controllers\Kluster4Controller;
use App\Http\Controllers\Kluster5Controller;
use App\Http\Controllers\KlusterController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LayananPengasuhAnakController;
use App\Http\Controllers\PemberdayaanMasyarakatController;
use App\Http\Controllers\PersentaseAnakController;
use App\Http\Controllers\SekolahRamahAnakController;
use App\Http\Controllers\SigaController;
use App\Http\Controllers\SigaJenisController;
use App\Http\Controllers\SimapanArtikelController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TinyMceController;
use App\Http\Controllers\UserController;
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

Route::get('/portal-p3', function () {
    return view('landingpage.portal3');
});



Route::get('/artikel-detail', function () {
    return view('landingpage.artikeldetail');
});

Route::get('/banner-detail/{id}', [BannerController::class, 'show'])->name('banner-detail');

Route::get('/artikel-kantor', [LandingpageController::class, 'artikelKantor'])->name('landingpage.artikel-kantor');
Route::get('/artikel-kantor/detail/{slug}', [LandingpageController::class, 'kegiatanKantorDetail'])->name('landingpage.artikel-kantor-detail');


Route::get('/kegiatan', [LandingpageController::class, 'kegiatanForum'])->name('kegiatan-forum');
Route::get('/kegiatan/{slug}', [LandingpageController::class, 'kegiatanForumDetail'])->name('kegiatan-forum-detail');
Route::get('/reload-captcha', [LandingpageController::class, 'reloadCaptcha'])->name('reload-captcha');
Route::get('/simapan', [LandingpageController::class, 'simapan'])->name('simapan');
Route::get('/forum', [LandingpageController::class, 'forum'])->name('forum');
Route::get('/profil', [LandingpageController::class, 'profil'])->name('profil');
Route::get('/kirim-aspirasi', [AspirasiController::class, 'store'])->name('kirim-aspirasi');

Route::get('/artikel', [LandingpageController::class, 'artikel'])->name('landingpage.artikel');
Route::get('/artikel/detail/{slug}', [LandingpageController::class, 'artikelDetail'])->name('landingpage.artikeldetail');
// Route::get('/peta', function () {
//     return view('landingpage.peta');
// });
Route::get('/peta', [LandingpageController::class, 'peta'])->name('peta');

Route::get('/pemberdayaan', [LandingpageController::class, 'pemberdayaan']);
Route::get('/siga', [LandingpageController::class, 'siga']);
Route::get('/kluster6', [LandingpageController::class, 'kluster6']);
Route::get('/kluster1', [LandingpageController::class, 'kluster1']);
Route::get('/kluster2', [LandingpageController::class, 'kluster2']);
Route::get('/kluster3', [LandingpageController::class, 'kluster3']);
Route::get('/kluster4', [LandingpageController::class, 'kluster4']);
Route::get('/kluster5', [LandingpageController::class, 'kluster5']);



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
    Route::resource('artikel', ArtikelController::class); // Kantor
    Route::resource('fastlink', FastLinkController::class);
    Route::resource('jumlahanak', JumlahAnakController::class)->only('index', 'store');
    Route::resource('forum-struktur', ForumStrukturController::class)->only('index', 'store');
    Route::resource('forum-pengurus', ForumPengurusController::class);
    Route::resource('forum-kategori-artikel', ForumKategoriArtikelController::class);
    Route::resource('forum-galeri', ForumGaleriController::class)->only("destroy");
    Route::resource('forum-artikel', ForumArtikelController::class);
    Route::resource('forum-kategori-galeri', ForumKategoriGaleriController::class);
    Route::resource('profil-kelembagaan', KelembagaanController::class)->only('index', 'store');
    Route::resource('emergency', EmergencyController::class);
    Route::resource('banner', BannerController::class);

    Route::resource('kebijakan', KebijakanController::class);
    Route::resource('kebijakan-detail', KebijakanDetailController::class)->only("destroy");

    Route::resource('persentase-anak', PersentaseAnakController::class);
    Route::resource('layanan-pengasuh-anak', LayananPengasuhAnakController::class);
    Route::resource('sekolah-ramah-anak', SekolahRamahAnakController::class);
    Route::resource('kluster.artikel', ArtikelKlusterController::class);
    Route::resource('artikel-kluster-detail', ArtikelKlusterDetailController::class)->only("destroy");
    Route::resource('kluster', KlusterController::class)->except("store", "create");
    Route::resource('user', UserController::class);
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');



    Route::resource('simapan-artikel', SimapanArtikelController::class);
    //tiny mce upload
    Route::post('tiny-upload', [TinyMceController::class, "upload"])->name('tiny-upload');


    Route::resource('siga', SigaController::class);

    Route::resource('jenis-siga', SigaJenisController::class);
    Route::resource('pemberdayaan-masyarakat', PemberdayaanMasyarakatController::class);

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
