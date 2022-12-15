<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approve2BookingVehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_vehicle_id',
        'user_id',
        'jabatan',
        'approve'
    ];
}
