@extends('layouts.app')

@push('title')
    Edit Vehicle
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Vehicle</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/vehicles') }}">Vehicles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Vehicle Data</h6>
                <a href="{{ url('/admin/vehicles') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/vehicles/' . $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="no_plat">No Plat</label>
                        <input type="text" class="form-control" id="no_plat" name="no_plat" required value="{{ $vehicle->no_plat }}">
                        @error('no_plat')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" class="form-control" id="merek" name="merek" required value="{{ $vehicle->merek }}">
                        @error('merek')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" required value="{{ $vehicle->jenis }}">
                        @error('jenis')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" required value="{{ $vehicle->tahun }}">
                        @error('tahun')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_vehicle">Status</label>
                        <select class="form-control" id="status_vehicle" name="status_vehicle" required >
                            <option value="" selected disabled>- Select Status -</option>
                            <option value="Bersedia" {{ $vehicle->status_vehicle == 'Bersedia' ? 'selected' : ''}}>Bersedia</option>
                            <option value="On The Way" {{ $vehicle->status_vehicle == 'On The Way' ? 'selected' : ''}}>On The Way</option>
                            <option value="Service" {{ $vehicle->status_vehicle == 'Service' ? 'selected' : ''}}>Service</option>
                        </select>
                        @error('status_vehicle')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="angkutan">Angkutan</label>
                        <input type="text" class="form-control" id="angkutan" name="angkutan" required value="{{ $vehicle->angkutan }}">
                        @error('angkutan')
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
