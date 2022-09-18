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
    <h1 class="display-5 animated fadeIn mb-4">{{ $global_disclaimer_login_contact->contact_title }}</h1>
    <nav aria-label="breadcrumb animated fadeIn">
        <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-body active" aria-current="page">
                {{ $global_disclaimer_login_contact->contact_title }}</li>
        </ol>
    </nav>
</div>

@endsection


@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">{{ $global_disclaimer_login_contact->contact_title }}</h1>
            <p>{!! $global_disclaimer_login_contact->contact_detail !!}</p>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center bg-white rounded p-3"
                                style="border: 1px dashed rgba(0, 185, 142, .3)">
                                <div class="icon me-3" style="width: 45px; height: 45px;">
                                    <i class="fa fa-map-marker-alt text-primary"></i>
                                </div>
                                <span>{{ $global_our_address->address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center bg-white rounded p-3"
                                style="border: 1px dashed rgba(0, 185, 142, .3)">
                                <div class="icon me-3" style="width: 45px; height: 45px;">
                                    <i class="fa fa-envelope-open text-primary"></i>
                                </div>
                                <span>{{ $global_our_address->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center bg-white rounded p-3"
                                style="border: 1px dashed rgba(0, 185, 142, .3)">
                                <div class="icon me-3" style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <span>{{ $global_our_address->phone }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                {!! $global_disclaimer_login_contact->contact_map !!}


                {{-- <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe> --}}

            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                    <form method="post" action="{{ route('contact_form_submit') }}" class="form_contact_ajax">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your Name">
                                    <span class="text-danger error-text name_error"></span>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email">
                                    <span class="text-danger error-text email_error"></span>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control" id="subject"
                                        placeholder="Subject">
                                    <span class="text-danger error-text subject_error"></span>
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" placeholder="Leave a message here"
                                        id="message" style="height: 150px"></textarea>
                                    <span class="text-danger error-text message_error"></span>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
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