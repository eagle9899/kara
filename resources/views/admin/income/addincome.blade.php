@extends('admin.layouts.app')

@section('heading','Add income of post number (' .$id. ')')
@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_income_view') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-eye-line me-1"></i>
        View
    </button>
</a>
@endsection

@section('currentpage')
<a href="{{ route('ad_income_view') }}"> Income View </a>
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Add income of post({{ $id }})</li>

@endsection
@section('main_content')
<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Income of post({{ $id }}) Form</h5>

                    <!-- Vertical Form -->
                    <form action="{{ route('ad_income_separate_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row my-3">


                            {{-- <input type="hidden" name="admin_id" value="{{ adid }}"> --}}
                            <input type="hidden" name="post_id" value="{{ $id }}">
                            <div class="col-12 mb-2">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control  @error('amount') is-invalid @enderror"
                                    name="amount" placeholder="100" value="{{ old('amount') }}">
                                @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label for="adrate" class="form-label">Currency</label>
                                <input type="text" class="form-control @error('currency') is-invalid @enderror"
                                    id="adrate" placeholder="afn" name="currency" value="{{ old('currency') }}">
                                @error('currency')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                    <!-- Vertical Form -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection