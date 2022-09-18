@extends('admin.layouts.app')

@section('heading','Post Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_post_view') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-eye-line me-1"></i>
        View
    </button>
</a>
@endsection

@section('currentpage')
<a href="{{ route('ad_post_view') }}">View Posts</a>
@endsection

@section('actionpage' )
<li class="breadcrumb-item active">Edit Post</li>
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

                    <form action="{{ route('ad_post_update', $single_post->id) }}" method="post"
                        enctype="multipart/form-data">

                        @csrf
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#seotags">SEO Tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#details">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#postimage">Post Images</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="container border p-3 tab-pane active">
                                <div class="form-group mb-4">
                                    <label for="category_id">Under Category?</label>
                                    <select name="sub_category_id" id="category_id" class="form-control select2">
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" @if($subcategory->id ==
                                            $single_post->sub_category_id ) selected @endif >
                                            {{ $subcategory->sub_category }}
                                            ({{ $subcategory->rCategory->name }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="title">Title</label>
                                    <input type="text" id="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        placeholder="Title" value="{{ $single_post->title }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="form-group mb-4">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control tinymce-editor"
                                        placeholder="description" rows="2">{!! $single_post->description !!}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div id="seotags" class="container border p-3 tab-pane fade">
                                <div class="form-group mb-4">
                                    <label for="metatitle">Meta Title</label>
                                    <input type="text" id="metatitle"
                                        class="form-control @error('metatitle') is-invalid @enderror" name="meta_title"
                                        placeholder="metatitle" value="{{ $single_post->meta_title }}">
                                    @error('metatitle')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="metakeyword">Meta Keywords</label>

                                    <textarea id="metakeyword" name="meta_keyword" class="form-control"
                                        rows="5">{!! $single_post->meta_keyword !!}</textarea>
                                    @error('metakeyword')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="metadescription">Meta Description</label>
                                    <textarea id="metadescription" name="meta_description" class="form-control"
                                        rows="5">{!! $single_post->meta_description !!}</textarea>
                                    @error('metadescription')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div id="details" class="container border p-3 tab-pane fade"><br>

                                <div class="form-group mb-4">
                                    <label for="area"> Area</label>
                                    <input type="text" name="area" id="area" value="{{ $single_post->space }}"
                                        placeholder="300 grip" class="form-control @error('area') is-invalid @enderror">
                                    @error('area')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="bdrom">Bed Room</label>
                                    <select name="bedroom" id="bdrom" class="form-control">
                                        <option value="1" @if ($single_post->bedroom == '1') selected @endif>Yes
                                        </option>
                                        <option value="0" @if ($single_post->bedroom == '0') selected @endif>No
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="rooms"> Rooms</label>
                                    <input type="number" name="rooms" id="rooms" placeholder="4"
                                        value="{{ $single_post->rooms }}"
                                        class="form-control @error('rooms') is-invalid @enderror">
                                    @error('rooms')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="bathrooms">Bathrooms</label>
                                    <input type="number" placeholder="2" name="bathrooms" id="bathrooms"
                                        value="{{ $single_post->bathrooms }}"
                                        class="form-control @error('bathrooms') is-invalid @enderror">
                                    @error('bathrooms')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group mb-4">
                                    <label for="currency">Currency</label>
                                    <input type="text" name="currency" id="currency" placeholder="USD"
                                        value="{{ $single_post->currency }}"
                                        class="form-control @error('currency') is-invalid @enderror">
                                    @error('currency')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="money">Rate</label>
                                    <input type="integer" placeholder="45000" name="money" id="money"
                                        value="{{ $single_post->rate }}"
                                        class="form-control @error('money') is-invalid @enderror">
                                    @error('money')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" value="{{ $single_post->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" placeholder="kabul"
                                        value="{{ $single_post->city }}"
                                        class="form-control @error('city') is-invalid @enderror">
                                    @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" value="{{ $single_post->address }}"
                                        class="form-control @error('address') is-invalid @enderror">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>



                            </div>

                            <div id="postimage" class="container border p-3 tab-pane fade"><br>

                                <div>
                                    <table class="table table-hover table-bordered">
                                        @foreach ($single_post['rpostimage'] as $item)
                                        <tr>
                                            <td>
                                                <img width="100" src="{{ asset('uploads/'. $item->photo) }}" alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                    href="{{ route('ad_post_delete_photo', $item->id) }}"
                                                    onClick="return confirm('Are you sure you want to delete the photo')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="form-group mb-0">New post Photo</label>
                                    <input type="file" id="pictures"
                                        class="form-control @error('pictures') is-invalid @enderror" name="pictures"
                                        value="{{ old('pictures') }}">
                                    @error('pictures')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="published">Publish?</label>
                                    <select name="publish" id="published" class="form-control">
                                        <option value="{{ $single_post->publish }}" @if($single_post->publish ==
                                            'Yes' ) selected @endif >Yes </option>
                                        <option value="{{ $single_post->publish }}" @if($single_post->publish ==
                                            'No' ) selected @endif >No </option>
                                    </select>
                                </div>
                                @if (true)
                                <div class="form-group mb-4">
                                    <label for="reason">Reason?</label>
                                    <input type="text" name="reason" id="reason" class="form-control"
                                        placeholder="not paid the charges">
                                </div>
                                @endif

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