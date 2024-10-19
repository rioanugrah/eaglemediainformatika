@extends('layouts.backend.master')
@section('title')
    Cooperation Detail
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Detail Cooperation</h6>
        </div>
        <div class="card-body">
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="card-title mb-0">Personal Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Name</label>
                                <div>{{ $cooperation->cooperation_name }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Email</label>
                                <div>{{ $cooperation->cooperation_email }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <h6 class="card-title mb-0">Company Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Company Name</label>
                                <div>{{ $cooperation->cooperation_company }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Company Email</label>
                                <div>{{ $cooperation->cooperation_email_company }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Company Location</label>
                                <div>{{ $cooperation->cooperation_location }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Address 1</label>
                                <div>{{ $cooperation->cooperation_address_one }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Address 2</label>
                                <div>{{ $cooperation->cooperation_address_two }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Company Phone Number</label>
                                <div>{{ $cooperation->cooperation_no_telp }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">City</label>
                                <div>{{ $cooperation->cooperation_city }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">State</label>
                                <div>{{ $cooperation->cooperation_state }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Country</label>
                                <div>{{ $cooperation->cooperation_country }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form-label">Zip Code</label>
                                <div>{{ $cooperation->cooperation_zip_code }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-warning" onclick="window.location.href='{{ route('cooperation.edit',['cooperation_code' => $cooperation->cooperation_code]) }}'">Edit</button>
                <button type="button" onclick="window.location.href='{{ route('cooperation') }}'"
                    class="btn btn-secondary">Back</button>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
