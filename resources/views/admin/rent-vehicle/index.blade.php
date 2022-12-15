@extends('layouts.app')

@push('title')
    Rent Vehicles
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Rent Vehicles</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Rent Vehicles</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rent Vehicles Data</h6>
                <a href="{{ url('/admin/rent-vehicles/create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Add Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No Plat</th>
                                <th>Merek</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Tanggal Berakhir</th>
                                <th>Tarif</th>
                                <th>Tempat Sewa</th>
                                <th>Status</th>
                                <th>Angkutan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rent_vehicles as $row)
                                <tr>
                                    <td>{{ $row->no_plat }}</td>
                                    <td>{{ $row->merek }}</td>
                                    <td>{{ $row->jenis }}</td>
                                    <td>{{ $row->tahun }}</td>
                                    <td>{{ $row->tgl_berakhir }}</td>
                                    <td>Rp. {{ $row->tarif = number_format($row->tarif, 0, ',', '.'); }}</td>
                                    <td>{{ $row->tempat_sewa }}</td>
                                    <td>
                                        <span class="badge badge-{{ $row->status_vehicle == 'Bersedia' ? 'success' : 'primary'}}">
                                            {{ $row->status_vehicle }}
                                        </span>
                                    </td>
                                    <td>{{ $row->angkutan }}</td>
                                    <td>
                                        <a href="{{ url('/admin/rent-vehicles/' . $row->id) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/rent-vehicles/' . $row->id . '/edit') }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button onclick="showDeleteModal( {{ $row->id }}, '{{ $row->no_plat  }}' )" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete item with No Plat <strong id="xName"></strong>?</div>
                <div class="modal-footer">
                    <form class="delete" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('redir_data'))
        <div class="position-fixed top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
            <div class="toast hide align-items-center text-white border-0 @if (session('redir_data')['error']) bg-danger @else bg-success @endif" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('redir_data')['message'] }}
                    </div>
                    <button type="button" class="mr-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function showDeleteModal(id, name){
            $('#xName').text(name);
            $('.delete').attr('action', window.location + '/' + id)
            $('#deleteModal').modal('show');
        }
    </script>
    @if (session('redir_data'))
        <script>
            $('.toast').toast('show')
        </script>
    @endif
@endpush
