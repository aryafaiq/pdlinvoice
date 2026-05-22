<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class PdlController extends Controller
{
    public function dashboard(){
        $data1 = Invoice::count();
        $data2 = Invoice::sum('quantity');
        $data3 = Invoice::where('status','approve')->sum('amount');
        

        return view('dashboard',compact('data1','data2','data3'));
    }
}
