<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastinvoice = Invoice::latest('id')->value('invoice_no');
        return view('createinvoice', compact('lastinvoice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'invoice_no' => 'required|unique:invoices,invoice_no',
            'invoice_date' => 'nullable|date',
            'nama_barang' => 'nullable|string',
            'shipper' => 'nullable|string',
            'party' => 'nullable|string',
            'weight' => 'nullable|string',
            'no_container' => 'nullable|string',
        ]);
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
        $invoice = Invoice::findOrFail($id);
        return view('editinvoice', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::findOrFail($id);
        $data = $request->all();
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
