<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id')->get();
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $validated = $request->validated();

            Employee::create([
                'nama' => $validated['nama'],
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'pekerjaan' => $validated['pekerjaan'],
                'departemen' => $validated['departemen'],
            ]);
            return redirect(url('/admin/employees'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully added.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/employees/create'))->with([
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
        $employee = Employee::findOrFail($id);
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $employee = Employee::findOrFail($id);
            $employee->nama = $validated['nama'];
            $employee->alamat = $validated['alamat'];
            $employee->no_hp = $validated['no_hp'];
            $employee->pekerjaan = $validated['pekerjaan'];
            $employee->departemen = $validated['departemen'];

            $employee->save();

            return redirect(url('/admin/employees'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully edited.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/employees/' . $id . '/edit'))->with([
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
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return redirect(url('/admin/employees'))->with([
                'redir_data' => [
                    'error' => false,
                    'message' => 'Item successfully deleted.'
                ]
            ]);
        } catch (\Exception $e) {
            return redirect(url('/admin/employees'))->with([
                'redir_data' => [
                    'error' => true,
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
