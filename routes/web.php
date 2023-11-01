<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RincianController;
use App\Http\Controllers\UnitkerjaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SkpController;
use App\Jabatan;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Block\Element\IndentedCode;

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
    return view('layouts.master');
})->name('layouts.dashboard');

Auth::routes();

// route json
Route::get('/kegiatan/json', [KegiatanController::class, 'json'])->name('kegiatan.json');
Route::get('/kegiatan_rincian/{id}/json', [RincianController::class, 'json'])->name('rincian.json');
Route::get('/unitkerja/json', [UnitkerjaController::class, 'json'])->name('unitkerja.json');
Route::get('/jabatan/json', [JabatanController::class, 'json'])->name('jabatan.json');
Route::get('/diagnosa/json', [RincianController::class, 'diagnosa_json'])->name('diagnosa.json');

// route kegiatan
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/kegiatan/create', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::patch('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

// route kegiatan rincian
Route::get('/kegiatan_rincian/{id}', [RincianController::class, 'index'])->name('kegiatan.rincian');
Route::get('/kegiatan_rincian/{id}/create', [RincianController::class, 'rincian_create'])->name('rincian.create');
Route::post('/kegiatan_rincian/{kegiatan}/create', [RincianController::class, 'rincian_store'])->name('rincian.store');
Route::get('/kegiatan_rincian/{id}/edit', [RincianController::class, 'rincian_edit'])->name('rincian.edit');
Route::patch('/kegiatan_rincian/{id}', [RincianController::class, 'rincian_update'])->name('rincian.update');
Route::delete('/kegiatan_rincian/{id}', [RincianController::class, 'rincian_destroy'])->name('rincian.destroy');

// route unit kerja
Route::get('/unitkerja', [UnitkerjaController::class, 'index'])->name('unitkerja.index');
Route::get('/unitkerja/create', [UnitkerjaController::class, 'create'])->name('unitkerja.create');
Route::post('/unitkerja/create', [UnitkerjaController::class, 'store'])->name('unitkerja.store');

// route jabatan
Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
Route::get('/jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
Route::post('/jabatan/create', [JabatanController::class, 'store'])->name('jabatan.store');
Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

// route skp
Route::get('/skp', [SkpController::class, 'index'])->name('skp.index');
Route::get('/skp/{id}', [SkpController::class, 'destroy'])->name('skp.destroy');

Route::get('/home', 'HomeController@index')->name('home');
