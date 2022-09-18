@extends('admin.layouts.app')

@section('heading','Disclaimir Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection
@if (count($disclaimirpage) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalabout">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Disclaimer
</button>
@endsection
@endif

@section('currentpage', 'Disclaimir Section View ')


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
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($disclaimirpage as $item)
                                <tr>
                                    <td>{!! $item->disclaimer_title !!} </td>
                                    <td>{!! $item->disclaimer_detail !!}</td>
                                    <td> {{ $item->disclaimer_status }}</td>

                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalaboutedit"><i class="ri ri-edit-line"></i></button>

                                    </td>


                                </tr>

                                <div class="modal fade" id="modalaboutedit" data-bs-backdrop="false"
                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Disclaimirs </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <form action="{{ route('ad_disclaimir_ad_update',$item->id ) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="disclaimir_title">Disclaimer Title*</label>
                                                                <input type="text" id="disclaimir_title"
                                                                    placeholder="About Us"
                                                                    class="form-control @error('disclaimir_title') is-invalid @enderror"
                                                                    name="disclaimir_title"
                                                                    value="{{ $item->disclaimer_title }}">
                                                                @error('disclaimir_title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="disclaimir_status"> Show on Menu?</label>
                                                                <select id="disclaimir_status" class="form-control"
                                                                    name="disclaimir_status">
                                                                    <option value="Show" @if($item->disclaimer_status
                                                                        =='Show') selected @endif>Show</option>
                                                                    <option value="Hide" @if($item->disclaimer_status
                                                                        =='Hide') selected @endif>Hide</option>
                                                                </select>
                                                            </div>


                                                            <div class="col-12 mb-2">

                                                                <label for="disclaimir_detail">About Details</label>
                                                                <textarea id="disclaimir_detail"
                                                                    class="form-control tinymce-editor @error('disclaimir_detail') is-invalid @enderror"
                                                                    name="disclaimir_detail">{{ $item->disclaimer_detail }}</textarea>
                                                                @error('disclaimir_detail')
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
                        <form action="{{ route('ad_disclaimir_ad_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">
                                <div class="col-12 mb-2">
                                    <label for="disclaimertitle">Disclaimer Tile *</label>
                                    <input type="text" id="disclaimertitle" placeholder="Disclaimer"
                                        class="form-control @error('disclaimertitle') is-invalid @enderror"
                                        name="disclaimertitle">
                                    @error('disclaimertitle')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="showtop">Show on Menu?</label>
                                    <select name="disclaimershow" id="showtop" class="form-select">
                                        <option value="Show">Yes</option>
                                        <option value="Hide">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="disclaimerdetail">Terma Detail</label>
                                    <textarea id="disclaimerdetail" name="disclaimerdetail"
                                        class="form-control tinymce-editor" placeholder="disclaimerdetail"></textarea>
                                    @error('disclaimerdetail')
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
    </div>
</section>
@endsection