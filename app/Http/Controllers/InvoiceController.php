<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('perusahaan')->get();
        return view('invoice', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastinvoice = Invoice::latest('id')->value('invoice_no');
        $perusahaan = Perusahaan::all();

        return view('createinvoice', compact('lastinvoice', 'perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'perusahaan_id' => 'required',
            'invoice_no' => 'required|unique:invoices,invoice_no',
            'invoice_date' => 'nullable|date',
            'description' => 'nullable|string',
            'quantity' => 'nullable|string',
            'amount' => 'nullable|string'
        ]);
        $rate = 150000;
        $data['amount'] = $rate*$data['quantity'];
        Invoice::create($data);
        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perusahaan = Perusahaan::all();
        $invoice = Invoice::with('perusahaan')->findOrFail($id);
        return view('editinvoice', compact('invoice','perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $data = $request->all();
        $data['amount'] = 150000*$data['quantity'];
        $invoice->update($data);
        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Invoice::destroy($id);
        return redirect()->route('invoice.index')->with('success', 'Invoice deleted successfully.');
    }
}
