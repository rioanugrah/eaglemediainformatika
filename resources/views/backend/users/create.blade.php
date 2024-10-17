@extends('layouts.backend.master')
@section('title')
    Create Users
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Create User</h6>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
            </div>
            {{-- <div class="mb-3">
                <label for="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
            </div> --}}
            <div class="mb-3">
                <label>Roles</label>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" onclick="window.location.href='{{ route('users') }}'" class="btn btn-secondary">Back</button>
            </div>
        </div>
    </div>
@endsection
