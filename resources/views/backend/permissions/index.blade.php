@extends('layouts.backend.master')
@section('title')
    Permissions
@endsection
@section('content')
<div class="card basic-data-table">
    <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
            <h6 class="mb-2 fw-bold text-lg">Permissions</h6>
            <a href="{{ route('permissions.create') }}" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 text-sm btn-sm px-8 py-6">
                <iconify-icon icon="ph:plus-circle" class="icon text-xl"></iconify-icon> Create Permission
            </a>
        </div>
        <div class="table-responsive">
            <table class="table bordered-table mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Guard Name</th>
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
        ajax: "{{ route('permissions') }}",
        columns: [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'guard_name',
                name: 'guard_name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });
</script>
@endsection
