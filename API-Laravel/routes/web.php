<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/data_mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/tambah_data_mahasiswa', [MahasiswaController::class, 'create']);
Route::post('/simpan_mahasiswa', [MahasiswaController::class, 'store']);

//Route::get('/data_mahasiswa','MahasiswaController@index')->name('data_mahasiswa');
