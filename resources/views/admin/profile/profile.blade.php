@extends('admin.layouts.app')

@section('heading','Profile Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection



@section('currentpage' )
<span>Admin Profile</span>
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Profile</li>
@endsection

@section('main_content')

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Form</h5>
                    <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('userprofile/'. Auth::guard('admin')->user()->photo) }}"
                                    alt="profile photo" class="profile-photo w-100">
                                <input type="file" class="form-control mt-5" name="photo">
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Name <i class="text text-danger">*</i></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ Auth::guard('admin')->user()->name }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email <i class="text text-danger">*</i></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="email" value="{{ Auth::guard('admin')->user()->email }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Retype Password</label>
                                    <input type="password" class="form-control" name="retype_password">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
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