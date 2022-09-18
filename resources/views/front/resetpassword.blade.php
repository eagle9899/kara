@php
$meta_title = 'Kara | ';
foreach ($global_categories as $key) {
$meta_title .= $key->name .',';
}
$desc ='';
foreach ($global_sub_categories as $key) {
$desc .= $key->sub_category .',';
}
$meta_keywords = $meta_title;

$meta_desc = $desc;
$title = $meta_title;
@endphp

@extends('front.layouts.app')

@section('slogan')

<div class="col-md-6 p-5 mt-lg-5">
    <h1 class="display-5 animated fadeIn mb-4">Reset Password</h1>
    <nav aria-label="breadcrumb animated fadeIn">
        <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-body active" aria-current="page">
                Reset Password</li>
        </ol>
    </nav>
</div>

@endsection


@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Reset Password</h1>
            <p>Reset password</p>
        </div>
        <div class="row g-4">

            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                {!! $global_disclaimer_login_contact->contact_map !!}

                {{-- 
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>    
                        --}}
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <form method="post" action="{{ route('user_reset_password_submit') }}">
                        @csrf
                        <div class="row g-3">

                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password" placeholder="password" min="6">
                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password"
                                        class="form-control @error('retypr_password') is-invalid @enderror"
                                        name="retype_password" id="retypr_password" placeholder="retypr-password"
                                        min="6">
                                    <label for="retypr_password">Retype Password</label>
                                </div>
                            </div>



                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                            </div>
                            <div class="col-12">
                                <a type="button" href="{{ route('userlogin') }}" class="btn btn-primary w-100 py-3"
                                    type="submit">Back to Login page</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loader"></div>
@endsection