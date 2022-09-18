@extends('admin.layouts.app')

@section('heading','income Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalincome">
    <i class="ri ri-add-circle-line me-1"></i>
    Add income
</button>
@endsection


@section('currentpage', 'income Section View ')


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
                                    <th>#</th>
                                    <th>post ID</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Taken By Admin</th>
                                    <th>Taken By User</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>


                                @foreach ($incomepage as $income)
                                <tr>
                                    <td>{{ $income->id }}</td>
                                    <td>{{ $income->post_id }}</td>
                                    <td>{!! $income->amount !!}</td>
                                    <td>{{  $income->currency  }}</td>
                                    <td>@if ($income->admin_id != 0)
                                        Admin
                                        @endif
                                    </td>
                                    <td>@if ($income->user_id != 0)
                                        {{ \App\Models\User::where('id',$income->user_id)->first()->name }}
                                        @endif
                                    </td>
                                    <td>{{  $income->updated_at  }}</td>

                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalincomeedit{{ $income->id }}"><i
                                                class="ri ri-edit-line"></i></button>

                                    </td>

                                    <div class="modal fade" id="modalincomeedit{{ $income->id }}"
                                        data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit income </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">

                                                        <form action="{{ route('ad_income_update',$income->id ) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="row my-3">
                                                                <input type="hidden" name="post_id"
                                                                    value="{{ $income->post_id }}">
                                                                <div class="col-12 mb-2">
                                                                    <label for="amount">Amount</label>
                                                                    <input id="amount" type="number"
                                                                        class="form-control @error('amount') is-invalid @enderror"
                                                                        name="amount" value="{{ $income->amount }}">
                                                                    @error('amount')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-12 mb-2">
                                                                    <label for="currency">Currency</label>
                                                                    <input id="currency" type="text"
                                                                        class="form-control @error('currency') is-invalid @enderror"
                                                                        name="currency" value="{{ $income->currency }}">
                                                                    @error('currency')
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
    <div class="modal fade" id="modalincome" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add income</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ route('ad_income_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">
                                <div class="col-12 mb-2">
                                    <label for="incometitlep">Post Number</label>
                                    <input type="number" id="incometitlep" placeholder="22"
                                        class="form-control @error('post_id') is-invalid @enderror" name="post_id">
                                    @error('post_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="incometitle">Amount</label>
                                    <input type="number" id="incometitle" placeholder="100"
                                        class="form-control @error('amount') is-invalid @enderror" name="amount">
                                    @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="currency">Currency</label>
                                    <input type="text" id="currency" placeholder="AFN"
                                        class="form-control @error('currency') is-invalid @enderror" name="currency">
                                    @error('currency')
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