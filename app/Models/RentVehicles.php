<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentVehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_plat',
        'merek',
        'jenis',
        'tahun',
        'tgl_berakhir',
        'tarif',
        'tempat_sewa',
        'status_vehicle',
        'angkutan'
    ];
}
