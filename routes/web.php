<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DispositionController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiSuratKeluarController;
use App\Http\Controllers\TransaksiSuratMasukController;
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

Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'authenticate']);
Route::get('/logout', [loginController::class, 'logout']);
Route::prefix("login")->group(function () {
    Route::get('/index', [RegisterController::class, 'index']);
    Route::post('/store', [RegisterController::class, 'store']);
});

Route::get('/', [PageController::class, 'index'])->middleware(['auth']);
Route::prefix("user")->group(function () {
    Route::get("/create", [PenggunaController::class, "create"]);
    Route::post("/store", [PenggunaController::class, "store"]);
    Route::get("/edit", [PenggunaController::class, "edit"]);
    Route::post("/update", [PenggunaController::class, "update"]);
    Route::get("/index", [PenggunaController::class, "index"]);
    Route::delete("/destroy", [PenggunaController::class, "destroy"]);
});

Route::prefix("profile")->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::post('/update', [ProfileController::class, 'update']);
    Route::get('/setting', [ProfileController::class, 'setting']);
});

Route::middleware(['auth'])->group(function () {
    Route::prefix("/surat")->group(function () {
        Route::prefix("sm")->group(function () {
            Route::get("/index", [TransaksiSuratMasukController::class, "index"]);
            Route::get("/download", [TransaksiSuratMasukController::class, "download"]);
            Route::get("/show", [TransaksiSuratMasukController::class, "show"]);
            Route::get("/create", [TransaksiSuratMasukController::class, "create"]);
            Route::post("/store", [TransaksiSuratMasukController::class, "store"]);
            Route::get("/edit", [TransaksiSuratMasukController::class, "edit"]);
            Route::post("/update", [TransaksiSuratMasukController::class, "update"]);
            Route::delete("/destroy", [TransaksiSuratMasukController::class, "destroy"]);
            Route::get("/search", [TransaksiSuratMasukController::class, "search"]);
        });
        Route::prefix("sk")->group(function () {
            Route::get("/index", [TransaksiSuratKeluarController::class, "index"]);
            Route::get("/show", [TransaksiSuratKeluarController::class, "show"]);
            Route::get("/create", [TransaksiSuratKeluarController::class, "create"]);
            Route::post("/store", [TransaksiSuratKeluarController::class, "store"]);
            Route::get("/edit", [TransaksiSuratKeluarController::class, "edit"]);
            Route::post("/update", [TransaksiSuratKeluarController::class, "update"]);
            Route::delete("/destroy", [TransaksiSuratKeluarController::class, "destroy"]);
            Route::get("/download", [TransaksiSuratKeluarController::class, "download"]);
            Route::get("/search", [TransaksiSuratKeluarController::class, "search"]);
        });
        Route::prefix("disposisi")->group(function () {
            Route::get("/index", [DispositionController::class, "index"]);
            Route::get("/show", [DispositionController::class, "show"]);
            Route::get("/create", [DispositionController::class, "create"]);
            Route::post("/store", [DispositionController::class, "store"]);
            Route::get("/edit", [DispositionController::class, "edit"]);
            Route::post("/update", [DispositionController::class, "update"]);
            Route::delete("/destroy", [DispositionController::class, "destroy"]);
        });
    });

    Route::prefix("user")->group(function () {
        Route::get("/index", [PenggunaController::class, "index"]);
        Route::get("/create", [PenggunaController::class, "create"]);
        Route::post("/store", [PenggunaController::class, "store"]);
        Route::get("/edit", [PenggunaController::class, "edit"]);
        Route::post("/update", [PenggunaController::class, "update"]);
        Route::delete("/destroy", [PenggunaController::class, "destroy"]);
    });
});











require __DIR__ . '/auth.php';
