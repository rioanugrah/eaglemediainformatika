@extends('layouts.backend.master')
@section('title')
    Edit Permission {{ $permission->name }}
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
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $permission->name }}">
                </div>
                <div class="mb-3">
                    <label for="form-label">Guard Name</label>
                    <select name="guard_name" class="form-control" id="">
                        <option value="">-- Pilih Guard Name --</option>
                        <option value="web" {{ $permission->guard_name == 'web' ? 'selected' : 'null' }}>WEB</option>
                        <option value="api" {{ $permission->guard_name == 'api' ? 'selected' : 'null' }}>API</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success" id="btn-submit">Update</button>
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
                url: "{{ route('permissions.update',['id' => $permission->id]) }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    document.getElementById('btn-submit').innerHTML = 'Loading...';
                    $(":submit").attr("disabled", true);
                    $("input").attr("readOnly", true);
                    $("select").attr("disable", true);
                },
                success: (result) => {
                    if(result.success != false){
                        alert(result.message_title);
                        window.location.href='{{ route("permissions") }}';
                    }else{
                        alert(result.error);
                        document.getElementById('btn-submit').innerHTML = 'Update';
                        $(":submit").attr("disabled", false);
                        $("input").attr("readOnly", false);
                    $("select").attr("disable", false);
                    }
                },
                error: function (request, status, error) {
                    alert(error);
                }
            });
        });
    </script>
@endsection
