@extends('admin.layouts.app')

@section('heading','Login Page Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection


@if (count($loginpage) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modallogin">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Logins details
</button>
@endsection
@endif

@section('currentpage', 'Login Page Section View ')


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
                                @foreach ($loginpage as $item)
                                <tr>
                                    <td>{!! $item->login_title !!} </td>
                                    <td>{!! $item->login_detail !!}</td>
                                    <td> {{ $item->login_status }}</td>

                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalloginedit"><i class="ri ri-edit-line"></i></button>

                                    </td>


                                </tr>

                                <div class="modal fade" id="modalloginedit" data-bs-backdrop="false"
                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Logins </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <form action="{{ route('ad_loginpage_ad_update',$item->id ) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="login_title">Login Title*</label>
                                                                <input type="text" id="login_title"
                                                                    placeholder="About Us"
                                                                    class="form-control @error('login_title') is-invalid @enderror"
                                                                    name="login_title" value="{{ $item->login_title }}">
                                                                @error('login_title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="login_status"> Show on Menu?</label>
                                                                <select id="login_status" class="form-control"
                                                                    name="login_status">
                                                                    <option value="Show" @if($item->login_status
                                                                        =='Show') selected @endif>Show</option>
                                                                    <option value="Hide" @if($item->login_status
                                                                        =='Hide') selected @endif>Hide</option>
                                                                </select>
                                                            </div>


                                                            <div class="col-12 mb-2">

                                                                <label for="login_detail">Login Details</label>
                                                                <textarea id="login_detail"
                                                                    class="form-control tinymce-editor @error('login_detail') is-invalid @enderror"
                                                                    name="login_detail">{{ $item->login_detail }}</textarea>
                                                                @error('login_detail')
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
        <div class="modal fade" id="modallogin" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
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
                                        <label for="logintitle">Disclaimer Tile *</label>
                                        <input type="text" id="logintitle" placeholder="Disclaimer"
                                            class="form-control @error('logintitle') is-invalid @enderror"
                                            name="logintitle">
                                        @error('logintitle')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="showtop">Show on Menu?</label>
                                        <select name="loginshow" id="showtop" class="form-select">
                                            <option value="Show">Yes</option>
                                            <option value="Hide">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="logindetail">Terma Detail</label>
                                        <textarea id="logindetail" name="logindetail"
                                            class="form-control tinymce-editor" placeholder="logindetail"></textarea>
                                        @error('logindetail')
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