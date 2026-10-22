<?php

use App\Support\IsiAwal;
use Illuminate\Support\Facades\Route;

/*
| Isi tabel yang masih kosong dengan data awal
| (artisan tidak selalu tersedia di environment ini).
*/

try {
    IsiAwal::jalankan();
} catch (\Throwable $e) {
    // abaikan bila DB belum siap
}

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\BkkLowonganController;
use App\Http\Controllers\ProgramUnggulanController;


/*
|--------------------------------------------------------------------------
| HALAMAN WEBSITE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $beritas = \App\Models\Berita::orderBy('tanggal', 'desc')
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();

    $jumlahFasilitas = \App\Models\Fasilitas::count();

    $jumlahPrestasi = \App\Models\Prestasi::count();

    return view('welcome', compact('beritas', 'jumlahFasilitas', 'jumlahPrestasi'));
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/jurusan', function () {
    return view('jurusan');
});


/*
|--------------------------------------------------------------------------
| GURU & STAFF
|--------------------------------------------------------------------------
|
| Data guru diambil dari database melalui GuruController.
|
*/

Route::get('/guru', [GuruController::class, 'frontend']);


Route::get('/fasilitas', function () {
    $fasilitas = \App\Models\Fasilitas::orderBy('id')->get();
    return view('fasilitas', compact('fasilitas'));
});

Route::get('/prestasi', function () {

    $semua = \App\Models\Prestasi::orderBy('tahun', 'desc')
        ->orderBy('id', 'desc')
        ->get();

    $prestasis = $semua->groupBy('tahun');

    return view('prestasi', compact('prestasis'));
});

Route::get('/galeri', [GaleriController::class, 'frontend']);

Route::get('/bkk', [BkkLowonganController::class, 'frontend']);

Route::get('/program-unggulan', [ProgramUnggulanController::class, 'frontend']);

Route::get('/ppdb', function () {

    $ppdb = \App\Models\Ppdb::latest()->first();

    return view('ppdb', compact('ppdb'));

});

Route::get('/kontak', function () {
    return view('kontak');
});


/*
|--------------------------------------------------------------------------
| LOGIN & LOGOUT
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');


/*
|--------------------------------------------------------------------------
| HALAMAN SISWA
|--------------------------------------------------------------------------
*/

Route::get('/siswa', function () {
    return view('siswa');
})->middleware('siswa');


/*
|--------------------------------------------------------------------------
| CRUD ADMIN
|--------------------------------------------------------------------------
*/

Route::resource('/admin/siswa', SiswaController::class)
    ->middleware('admin');

Route::resource('/admin/guru', GuruController::class)
    ->middleware('admin');

Route::resource('/admin/jurusan', JurusanController::class)
    ->middleware('admin');

Route::resource('/admin/berita', BeritaController::class)
    ->parameters(['berita' => 'berita'])
    ->middleware('admin');

Route::resource('/admin/galeri', GaleriController::class)
    ->middleware('admin');

Route::resource('/admin/fasilitas', FasilitasController::class)
    ->parameters(['fasilitas' => 'fasilitas'])
    ->middleware('admin');

Route::resource('/admin/prestasi', PrestasiController::class)
    ->middleware('admin');

Route::resource('/admin/ppdb', PpdbController::class)
    ->middleware('admin');

Route::resource('/admin/bkk', BkkLowonganController::class)
    ->middleware('admin');

Route::resource('/admin/program-unggulan', ProgramUnggulanController::class)
    ->middleware('admin');