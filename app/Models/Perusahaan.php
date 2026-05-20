<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_perusahaan','alamat_perusahaan','pic','no_tlp'])]

class Perusahaan extends Model
{

}
