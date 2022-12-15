@extends('layouts.app')

@push('title')
    Booking Vehicle Detail
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Booking Vehicle Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/booking-vehicles') }}">Booking Vehicles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Booking Vehicle Data</h6>
                <a href="{{ url('/admin/booking-vehicles') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th scope="row" width="20%">User</th>
                                <td>{{ $users->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Vehicle</th>
                                <td>{{ $vehicles->no_plat }} {{ $vehicles->merek }} {{ $vehicles->jenis }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Driver</th>
                                <td>{{ $drivers->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Employee</th>
                                <td>{{ $employees->nama }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tanggal Booking</th>
                                <td>{{ $booking_vehicles->tgl_booking }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tanggal Pinjam</th>
                                <td>{{ $booking_vehicles->tgl_pinjam }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tanggal Kembali</th>
                                <td>{{ $booking_vehicles->tgl_kembali }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Tanggal Dikembalikan</th>
                                <td>{{ $booking_vehicles->tgl_dikembalikan }}</td>
                            </tr>
                            <tr>
                                <th scope="row" width="20%">Status Booking</th>
                                <td>{{ $booking_vehicles->status_booking }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
