@extends('admin.layouts.app')

@section('heading','Privacy and Policy Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@if (count($privacypage) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalabout">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Terms
</button>
@endsection
@endif
@section('currentpage', 'Privacy and Policy Section View ')


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

                                @foreach ($privacypage as $privacy)

                                <tr>
                                    <td>{!! $privacy->privacy_title !!} </td>
                                    <td>{!! $privacy->privacy_detail !!}</td>
                                    <td> {{ $privacy->privacy_status }}</td>

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
                                                <h5 class="modal-title">Edit privacy and Policy </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <form action="{{ route('ad_privacy_ad_update',$privacy->id ) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="privacy_title">About Title*</label>
                                                                <input type="text" id="privacy_title"
                                                                    placeholder="About Us"
                                                                    class="form-control @error('privacy_title') is-invalid @enderror"
                                                                    name="privacy_title"
                                                                    value="{{ $privacy->privacy_title }}">
                                                                @error('privacy_title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="privacy_status"> Show on Menu?</label>
                                                                <select id="privacy_status" class="form-control"
                                                                    name="privacy_status">
                                                                    <option value="Show" @if($privacy->privacy_status
                                                                        =='Show') selected @endif>Show</option>
                                                                    <option value="Hide" @if($privacy->privacy_status
                                                                        =='Hide') selected @endif>Hide</option>
                                                                </select>
                                                            </div>


                                                            <div class="col-12 mb-2">

                                                                <label for="privacy_detail">About Details</label>
                                                                <textarea id="privacy_detail"
                                                                    class="form-control tinymce-editor @error('privacy_detail') is-invalid @enderror"
                                                                    name="privacy_detail">{{ $privacy->privacy_detail }}</textarea>
                                                                @error('privacy_detail')
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
</section>
@endsection