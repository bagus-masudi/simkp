@extends('layouts.app')

@push('title')
    Approve 1 Booking Vehicles
@endpush

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Approve 1 Booking Vehicles</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item active" aria-current="page">Approve 1 Booking Vehicles</li>
                </ol>
            </nav>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h6 class="m-0 font-weight-bold text-primary">Approve 1 Booking Vehicles Data</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Booking Vehicle ID</th>
                                <th>User ID</th>
                                <th>Approve Pelaksana</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approve1 as $row)
                                <tr>
                                    <td>{{ $row->booking_vehicle_id }}</td>
                                    <td>{{ $row->user_id }}</td>
                                    <td>
                                        <span class="badge badge-{{ $row->approve == 'Minta Persetujuan' ? 'danger' : 'success' }}">
                                            {{ $row->approve }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/approve1/' . $row->id . '/edit') }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button onclick="showDeleteModal( {{ $row->id }}, '{{ $row->nama  }}' )" class="btn btn-sm btn-danger">
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
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete item with name <strong id="xName"></strong>?</div>
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
