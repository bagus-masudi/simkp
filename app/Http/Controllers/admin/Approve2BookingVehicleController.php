<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Approve2BookingVehicleRequest;
use App\Models\Approve2BookingVehicles;
use App\Models\BookingVehicles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Approve2BookingvehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approve2 = Approve2BookingVehicles::orderBy('id')->get();
        return view('admin.approve2.index', compact('approve2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.approve2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Approve2BookingVehicleRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $approve2 = Approve2BookingVehicles::findOrFail($id);
        return view('admin.approve2.show', compact('approve2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $approve2 = Approve2BookingVehicles::findOrFail($id);
        return view('admin.approve2.edit', compact('approve2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Approve2BookingVehicleRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $approve2 = Approve2BookingVehicles::findOrFail($id);
            $approve2->approve = $validated['approve'];
            $approve2->save();

            $booking_vehicles = BookingVehicles::findOrFail($validated['booking_vehicle_id']);
            $booking_vehicles->status_booking = 'Ready';
            $booking_vehicles->save();

            return redirect(url('/admin/approve2'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully edited.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/approve2/' . $id . '/edit'))->with([
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
            $approve2 = Approve2BookingVehicles::findOrFail($id);
            $approve2->delete();
            return redirect(url('/admin/approve2'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully deleted.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/approve2'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
