@extends('admin.layouts.app')

@section('heading','Create Page Advertisement')
@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_page_ad_view') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-eye-line me-1"></i> 
        View
    </button>
</a> 
@endsection

@section('currentpage')
<a href="{{ route('ad_page_ad_view') }}"> Page Ads View </a> 
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Page Ads Create</li>
@endsection
 
@section('main_content')

        
    <section class="section">
        <div class="row">
          
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Page Advertisement Form</h5>

                        <!-- Vertical Form -->
                        <img src="{{ asset('uploads/'.$pageadvertise->photo) }}" alt="" class="w-25">
                        <form action="{{ route('ad_page_ad_update', $pageadvertise->id) }}" method="POST" enctype="multipart/form-data">
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
                                        placeholder="Url" value="{{ $pageadvertise->url }}">
                                        @error('url')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror  
                                </div> 

                                
                                <div class="col-12 mb-2">
                                    <label for="display" class="form-label">Status</label>
                                    <select name="status" class="form-control" id="display">
                                        <<option value="Show"  @if($pageadvertise->status =='Show') selected @endif>Show</option>
                                        <option value="Hide" @if($pageadvertise->status =='Hide') selected @endif>Hide</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-2">        
                                    <label for="adrate" class="form-label">Rate</label>
                                    <input type="number" class="form-control @error('rate') is-invalid @enderror" id="adrate" placeholder="300" name="rate" value="{{ $pageadvertise->rate }}">
                                    @error('rate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-2">        
                                    <label for="adcurrency" class="form-label">Currency</label>
                                    <input type="text" class="form-control @error('currency') is-invalid @enderror" id="adcurrency" placeholder="afg" name="currency" value="{{ $pageadvertise->currency }}">
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

                    </div>
                </div>
 
            </div>
        </div>
    </section>


@endsection