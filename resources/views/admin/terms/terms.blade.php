@extends('admin.layouts.app')

@section('heading','Terms and Condition Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@if (count($termspage) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalabout">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Terms
</button>
@endsection
@endif

@section('currentpage', 'Terms and Condition Section View ')


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

                                @foreach ($termspage as $item)


                                <tr>
                                    <td>{!! $item->terms_title !!} </td>
                                    <td>{!! $item->terms_detail !!}</td>
                                    <td> {{ $item->terms_status }}</td>

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
                                                <h5 class="modal-title">Edit FAQs </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <form action="{{ route('ad_terms_ad_update',$item->id ) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="terms_title">About Title*</label>
                                                                <input type="text" id="terms_title"
                                                                    placeholder="terms and codition"
                                                                    class="form-control @error('terms_title') is-invalid @enderror"
                                                                    name="terms_title" value="{{ $item->terms_title }}">
                                                                @error('terms_title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="terms_status"> Show on Menu?</label>
                                                                <select id="terms_status" class="form-control"
                                                                    name="terms_status">
                                                                    <option value="Show" @if($item->terms_status
                                                                        =='Show') selected @endif>Show</option>
                                                                    <option value="Hide" @if($item->terms_status
                                                                        =='Hide') selected @endif>Hide</option>
                                                                </select>
                                                            </div>


                                                            <div class="col-12 mb-2">

                                                                <label for="terms_details">About Details</label>
                                                                <textarea id="terms_details"
                                                                    class="form-control tinymce-editor @error('terms_details') is-invalid @enderror"
                                                                    name="terms_details">{{ $item->terms_detail }}</textarea>
                                                                @error('terms_details')
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
                            <form action="{{ route('ad_terms_ad_store') }}" method="POST">
                                @csrf
                                <div class="row my-3">
                                    <div class="col-12 mb-2">
                                        <label for="termstitle">Terms Tile *</label>
                                        <input type="text" id="termstitle" placeholder="About Us"
                                            class="form-control @error('termstitle') is-invalid @enderror"
                                            name="termstitle">
                                        @error('termstitle')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="showtop">Show on Top bar</label>
                                        <select name="termsshow" id="showtop" class="form-select">
                                            <option value="Yes">Yes</option>
                                            <option value="No">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="termsdetail">Terma Detail</label>
                                        <textarea id="termsdetail" name="termsdetail"
                                            class="form-control tinymce-editor" placeholder="termsdetail"></textarea>
                                        @error('termsdetail')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="text-center mt-2">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
        {{-- end social item --}}
    </div>
</section>
@endsection