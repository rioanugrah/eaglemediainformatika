@extends('layouts.backend.master')
@section('title')
    Create Permission
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Create Permission</h6>
        </div>
        <form id="upload-form" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="form-label">Guard Name</label>
                    <select name="guard_name" class="form-control" id="">
                        <option value="">-- Pilih Guard Name --</option>
                        <option value="web">WEB</option>
                        <option value="api">API</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success" id="btn-submit">Submit</button>
                    <button type="button" onclick="window.location.href='{{ route('permissions') }}'" class="btn btn-secondary">Back</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        // function form_simpan(event)
        // {
        //     event.preventDefault();
        //     let formData = new FormData(this);
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('permissions.simpan') }}",
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: (result) => {
        //             if(result.success != false){
        //                 alert(result.title);
        //             }else{
        //                 alert(result.title);
        //             }
        //         },
        //         error: function (request, status, error) {
        //             alert(error);
        //         }
        //     })
        // }
        $('#upload-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            // $('#image-input-error').text('');
            $.ajax({
                type:'POST',
                url: "{{ route('permissions.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    document.getElementById('btn-submit').innerHTML = 'Loading...';
                    $(":submit").attr("disabled", true);
                },
                success: (result) => {
                    if(result.success != false){
                        alert(result.message_title);
                        this.reset();
                        document.getElementById('btn-submit').innerHTML = 'Submit';
                        $(":submit").attr("disabled", false);
                    }else{
                        alert(result.error);
                        document.getElementById('btn-submit').innerHTML = 'Submit';
                        $(":submit").attr("disabled", false);
                    }
                },
                error: function (request, status, error) {
                    alert(error);
                }
            });
        });
    </script>
@endsection
