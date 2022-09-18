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
    <h1 class="display-5 animated fadeIn mb-4">{{ $global_terms_privacy->terms_title }}</h1>
    <nav aria-label="breadcrumb animated fadeIn">
        <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-body active" aria-current="page">{{ $global_terms_privacy->terms_title }}
            </li>
        </ol>
    </nav>

</div>

@endsection


@section('content')


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="img/about.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">{{ $global_terms_privacy->terms_title }}</h1>
                <p class="mb-4">{!! $global_terms_privacy->terms_detail !!}</p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>

@endsection