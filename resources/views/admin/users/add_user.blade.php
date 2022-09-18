@extends('admin.layouts.app')

@section('heading','Add User Section')

@section('currentpage')
<a href="{{ route('ad_user_ad_view') }}">View Users</a>
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Add User</li>
@endsection


@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_user_ad_view') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-eye-line me-1"></i>
        View Users
    </button>
</a>
@endsection

@section('main_content')

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Form</h5>
                    <form action="{{ route('ad_user_ad_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <input type="file" class="form-control mt-5" name="photo">
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Full Name <i class="text text-danger">*</i></label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                        name="user_name" placeholder="Ali">
                                    @error('user_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Phone Number <i class="text text-danger">*</i></label>
                                    <input type="tel"
                                        class="form-control @error('telephone_number') is-invalid @enderror"
                                        name="telephone_number" placeholder="0799xxxxxx">
                                    @error('telephone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email <i class="text text-danger">*</i></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="ali@gmail.com">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Address <i class="text text-danger">*</i></label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" placeholder="kabul, barchi,...">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="canedit">The User can Edit it's post<i
                                            class="text text-danger">*</i></label>
                                    <select name="canedit" class="form-select" id="canedit">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="candelete">The User can Delete it's post <i
                                            class="text text-danger">*</i></label>
                                    <select name="candelete" class="form-select" id="candelete">
                                        <option value="Yes">Yes</option>
                                        <option value="No" selected>No</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="share_user">Share post with Subscriber?<i
                                            class="text text-danger">*</i></label>
                                    <select name="share_user" class="form-select" id="share_user">
                                        <option value="Yes">Yes</option>
                                        <option value="No" selected>No</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Password<i class="text text-danger">*</i></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Retype Password<i class="text text-danger">*</i></label>
                                    <input type="password"
                                        class="form-control @error('retype_password') is-invalid @enderror"
                                        name="retype_password">
                                    @error('retype_password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Add user</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection