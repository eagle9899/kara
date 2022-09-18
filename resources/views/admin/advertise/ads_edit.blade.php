@extends('admin.layouts.app')

@section('heading','Create Home Advertisement')
@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_home_ad_view') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-eye-line me-1"></i> 
        View
    </button>
</a> 
@endsection

@section('currentpage')
<a href="{{ route('ad_home_ad_view') }}"> Home Ads View </a> 
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Home Ads Create</li>
@endsection

@section('main_content')
        
<section class="section">
        <div class="row">
          
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Edit Home Advertisement Form</h5>

                    <!-- Vertical Form -->
                    <img src="{{ asset('uploads/'.$advertise->photo) }}" alt="" class="w-25 h-25">
                        <form action="{{ route('ad_home_ad_update', $advertise->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="row my-3">
                            <div class="col-12 mb-2">        
                                <label for="picture" class="form-label">Photo</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="picture" name="photo" value="{{ old('photo') }}">
                                @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mb-2">        
                                <label for="adurl" class="form-label">URL</label>
                                <input type="url" class="form-control  @error('url') is-invalid @enderror" name="url"
                                    placeholder="Url"  value="{{ $advertise->url }}">
                                    @error('url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror  
                            </div>

                            
                            <div class="col-12 mb-2">
                                <label for="state" class="form-label">Position</label>
                                <select name="position" class="form-control" id="state">
                                    <option value="Top"  @if($advertise->position =='Top') selected @endif>Top</option>
                                    <option value="Bottom" @if($advertise->position =='Bottom') selected @endif>Bottom</option> 
                                </select>                       
                            </div>

                            
                            <div class="col-12 mb-2">
                                <label for="display" class="form-label">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <<option value="Show" @if($advertise->status =='Show') selected @endif>Show</option>
                                    <option value="Hide" @if($advertise->status =='Hide') selected @endif>Hide</option>
                                </select> 
                            </div>

                            <div class="col-12 mb-2">        
                                <label for="adrate" class="form-label">Rate</label>
                                <input type="number" class="form-control @error('rate') is-invalid @enderror" id="adrate" name="rate"  value="{{ $advertise->rate }}">
                                @error('rate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">        
                                <label for="adcurrency" class="form-label">Currency</label>
                                <input type="text" class="form-control @error('currency') is-invalid @enderror" id="adcurrency" name="currency" value="{{ $advertise->currency }}">
                                @error('currency')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
 
                            <div class="text-center mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form><!-- Vertical Form -->

                    </div>
                </div>
 
            </div>
        </div>
    </section>
 
@endsection