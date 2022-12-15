@extends('layouts.app')

@push('title')
    Edit Rent Vehicle
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Rent Vehicle</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/rent-vehicles') }}">Rent Vehicles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Rent Vehicle Data</h6>
                <a href="{{ url('/admin/rent-vehicles') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/rent-vehicles/' . $rent_vehicle->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="no_plat">No Plat</label>
                        <input type="text" class="form-control" id="no_plat" name="no_plat" required value="{{ $rent_vehicle->no_plat }}">
                        @error('no_plat')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" class="form-control" id="merek" name="merek" required value="{{ $rent_vehicle->merek }}">
                        @error('merek')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" required value="{{ $rent_vehicle->jenis }}">
                        @error('jenis')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" id="tahun" name="tahun" required value="{{ $rent_vehicle->tahun }}">
                        @error('tahun')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_berakhir">Tanggal Berakhir</label>
                        <input type="text" class="form-control" id="tgl_berakhir" name="tgl_berakhir" required value="{{ $rent_vehicle->tgl_berakhir }}">
                        @error('tgl_berakhir')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tarif">Tarif</label>
                        <input type="text" class="form-control" id="tarif" name="tarif" required value="{{ $rent_vehicle->tarif }}">
                        @error('tarif')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_sewa">Tempat Sewa</label>
                        <input type="text" class="form-control" id="tempat_sewa" name="tempat_sewa" required value="{{ $rent_vehicle->tempat_sewa }}">
                        @error('tempat_sewa')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_vehicle">Status</label>
                        <select class="form-control" id="status_vehicle" name="status_vehicle" required >
                            <option value="" selected disabled>- Select Status -</option>
                            <option value="Bersedia" {{ $rent_vehicle->status_vehicle == 'Bersedia' ? 'selected' : ''}}>Bersedia</option>
                            <option value="On The Way" {{ $rent_vehicle->status_vehicle == 'On The Way' ? 'selected' : ''}}>On The Way</option>
                        </select>
                        @error('status_vehicle')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="angkutan">Angkutan</label>
                        <input type="text" class="form-control" id="angkutan" name="angkutan" required value="{{ $rent_vehicle->angkutan }}">
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
