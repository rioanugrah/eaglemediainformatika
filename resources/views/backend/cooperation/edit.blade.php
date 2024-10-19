@extends('layouts.backend.master')
@section('title')
    Cooperation Edit
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Edit Cooperation</h6>
        </div>
        <form id="upload-form" enctype="multipart/form-data">
            @csrf
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
                                    <input type="text" name="cooperation_name" value="{{ $cooperation->cooperation_name }}" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="form-label">Email</label>
                                    <input type="email" name="cooperation_email" value="{{ $cooperation->cooperation_email }}" class="form-control" placeholder="Email">
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
                    <button type="submit" class="btn btn-success" id="btn-submit">Update</button>
                    <button type="button" onclick="window.location.href='{{ route('cooperation') }}'" class="btn btn-secondary">Back</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Submit!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        url: "{{ route('cooperation.update',['cooperation_code' => $cooperation->cooperation_code]) }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: () => {
                            document.getElementById('btn-submit').innerHTML = 'Loading...';
                            $(":submit").attr("disabled", true);
                        },
                        success: (result) => {
                            if(result.success != false){
                                Swal.fire({
                                    title: result.message_title,
                                    text: result.message_content,
                                    icon: "success"
                                });
                                $(":submit").attr("disabled", false);
                                setTimeout(() => {
                                    window.location.href="{{ route('cooperation') }}";
                                }, 3000);
                            }else{
                                Swal.fire({
                                    title: "Error!",
                                    text: result.error,
                                    icon: "error"
                                });
                                document.getElementById('btn-submit').innerHTML = 'Submit';
                                $(":submit").attr("disabled", false);
                            }
                        },
                        error: function (request, status, error) {
                            alert(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
