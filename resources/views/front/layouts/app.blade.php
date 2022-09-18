<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{ $meta_keywords }}" name="keywords">
    <meta content="{{ $meta_desc }}" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('uploads/icon/'.$global_setting_data->favicon) }}" rel="icon">

    <!-- Google Web Fonts -->
    @include('front.layouts.styles')

    <style>
        @if($global_setting_data->theme_1 !=='FFF'AND $global_setting_data->theme_1 !=='FFFFFF') .text-primary,

        a:hover,
        .breadcrumb-item a,
        .bg-transparent,
        .page-link,
        .kara,
        .accordion-button:not(.collapsed),
        .accordion-button.collapse {
            color: @php echo '#'.$global_setting_data->theme_1 @endphp  !important;
        }

        .page-item.active .page-link,
        .icon,
        .cat-item div {
            border: 1px dashed @php echo '#'.$global_setting_data->theme_1 @endphp  !important;
        }

        .page-item.active .page-link {
            color: aliceblue !important;
            background-color: @php echo '#'.$global_setting_data->theme_1 @endphp  !important;
        }

        .btn-primary {
            border: 1px solid @php echo '#'.$global_setting_data->theme_1 @endphp  !important;
        }

        .btn-primary:hover {
            background-color: @php echo '#'. $global_setting_data->theme_2 @endphp  !important;
            color: @php echo '#'. $global_setting_data->theme_1 @endphp  !important;
        }

        .bg-primary,
        .about-img::before,
        .btn-primary,
        .header-carousel .owl-nav .owl-prev,
        .header-carousel .owl-nav .owl-next,
        .cat-item:hover div {
            background-color: @php echo '#'.$global_setting_data->theme_1 @endphp  !important;
        }

        @endif @if($global_setting_data->theme_2 !=='FFF'AND $global_setting_data->theme_2 !=='FFFFFF').btn-primary:focus {
            box-shadow: 0 0 0 .25rem @php echo '#'. $global_setting_data->theme_1 @endphp  !important;
            border:
        }

        .bg-dark,
        .btn-dark {
            background-color: @php echo '#'. $global_setting_data->theme_2 @endphp  !important;
        }

        @endif
    </style>
</head>

<body class="bg-white">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->

        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            @include('front.layouts.nav')
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->


        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                @yield('slogan')
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item" style="height: 520px">
                            <img class="img-fluid" src="{{ asset('uploads/carousel-1.jpg') }}" alt="">
                        </div>
                        <div class="owl-carousel-item" style="height: 520px">
                            <img class="img-fluid" src="{{ asset('uploads/carousel-2.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 15px;">
            <div class="container">
                <form action="{{ route('search_result') }}" method="post">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-10 ">
                            <div class="row g-2 ">

                                <div class="col-md-4">
                                    <input type="text" name="searchvalue" class="form-control border-0 py-2"
                                        placeholder="Search here...">
                                </div>
                                <div class="col-lg-4">
                                    <select name="categorysearch" id="categorysearch"
                                        class="form-select border-0 py-2 select2">
                                        <option value="">All Types</option>
                                        @foreach ($global_categories as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select name="subcategorysearch" id="subcategorysearch"
                                        class="form-select border-0 py-2">
                                        <option value=" ">Select City</option>

                                        @foreach ($global_sub_categories as $item)
                                        <option value="{{ $item->sub_category }}">{{ $item->sub_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-2" type="submit">Search</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->




        @yield('content')


        @include('front.layouts.footer')

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->

    @include('front.layouts.scripts')
    <script>
        (function($){
                $(document).ready(function(){
                    $("#propertysearch").on("change", function(){
                        var propertyId = $("#propertysearch").val()
                        if(propertyId){
                            $.ajax({
                                type: "get",
                                url: "{{ url('/property-by-city/') }}" + "/" + propertyId,
                                success: function(response){
                                    $("#citysearch").html(response.city_data);
                                },
                                error: function(err){
    
                                }
                            })
                        }
                    })
                })
            });
            
    </script>
</body>

</html>