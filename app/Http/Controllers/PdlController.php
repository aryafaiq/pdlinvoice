<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class PdlController extends Controller
{
    public function dashboard(){
        $data1 = Invoice::count();
        $data2 = Invoice::sum('quantity');
        $data3 = Invoice::where('status','approve')->sum('amount');
        

        return view('dashboard',compact('data1','data2','data3'));
    }
    public function search(Request $request){

        $search = $request->search;
        
        if ($search) {
            $invoices = Invoice::where('invoice_no','like', $search."%")->get();
        } else {
            $invoices = Invoice::with('perusahaan')->get();
        }
    
        return view('invoice', compact('invoices'));
    }
}
