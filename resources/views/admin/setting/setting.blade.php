@extends('admin.layouts.app')

@section('heading','Setting Section')


@section('create_button')

{{-- <a href="{{ route('property_create') }}" class="btn btn-primary"><i class="fas fa-plus" width="20"> </i> Create</a>
--}}

@endsection



@section('main_content')

<section class="section">

    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                @if ($errors->any())

                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>

                @endif
                <div class="card-body mt-4">
                    <h5 class="card-header">Setting Form</h5>

                    <!-- Nav tabs -->
                    <div class="col-lg-12 d-flex">

                        <div class="col-lg-3 col-md-2 ">
                            <ul class="nav nav-pills d-block" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#posts">Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#photos">Photos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#theme">Theme Color</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-9 col-md-10 ">
                            <form action="{{ route('ad_setting_submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content mt-4 me-5">
                                    <div id="posts" class="container tab-pane active">
                                        <div class="form-group mb-4">
                                            <label for="showposts">Show posts on Home (10) max=100</label>
                                            <input type="number" id="showposts"
                                                class="form-control mt-2 @error('showposts') is-invalid @enderror"
                                                name="showposts" value="{{ $frontsetting->show_post }}">
                                            @error('showposts')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="mostviews">Most Shows (10)</label>
                                            <input type="number" id="mostviews"
                                                class="form-control mt-2 @error('mostviews') is-invalid @enderror"
                                                name="mostviews" value="{{ $frontsetting->show_most_views }}">
                                            @error('mostviews')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="showsimilar">Similar Shows (10)</label>
                                            <input type="number" id="showsimilar"
                                                class="form-control mt-2 @error('showsimilar') is-invalid @enderror"
                                                name="showsimilar" value="{{ $frontsetting->show_similar }}">
                                            @error('showsimilar')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="photos" class="container tab-pane fade">
                                        <div class="form-group mb-4">
                                            <div class="col-md-3">

                                                <img src="{{ asset('uploads/icon/'. $frontsetting->logo) }}" alt="logo"
                                                    class="profile-photo w-100 mb-1">
                                            </div>
                                            <label for="logo">Logo</label>
                                            <input type="file" id="logo"
                                                class="form-control mt-2 @error('logo') is-invalid @enderror"
                                                name="logo">
                                            @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">
                                            <div class="col-md-3 mb-1">

                                                <img src="{{ asset('uploads/icon/'. $frontsetting->favicon ) }}"
                                                    alt="profile photo" class="profile-photo w-100">
                                            </div>
                                            <label for="favicon">Favicon</label>
                                            <input type="file" id="favicon"
                                                class="form-control mt-2 @error('favicon') is-invalid @enderror"
                                                name="favicon">
                                            @error('favicon')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="theme" class="container tab-pane fade">
                                        <div class="form-group mb-4">
                                            <h1>If you want to back to it's<i class="text text-warning"> default
                                                    color</i>
                                                set the
                                                color pickers values
                                                to FFFFFFF</h1>
                                            <label for="theme1">Theme Color1</label>
                                            <input type="text" name="theme1" id="theme1"
                                                value="{{ $frontsetting->theme_1 }}"
                                                class="form-control jscolor mt-2 @error('theme1') is-invalid @enderror">

                                            @error('theme1')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-4">

                                            <label for="theme2">Theme Color 2</label>
                                            <input type="text" name="theme2" id="theme2"
                                                value="{{ $frontsetting->theme_2 }}"
                                                class="form-control jscolor mt-2 @error('theme2') is-invalid @enderror">
                                            @error('theme2')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

</section>
@endsection