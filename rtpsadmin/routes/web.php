<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\GamelistsController;
use App\Http\Controllers\PrediksiTogelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;





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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('dashboard/{param}', [DashboardController::class, 'index'])->where('param', '[0-9]+')->name('dashboard.select');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserController::class);
    Route::resource('site_setting', SiteSettingController::class, ['except' => ['index']]);
    Route::resource('tambah_game', GameListsController::class);

    Route::post('/insertdata', [GameListsController::class, 'insertdata'])->name('insertdata');

    Route::post('/upload', [SiteSettingController::class, 'store']);
    Route::resource('prediksi_togel', PrediksiTogelController::class, ['except' => ['index']]);
    Route::post('/prediksi/create', [PrediksiTogelController::class, 'create'])->name('prediksi.create');
    Route::put('/prediksi/{id}', [PrediksiTogelController::class, 'update'])->name('updateTogel');
    Route::delete('/prediksi/{id}', [PrediksiTogelController::class, 'delete'])->name('delete');

    //ajax
    Route::post('/jenis-togel/update-status', [PrediksiTogelController::class, 'updateStatus'])->name('jenis-togel.update-status');
    Route::get('/get-jenis-togel/{siteId}', [PrediksiTogelController::class, 'getJenisTogelBySite']);
    



    Route::resource('kategori', KategoriController::class);

    Route::resource('berita_all', BeritaController::class, ['except' => ['index']]);
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('updateBerita');
    Route::delete('/berita/{id}', [BeritaController::class, 'delete'])->name('deleteBerita');


});


Route::get('/testing', [SiteSettingController::class, 'testing']);




// Route::get('dashboard', [DashboardController::class, 'index']);
// Route::post('dashboard/{update}',[DashboardController::class, 'update'])->name('dashboard.update');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
