@extends('layouts.app')

@push('title')
    Edit Approve 2 Booking Vehicle
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Approve 2 Booking Vehicle</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/approve2') }}">Approve 2 Booking Vehicles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Approve 2 Booking Vehicle Data</h6>
                <a href="{{ url('/admin/approve2') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/approve2/' . $approve2->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="booking_vehicle_id">Booking Vehicle ID</label>
                        <input type="text" class="form-control" id="booking_vehicle_id" name="booking_vehicle_id" required value="{{ $approve2->booking_vehicle_id }}">
                        @error('booking_vehicle_id')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="approve">Approve Pelaksana</label>
                        <select class="form-control" id="approve" name="approve" required>
                            <option value="" selected disabled>- Select Approve -</option>
                            <option value="Setuju" {{ $approve2->approve == 'Setuju' ? 'selected' : '' }}>Setuju</option>
                            <option value="Minta Persetujuan" {{ $approve2->approve == 'Minta Persetujuan' ? 'selected' : '' }}>Minta Persetujuan</option>
                        </select>
                        @error('approve')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
