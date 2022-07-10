<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;

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

Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/alumni', function () {
    return view('users.alumni');
});
Route::get('gallery-content', [App\Http\Controllers\KontenController::class, 'tampilContent'])->name('gallery-content.tampilContent');
Route::get('info', [App\Http\Controllers\KontenController::class, 'infoContent'])->name('infoContent');
Route::get('/', [App\Http\Controllers\KontenController::class, 'homeContent'])->name('homeContent');


Route::get('/login-page', [App\Http\Controllers\LoginController::class, 'index'])->name('login-page');
Route::post('/postlogin', [App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth','ceklevel:admin']], function() {
    Route::get('/dashboard-admin', [App\Http\Controllers\AkunController::class, 'countAkun'])->name('dashboard-admin');
    Route::get('profil-admin', [App\Http\Controllers\ProfilController::class, 'tampilAdmin'])->name('profil-admin');
    Route::put('/update-password/{id?}', 'LoginController@updatePassword')->name('update-password');
    Route::put('/update-foto/{id?}', 'ProfilController@updateGambarAdmin')->name('update-foto');
    Route::put('/update-admin/{id?}', 'ProfilController@updateAdmin')->name('update-admin');
    Route::get('data-akun', [App\Http\Controllers\AkunController::class, 'index'])->name('data-akun.index');
    Route::post('/data-akun/create', 'AkunController@create')->name('data-akun.create');
    Route::post('/data-akun/store', 'AkunController@store')->name('data-akun.store');
    Route::get('/data-akun/edit/{id?}', 'AkunController@edit')->name('data-akun.edit');
    Route::put('/data-akun/update/{id?}', 'AkunController@update')->name('data-akun.update');
    Route::delete('/data-akun/destroy/{id?}', 'AkunController@destroy')->name('data-akun.destroy');

    Route::get('data-konten', [App\Http\Controllers\KontenController::class, 'index'])->name('data-konten.index');
    Route::post('/data-konten/create', 'KontenController@create')->name('data-konten.create');
    Route::post('/data-konten/store', 'KontenController@store')->name('data-konten.store');
    Route::get('/data-konten/edit/{id?}', 'KontenController@edit')->name('data-konten.edit');
    Route::put('/data-konten/update/{id?}', 'KontenController@update')->name('data-konten.update');
    Route::delete('/data-konten/destroy/{id?}', 'KontenController@destroy')->name('data-konten.destroy');
    Route::post('/data-konten/search', 'KontenController@search')->name('search');

    Route::get('data-mapel', [App\Http\Controllers\MapelController::class, 'index'])->name('data-mapel');
    Route::post('/data-mapel/create', 'MapelController@create')->name('data-mapel.create');
    Route::post('/data-mapel/store', 'MapelController@store')->name('data-mapel.store');
    Route::get('/data-mapel/edit/{id?}', 'MapelController@edit')->name('data-mapel.edit');
    Route::put('/data-mapel/update/{id?}', 'MapelController@update')->name('data-mapel.update');
    Route::delete('/data-mapel/destroy/{id?}', 'MapelController@destroy')->name('data-mapel.destroy');
});


Route::group(['middleware' => ['auth','ceklevel:santri']], function() {
    Route::get('/kehadiran', function () {
        return view('users.kehadiran');
    });
    Route::get('/tutorial', function () {
        return view('users.tutorial');
    });
    Route::get('/jadwal', function () {
        return view('users.jadwal');
    });
    Route::get('/account', function () {
        return view('users.account');
    });
    Route::get('/rekening', function () {
        return view('users.rekening');
    });
    Route::get('/upload', function () {
        return view('users.upload_bukti');
    });
    Route::get('/riwayat', function () {
        return view('users.riwayat_bayar');
    });
    Route::get('/tagihan', [TagihanController::class, 'tagihan'])->name('tagihan');
    Route::post('/tagihan', [TagihanController::class, 'detail'])->name('detail');
    Route::get('/waiting-payment/{id}', [TagihanController::class, 'waiting'])->name('waiting');
    Route::post('/payment', [TagihanController::class, 'payment'])->name('payment');
    Route::get('/cetak-kwitansi/{id}', [PembayaranController::class, 'cetak'])->name('cetak');
    Route::get('/tagihan/edit/{id?}', 'PembayaranController@editTagihan')->name('tagihan.edit');
    Route::get('dashboard', [App\Http\Controllers\KontenController::class, 'homeUser'])->name('homeUser');
    Route::get('hafalan-santri', [App\Http\Controllers\HafalanController::class, 'hafalan'])->name('hafalan-santri.hafalan');
    Route::put('/upload/update/{id?}', 'UploadController@update')->name('upload.update');
    Route::get('detail-riwayat/{id?}', [App\Http\Controllers\PembayaranController::class, 'detail'])->name('detail-riwayat.riwayat');
    Route::get('riwayat-pembayaran', [App\Http\Controllers\PembayaranController::class, 'riwayat'])->name('riwayat-pembayaran.riwayat');
    Route::get('upload', [App\Http\Controllers\UploadController::class, 'index'])->name('upload.index');
    Route::get('nilai', [App\Http\Controllers\NilaiController::class, 'tampilUser'])->name('nilai');
    Route::get('pengumuman', [App\Http\Controllers\InformasiPribadiController::class, 'show'])->name('pengumuman');
    Route::get('profil-user', [App\Http\Controllers\ProfilController::class, 'tampilUser'])->name('profil-user');
    Route::put('/profil-user/update/{id?}', 'ProfilController@updateUser')->name('profil-user.update');
    Route::put('/password-user/{id?}', 'LoginController@passwordUser')->name('password-user');
});


