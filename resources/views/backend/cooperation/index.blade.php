@extends('layouts.backend.master')
@section('title')
    Cooperation
@endsection
@section('content')
<div class="card basic-data-table">
    <div class="card-body">
        <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
            <h6 class="mb-2 fw-bold text-lg">Cooperation</h6>
            <a href="{{ route('cooperation.create') }}" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 text-sm btn-sm px-8 py-6">
                <iconify-icon icon="ph:plus-circle" class="icon text-xl"></iconify-icon> Create Cooperation
            </a>
        </div>
        <div class="table-responsive">
            <table class="table bordered-table mb-0" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">Corporate Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Company Email</th>
                        <th scope="col">Status</th>
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
        ajax: "{{ route('cooperation') }}",
        columns: [
            {
                data: 'cooperation_code',
                name: 'cooperation_code'
            },
            {
                data: 'cooperation_name',
                name: 'cooperation_name'
            },
            {
                data: 'cooperation_email',
                name: 'cooperation_email'
            },
            {
                data: 'cooperation_company',
                name: 'cooperation_company'
            },
            {
                data: 'cooperation_email_company',
                name: 'cooperation_email_company'
            },
            {
                data: 'status',
                name: 'status'
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
