@extends('admin.layouts.app')

@section('heading','Contact Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@if (count($contactpage) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalcontact">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Logins details
</button>
@endsection
@endif

@section('currentpage', 'Contact Section View ')


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
                                    <th>Status</th>
                                    <th>Map</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($contactpage as $item)

                                <tr>
                                    <td>{!! $item->contact_title !!} </td>
                                    <td>{!! $item->contact_detail !!}</td>
                                    <td> {{ $item->contact_top_status }}</td>
                                    <td> {{ $item->contact_status }}</td>
                                    <td> {{ $item->contact_map }}</td>

                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalcontactedit"><i class="ri ri-edit-line"></i></button>

                                    </td>


                                </tr>

                                <div class="modal fade" id="modalcontactedit" data-bs-backdrop="false"
                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Contact </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <form action="{{ route('ad_contactpage_ad_update',$item->id ) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="contact_title">Contact Title*</label>
                                                                <input type="text" id="contact_title"
                                                                    placeholder="About Us"
                                                                    class="form-control @error('contact_title') is-invalid @enderror"
                                                                    name="contact_title"
                                                                    value="{{ $item->contact_title }}">
                                                                @error('contact_title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="contact_map">Conatact Map</label>
                                                                <input id="contact_map"
                                                                    class="form-control @error('contact_map') is-invalid @enderror"
                                                                    name="contact_map" value="{{ $item->contact_map }}">
                                                                @error('contact_map')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="contact_top_status"> Show on Top?</label>
                                                                <select id="contact_top_status" class="form-control"
                                                                    name="contact_top_status">
                                                                    <option value="Show" @if($item->
                                                                        contact_top_status =='Show') selected
                                                                        @endif>Show</option>
                                                                    <option value="Hide" @if($item->
                                                                        contact_top_status =='Hide') selected
                                                                        @endif>Hide</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="contact_status"> Show on Bottom?</label>
                                                                <select id="contact_status" class="form-control"
                                                                    name="contact_status">
                                                                    <option value="Show" @if($item->
                                                                        contact_status =='Show') selected @endif>Show
                                                                    </option>
                                                                    <option value="Hide" @if($item->
                                                                        contact_status =='Hide') selected @endif>Hide
                                                                    </option>
                                                                </select>
                                                            </div>


                                                            <div class="col-12 mb-2">

                                                                <label for="contact_detail">Contact Details</label>
                                                                <textarea id="contact_detail"
                                                                    class="form-control tinymce-editor @error('contact_detail') is-invalid @enderror"
                                                                    name="contact_detail">{{ $item->contact_detail }}</textarea>
                                                                @error('contact_detail')
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
        <div class="modal fade" id="modalcontact" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add About</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="{{ route('ad_contactpage_ad_store') }}" method="POST">
                                @csrf
                                <div class="row my-3">
                                    <div class="col-12 mb-2">
                                        <label for="contacttitle">Contact Title*</label>
                                        <input type="text" id="contacttitle" placeholder="About Us"
                                            class="form-control @error('contacttitle') is-invalid @enderror"
                                            name="contacttitle" value="{{ $item->contact_title }}">
                                        @error('contacttitle')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="contactmap">Conatact Map</label>
                                        <input id="contactmap"
                                            class="form-control @error('contactmap') is-invalid @enderror"
                                            name="contactmap" value="{{ $item->contact_map }}">
                                        @error('contactmap')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="contacttopstatus"> Show on Top?</label>
                                        <select id="contacttopstatus" class="form-control" name="contacttopstatus">
                                            <option value="Show" @if($item->
                                                contact_top_status =='Show') selected
                                                @endif>Show</option>
                                            <option value="Hide" @if($item->
                                                contact_top_status =='Hide') selected
                                                @endif>Hide</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="contactstatus"> Show on Bottom?</label>
                                        <select id="contactstatus" class="form-control" name="contactstatus">
                                            <option value="Show" @if($item->
                                                contact_status =='Show') selected @endif>Show
                                            </option>
                                            <option value="Hide" @if($item->
                                                contact_status =='Hide') selected @endif>Hide
                                            </option>
                                        </select>
                                    </div>


                                    <div class="col-12 mb-2">

                                        <label for="contactdetail">Contact Details</label>
                                        <textarea id="contactdetail"
                                            class="form-control tinymce-editor @error('contactdetail') is-invalid @enderror"
                                            name="contactdetail">{{ $item->contact_detail }}</textarea>
                                        @error('contactdetail')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="text-center mt-2">
                                        <button type="submit" class="btn btn-primary">Update</button>
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