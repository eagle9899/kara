@extends('admin.layouts.app')

@section('heading','About Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@if (count($aboutpage) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalabout">
    <i class="ri ri-add-circle-line me-1"></i>
    Add About
</button>
@endsection
@endif


@section('currentpage', 'About Section View ')


@section('main_content')


<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered form-">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Top Status</th>
                                    <th>Bottom Status</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach ($aboutpage as $about)
                                <tr>
                                    <td>{{ $about->about_title }}</td>
                                    <td>{!! $about->about_detail !!}</td>
                                    <td>{{  $about->about_top_status  }}</td>
                                    <td>{{  $about->about_status  }}</td>


                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalaboutedit"><i class="ri ri-edit-line"></i></button>

                                    </td>



                                    <div class="modal fade" id="modalaboutedit" data-bs-backdrop="false"
                                        data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit about </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">

                                                        <form action="{{ route('ad_about_ad_update',$about->id ) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="row my-3">
                                                                <div class="col-12 mb-2">
                                                                    <label for="about_title">About Title*</label>
                                                                    <input type="text" id="about_title"
                                                                        placeholder="About Us"
                                                                        class="form-control @error('about_title') is-invalid @enderror"
                                                                        name="about_title"
                                                                        value="{{ $about->about_title }}">
                                                                    @error('about_title')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>


                                                                <div class="col-12 mb-2">
                                                                    <label for="about_top_status"> Show on Top?</label>
                                                                    <select id="about_top_status" class="form-select"
                                                                        name="about_top_status">
                                                                        <option value="Yes">Show
                                                                        </option>
                                                                        <option value="No">Hide
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-12 mb-2">
                                                                    <label for="about_status"> Show on Bottom?</label>
                                                                    <select id="about_status" class="form-select"
                                                                        name="about_status">
                                                                        <option value="Show">Show</option>
                                                                        <option value="Hide">Hide</option>
                                                                    </select>
                                                                </div>



                                                                <div class="col-12 mb-2">

                                                                    <label for="about_details">About Details</label>
                                                                    <textarea id="about_details"
                                                                        class="form-control tinymce-editor @error('about_details') is-invalid @enderror"
                                                                        name="about_details">{{ $about->about_detail }}</textarea>
                                                                    @error('about_details')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>


                                                                <div class="text-center mt-2">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                    <button class="btn btn-danger" type="button"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  social item modal --}}
    <div class="modal fade" id="modalabout" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ route('ad_about_ad_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">
                                <div class="col-12 mb-2">
                                    <label for="abouttitle">About Tile *</label>
                                    <input type="text" id="abouttitle" placeholder="About Us"
                                        class="form-control @error('abouttitle') is-invalid @enderror"
                                        name="abouttitle">
                                    @error('abouttitle')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="showtop">Show on Top bar</label>
                                    <select name="showtop" id="showtop">
                                        <option value="Yes">Yes</option>
                                        <option value="No">Yes</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="showbottom">Show on Bottom</label>
                                    <select name="showbottom" id="showbottom">
                                        <option value="Yes">Yes</option>
                                        <option value="No">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="aboutdetail">About Detail</label>
                                    <textarea id="aboutdetail" name="aboutdetail" class="form-control tinymce-editor"
                                        placeholder="aboutdetail">{{ old('aboutdetail') }}</textarea>
                                    @error('aboutdetail')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- end social item --}}


</section>
@endsection