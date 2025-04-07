<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpeController;

Route::post('/ppes', [PpeController::class, 'store']);
Route::get('/ppes', [PpeController::class, 'index']);
Route::delete('/ppe/{id}', [PpeController::class, 'deletePpe']);
Route::patch('/ppes/{id}', [PpeController::class, 'update']);
