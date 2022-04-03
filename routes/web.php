<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

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

Route::get('/',[TugasController::class, 'index']);
Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');
Route::patch('/tugas/{tugas}/editstatus', [TugasController::class, 'editStatus'])->name('tugas.editStatus');
Route::patch('/tugas/{tugas}/editscore', [TugasController::class, 'editScore'])->name('tugas.editScore');
