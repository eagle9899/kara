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
    <h1 class="display-5 animated fadeIn mb-4">{{ $global_faq_about->faq_title }}</h1>
    <nav aria-label="breadcrumb animated fadeIn">
        <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-body active" aria-current="page">{{ $global_faq_about->faq_title }}</li>
        </ol>
    </nav>
</div>

@endsection


@section('content')


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            {{-- 
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/about.jpg">
                        </div>
                    </div>
                    --}}
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">

                <div class="accordion" id="accordionExample">
                    @foreach ($faqdatas as $faqitem)
                    <div class="accordion-item">
                        <h1 class="accordion-header" id="faqheading{{ $faqitem->id }}">
                            <button class="accordion-button @if (!$loop->iteration ==1)collapsed @endif" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $faqitem->id }}"
                                aria-expanded="@if ($loop->iteration ==1)true @else false @endif"
                                aria-controls="collapse{{ $faqitem->id }}">
                                {!! $faqitem->faq_title !!}
                            </button>
                        </h1>
                        <div id="collapse{{ $faqitem->id }}"
                            class="accordion-collapse collapse @if ($loop->iteration ==1)show @endif"
                            aria-labelledby="faqheading{{ $faqitem->id }}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $faqitem->faq_detail !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>

@endsection