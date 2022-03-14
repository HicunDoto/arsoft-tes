<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

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
Route::get('/',[DataController::class,'index'])->name('login');
Route::post('/',[DataController::class,'login'])->name('post.login');
Route::get('/logout',[DataController::class,'logout'])->name('logout');

Route::group(['middleware'=>['auth']], function(){
Route::get('/dashboard',[DataController::class,'dashboard'])->name('dashboard');
Route::get('/tambah',[DataController::class,'create'])->name('view.buat');
Route::post('/tambah',[DataController::class,'store'])->name('buat');
Route::get('/edit/{data}',[DataController::class,'edit'])->name('view.edit');
Route::put('/edit/{data}',[DataController::class,'update'])->name('edit');
Route::delete('/dashboard/{soal}',[DataController::class,'destroy'])->name('delete.data');
Route::get('/process',[DataController::class,'process'])->name('view.process');
Route::get('/done',[DataController::class,'done'])->name('view.done');
});
