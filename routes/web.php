<?php

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\PeranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowCastController;
use App\Http\Controllers\ShowFilmController;
use App\Http\Controllers\ShowGenreController;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/inputForm', [AuthController::class, 'inputForm']);
Route::post('/send', [AuthController::class, 'send']);
Route::get('/data-tables', [AuthController::class, 'dataTables']);
// Show Cast
Route::get('showCast', [ShowCastController::class, 'index']);
Route::get('/showCast/{cast_id}', [ShowCastController::class, 'show']);


// akses untuk auth / user yang telah login
Route::middleware(['auth'])->group(function() {
    // CRUD Cast
        // route ke halaman form tambah data
    Route::get('/cast/create', [CastController::class, 'create']);
        // route ke halaman simpan dan menuju kehalaman tampil
    Route::post('/cast', [CastController::class, 'store']);
        // route ke halaman edit
    Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
        // route ke halaman proses edit
    Route::put('/cast/{cast_id}', [CastController::class, 'update']);
        // route menghapus data
    Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);
    //Genre
    Route::resource('/genre', GenreController::class)->except(['show', 'index']);
    // Film
    Route::resource('/film', FilmController::class)->except(['show', 'index']);
    // Profile
    Route::resource('/profile', ProfileController::class)->only(['index', 'update']);
    // Kritik
    Route::post('/kritik', [KritikController::class, "store"]);
    Route::delete('/kritik/{kritik_id}', [KritikController::class, 'destroy']);
    // peran
    Route::post('/peran', [PeranController::class, 'store']);
});

Route::resource('/genre', GenreController::class)->only('show', 'index');
Route::resource('/film', FilmController::class)->only('show', 'index');

Route::get('/cast', [CastController::class, 'index']);
Route::get('/cast/{cast_id}', [CastController::class, 'show']);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
