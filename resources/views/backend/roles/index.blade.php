@extends('layouts.backend.master')
@section('title')
    Roles
@endsection
@section('content')
    <div class="card basic-data-table">
        <div class="card-body">
            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between mb-20">
                <h6 class="mb-2 fw-bold text-lg">Roles</h6>
                <a href="{{ route('roles.create') }}" class="btn btn-outline-primary d-inline-flex align-items-center gap-2 text-sm btn-sm px-8 py-6">
                    <iconify-icon icon="ph:plus-circle" class="icon text-xl"></iconify-icon> Create Roles
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
                    <tbody>
                        @if ($roles->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">No Roles</td>
                        </tr>
                        @else
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
