<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ $allSetting->favicon_url }}" />
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/main.css') }}" />
    <link href="{{ asset('assets/backend/toastr/toastr.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    <style>
        .login-screen .login-logo img {
            max-width: 250px !important;
        }
    </style>
</head>

<body class="authentication">
    <div class="container">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="{{ route('home') }}" class="login-logo">
                                <img src="{{ $allSetting->logo_url }}" alt="" class="m-auto" />
                            </a>
                            <h5>Welcome back,<br />Please Login to your Account.</h5>
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email Address" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="mobile" type="text"
                                    class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                    placeholder="Mobile Number" value="{{ old('mobile') }}" required
                                    autocomplete="mobile" autofocus>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" required autocomplete="current-password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Confirm Password" required
                                    autocomplete="current-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="actions mb-4">
                                <div class="custom-control custom-checkbox">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="forgot-pwd">
                                    <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                            @endif
                            <hr>
                            <div class="actions align-left">
                                <span class="additional-link">Already have an account?</span>
                                <a href="{{ route('login') }}" class="btn btn-dark">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/toastr/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}
</body>

</html>
{{-- ---------------------------------
<main class="main">
    <div class="page-content mt-6 pb-2 mb-10">
        <div class="container">
            <div class="login-popup">
                <div class="form-box">
                    <div class="tab tab-nav-simple tab-nav-boxed form-tab">
                        <ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-no lh-1 ls-normal" href="#register">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="register">
                                <div class="pb-3">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-white">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                        <span class="border-end country-code form-control" style="width: fit-content;">+1</span>
                                        <input type="text" name="mobile" class="form-control"
                                            value="{{ old('mobile') }}" placeholder="Mobile" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" value=""
                                            placeholder="Enter Password" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation"
                                            placeholder="Confirm Password" class="form-control" required>
                                    </div>
                                    <div class="form-footer">
                                        <div class="form-checkbox">
                                            <input type="checkbox" class="custom-checkbox" id="register-agree"
                                                name="register-agree" required />
                                            <label class="form-control-label" for="register-agree">
                                                <a href="{{ route('privacy_policy') }}" target="_blank"> I agree to the
                                                    privacy
                                                    policy</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-dark btn-block btn-rounded" type="submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> --}}
