@extends('user.layouts.app')

@section('heading','Profile Section')

@section('currentpage')
<a href="{{ route('ad_user_ad_view') }}">View Users</a>
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Edit User</li>
@endsection


@section('headinglink')
<a href="{{ route('user_home') }}">Dashboard</a>
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
                    <form action="{{ route('user_update' ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                @if (Auth::guard('author')->user()->photo != '')

                                <img src="{{ asset('userprofile/'. Auth::guard('author')->user()->photo) }}"
                                    alt="profile photo" class="profile-photo w-100">
                                @endif
                                <input type="file" class="form-control mt-5" name="photo">
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Full Name <i class="text text-danger">*</i></label>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                        name="user_name" value="{{ Auth::guard('author')->user()->name }}" required>
                                    @error('user_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Phone Number <i class="text text-danger">*</i></label>
                                    <input type="tel"
                                        class="form-control @error('telephone_number') is-invalid @enderror"
                                        name="telephone_number" value="{{ Auth::guard('author')->user()->phone }}"
                                        required>
                                    @error('telephone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email <i class="text text-danger">*</i></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ Auth::guard('author')->user()->email }}" required>
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Address <i class="text text-danger">*</i></label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" value="{{ Auth::guard('author')->user()->address }}" required>
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                                    <button type="submit" class="btn btn-primary">Update user</button>
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