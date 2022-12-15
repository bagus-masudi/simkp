<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicles::orderBy('id')->get();
        return view('admin.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        try {
            $validated = $request->validated();

            Vehicles::create([
                'no_plat' => $validated['no_plat'],
                'merek' => $validated['merek'],
                'jenis' => $validated['jenis'],
                'tahun' => $validated['tahun'],
                'status_vehicle' => $validated['status_vehicle'],
                'angkutan' => $validated['angkutan'],
            ]);
            return redirect(url('/admin/vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully added.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/vehicles/create'))->with([
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
        $vehicle = Vehicles::findOrFail($id);
        return view('admin.vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicles::findOrFail($id);
        return view('admin.vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $vehicle = Vehicles::findOrFail($id);
            $vehicle->no_plat = $validated['no_plat'];
            $vehicle->merek = $validated['merek'];
            $vehicle->jenis = $validated['jenis'];
            $vehicle->tahun = $validated['tahun'];
            $vehicle->status_vehicle = $validated['status_vehicle'];
            $vehicle->angkutan = $validated['angkutan'];

            $vehicle->save();

            return redirect(url('/admin/vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully edited.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/vehicles/' . $id . '/edit'))->with([
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
            $vehicle = Vehicles::findOrFail($id);
            $vehicle->delete();
            return redirect(url('/admin/vehicles'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully deleted.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/vehicles'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
