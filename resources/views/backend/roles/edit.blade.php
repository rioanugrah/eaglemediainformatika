@extends('layouts.backend.master')
@section('title')
    Edit Roles
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Edit Roles</h6>
        </div>
        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
        <div class="card-body">
            <div class="mb-3">
                <label for="form-label">Name</label>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <div class="row">
                        @foreach ($custom_permission as $key => $group)
                            <div class="col-md-6">
                                <label style="font-weight: bold">{{ ucfirst($key) }}</label>
                                <div>
                                    @forelse($group as $permission)
                                        <label class="">
                                            <input {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}
                                                name="permission[]" class="form-check-input radius-4 border border-neutral-400" type="checkbox"
                                                value="{{ $permission->id }}">
                                            {{ $permission->name }} &nbsp;&nbsp;
                                        </label>
                                    @empty
                                        {{ __('No permission in this group !') }}
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success" id="btn-submit">Submit</button>
                <button type="button" onclick="window.location.href='{{ route('roles.index') }}'"
                    class="btn btn-secondary">Back</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
