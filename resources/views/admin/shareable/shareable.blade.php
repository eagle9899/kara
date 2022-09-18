@extends('admin.layouts.app')

@section('heading','Social Item Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#shareableiconadd">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Share to Icon
</button>
@endsection

@section('currentpage', 'Social Item Section View ')


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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Preview</th>
                                    <th>Icon</th>
                                    <th>URL</th>
                                </tr>
                            </thead>

                            <body>
                                @foreach ($shareableicon as $icon)
                                <tr>
                                    <td>{{ $icon->id }} </td>
                                    <td>{{ $icon->name }} </td>
                                    <td><i class="{{ $icon->icon }}"></i> </td>
                                    <td>{!! $icon->icon !!} </td>
                                    <td>{!! $icon->url !!} </td>

                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#shareableiconedit{{ $icon->id }}"><i
                                                class="ri ri-edit-line"></i></button>
                                        <a href="{{ route('ad_socialicon_delete',$icon->id) }}" type="button"
                                            class="btn btn-danger" onClick="return confirm('Are you sure?');"><i
                                                class="ri ri-delete-bin-2-line"></i></a>
                                    </td>


                                </tr>

                                <div class="modal fade" id="shareableiconedit{{ $icon->id }}" data-bs-backdrop="false"
                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Social Item </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <form action="{{ route('ad_shareable_edit',$icon->id ) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="name">Shareable Item Name*</label>
                                                                <input type="text" id="name" placeholder="facebook"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    name="name" value="{{ $icon->name }}">
                                                                @error('name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="icon">Shareable Item Icon*</label>
                                                                <input type="text" id="icon"
                                                                    placeholder="fab fa-facebook"
                                                                    class="form-control @error('icon') is-invalid @enderror"
                                                                    name="icon" value="{{ $icon->icon }}">
                                                                @error('icon')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12 mb-2">
                                                                <label for="url">Shareable Item ur*</label>
                                                                <input type="text" id="url"
                                                                    placeholder="https://www.facebbok.com"
                                                                    class="form-control @error('url') is-invalid @enderror"
                                                                    name="url" value="{{ $icon->url }}">
                                                                @error('url')
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

                            </body>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  social item modal --}}
    <div class="modal fade" id="shareableiconadd" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Share able Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ route('ad_shareable_ad_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">
                                <div class="col-12 mb-2">
                                    <label for="share_name">Share able Name*</label>
                                    <input type="text" id="share_name" placeholder="facebook"
                                        class="form-control @error('share_name') is-invalid @enderror"
                                        name="share_name">
                                    @error('share_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="share_icon">Share able Icon*</label>
                                    <input type="text" id="share_icon" placeholder="fab fa-facebook"
                                        class="form-control @error('share_icon') is-invalid @enderror"
                                        name="share_icon">
                                    @error('share_icon')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="share_url">URL*</label>
                                    <input type="text" id="share_url" placeholder="https://www.facebook.com"
                                        class="form-control @error('share_url') is-invalid @enderror" name="share_url">
                                    @error('share_url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- end social item --}}
</section>
@endsection