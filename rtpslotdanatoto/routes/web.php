<?php

use App\Http\Controllers\CorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SideController;

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

Route::get('/',[HomepageController::class, 'index']);
Route::get('jenisVendor.json', [HomepageController::class, 'jenisVendor']);
Route::get('games.json', [HomepageController::class, 'jsonGame']);
Route::get('prediksiByVendor.json', [HomepageController::class, 'prediksiByVendor']);
Route::get('/index/vendor/{jenisVendor?}', [HomepageController::class, 'index_vendor'])->name('vendor');
Route::get('Vendor.json', [HomepageController::class, 'Vendor']);


Route::get('jenisAll.json', [SideController::class, 'jenisAll']);
Route::get('/side/payment',[SideController::class, 'index_payment'])->name('payment');
Route::get('payment.json', [SideController::class, 'paymentJson']);
Route::get('/prediksi',[SideController::class, 'index_prediksi'])->name('prediksi');
Route::get('prediksiAll.json', [SideController::class, 'prediksiAll']);
Route::get('/prediksi/pasaran/{jenis?}', [SideController::class, 'index_prediksi_by_pasaran'])->name('prediksiPasaran');
Route::get('prediksiByPasaran.json', [SideController::class, 'prediksiByPasaran']);

Route::group(['middleware' => 'cors'], function () {
    Route::get('/data/jenis-vendor', [CorsController::class, 'jenisVendor']);
    Route::get('/data/games', [CorsController::class, 'jsonGame']);
    Route::get('/data/prediksi', [CorsController::class, 'prediksiByVendor']);
    Route::get('/data/vendor', [CorsController::class, 'Vendor']);
    // side
    Route::get('/data/jenis-togel', [CorsController::class, 'jenisAll']);
    Route::get('/data/payment', [CorsController::class, 'paymentJson']);
    Route::get('/data/all-prediksi', [CorsController::class, 'prediksiAll']);
    Route::get('/data/prediksi-by-pasaran', [CorsController::class, 'prediksiByPasaran']);
});