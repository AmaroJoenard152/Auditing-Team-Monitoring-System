<?php

use App\Http\Controllers\DisbursementVoucherController; 
use App\Http\Controllers\PpeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/disbursement-voucher', function () {
    return view('monitoring/disbursement-voucher');
});

Route::get('/logbook-incoming', function () {
    return view('logbook/logbook-incoming');
});

Route::get('/ppe', function () {
    return view('inventory/ppe');
});

Route::post('/submitVoucher', [DisbursementVoucherController::class, 'submitVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/disbursement-voucher', [DisbursementVoucherController::class, 'showVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/deleteVoucher/{id}', [DisbursementVoucherController::class, 'deleteVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/updateVoucher/{id}', [DisbursementVoucherController::class, 'updateVoucher'])->name('monitoring.disbursement-voucher');

Route::post('/saveVoucher/{id}', [DisbursementVoucherController::class, 'saveVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/export-csv', [DisbursementVoucherController::class, 'dvExportCSV'])->name('export.csv');

Route::get('/searchVoucher', [DisbursementVoucherController::class, 'searchVoucher'])->name('monitoring.disbursement-voucher');



Route::post('/submitPpe', [PpeController::class, 'submitPpe'])->name('inventory.ppe');
Route::get('/ppe', [PpeController::class, 'showPpe'])->name('inventory.ppe');
Route::get('/deletePpe/{id}', [PpeController::class, 'deletePpe'])->name('inventory.ppe');
Route::get('/updatePpe/{id}', [PpeController::class, 'updatePpe'])->name('inventory.ppe');
Route::post('/savePpe/{id}', [PpeController::class, 'savePpe'])->name('inventory.ppe');
Route::get('/searchPpe', [PpeController::class, 'searchPpe'])->name('inventory.ppe');
Route::get('/export-csv', [PpeController::class, 'dvExportCSV'])->name('export.csv');