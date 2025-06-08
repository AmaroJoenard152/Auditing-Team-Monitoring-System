<?php

use App\Http\Controllers\DisbursementVoucherController; 
use App\Http\Controllers\PpeController;
use App\Http\Controllers\ReconcilerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 


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

Route::get('/ppe', function () {
    return view('inventory/ppe');
});

// Route::get('/reconciler', function () {
//     return view('reconciler/reconciler');
// });

Route::post('/submitVoucher', [DisbursementVoucherController::class, 'submitVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/disbursement-voucher', [DisbursementVoucherController::class, 'showVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/deleteVoucher/{id}', [DisbursementVoucherController::class, 'deleteVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/updateVoucher/{id}', [DisbursementVoucherController::class, 'updateVoucher'])->name('monitoring.disbursement-voucher');

Route::post('/saveVoucher/{id}', [DisbursementVoucherController::class, 'saveVoucher'])->name('monitoring.disbursement-voucher');

Route::get('/dv-export-csv', [DisbursementVoucherController::class, 'dvDownloadCSV'])->name('dv-export.csv');

Route::get('/searchVoucher', [DisbursementVoucherController::class, 'searchVoucher'])->name('monitoring.disbursement-voucher');


Route::get('/export-csv', [PpeController::class, 'dvExportCSV'])->name('export.csv');

Route::get('/ppe', [PpeController::class, 'showPpe'])->name('inventory.ppe'); // Use for displaying data inside the table
Route::get('/ppe/history', [PpeController::class, 'showPpe']); // Use the same function for showPpe and showPpeHistory

//Data Visualization
Route::get('/ppe-division-count', [PpeController::class, 'getDivisionCount']);
Route::get('/ppe-year-count', [PpeController::class, 'getYearCount']);




Route::post('/upload', [ReconcilerController::class, 'upload'])->name('upload');
Route::post('/reconcile', [ReconcilerController::class, 'reconcile'])->name('reconcile');


Route::get('/reconciler', function () {
    return view('reconciler.reconciler'); // replace with your blade view name
})->name('reconciler.view');

