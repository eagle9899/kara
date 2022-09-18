@php
$meta_title = 'types of '. $category->name ;
$meta_keywords = 'types of '. $category->name . 's Kara, Real estate';
$desc = '';
$title = '';
if (count($postproperties)) {
foreach ($postproperties as $item) {
$desc .= ',' .$item->sub_category;
}
foreach ($postproperties as $item) {
$title .= ' | '.$item->sub_category;
}
}
$meta_desc = 'types of '. $category->name . $desc;
$title = $category->name . 's Kara' .$title;
@endphp

@extends('front.layouts.app')

@section('slogan')

<div class="col-md-6 p-5 mt-lg-5">
    <h1 class="display-5 animated fadeIn mb-4">{{ $category->name }}</h1>
    <nav aria-label="breadcrumb animated fadeIn">
        <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-body active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>
</div>
@endsection


@section('content')


<!-- start of top advertisement -->
@if (false)

<div class="container-xxl py-5">
    <div class="container">
        <div class=" mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            <h1 class="mb-3">Top Advertisement</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
    </div>
</div>
@endif
<!-- end of top advertisement -->
<!-- Property List Start -->
<div class="container-xxl py-5">

    <!-- Category Start -->
    <div class="container mb-5">
        @if (count($postproperties))
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Types of {{ $category->name }}</h1>

        </div>


        <div class="row g-4 justify-content-center">

            @foreach ($postproperties as $item)

            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item d-block bg-light text-center rounded p-3"
                    href="{{ route('category_detail', $item->slugs .'/'. $item->slug) }}">
                    <div class="rounded p-4">
                        <div class="icon mb-3">
                            <img class="img-fluid" src="{{ asset('uploads/icon/'.$item->icon) }}" alt="Icon">
                        </div>
                        <h6> {{ $item->sub_category }} </h6>
                        <span>{{ $item->subcategoriescount }} Properties </span>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        @else
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                        <h1 class="display-1">404</h1>
                        <h1 class="mb-4">Data Not Found</h1>
                        <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website!
                            Maybe go to our home page or try to use a search?</p>
                        <a class="btn btn-primary py-3 px-5" href="{{ route('home') }}">Go Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Category End -->

</div>
<!-- Property List End -->



<!-- start of bottom advertisement -->
@if (false)
<div class="container-xxl py-5">
    <div class="container">
        <div class=" mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            <h1 class="mb-3">Bottom Advertisement</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
    </div>
</div>
@endif

<!-- end of bottom advertisement -->

@endsection