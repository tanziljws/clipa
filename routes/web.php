<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriLikeController;
use App\Http\Controllers\GaleriCommentController;
use App\Models\Galeri;
use App\Models\Informasi;
use App\Models\Kategori;

/*
|--------------------------------------------------------------------------
| Frontend Publik
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $slider         = Galeri::orderBy('tanggal_upload', 'desc')->take(5)->get();
    $galeri_terbaru = Galeri::orderBy('tanggal_upload', 'desc')->take(6)->get();
    $informasi      = Informasi::orderBy('tanggal', 'desc')->take(5)->get();
    $kategori       = Kategori::all();

    return view('frontend.home', compact('slider', 'galeri_terbaru', 'informasi', 'kategori'));
})->name('home');

// Galeri publik
Route::get('/galeri', [GaleriController::class, 'publicIndex'])->name('galeri.public');

// Galeri Like & Comment (Public)
Route::post('/galeri/{id}/like/toggle', [GaleriLikeController::class, 'toggle'])->name('galeri.like.toggle');
Route::get('/galeri/{id}/like/check', [GaleriLikeController::class, 'check'])->name('galeri.like.check');
Route::post('/galeri/{id}/comment', [GaleriCommentController::class, 'store'])->name('galeri.comment.store');
Route::get('/galeri/{id}/comments', [GaleriCommentController::class, 'index'])->name('galeri.comments.index');

// Daftar informasi publik
Route::get('/informasi', [InformasiController::class, 'publicIndex'])->name('informasi.public');

// Detail informasi publik
Route::get('/informasi/{id}', function ($id) {
    $info = Informasi::findOrFail($id);
    return view('frontend.informasi_detail', compact('info'));
})->name('informasi.detail');

// Halaman Tentang (di-nonaktifkan)
// Route::get('/tentang', function () {
//     return view('frontend.tentang');
// })->name('tentang');

// Halaman Kontak
Route::get('/kontak', function () {
    return view('frontend.kontak');
})->name('kontak');

// Halaman Event
Route::get('/event', function () {
    return view('frontend.event');
})->name('event');

// Halaman Berita
Route::get('/berita', function () {
    return view('frontend.berita');
})->name('berita');

// Halaman Kunjungi
Route::get('/kunjungi', function () {
    return view('frontend.kunjungi');
})->name('kunjungi');


/*
|--------------------------------------------------------------------------
| Backend Admin (auth)
|--------------------------------------------------------------------------
|
| - Dashboard: admin.dashboard (pakai DashboardController@index)
| - CRUD manual GET/POST untuk Informasi, Galeri, Kategori
| - Nama route disesuaikan dgn yang dipakai di view & sidebar
|
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard (Wajib pakai controller supaya variabel total dikirim ke view)
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // -------------------------
    // INFORMASI (manual CRUD)
    // -------------------------
    Route::prefix('informasi')->group(function () {
        Route::get('/',               [InformasiController::class, 'index'])->name('informasi.index');
        Route::get('/create',         [InformasiController::class, 'create'])->name('informasi.create');
        Route::post('/store',         [InformasiController::class, 'store'])->name('informasi.store');
        Route::get('/{id}/edit',      [InformasiController::class, 'edit'])->name('informasi.edit');
        Route::post('/{id}/update',   [InformasiController::class, 'update'])->name('informasi.update');
        Route::get('/{id}/delete',    [InformasiController::class, 'destroy'])->name('informasi.destroy');
    });

    // -------------------------
    // GALERI (manual CRUD)
    // -------------------------
    Route::prefix('galeri')->group(function () {
        Route::get('/',               [GaleriController::class, 'index'])->name('galeri.index');
        Route::get('/create',         [GaleriController::class, 'create'])->name('galeri.create');
        Route::post('/store',         [GaleriController::class, 'store'])->name('galeri.store');
        Route::get('/{id}/edit',      [GaleriController::class, 'edit'])->name('galeri.edit');
        Route::post('/{id}/update',   [GaleriController::class, 'update'])->name('galeri.update');
        Route::get('/{id}/delete',    [GaleriController::class, 'destroy'])->name('galeri.destroy');
    });

    // -------------------------
    // KATEGORI (manual CRUD)
    // -------------------------
    Route::prefix('kategori')->group(function () {
        Route::get('/',               [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/create',         [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/store',         [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/{id}/edit',      [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::post('/{id}/update',   [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('/{id}/delete',    [KategoriController::class, 'destroy'])->name('kategori.destroy');
    });

    // -------------------------
    // KELOLA ADMIN (manual CRUD)
    // -------------------------
    Route::prefix('admin-manage')->group(function () {
        Route::get('/',               [AdminController::class, 'index'])->name('admin.manage.index');
        Route::get('/create',         [AdminController::class, 'create'])->name('admin.manage.create');
        Route::post('/store',         [AdminController::class, 'store'])->name('admin.manage.store');
        Route::get('/{id}/edit',      [AdminController::class, 'edit'])->name('admin.manage.edit');
        Route::post('/{id}/update',   [AdminController::class, 'update'])->name('admin.manage.update');
        Route::get('/{id}/delete',    [AdminController::class, 'destroy'])->name('admin.manage.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Optional: redirect /dashboard -> /admin (kalau dipakai oleh auth scaffolding)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

require __DIR__ . '/auth.php';
