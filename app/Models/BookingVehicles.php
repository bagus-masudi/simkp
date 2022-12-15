<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingVehicles extends Model
{
    use HasFactory;

    public function vehicle()
    {
        return $this->belongsTo(Vehicles::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'driver_id',
        'employee_id',
        'tgl_booking',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_dikembalikan',
        'status_booking'
    ];
}
