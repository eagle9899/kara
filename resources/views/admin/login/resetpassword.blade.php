<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link href="{{ asset('uploads/icon/'.$global_setting_data->favicon) }}" rel="icon">

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

                            <!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">
                                    <div class="d-flex justify-content-center py-4">
                                        <a href="{{ route('home') }}" class="logo d-flex align-items-center w-auto">
                                            <img src="assets/img/logo.png" alt="">
                                            <span class="d-none d-lg-block">Kara</span>
                                        </a>
                                    </div>
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to System</h5>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post"
                                        action="{{ route('admin_reset_password_submit') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}" id="">
                                        <input type="hidden" name="email" value="{{ $email }}" id="">
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Password</label>
                                            <div class="input-group has-validaltion">
                                                <input type="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    name="password" placeholder="password " id="yourUsername"
                                                    value="{{ old('password') }}" autofocus required>

                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Retype Password</label>
                                            <div class="input-group has-validaltion">
                                                <input type="password"
                                                    class="form-control  @error('retype_password') is-invalid @enderror"
                                                    name="retype_password" placeholder="retype password"
                                                    id="yourUsername" value="{{ old('retype_password') }}" autofocus
                                                    required>

                                                @error('retype_password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Submit</button>
                                        </div>
                                        <div class="col-12">
                                            <a type="button" href="{{ route('admin_login') }}"
                                                class="btn btn-primary w-100" type="submit">Back to Login</a>
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>


        </div>
    </div>


    @include('admin.layouts.script_footer')

</body>

</html>