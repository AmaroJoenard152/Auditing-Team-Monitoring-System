<?php

use App\Http\Controllers\DisbursementVoucherController; 
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

Route::post('/submitVoucher', [DisbursementVoucherController::class, 'submitVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/disbursement-voucher', [DisbursementVoucherController::class, 'showVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/deleteVoucher/{id}', [DisbursementVoucherController::class, 'deleteVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/updateVoucher/{id}', [DisbursementVoucherController::class, 'updateVoucher'])->name('monitoring.disbursement-voucher');

Route::post('/saveVoucher/{id}', [DisbursementVoucherController::class, 'saveVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/export-csv', [DisbursementVoucherController::class, 'dvExportCSV'])->name('export.csv');

Route::get('/searchVoucher', [DisbursementVoucherController::class, 'searchVoucher'])->name('monitoring.disbursement-voucher');

