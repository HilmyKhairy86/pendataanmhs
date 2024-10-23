<?php

use App\Models\Kelas;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TambahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataDosenController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\MahasiswaController;
use Database\Factories\MahasiswaFactory;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('dashboard');
    }
    return view('login');
});

Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::get('request', function(){
    return view('request');
})->name('request');

Route::post('actionrequest', [RequestController::class, 'actionrequest'])->name('actionrequest');

// Login------------

Route::get('login', function(){
    return view('login');
})->name('login');

Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Route::get('register', [RegisterController::class, 'register'])->name('register');
// Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

// -------

// kaprodi
// view datakelas
Route::get('datakelas', [DataKelasController::class, 'listkelas'])->name('datakelas')->middleware('auth','can:access-kaprodi');

Route::get('detailkelas/{kelas}', [DataKelasController::class, 'tampil'])->name('detailkelas')->middleware('auth','can:access-kaprodi');

// edit kelas
Route::get('editkelas/{kelas}', [DataKelasController::class, 'passtokelas'])->name('editkelas')->middleware('auth','can:access-kaprodi');

Route::post('changekelas', [DataKelasController::class, 'editkelas'])->name('changekelas')->middleware('auth','can:access-kaprodi');

// tambah kelas
Route::get('tambah/{kelas}', [DataKelasController::class, 'tampilkelas'])->name('tambah')->middleware('auth','can:access-kaprodi');

Route::post('hapusmhs/{user_id}', [MahasiswaController::class, 'updatekelas'])->middleware('auth','can:access-kaprodi');

Route::post('hapusdsn/{user_id}', [DataDosenController::class, 'updatekelas'])->middleware('auth','can:access-kaprodi');

Route::post('tambah', [TambahController::class, 'tambahkelas'])->name('tambahkelas')->middleware('auth','can:access-kaprodi');

Route::get('addkelas', function(){
    return view('addkelas');
})->name('addkelas')->middleware('auth','can:access-kaprodi');

Route::post('addkelas', [DataKelasController::class, 'addkelas'])->name('addkelas')->middleware('auth','can:access-kaprodi');

Route::post('hapuskelas/{kelas}', [DataKelasController::class, 'hapuskelas'])->middleware('auth','can:access-kaprodi');

//viedata dosen
Route::get('datadosen', [DataDosenController::class, 'tampildosen'])->name('datadosen')->middleware('auth','can:access-kaprodi');

//viedata mhs
Route::get('datamhs', [MahasiswaController::class, 'tampilmhs'])->name('datamhs')->middleware('auth','can:access-kaprodi');

//tambahdosen
Route::get('tambahdosen', function(){
    return view('tambahdosen');
})->name('tambahdosen')->middleware('auth','can:access-kaprodi');

Route::post('tambahdosen',[DataDosenController::class, 'tambahdosen'])->name('tambahdosen')->middleware('auth','can:access-kaprodi');

Route::post('hapusdosen/{id}', [DataDosenController::class, 'hapusdosen'])->middleware('auth','can:access-kaprodi');

Route::get('editdosen/{id}', [DataDosenController::class, 'viewdosen'])->name('editdosen')->middleware('auth','can:access-kaprodi');

Route::post('changedosen', [DataDosenController::class, 'editdosen'])->name('changedosen')->middleware('auth','can:access-kaprodi');

//tambah mhs
Route::get('tambahmhs', function(){
    return view('tambahmhs');
})->name('tambahmhs')->middleware('auth','can:access-kaprodi');

Route::post('tambahmhs', [MahasiswaController::class, 'tambahmhs'])->name('tambahmhs')->middleware('auth','can:access-kaprodi');

// routes/web.php
Route::post('/check-email', [UserController::class, 'checkEmail'])->name('check.email');



//dosen_wali
Route::get('detail_kelas', [DataKelasController::class, 'kelasdosen'])->name('detail_kelas')->middleware('auth','can:access-dosen_wali');

Route::get('requestedit',[RequestController::class, 'viewrequest'])->name('requestedit')->middleware('auth','can:access-dosen_wali');

Route::post('requestedit',[RequestController::class, 'approve'])->name('requestapprove')->middleware('auth','can:access-dosen_wali');

Route::post('requestedit/{id}',[RequestController::class, 'reject'])->name('requestreject')->middleware('auth','can:access-dosen_wali');

Route::get('editmhs/{id}', [MahasiswaController::class, 'editmhs'])->middleware('auth','can:access-dosen_wali');
Route::post('editmhs',[MahasiswaController::class, 'updatemhs'])->name('updatemhs')->middleware('auth','can:access-dosen_wali');

//mahasiswa

Route::get('profile', [ProfileController::class, 'viewprofile'])->name('profile')->middleware('auth','can:access-mahasiswa');
Route::post('profile', [ProfileController::class, 'sendrequest'])->name('sendrequest')->middleware('auth','can:access-mahasiswa');
Route::post('profileedit', [ProfileController::class, 'updateprofile'])->name('updateprofile')->middleware('auth','can:access-mahasiswa');