@extends('admin.layouts.app')

@section('heading','Posts Table')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_post_create') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-add-circle-line me-1"></i>
        Create
    </button>
</a>
@endsection

@section('currentpage', 'Post Section')

@section('main_content')

<section class="section">
    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered form-tabledata">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Bedroom</th>
                                    <th>Rooms / Bath</th>
                                    <th>Area</th>
                                    <th>Phone</th>
                                    <th>Added By</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>

                                    <td> {{ $post->id }} </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->bedroom ==1 ? 'Yes': 'No'}}</td>
                                    <td>{{ $post->rooms }} / {{ $post->bathrooms }}</td>
                                    <td>{{ $post->space }} </td>
                                    <td>{{ $post->phone }}</td>
                                    <td>
                                        @if ($post->user_id != 0)
                                        {{ \App\Models\User::where('id',$post->user_id)->first()->name }}-
                                        {{-- {{ \App\Models\Author::where('id',$post->author_id)->first()->name }} --}}

                                        @else
                                        Admin
                                        @endif
                                    </td>
                                    <td>{{ $post->address }}</td>


                                    <td>
                                        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="ri ri-more-2-fill"></i></button>
                                        <div class="dropdown-menu dropdown-menu-start">
                                            <button class="dropdown-item btn btn-primary" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modal{{ $post->id }}">See
                                                More</button>
                                            <a href="{{ route('ad_post_edit', $post->id) }}"
                                                class="dropdown-item">Edit</a>
                                            <a href="{{ route('ad_post_delete',$post->id) }}" class="dropdown-item"
                                                onClick="return confirm('Are you sure?');">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                {{-- view modal --}}
                                <div class="modal fade" id="modal{{ $post->id }}" data-bs-backdrop="false"
                                    data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Details of
                                                    {{ $post->rSubcategory->sub_category }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="col-md-12"><label
                                                            class="form-label">{{ $post->rSubcategory->sub_category }}
                                                            ID:</label> {{ $post->id }}</div>

                                                </div>
                                                <div class="form-group">

                                                    <div class="col-md-12"><label class="form-label">Photo(s): </label>
                                                        @foreach ($post['rpostimage'] as $item)
                                                        <img width="70" src="{{ asset('uploads/'. $item->photo) }}"
                                                            alt="">
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-12"><label class="form-label">Title:</label>
                                                        {{ $post->title }}</div>
                                                    <div class="col-md-12"><label class="form-label">Slug:</label>
                                                        {{ $post->slug }}</div>
                                                    <div class="col-md-12"><label class="form-label">Under Category:
                                                        </label> {{ $post->rSubcategory->sub_category }}</div>
                                                    <div class="col-md-12"><label class="form-label">Description:
                                                        </label> {!! $post->description !!}</div>

                                                    <div class="col-md-12"><label class="form-label">Area: </label> {!!
                                                        $post->space !!}</div>
                                                    <div class="col-md-12"><label class="form-label">Bedroom: </label>
                                                        {{ $post->bedroom }}</div>
                                                    <div class="col-md-12"><label class="form-label">Rooms: </label>
                                                        {{ $post->rooms }}</div>
                                                    <div class="col-md-12"><label class="form-label">Bathrooms: </label>
                                                        {{ $post->bathrooms }}</div>
                                                    <div class="col-md-12"><label class="form-label">Phone: </label>
                                                        {{ $post->phone }} </div>
                                                    <div class="col-md-12"><label class="form-label">Address: </label>
                                                        {{ $post->address }} </div>
                                                    <div class="col-md-12"><label class="form-label">Share able?:
                                                        </label>@php $is_share = $post->is_share == 1 ? 'Share able' :
                                                        'No' ; @endphp {{ $is_share }}
                                                    </div>
                                                    <div class="col-md-12"><label class="form-label">Visitors: </label>
                                                        {{ $post->visitors }} </div>
                                                    <div class="col-md-12"><label class="form-label">Created At:</label>
                                                        {{ $post->created_at }}</div>
                                                    <div class="col-md-12"><label class="form-label">Updated At:
                                                        </label> {{ $post->updated_at }}</div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


@endsection