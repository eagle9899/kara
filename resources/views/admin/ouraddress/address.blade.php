@extends('admin.layouts.app')

@section('heading','About Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@if (count($addresses) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalabout">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Address
</button>
@endsection
@endif


@section('currentpage', 'About Section View ')


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
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach ($addresses as $about)
                                <tr>
                                    <td>{{ $about->address }}</td>
                                    <td>{!! $about->phone !!}</td>
                                    <td>{{  $about->email  }}</td>
                                    <td>{{  $about->about_status  }}</td>


                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalaboutedit"><i class="ri ri-edit-line"></i></button>

                                    </td>



                                    <div class="modal fade" id="modalaboutedit" data-bs-backdrop="false"
                                        data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit about </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">

                                                        <form action="{{ route('ad_address_ad_update',$about->id ) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="row my-3">
                                                                <div class="col-12 mb-2">
                                                                    <label for="address">Address*</label>
                                                                    <input type="text" id="address"
                                                                        placeholder="About Us"
                                                                        class="form-control @error('address') is-invalid @enderror"
                                                                        name="address" value="{{ $about->address }}">
                                                                    @error('address')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 mb-2">
                                                                    <label for="phone">Phone*</label>
                                                                    <input type="text" id="phone"
                                                                        placeholder="00937999999"
                                                                        class="form-control @error('phone') is-invalid @enderror"
                                                                        name="phone" value="{{ $about->phone }}">
                                                                    @error('phone')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>


                                                                <div class="col-12 mb-2">

                                                                    <label for="email">Email</label>
                                                                    <input type="email" id="email"
                                                                        class="form-control @error('email') is-invalid @enderror"
                                                                        name="email" value="{{ $about->email }}">
                                                                    @error('email')
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

                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  social item modal --}}
    <div class="modal fade" id="modalabout" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ route('ad_address_ad_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">
                                <div class="col-12 mb-2">
                                    <label for="address">Address *</label>
                                    <input type="text" id="address" placeholder="address"
                                        class="form-control @error('address') is-invalid @enderror" name="address">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="phone">Phone *</label>
                                    <input type="tel" id="phone" max="17" placeholder="0093123456"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" max="17" placeholder="0093123456"
                                        class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
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