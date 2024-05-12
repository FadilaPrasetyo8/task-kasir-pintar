<?php

use App\Http\Controllers\Auth\LoginController;
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




// Finance
// Route::get('/finance/pengajuan-reimburse/', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'index'])->name('pengajuan-reimburse.finance');
// Route::post('/finance/pengajuan-reimburse/rejected', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'reject'])->name('pengajuan-reimburse.reject');
// Route::post('/finance/pengajuan-reimburse/submited', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'submited'])->name('pengajuan-reimburse.submited');

// // Direktur
// Route::get('/direktur/approve-pengajuan/', [App\Http\Controllers\Direktur\ApprovePengajuanController::class, 'index'])->name('approve-pengajuan.direktur');
// Route::post('/direktur/approve-pengajuan/approve', [App\Http\Controllers\Direktur\ApprovePengajuanController::class, 'approve'])->name('approve-pengajuan.approve');
// Route::get('/direktur/employee/', [App\Http\Controllers\Direktur\EmployeeController::class, 'index'])->name('employee.direktur');

//     Route::middleware(['auth'])->group(function () {
//         Route::get('/', function () {
//         return view('welcome');
//     });
// });


// Route::group(['middleware' => 'guest'], function() {
//     Route::get('/'. [LoginController, 'view-login'])->name('login');
//     Route::post('/login'. [LoginController, 'postlogin']);
// });




Route::middleware(['auth', 'rolecheck:staff'])->group(function() {
    Route::get('/pengajuan-reimburse', [App\Http\Controllers\Staff\PengajuanController::class, 'index'])->name('pengajuan-reimburse');
    Route::post('/pengajuan-reimburse', [App\Http\Controllers\Staff\PengajuanController::class, 'store'])->name('pengajuan-reimburse.store');
});

Route::middleware(['auth', 'rolecheck:finance'])->group(function() {
    Route::get('/finance/pengajuan-reimburse/', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'index'])->name('pengajuan-reimburse.finance');
    Route::post('/finance/pengajuan-reimburse/rejected', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'reject'])->name('pengajuan-reimburse.reject');
    Route::post('/finance/pengajuan-reimburse/submited', [App\Http\Controllers\Finance\PengajuanReimbursementController::class, 'submited'])->name('pengajuan-reimburse.submited');

});

Route::middleware(['auth', 'rolecheck:direktur'])->group(function() {
    Route::get('/direktur/approve-pengajuan/', [App\Http\Controllers\Direktur\ApprovePengajuanController::class, 'index'])->name('approve-pengajuan.direktur');
    Route::post('/direktur/approve-pengajuan/approve', [App\Http\Controllers\Direktur\ApprovePengajuanController::class, 'approve'])->name('approve-pengajuan.approve');

    Route::get('/direktur/employee/', [App\Http\Controllers\Direktur\EmployeeController::class, 'index'])->name('employee.direktur');


});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

