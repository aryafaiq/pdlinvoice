<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perusahaan;


#[Fillable(['perusahaan_id', 'invoice_no', 'invoice_date', 'description', 'quantity','amount'])]
class Invoice extends Model
{
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
