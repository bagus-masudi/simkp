<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_plat',
        'merek',
        'jenis',
        'tahun',
        'status_vehicle',
        'angkutan'
    ];
}
