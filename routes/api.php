<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpeController;

// Test Route
Route::post('/ppes', [PpeController::class, 'store']);
