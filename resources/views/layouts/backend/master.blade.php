<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/remixicon.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/apexcharts.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/dataTables.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/editor-katex.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/editor.atom-one-dark.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/editor.quill.snow.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/flatpickr.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/full-calendar.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/jquery-jvectormap-2.0.5.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/slick.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/prism.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/file-upload.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/lib/audioplayer.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
    @yield('css')
</head>
<body>
    @include('layouts.backend.sidebar')
    <main class="dashboard-main">
        @include('layouts.backend.header')
        <div class="dashboard-main-body">
            @yield('content')
        </div>
        @include('layouts.backend.footer')
    </main>
    <script src="{{ url('/') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/iconify-icon.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/jquery-ui.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/magnifc-popup.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/slick.min.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/prism.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/file-upload.js"></script>
    <script src="{{ url('/') }}/assets/js/lib/audioplayer.js"></script>
    <script src="{{ url('/') }}/assets/js/app.js"></script>
    @yield('script')
</body>
</html>
