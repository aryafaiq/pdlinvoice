<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoicePdfController extends Controller
{
    public function generatePDF($id)
    {
        // Data yang ingin dikirim ke view (opsional)
        $data = Invoice::findOrFail($id); // Contoh: Mengambil data invoice tertentu dari database
        // Load view dan kirim data
        $pdf = Pdf::LoadView('invoicepdf', compact('data'));

        $data->invoice_no = str_replace('/', '-', $data->invoice_no); // Ganti karakter '/' dengan '-'
        // Unduh file PDF dengan nama tertentu
        return $pdf->stream("Invoice-{$data->invoice_no}.pdf");
    }
}
