@extends('admin.layouts.app')

@section('heading','Subscriber Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_subscriber_showall_ad_view') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-eye-line me-1"></i>
        View Subscriber
    </button>
</a>
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Send Email to all Subscriber</li>
@endsection



@section('main_content')

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Property Form</h5>

                    <form action="{{ route('ad_subscriber_sendmail_all') }}" method="post">
                        @csrf
                        <div class="row my-3">
                            <div class="col-12 mb-2">
                                <label for="subject">Title *</label>
                                <input type="text" id="subject" placeholder="this is an email ..."
                                    class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    value="{{ old('subject') }}">
                                @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-2">
                                <label for="message">Email Details</label>
                                <textarea id="message"
                                    class="form-control tinymce-editor @error('message') is-invalid @enderror"
                                    name="message">{{ old('message') }}</textarea>
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-center mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection