@extends('layouts.app')

@push('title')
    Add Booking Vehicle
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Booking Vehicle</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/booking-vehicles') }}">Booking Vehicles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Booking Vehicle Data</h6>
                <a href="{{ url('/admin/booking-vehicles') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/booking-vehicles/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="vehicle_id">Vehicle</label>
                        <select class="form-control" id="vehicle_id" name="vehicle_id" required>
                            <option value="" selected disabled>- Select Vehicle -</option>
                            @foreach ($vehicles as $row)
                                <option value="{{ $row->id }}" @if (old('vehicle_id') == $row->id) selected @endif>{{ ucwords($row->no_plat) }} {{ ucwords($row->merek) }} {{ ucwords($row->jenis) }}</option>
                            @endforeach
                        </select>
                        @error('vehicle_id')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="driver_id">Driver</label>
                        <select class="form-control" id="driver_id" name="driver_id" required>
                            <option value="" selected disabled>- Select Driver -</option>
                            @foreach ($drivers as $row)
                                <option value="{{ $row->id }}" @if (old('driver_id') == $row->id) selected @endif>{{ ucwords($row->nama) }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="employee_id">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="" selected disabled>- Select Employee -</option>
                            @foreach ($employees as $row)
                                <option value="{{ $row->id }}" @if (old('employee_id') == $row->id) selected @endif>{{ ucwords($row->nama) }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_booking">Tanggal Booking</label>
                        <input type="date" class="form-control w-25" id="tgl_booking" name="tgl_booking" required>
                        @error('tgl_booking')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pelaksana_id">Approve Pelaksana</label>
                        <select class="form-control" id="pelaksana_id" name="pelaksana_id" required>
                            <option value="" selected disabled>- Select Pelaksana -</option>
                            @foreach ($pelaksana as $row)
                                <option value="{{ $row->id }}" @if (old('pelaksana_id') == $row->id) selected @endif>{{ ucwords($row->nama) }}</option>
                            @endforeach
                        </select>
                        @error('pelaksana_id')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab_id">Approve Penanggung Jawab</label>
                        <select class="form-control" id="penanggung_jawab_id" name="penanggung_jawab_id" required>
                            <option value="" selected disabled>- Select Penanggung Jawab -</option>
                            @foreach ($penanggung_jawab as $row)
                                <option value="{{ $row->id }}" @if (old('penanggung_jawab_id') == $row->id) selected @endif>{{ ucwords($row->nama) }}</option>
                            @endforeach
                        </select>
                        @error('penanggung_jawab_id')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endpush
