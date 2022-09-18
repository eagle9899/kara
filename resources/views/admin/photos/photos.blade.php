@extends('admin.layouts.app')

@section('heading','Posts Photos')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection


@section('currentpage', 'Photos')


@section('main_content')


<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered form-tabledata">
                            <thead>
                                <tr>
                                    <th>Post ID</th>

                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <body>

                                @foreach($postphotos as $postphoto)
                                <tr>
                                    <td>{{ $postphoto->id }} </td>
                                    <td>
                                        <div class="photo-gallery">
                                            <div class="photo-thumb w-25">
                                                <img src="{{ asset('uploads/' .$postphoto->photo) }}" alt="">
                                                <div class="bg"></div>
                                                <div class="icon">
                                                    <a href="" class="magnific"><i class="ri ri-add-circle-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <td>
                                        <a href="{{ route('ad_post_photos_view', $postphoto->id) }}"
                                            class="btn btn-primary"><i class="ri ri-edit-line"></i></a>
                                        <a href="{{ route('ad_photos_delete',$postphoto->id) }}" class="btn btn-danger"
                                            onClick="return confirm('Are you sure?\n Do You want delete this postphoto:   {{  $postphoto->name }}');"><i
                                                class="ri ri-delete-bin-2-line"></i></a>
                                    </td>


                                </tr>
                                @endforeach
                            </body>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<script>
    new WOW().init();

	$('.video-button').magnificPopup({
	  	type: 'iframe',
		gallery:{
			enabled:true
		}
	});

	$('.magnific').magnificPopup({
	  	type: 'image',
		gallery:{
			enabled:true
		}
	});

</script>
@endsection