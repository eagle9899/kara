<div class="container">

    <div>
        <div class="row g-4">

            @if (count($post))
            @foreach ($post as $item)
            <div class="col-lg-4 col-md-6">
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">

                        <div id="carouselExampleInterval{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($item->postImages as $photo)
                                <div class="carousel-item {{ $loop->first ?'active' :'' }}" data-bs-interval="10000">
                                    <a href="{{ route('city_single_post',$item->city.'/'.$item->slug) }}">
                                        <img class="mw-100 w-100 " style="height: 300px"
                                            src="{{ asset('uploads/' . $photo->photo) }}" alt="{{ $item->title }}">
                                    </a>
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

                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                            {{ $item->type }}</div>
                        <a href="" type="button"
                            class="position-absolute text-white end-0 top-0 m-4 py-1 px-3 btn btn-ouline-success favorite border"><i
                                class="bi bi-heart"></i></a>
                        {{-- <divclass="bg-primaryroundedtext-whiteposition-absoluteend-0top-0m-4py-1px-3">$item->rCategory->name </div> --}}
                        <div
                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                            {{ $item->rSubcategory->sub_category }}</div>
                    </div>
                    <div class="p-4 pb-0">
                        <h5 class="text-primary mb-3">{{ $item->currency }} {{ $item->rate }}</h5>
                        <a class="d-block h5 mb-2 text-capitalize post-short-title"
                            href="{{ route('city_single_post',$item->city.'/'.$item->slug) }}">{{ substr($item->title, 0, 28,) }}
                            ...</a>
                        <p class="text-capitalize"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $item->address }}</p>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-ruler-combined text-primary me-2"></i>{{ $item->space }}</small>
                        <small class="flex-fill text-center border-end py-2"><i
                                class="fa fa-bed text-primary me-2"></i>{{ $item->rooms }} Room</small>
                        <small class="flex-fill text-center py-2"><i
                                class="fa fa-shower text-primary me-2"></i>{{ $item->bathrooms }} Bath</small>
                    </div>
                </div>
            </div>
            @endforeach


            @else
            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                            <h1 class="display-1">404</h1>
                            <h1 class="mb-4">Page Not Found</h1>
                            <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website!
                                Maybe go to our home page or try to use a search?</p>
                            <a class="btn btn-primary py-3 px-5" href="{{ route('home') }}">Go Back To Home</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{--
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                        </div>
                         --}}
        </div>
        <div class="row g-4 justify-content-center mt-3">
            <div class="col-lg-6">
                <div class="justify-content-cventer">{{ $post->links() }}</div>

            </div>
        </div>

    </div>
</div>