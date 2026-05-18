<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicePdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('invoice', InvoiceController::class);
Route::get('/pdf/{id}', [InvoicePdfController::class, 'generatePDF'])->name('invoice.pdf');
