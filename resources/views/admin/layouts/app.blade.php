<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - KaraAdmin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->

    <link href="{{ asset('uploads/icon/'.$global_setting_data->favicon) }}" rel="icon">
    <link href="{{ asset('uploads/icon/'.$global_setting_data->favicon) }}" rel="apple-touch-icon">

    @include('admin.layouts.styles')


</head>

<body>
    @include('admin.layouts.navbar')

    @include('admin.layouts.sidebar')



    {{-- start #main --}}
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>@yield('heading')</h1>
            <nav>
                <ol class="breadcrumb d-flex">
                    <li class="breadcrumb-item">@yield('headinglink')</li>
                    <li class="breadcrumb-item active">@yield('currentpage')</li>
                    @yield('actionpage')
                    <div class="ms-auto">
                        <div>@yield('create_button')</div>

                    </div>
                </ol>
            </nav>
        </div>

        {{--  start section --}}
        @yield('main_content')
    </main>
    {{--  end #main --}}
    {{--         
        <div class="main-sidebar">
            
            @include('admin.layouts.sidebar')
             
        </div>


            
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('heading')</h1>
                        
                        <div class="ml-auto">
                            @yield('create_button')
                        </div>
                    </div>
    
                
                    <div class="section-body">
                        @yield('main_content')
                    </div>
                </section>
    
                
            </div>
            
            --}}


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @include('admin.layouts.script_footer')


    @if($errors->any()))
    @foreach($errors->all() as $error)
    <script>
        iziToast.error({
                title: '',
                position: 'topRight', // 'center'
                message: '{{ $error }}',
            });
    </script>
    @endforeach
    @endif

    @if(session()->get('error'))
    <script>
        iziToast.error({
        title: '',
        position: 'topRight',
        message: '{{ session()->get('error') }}',
    });
    </script>
    @endif

    @if(session()->get('success'))
    <script>
        iziToast.success({
        title: '',
        position: 'topRight',
        message: '{{ session()->get('success') }}',
    });
    </script>
    @endif
</body>

</html>