Route::group(['middleware' => ['auth','ceklevel:pengurus,pendidik']], function() {
    Route::get('/dashboard-pengurus', function () {
        return view('pengurus.v_dashboard');
    });

    Route::get('akun-saya', [App\Http\Controllers\ProfilController::class, 'tampilPengurus'])->name('akun-saya');
    Route::put('/akun-saya/update/{id?}', 'ProfilController@updatePengurus')->name('akun-saya.update');
    Route::put('/password-pengurus/{id?}', 'LoginController@passwordPengurus')->name('password-pengurus');

    // Data Pembayaran
    Route::get('data-pembayaran', [App\Http\Controllers\PembayaranController::class, 'index'])->name('data-pembayaran.index');
    Route::post('/data-pembayaran/create', 'PembayaranController@create')->name('data-pembayaran.create');
    Route::post('/data-pembayaran/store', 'PembayaranController@store')->name('data-pembayaran.store');
    Route::get('/data-pembayaran/edit/{id?}', 'PembayaranController@edit')->name('data-pembayaran.edit');
    Route::put('/data-pembayaran/update/{id?}', 'PembayaranController@update')->name('data-pembayaran.update');
    Route::delete('/data-pembayaran/destroy/{id?}', 'PembayaranController@destroy')->name('data-pembayaran.destroy');
    Route::get('/data-pembayaran/cetak-form', 'PembayaranController@cetakForm')->name('data-pembayaran.cetak-form');
    Route::get('/data-pembayaran/cetak-pertanggal/{tglawal}/{tglakhir}', 'PembayaranController@cetakPertanggal')->name('data-pembayaran.cetak-pertanggal');
    Route::post('/data-pembayaran/search', 'PembayaranController@search')->name('search');

    // Data Hafalan
    Route::get('data-hafalan', [App\Http\Controllers\HafalanController::class, 'index'])->name('data-hafalan.index');
    Route::post('/data-hafalan/create', 'HafalanController@create')->name('data-hafalan.create');
    Route::post('/data-hafalan/store', 'HafalanController@store')->name('data-hafalan.store');
    Route::get('/data-hafalan/edit/{id?}', 'HafalanController@edit')->name('data-hafalan.edit');
    Route::put('/data-hafalan/update/{id?}', 'HafalanController@update')->name('data-hafalan.update');
    Route::delete('/data-hafalan/destroy/{id?}', 'HafalanController@destroy')->name('data-hafalan.destroy');
    Route::post('/data-hafalan/cari', 'HafalanController@cari')->name('cari');
    Route::get('/data-hafalan/cetak-form', 'HafalanController@cetakForm')->name('data-hafalan.cetak-form');
    Route::get('/data-hafalan/cetak-hafalan/{tglawal}/{tglakhir}', 'HafalanController@cetakPertanggal')->name('data-hafalan.cetak-pertanggal');

    // Data Santri
    Route::get('data-santri', [App\Http\Controllers\SantriController::class, 'index'])->name('data-santri.index');
    Route::post('/data-santri/create', 'SantriController@create')->name('data-santri.create');
    Route::post('/data-santri/store', 'SantriController@store')->name('data-santri.store');
    Route::get('/data-santri/edit/{id?}', 'SantriController@edit')->name('data-santri.edit');
    Route::put('/data-santri/update/{id?}', 'SantriController@update')->name('data-santri.update');
    Route::delete('/data-santri/destroy/{id?}', 'SantriController@destroy')->name('data-santri.destroy');
    Route::get('/data-santri/cetak', 'SantriController@cetakPdf')->name('data-santri.cetak');

    // Content
    Route::get('data-content', [App\Http\Controllers\KontenController::class, 'index'])->name('data-content.index');
    Route::post('/data-content/create', 'KontenController@create')->name('data-content.create');
    Route::post('/data-content/store', 'KontenController@store')->name('data-content.store');
    Route::get('/data-content/edit/{id?}', 'KontenController@edit')->name('data-content.edit');
    Route::put('/data-content/update/{id?}', 'KontenController@update')->name('data-content.update');
    Route::delete('/data-content/destroy/{id?}', 'KontenController@destroy')->name('data-content.destroy');
    Route::post('/data-content/search', 'KontenController@search')->name('search');

    // Informasi Pribadi
    Route::get('data-informasi', [App\Http\Controllers\InformasiPribadiController::class, 'index'])->name('data-informasi.index');
    Route::post('/data-informasi/create', 'InformasiPribadiController@create')->name('data-informasi.create');
    Route::post('/data-informasi/store', 'InformasiPribadiController@store')->name('data-informasi.store');
    Route::get('/data-informasi/edit/{id?}', 'InformasiPribadiController@edit')->name('data-informasi.edit');
    Route::put('/data-informasi/update/{id?}', 'InformasiPribadiController@update')->name('data-informasi.update');
    Route::delete('/data-informasi/destroy/{id?}', 'InformasiPribadiController@destroy')->name('data-informasi.destroy');
    Route::post('/data-informasi/search', 'InformasiPribadiController@search')->name('search');

    // Data Nilai
    Route::get('data-nilai', [App\Http\Controllers\NilaiController::class, 'index'])->name('data-nilai');
    Route::post('/data-nilai/create', 'NilaiController@create')->name('data-nilai.create');
    Route::post('/data-nilai/store', 'NilaiController@store')->name('data-nilai.store');
    Route::get('/data-nilai/edit/{id?}', 'NilaiController@edit')->name('data-nilai.edit');
    Route::put('/data-nilai/update/{id?}', 'NilaiController@update')->name('data-nilai.update');
    Route::delete('/data-nilai/destroy/{id?}', 'NilaiController@destroy')->name('data-nilai.destroy');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
