<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Approve1BookingVehicleRequest;
use App\Models\Approve1BookingVehicles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Approve1BookingvehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approve1 = Approve1BookingVehicles::orderBy('id')->get();
        return view('admin.approve1.index', compact('approve1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.approve1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Approve1BookingVehicleRequest $request)
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
        $approve1 = Approve1BookingVehicles::findOrFail($id);
        return view('admin.approve1.show', compact('approve1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $approve1 = Approve1BookingVehicles::findOrFail($id);
        return view('admin.approve1.edit', compact('approve1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Approve1BookingVehicleRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $approve1 = Approve1BookingVehicles::findOrFail($id);
            $approve1->approve = $validated['approve'];

            $approve1->save();

            return redirect(url('/admin/approve1'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully edited.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/approve1/' . $id . '/edit'))->with([
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
            $approve1 = Approve1BookingVehicles::findOrFail($id);
            $approve1->delete();
            return redirect(url('/admin/approve1'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully deleted.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/approve1'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
