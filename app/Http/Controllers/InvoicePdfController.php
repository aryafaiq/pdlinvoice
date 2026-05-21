<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoicePdfController extends Controller
{
    public function generatePDF($id)
    {
        // Data yang ingin dikirim ke view (opsional)
        $data = Invoice::with('perusahaan')->findOrFail($id); // Contoh: Mengambil data invoice tertentu dari database
        $rate = 150000;
        $logoPath       = public_path('img/logopdl.png');
        $logoBase64     = file_exists($logoPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath)) : null;
        $signPath       = public_path('img/darius.png');
        $signBase64     = file_exists($signPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($signPath)) : null;


        $pdf = Pdf::LoadView('invoicepdf', compact('data','logoBase64','signBase64','rate'));
        $data->invoice_no = str_replace('/', '-', $data->invoice_no); // Ganti karakter '/' dengan '-'
        // Unduh file PDF dengan nama tertentu
        return $pdf->stream("Invoice-{$data->invoice_no}.pdf");
    }
}
