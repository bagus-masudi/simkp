@extends('layouts.app')

@push('title')
    Employee Detail
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employee Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/employees') }}">Employees</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Employee Data</h6>
                <a href="{{ url('/admin/employees') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th scope="row" width="20%">Nama</th>
                                <td>{{ $employee->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Alamat</th>
                                <td>{{ $employee->alamat }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">No Hp</th>
                                <td>{{ $employee->no_hp }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Pekerjaan</th>
                                <td>{{ $employee->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Departemen</th>
                                <td>{{ $employee->departemen }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
