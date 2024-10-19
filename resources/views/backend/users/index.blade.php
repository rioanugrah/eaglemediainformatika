@extends('layouts.backend.master')
@section('title')
    Users
@endsection
@section('content')
    <div class="card basic-data-table">
        <div class="card-body">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                <h6 class="mb-2 fw-bold text-lg">Users</h6>
                <div>
                    <a href="{{ route('users.create') }}" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 text-sm btn-sm px-8 py-6">
                        <iconify-icon icon="ph:plus-circle" class="icon text-xl"></iconify-icon> Create User
                    </a>
                    <button onclick="reload()" class="btn btn-outline-info d-inline-flex align-items-center gap-2 text-sm btn-sm px-8 py-6">
                        <iconify-icon icon="ion:reload" class="icon text-xl"></iconify-icon> Refresh
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table bordered-table mb-0" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Join</th>
                            <th scope="col">Update</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'roles',
                    name: 'roles'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
        });

        function reload()
        {
            table.ajax.reload(null,false);
        }
    </script>
@endsection
