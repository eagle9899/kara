@extends('user.layouts.app')

@section('heading','Navigation Bar')

@section('headinglink')
<a href="{{ route('user_home') }}">Dashboard</a>
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
                                    <th>ID</th>
                                    <th>photos Name</th>
                                    <th>Show on Menu</th>
                                    <th>Order</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <body>

                                @foreach($postphotos as $photos)
                                <tr>
                                    <td>{{ $photos->id }} </td>
                                    <div class="photo-gallery">
                                        <div class="photo-thumb">
                                            @foreach ($photos->rPostimage as $item)

                                            <img class="w-25" src="{{ asset('uploads/'. $item->photo) }}" alt="">
                                            <div class="bg"></div>
                                            <div class="icon">
                                                <a href="{{ $item->photo }}" class="magnific"><i
                                                        class="ri ri-add-circle-line"></i></a>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="photo-caption">
                                            <a href="">{{ $photos->title }}</a>
                                        </div>
                                        <div class="photo-date">
                                            <i class="fas fa-calendar-alt"></i> @php
                                            $updatedate = strtotime($photos->updated_at);
                                            $updatedate = date('F d, Y h:i A', $updatedate);

                                            @endphp
                                            {{ $updatedate }}
                                        </div>
                                    </div>

                                    <td> {{ $photos->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('user_post_edit', $photos->id) }}" class="btn btn-primary"><i
                                                class="ri ri-edit-line"></i></a>

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








@endsection