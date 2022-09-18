@php
$meta_title = $post->title . ','. $post->city .','. $post->rSubcategory->sub_category. ','.$post->rCategory->name;
$meta_keywords = $post->title . ','. $post->city .','. $post->rSubcategory->sub_category. ','. $post->rCategory->name ;
$desc = '';

$meta_desc = $post->title .','.$post->address. ','. $post->city .','. $post->rSubcategory->sub_category .','.
$post->rCategory->name ;
$title = $meta_title;
@endphp
@extends('front.layouts.app')

@section('slogan')

<div class="col-md-6 p-5 mt-lg-5">
    <h1 class="display-5 animated fadeIn mb-4">{{ $post->city }}</h1>
    <nav aria-label="breadcrumb animated fadeIn">
        <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-body active" aria-current="page">City</li>
            <li class="breadcrumb-item"><a href="{{ route('city_post', $post->city) }}">{{ $post->city }}</a></li>
            <li class="breadcrumb-item text-body active" aria-current="page">{{ $post->rSubcategory->sub_category }}
            </li>
        </ol>
    </nav>
</div>
@endsection


@section('content')


<!-- About Start -->
<div class="container-xxl bg-white py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-12 mb-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="text-lg-end wow mx-auto slideInRight pb-2 " data-wow-delay="0.1s">
                                <a href="" type="button" class="btn btn-ouline-success favorite border"><i
                                        class="bi bi-heart"></i></a>

                                <div class="dropdown d-inline">
                                    <a type="button" class="dropdown-toggle share btn" aria-expanded="false"
                                        data-bs-toggle="dropdown"><i class="bi bi-share"></i></a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        @foreach ($shareable as $item)
                                        <a href="{{ $item->url }}" class="dropdown-item"><i
                                                class="{{ $item->icon }}"></i>{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-8">
                                <h1 class="h1">{!! $post->title !!}</h1>
                                <h6 class="h6 text-secondary"><i
                                        class="fa fa-map-marker-alt me-2"></i>{{ $post->address }}</h6>

                                <h6 class="h6 text-secondary text-capitalize">Added By: {{ ($userdata->name) }}</h6>
                            </div>
                            <div class="col-sm-4 text-lg-end wow slideInRight" data-wow-delay="0.1s">
                                <p><span class="text-uppercase">{!! $post->currency !!}</span>{!! $post->rate !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="row">
                <div class="col-lg-8 col-ms-12 p-4 pe-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="carouselExampleInterval{{ $post->id }}" class="carousel slide"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($post->postImages as $photo)
                                    <div class="carousel-item {{ $loop->first ?'active' :'' }}" data-bs-interval="10000"
                                        style="max-height: 580px">
                                        <img class="img-fluid" src="{{ asset('uploads/' . $photo->photo) }}"
                                            alt="{!! $post->title !!}" title="{!! $post->title !!}">
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleInterval{{ $post->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleInterval{{ $post->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                            {{--
                                        <div class="photo-gallery pt-2 d-flex">
                                        @foreach ($post->postImages as $photo)
                                            <div class="photo-thumb me-2">
                                                <img src="{{ asset('uploads/' . $photo->photo) }}" alt="{!!
                            $post->title !!}" title="{!! $post->title !!}">
                            <div class="bg"></div>
                            <div class="icon">
                                <a href="{{ asset('uploads/' . $photo->photo) }}" class="magnific"><i
                                        class="fa fa-plus"></i></a>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    --}}
                </div>

            </div>

            <div class="row">
                <div class="pt-5">

                    <div class="p-4 pb-2 property-item rounded overflow-hidden">
                        <div class="justify-content-between d-flex align-items-center">
                            <h2>Overview</h2>
                            <div>
                                <strong>Property ID: </strong>
                                {{ $post->id }}
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12 d-flex">
                            <ul class="list-unstyled pe-4">
                                <li> Type</li>
                                <li><strong>{{ $post->rSubCategory->sub_category }}</strong></li>
                            </ul>
                            <ul class="list-unstyled pe-5 ps-1">
                                <li>Bedroom</li>
                                <li><i class="fa fa-bed text-primary "></i> <strong> @php
                                        $bdroom = $post->bedroom =='1' ? "Yes" : "No";
                                        @endphp {{ $bdroom }}</strong></li>
                            </ul>
                            <ul class="list-unstyled pe-5 ps-1">
                                <li>Bathrooms</li>
                                <li><i class="fa fa-shower text-primary "></i> <strong>{{ $post->bathrooms }}</strong>
                                </li>
                            </ul>
                            <ul class="list-unstyled pe-5 ps-1">
                                <li>Garage</li>
                                <li><i class="fa fa-car text-primary"></i> <strong>{{ $post->garage }}</strong></li>
                            </ul>
                            <ul class="list-unstyled pe-5 ps-1">
                                <li>Garage</li>
                                <li><i class="fa fa-ruler-combined text-primary "></i>
                                    <strong>{{ $post->space }}</strong>
                                </li>
                            </ul>

                            <ul class="list-unstyled pe-5 ps-1">
                                <li>Viewiers</li>
                                <li><i class="fa fa-eye text-primary "></i>
                                    <strong>{{ $post->visitors }}</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="pt-5">

                    <div class="p-4 pb-2 property-item rounded overflow-hidden">
                        <div class="justify-content-between d-flex align-items-center">
                            <h2>Description</h2>
                        </div>
                        <hr>
                        <div class="col-lg-12 ">
                            <h3 class="pb-3">
                                {{ $post->rSubcategory->sub_category }} Specification:
                            </h3>
                            <div class="ps-3">
                                <p>{!! $post->description !!}</p>
                            </div>
                            <div><strong> {!! $post->rSubCategory->sub_category !!} Address: </strong>{!! $post->address
                                !!}
                            </div>
                            <div><strong>Contact Number: </strong>{{ $post->phone }}</div>
                            <hr>

                            <div>
                                <p>For similar entities see the <a href="{{ route('home') }}">home</a> page</p>
                                <p>Follow us on social media</p>
                            </div>

                            <div class="advertisement p-5">
                                @if (true)

                                <div class="container-xxl py-5">
                                    <div class="container">
                                        <div class=" mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                                            <h4 class="mb-3">Advertisement</h4>

                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pt-5">

                    <div class="p-4 property-item rounded overflow-hidden">
                        <div class="justify-content-between d-flex align-items-center">
                            <h2>Details</h2>
                            <div> <i class="fa fa-calendar text-primary me-2"></i>
                                @php
                                $updatedate = strtotime($post->updated_at);
                                $updatedate = date('M d, Y h:i A', $updatedate);

                                @endphp {{ $updatedate }}
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12 p-5 border pb-2 rounded">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="justify-content-between d-flex">
                                        <h6>Property ID:</h6>
                                        <div>{{ $post->id }}</div>
                                    </div>
                                    <hr>
                                    <div class="justify-content-between d-flex">
                                        <h6>Price:</h6>
                                        <div>{{ $post->currency }}{{ $post->price }}</div>
                                    </div>
                                    <hr>
                                    <div class="justify-content-between d-flex">
                                        <h6>{{ $post->rSubcategory->sub_category }} Area:</h6>
                                        <div>{{ $post->space }}</div>
                                    </div>
                                    <hr>
                                    @if ($post->bedroom > 0)
                                    <div class="justify-content-between d-flex">
                                        <h6>Bedrooms:</h6>
                                        <div>@php $bdroom = $post->bedroom == '1' ? "Yes" : "No"; echo($bdroom) @endphp
                                        </div>
                                    </div>
                                    <hr>
                                    @endif
                                    @if ($post->bedroom > 0)
                                    <div class="justify-content-between d-flex">
                                        <h6>Rooms:</h6>
                                        <div>{{ $post->rooms }}</div>

                                    </div>
                                    <hr>
                                    @endif
                                    @if ($post->bedroom > 0)
                                    <div class="justify-content-between d-flex">
                                        <h6>Bathrooms:</h6>
                                        <div>{{ $post->bathrooms }}</div>

                                    </div>
                                    <hr>
                                    @endif
                                </div>
                                {{-- right side --}}
                                <div class="col-lg-6">

                                    <div class="justify-content-between d-flex">
                                        <h6>Garage:</h6>
                                        <div> {{ $post->garage }} </div>
                                    </div>
                                    <hr>
                                    <div class="justify-content-between d-flex">
                                        <h6>Property Type:</h6>
                                        <div>{{ $post->rSubCategory->sub_category }}</div>
                                    </div>
                                    <hr>
                                    <div class="justify-content-between d-flex">
                                        <h6>Property Status:</h6>
                                        <div>{{ $post->rSubCategory->sub_category }}</div>
                                    </div>
                                    <hr>
                                    <div class="justify-content-between d-flex">
                                        <h6>Phone:</h6>
                                        <div>{{ $post->phone }}</div>
                                    </div>
                                    <hr>
                                    <div class="justify-content-between d-flex">
                                        <h6>Address:</h6>
                                        <div>{{ $post->address }}</div>

                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="pt-5">

                    <div class="p-4 property-item rounded overflow-hidden">
                        <div class="justify-content-between d-flex align-items-center">
                            <h2>Address</h2>

                        </div>
                        <hr>
                        <div class="col-lg-12 p-5 pb-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="justify-content-between d-flex">
                                        <h6>City:</h6>
                                        <div>{{ $post->address }}</div>
                                    </div>
                                    <hr>
                                </div>
                                {{-- right side --}}
                                <div class="col-lg-6">

                                    <div class="justify-content-between d-flex">
                                        <h6>Area:</h6>
                                        <div>{{ $post->address }}</div>

                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="pt-5">

                    <div class="p-4 property-item rounded overflow-hidden">
                        <div class="justify-content-between d-flex align-items-center">
                            <h2>Contact Information</h2>

                        </div>
                        <hr>
                        <div class="col-lg-12 ">
                            <h3 class="pb-3">
                                {{ $post->rSubCategory->sub_category }} Specification:
                            </h3>
                            <p>Enquire About This Property</p>
                            <hr>
                            <div class="ps-3">
                                <form class="row g-3">

                                    <div class="col-md-6">
                                        <label for="inputnm" class="form-label">Name</label>
                                        <input type="text" required class="form-control" id="inputnm"
                                            placeholder="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail5t" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="inputEmail5t"
                                            placeholder="phone number">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail5s" class="form-label">Email</label>
                                        <input type="email" required class="form-control" id="inputEmail5s"
                                            placeholder="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword5s" class="form-label">I'm a</label>
                                        <select id="inputState" required class="form-select">
                                            <option>Buyer</option>
                                            <option>agnate</option>
                                            <option>watcher</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress5" class="form-label">Message</label>
                                        <textarea name="" id="" cols="30" class="form-control"
                                            rows="4">Hello I'm interested in ({!! $post->title !!} {!! $post->address !!})</textarea>

                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" required type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                By Submitting this form i'm agree to the terms and condition
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary">Request Information</button>
                                    </div>
                                </form>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-ms-12 pe-0">
            <div class="row ms-4">
                <div class="pt-4">

                    <div class="p-4 property-item rounded overflow-hidden">
                        <h1 class="h1"> {{ $post->rCategory->name }}(s)</h1>
                        @php
                        $city = '';
                        @endphp

                        @foreach ($subcategorybysub as $item1)
                        @if ($item1->city != $city)
                        <h2 class="h2 text-capitalize">{{ $item1->city }}</h2>
                        <hr>
                        @endif

                        <div class="justify-content-between d-flex">

                            <a
                                href="{{ route('city_post_type', $item1->city.'/'. $item1->slug) }}">>{{ $item1->sub_category }}</a>
                            <p>({{ $item1->subcount }})</p>

                        </div>
                        @php
                        $city = $item1->city
                        @endphp
                        @endforeach


                    </div>
                </div>
            </div>


            <div class="row ms-4 mt-4">
                <div class="pt-4">

                    <div class="p-4 property-item rounded overflow-hidden">
                        <div class="justify-content-between d-flex align-items-center">
                            <h3>Advertisement</h3>

                        </div>

                    </div>
                </div>
            </div>


            <div class="row ms-4 mt-4">
                <div class="pt-4">

                    <div class="p-4 property-item rounded overflow-hidden">
                        <div class="justify-content-between d-flex align-items-center">
                            <h3>Most Views</h3>

                        </div>


                        @foreach ($mostview as $item)


                        {{-- {{ route('category_detail',$item->rCategory->slugs.'/'. $item->slug) }} --}}
                        @foreach ($item->postImages as $item2)
                        <a href="{{ route('homedetails', $item->slug) }}">
                            <div class="justify-content-between d-flex py-2">
                                <div class="col-lg-4">

                                    <img style="width: 70px" class="img-fluid"
                                        src="{{ asset('uploads/'.$item2->photo) }}" alt="">
                                </div>

                                <div class="col-lg-8 ps-2">
                                    <h5>{!! $item->title !!} </h5>
                                    <h5>{{ $item->currency }}{{ $item->rate }}</h5>
                                </div>
                            </div>
                        </a>


                        @break
                        @endforeach

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- 
                            <div class="col-lg-3 property-item rounded mh-auto">
                                <h2 class="pt-">Popular Cities</h2>
                                <div class="rightside city">
                                    <div class="justify-content-between  ">
                                    @for ($i = 10; $i < 20; $i++)
                                    <div class="justify-content-between p-4 d-flex">
                                        <a href="">>Kabul</a>
                                        <div>(){{ $post->id }})
    </div>

</div>
@endfor
</div>

</div>

--}}
<div class="col-lg-8">
    <p>Similar Listing</p>
    <hr>
    <div class="row g-4">

        @foreach ($similar as $item)

        <div class="col-lg-6">
            <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden">

                    <div id="carouselExampleInterval{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($item->postImages as $photo)
                            <div class="carousel-item {{ $loop->first ?'active' :'' }}" data-bs-interval="10000">
                                <img class="mw-100 w-100 " style="height: 300px"
                                    src="{{ asset('uploads/' . $photo->photo) }}" alt="{{ $item->title }}">
                            </div>
                            @endforeach
                        </div>
                        <div>
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleInterval{{ $item->id }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleInterval{{ $item->id }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    {{-- <img src="{{ asset('uploads/'. $photo->photo) }}" alt=""> --}}
                    {{-- <a href=""><img class="img-fluid" src="{{ asset('uploads/') }}" alt=""></a> --}}
                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                        {{ $item->rSubCategory->sub_category }}</div>
                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                        {{ $item->rSubCategory->sub_category }}</div>
                </div>
                <div class="p-4 pb-0">
                    <h5 class="text-primary mb-3">{{ $item->currency }} {{ $item->rate }}</h5>
                    <a class="d-block h5 mb-2 text-capitalize"
                        href="{{ route('category_by_subcategory_detail',$item->slug) }}">{{ $item->title }}</a>
                    <p class="text-capitalize"><i
                            class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->address }}</p>
                </div>
                <div class="d-flex border-top">
                    <small class="flex-fill text-center border-end py-2"><i
                            class="fa fa-ruler-combined text-primary me-2"></i>{{ $item->space }}</small>
                    <small class="flex-fill text-center border-end py-2"><i
                            class="fa fa-bed text-primary me-2"></i>{{ $item->rooms }} Room</small>
                    <small class="flex-fill text-center py-2"><i
                            class="fa fa-bath text-primary me-2"></i>{{ $item->bathrooms }} Bath</small>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
</div>
</div>


</div>

</div>
<!-- About End -->

@endsection