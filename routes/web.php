<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PegawaiController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware'=> ['auth','ceklevel:admin,pegawai']], function (){
    route::get('/home',[HomeController::class,'index'])->name('home');
});
Route::group(['middleware'=> ['auth','ceklevel:pegawai']], function (){
    route::post('/simpan-masuk',[AbsensiController::class,'store'])->name('simpan-masuk');
    route::get('/absensi-masuk',[AbsensiController::class,'index'])->name('absensi-masuk');
    route::get('/absensi-keluar',[AbsensiController::class,'keluar'])->name('absensi-keluar');
    route::post('/ubah-absensi',[AbsensiController::class,'absensipulang'])->name('ubah-absensi');
});
    Route::group(['middleware'=> ['auth','ceklevel:admin']], function (){
    route::get('/filter-data',[AbsensiController::class,'halamanrekap'])->name('filter-data');
    route::get('filter-data/{tglawal}/{tglakhir}',[AbsensiController::class,'tampildatakeseluruhan'])->name('filter-data-keseluruhan');

    route::get('/Data-pegawai',[PegawaiController::class,'index'])->name('Data-pegawai');
    route::get('/create-pegawai',[PegawaiController::class,'create'])->name('create-pegawai');
    route::post('/simpan-pegawai',[PegawaiController::class,'store'])->name('simpan-pegawai');
    route::get('/edit-pegawai',[PegawaiController::class,'edit'])->name('edit-pegawai');
    route::post('/update-pegawai/{id}',[PegawaiController::class,'update'])->name('update-pegawai');
    });

