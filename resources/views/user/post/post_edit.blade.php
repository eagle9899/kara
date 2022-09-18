@extends('user.layouts.app')

@section('heading','House Section')

@section('headinglink')
<a href="{{ route('user_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('user_post_view') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-eye-line me-1"></i>
        Posts
    </button>
</a>
@endsection

@section('currentpage')
<a href="{{ route('user_post_view') }}">View Posts</a>
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Edit House</li>
@endsection
@section('main_content' )


<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">


                @if ($errors->any())

                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>

                @endif
                <div class="card-body">
                    <h5 class="card-title">Property Form</h5>

                    <form action="{{ route('user_post_update', $single_house->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#details">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#houseimage">House Images</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="container border p-3 tab-pane active">
                                <div class="form-group mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" id="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        placeholder="Title" value="{{ $single_house->title }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="category_id">Under Category?</label>
                                    <select name="category_id" id="category_id" class="form-control select2">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if( $category->id == 1) disabled @endif
                                            @if($category->id == $single_house->category_id ) selected @endif >
                                            {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="property_type">Under Property ?</label>
                                    <select name="property_id" id="property_type" class="form-control select2">
                                        @foreach($properties as $property)
                                        <option value="{{ $property->id }}" @if($property->id ==
                                            $single_house->property_id ) selected @endif > {{ $property->property }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="category_id">Under City</label>
                                    <select name="city" id="category_id" class="form-control select2">
                                        @foreach($cities as $ct)
                                        <option value="{{ $ct->id}}" @if($ct->id == $single_house->city_id ) selected
                                            @endif > {{ $ct->city }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control tinymce-editor"
                                        placeholder="description" rows="2">{!! $single_house->description !!}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <div id="details" class="container border p-3 tab-pane fade"><br>

                                <div class="form-group mb-4">
                                    <label for="area"> Area</label>
                                    <input type="text" name="area" id="area" value="{{ $single_house->space }}"
                                        placeholder="300 grip" class="form-control @error('area') is-invalid @enderror">
                                    @error('area')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="bdrom">Bed Room</label>
                                    <select name="bedroom" id="bdrom" class="form-control">
                                        <option value="1" @if ($single_house->bedroom == '1') selected @endif>Yes
                                        </option>
                                        <option value="0" @if ($single_house->bedroom == '0') selected @endif>No
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="rooms"> Rooms</label>
                                    <input type="number" name="rooms" id="rooms" placeholder="4"
                                        value="{{ $single_house->rooms }}"
                                        class="form-control @error('rooms') is-invalid @enderror">
                                    @error('rooms')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="bathrooms">Bathrooms</label>
                                    <input type="number" placeholder="2" name="bathrooms" id="bathrooms"
                                        value="{{ $single_house->bathrooms }}"
                                        class="form-control @error('bathrooms') is-invalid @enderror">
                                    @error('bathrooms')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group mb-4">
                                    <label for="currency">Currency</label>
                                    <input type="text" name="currency" id="currency" placeholder="USD"
                                        value="{{ $single_house->currency }}"
                                        class="form-control @error('currency') is-invalid @enderror">
                                    @error('currency')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="money">Rate</label>
                                    <input type="integer" placeholder="45000" name="money" id="money"
                                        value="{{ $single_house->rate }}"
                                        class="form-control @error('money') is-invalid @enderror">
                                    @error('money')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{ $single_house->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" value="{{ $single_house->address }}"
                                        class="form-control @error('address') is-invalid @enderror">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="is_share">Share able?</label>
                                    <input type="checkbox" class="form-control" value="1" @if($single_house->is_share
                                    =='1') checked @endif name="is_share" id="is_share">
                                </div>

                            </div>

                            <div id="houseimage" class="container border p-3 tab-pane fade"><br>

                                <div>
                                    <table class="table table-hover table-bordered">
                                        @foreach ($single_house['rhouseimage'] as $item)
                                        <tr>
                                            <td>
                                                <img width="100" src="{{ asset('uploads/'. $item->photo) }}" alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                    href="{{ route('ad_house_delete_photo', $item->id) }}"
                                                    onClick="return confirm('Are you sure you want to delete the photo')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="form-group mb-0">New House Photo</label>
                                    <input type="file" id="pictures"
                                        class="form-control @error('pictures') is-invalid @enderror" name="pictures"
                                        value="{{ old('pictures') }}">
                                    @error('pictures')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>


@endsection