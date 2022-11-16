<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\wargaController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});
    Route::get('/warga',[wargaController::class,'index']);
    Route::get('/warga/create',[wargaController::class,'create']);
    Route::post('/warga/store',[wargaController::class,'store']);
    Route::get('/warga/{id}/edit',[wargaController::class,'edit']);
    Route::put('/warga/{id}',[wargaController::class,'update']);
    Route::delete('/warga/{id}',[wargaController::class,'destroy']);
    Route::resource('programs',
    App\Http\Controllers\API\ProgramController::class
);

Auth::routes();
//untuk verifikasi email user//
Auth::routes(['verify' => true]);

 Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
 Route::group(['middleware' => ['logincheck:admin']], function(){
    Route::resource('admin', AdminController::class);
 });
 Route::group(['middleware' => ['logincheck:editor']], function(){
    Route::resource('editor', AdminController::class);
 });