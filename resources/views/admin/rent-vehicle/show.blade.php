@extends('layouts.app')

@push('title')
    Rent Vehicle Detail
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Rent Vehicle Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/rent-vehicles') }}">Rent Vehicles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rent Vehicle Data</h6>
                <a href="{{ url('/admin/rent-vehicles') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th scope="row" width="20%">No Plat</th>
                                <td>{{ $rent_vehicle->no_plat }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Merek</th>
                                <td>{{ $rent_vehicle->merek }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Jenis</th>
                                <td>{{ $rent_vehicle->jenis }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tahun</th>
                                <td>{{ $rent_vehicle->tahun }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tanggal Berakhir</th>
                                <td>{{ $rent_vehicle->tgl_berakhir }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tarif</th>
                                <td>{{ $rent_vehicle->tarif }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tempat Sewa</th>
                                <td>{{ $rent_vehicle->tempat_sewa }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Status</th>
                                <td>{{ $rent_vehicle->status_vehicle }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Angkutan</th>
                                <td>{{ $rent_vehicle->angkutan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
