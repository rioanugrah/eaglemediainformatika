{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @csrf
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
</head>
<body>
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="{{ url('/') }}/assets/images/3306567.jpg">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="index.php" class="mb-40 max-w-290-px">
                        <img src="{{ url('/') }}/assets/images/LogoEagle.png">
                    </a>
                    <h4 class="mb-12">Login</h4>
                    <p class="mb-32 text-secondary-light text-lg">Selamat Datang di Eagle Media Informatika</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control h-56-px bg-neutral-50 radius-12 @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" class="form-control h-56-px bg-neutral-50 radius-12 @error('password') is-invalid @enderror" name="password" id="your-password" placeholder="Password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remeber">
                                <label class="form-check-label" for="remeber">Remember me </label>
                            </div>
                            <a href="javascript:void(0)" class="text-primary-600 fw-medium">Forgot Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Sign In</button>

                    {{-- <div class="mt-32 center-border-horizontal text-center">
                        <span class="bg-base z-1 px-4">Or sign in with</span>
                    </div>
                    <div class="mt-32 d-flex align-items-center gap-3">
                        <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                            <iconify-icon icon="ic:baseline-facebook" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                            Google
                        </button>
                        <button type="button" class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                            <iconify-icon icon="logos:google-icon" class="text-primary-600 text-xl line-height-1"></iconify-icon>
                            Google
                        </button>
                    </div>
                    <div class="mt-32 text-center text-sm">
                        <p class="mb-0">Don’t have an account? <a href="sign-up.php" class="text-primary-600 fw-semibold">Sign Up</a></p>
                    </div> --}}

                </form>
            </div>
        </div>
    </section>

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
</body>
</html>
