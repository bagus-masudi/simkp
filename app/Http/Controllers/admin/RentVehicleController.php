<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentVehicleRequest;
use App\Models\RentVehicles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RentVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rent_vehicles = RentVehicles::orderBy('id')->get();
        return view('admin.rent-vehicle.index', compact('rent_vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rent-vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentVehicleRequest $request)
    {
        try {
            $validated = $request->validated();

            RentVehicles::create([
                'no_plat' => $validated['no_plat'],
                'merek' => $validated['merek'],
                'jenis' => $validated['jenis'],
                'tahun' => $validated['tahun'],
                'tgl_berakhir' => $validated['tgl_berakhir'],
                'tarif' => $validated['tarif'],
                'tempat_sewa' => $validated['tempat_sewa'],
                'status_vehicle' => $validated['status_vehicle'],
                'angkutan' => $validated['angkutan'],
            ]);
            return redirect(url('/admin/rent-vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully added.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/rent-vehicles/create'))->with([
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
        $rent_vehicle = RentVehicles::findOrFail($id);
        return view('admin.rent-vehicle.show', compact('rent_vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rent_vehicle = RentVehicles::findOrFail($id);
        return view('admin.rent-vehicle.edit', compact('rent_vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RentVehicleRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $rent_vehicle = RentVehicles::findOrFail($id);
            $rent_vehicle->no_plat = $validated['no_plat'];
            $rent_vehicle->merek = $validated['merek'];
            $rent_vehicle->jenis = $validated['jenis'];
            $rent_vehicle->tahun = $validated['tahun'];
            $rent_vehicle->tgl_berakhir = $validated['tgl_berakhir'];
            $rent_vehicle->tarif = $validated['tarif'];
            $rent_vehicle->tempat_sewa = $validated['tempat_sewa'];
            $rent_vehicle->status_vehicle = $validated['status_vehicle'];
            $rent_vehicle->angkutan = $validated['angkutan'];

            $rent_vehicle->save();

            return redirect(url('/admin/rent-vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully edited.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/rent-vehicles/' . $id . '/edit'))->with([
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
            $rent_vehicle = RentVehicles::findOrFail($id);
            $rent_vehicle->delete();
            return redirect(url('/admin/rent-vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully deleted.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/rent-vehicles'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
