@extends('layouts.app')

@push('title')
    Edit Driver
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Driver</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/admin/drivers') }}">Drivers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Driver Data</h6>
                <a href="{{ url('/admin/drivers') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </a>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/drivers/' . $driver->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required value="{{ $driver->nama }}">
                        @error('nama')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required value="{{ $driver->alamat }}">
                        @error('alamat')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required value="{{ $driver->no_hp }}">
                        @error('no_hp')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ktp">KTP</label>
                        <input type="text" class="form-control" id="ktp" name="ktp" required value="{{ $driver->ktp }}">
                        @error('ktp')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_driver">Status Driver</label>
                        <select class="form-control" id="status_driver" name="status_driver" required>
                            <option value="" selected disabled>- Select Status -</option>
                            <option value="Bersedia" {{ $driver->status_driver == 'Bersedia' ? 'selected' : '' }}>Bersedia</option>
                            <option value="Tidak Bersedia" {{ $driver->status_driver == 'Tidak Bersedia' ? 'selected' : '' }}>Tidak Bersedia</option>
                        </select>
                        @error('status_driver')
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
