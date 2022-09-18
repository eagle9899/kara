<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap"
        rel="stylesheet">

    {{--<link rel="stylesheet" href="dist/css/iziToast.min.css">
  
    <script src="dist/js/iziToast.min.js"></script>--}}


    @include('admin.layouts.styles')


</head>

<body>
    <div id="app">
        <div class="main-wrapper">


            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{{ route('home') }}" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Khana</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to System</h5>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('admin_login_submit') }}">
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validaltion">
                                                <input type="email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    name="email" placeholder="Email Address" id="yourUsername"
                                                    value="{{ old('email') }}" autofocus required>


                                                @if(session()->get('error'))
                                                <div class="invalid-feedback">{{ session()->get('error') }}</div>
                                                @endif
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="****" required>
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <a href="forget-password.html">
                                                    Forget Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>


            <section class="section">
                <div class="container container-login">
                    <div class="row">
                        <div
                            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary border-box">
                                <div class="card-header card-header-auth">
                                    <h4 class="text-center">Admin Panel Login</h4>
                                </div>
                                <div class="card-body card-body-auth">
                                    <form method="post" action="{{ route('admin_login_submit') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control  @error('email') is-invalid @enderror" name="email"
                                                placeholder="Email Address" value="{{ old('email') }}" autofocus>
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            @if(session()->get('error'))
                                            <div class="text-danger">{{ session()->get('error') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password">
                                            @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg text-lg btn-block">
                                                Login
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <a href="forget-password.html">
                                                    Forget Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        @include('admin.layouts.script_footer')

</body>

</html>