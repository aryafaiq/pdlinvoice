<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['invoice_no', 'invoice_date', 'nama_barang', 'shipper', 'party', 'weight', 'no_container'])]
class Invoice extends Model
{
    //
}
