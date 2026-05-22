<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicePdfController;
use App\Http\Controllers\PdlController;
use App\Http\Controllers\PerusahaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PdlController::class,'dashboard']);
Route::get('/search', [PdlController::class,'search']);

Route::resource('invoice', InvoiceController::class);
Route::resource('perusahaan', PerusahaanController::class);
Route::get('/pdf/{id}', [InvoicePdfController::class, 'generatePDF'])->name('invoice.pdf');
