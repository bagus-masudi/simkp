<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingVehicleRequest;
use App\Models\BookingVehicles;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Vehicles;
use App\Models\User;
use App\Models\Approve1BookingVehicles;
use App\Models\Approve2BookingVehicles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookingVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking_vehicles = BookingVehicles::with('vehicle','driver','employee')->get();
        return view('admin.booking-vehicle.index', compact('booking_vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $vehicles = Vehicles::where('status_vehicle', 'Bersedia')->orderBy('id')->get();
        $drivers = Driver::where('status_driver', 'Bersedia')->orderBy('nama')->get();
        $employees = Employee::orderBy('nama')->get();
        $pelaksana = User::where('jabatan', 'Pelaksana')->orderBy('nama')->get();
        $penanggung_jawab = User::where('jabatan', 'Penanggung Jawab')->orderBy('nama')->get();
        return view('admin.booking-vehicle.create', compact('vehicles', 'drivers', 'employees', 'pelaksana', 'penanggung_jawab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingVehicleRequest $request)
    {
        try {
            $validated = $request->validated();

            $booking_vehicles = BookingVehicles::create([
                'user_id' => auth()->id(),
                'vehicle_id' => $validated['vehicle_id'],
                'driver_id' => $validated['driver_id'],
                'employee_id' => $validated['employee_id'],
                'tgl_booking' => $validated['tgl_booking'],
                'tgl_pinjam' => $validated['tgl_booking'],
                'tgl_kembali' => $validated['tgl_booking'],
                'tgl_dikembalikan' => $validated['tgl_booking'],
                'status_booking' => 'Approved'
            ]);

            $vehicles = Vehicles::findOrFail($validated['vehicle_id']);
            $vehicles->status_vehicle = 'On The Way';
            $vehicles->save();

            $drivers = Driver::findOrFail($validated['driver_id']);
            $drivers->status_driver = 'Tidak Bersedia';
            $drivers->save();

            Approve1BookingVehicles::create([
                'booking_vehicle_id' => $booking_vehicles->id,
                'user_id' => $request->pelaksana_id,
                'jabatan' => 'Pelaksana',
                'approve' => 'Minta Persetujuan',
            ]);

            Approve2BookingVehicles::create([
                'booking_vehicle_id' => $booking_vehicles->id,
                'user_id' => $request->penanggung_jawab_id,
                'jabatan' => 'Penanggung Jawab',
                'approve' => 'Minta Persetujuan',
            ]);

            return redirect(url('/admin/booking-vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully added.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/booking-vehicles/create'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking_vehicles = BookingVehicles::findOrFail($id);
        $users = User::findOrFail($booking_vehicles->user_id);
        $vehicles = Vehicles::findOrFail($booking_vehicles->vehicle_id);
        $drivers = Driver::findOrFail($booking_vehicles->driver_id);
        $employees = Employee::findOrFail($booking_vehicles->employee_id);
        $approve1 = Approve1BookingVehicles::where('booking_vehicle_id', $id)->orderBy('id')->get();
        $approve2 = Approve2BookingVehicles::where('booking_vehicle_id', $booking_vehicles->id)->get();
        return view('admin.booking-vehicle.show', compact('booking_vehicles', 'users','vehicles', 'drivers', 'employees', 'approve1', 'approve2'));
                                                    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking_vehicles = BookingVehicles::findOrFail($id);
        return view('admin.booking-vehicle.edit', compact('booking_vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingVehicleRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $booking_vehicles = BookingVehicles::findOrFail($id);
            $booking_vehicles->user_id = $validated['user_id'];
            $booking_vehicles->vehicle_id = $validated['vehicle_id'];
            $booking_vehicles->driver_id = $validated['driver_id'];
            $booking_vehicles->employee_id = $validated['employee_id'];
            $booking_vehicles->tgl_booking = $validated['tgl_booking'];
            $booking_vehicles->tgl_pinjam = $validated['tgl_pinjam'];
            $booking_vehicles->tgl_kembali = $validated['tgl_kembali'];
            $booking_vehicles->tgl_dikembalikan = $validated['tgl_dikembalikan'];
            $booking_vehicles->status_booking = $validated['status_booking'];

            $booking_vehicles->save();

            return redirect(url('/admin/booking-vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully edited.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/booking-vehicles/' . $id . '/edit'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $booking_vehicles = BookingVehicles::findOrFail($id);
            
            $vehicles = Vehicles::findOrFail($booking_vehicles->vehicle_id);
            $vehicles->status_vehicle = 'Bersedia';
            $vehicles->save();

            $drivers = Driver::findOrFail($booking_vehicles->driver_id);
            $drivers->status_driver = 'Bersedia';
            $drivers->save();

            $booking_vehicles->delete();
            return redirect(url('/admin/booking-vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully deleted.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/booking-vehicles'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
