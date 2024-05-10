<?php

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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pengajuan-reimburse', [App\Http\Controllers\Staff\PengajuanController::class, 'index'])->name('pengajuan-reimburse');
Route::post('/pengajuan-reimburse', [App\Http\Controllers\Staff\PengajuanController::class, 'store'])->name('pengajuan-reimburse.store');

// Finance
Route::get('/finance/pengajuan-reimburse/', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'index'])->name('pengajuan-reimburse.finance');
Route::post('/finance/pengajuan-reimburse/rejected', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'reject'])->name('pengajuan-reimburse.reject');
Route::post('/finance/pengajuan-reimburse/submited', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'submited'])->name('pengajuan-reimburse.submited');

// Direktur
Route::get('/direktur/approve-pengajuan/', [App\Http\Controllers\Direktur\ApprovePengajuanController::class, 'index'])->name('approve-pengajuan.direktur');
Route::post('/direktur/approve-pengajuan/approve', [App\Http\Controllers\Direktur\ApprovePengajuanController::class, 'approve'])->name('approve-pengajuan.approve');
// Route::middleware(['auth'])->group(function () {
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

