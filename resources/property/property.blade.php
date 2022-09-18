
@extends('front.layouts.app')

@section('slogan')

                 <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Property Type</h1> 
                        <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                             
                            <li class="breadcrumb-item text-body active" aria-current="page">Property Types</li>
                        </ol>
                    </nav>
                </div>
@endsection


@section('content')

        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Property Types</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                
                
                <div class="row g-4 justify-content-center"> 
                    @foreach ($postproperties as $item)
                          
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="{{ route('property-type', $item->property) }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="{{ asset('uploads/icon/'.$item->icon) }}" alt="Icon">
                                </div>
                                <h6> {{ $item->property }} </h6>
                                <span>{{ $item->propertiescount }} Properties </span>
                            </div>
                        </a>
                    </div> 
                    @endforeach 
                </div>
            </div>
        </div>
        
        <!-- Category End -->

       
@endsection

