@extends('admin.layouts.app')

@section('heading','User Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<a href="{{ route('ad_user_ad_create') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-add-circle-line me-1"></i>
        Create
    </button>
</a>
@endsection

@section('currentpage', 'User Section View ')


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
                                    <th>Photo</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Edit / Delete</th>
                                    <th>Status</th>
                                    <th>Share?</th>
                                    <th>Active on</th>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <body>

                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }} </td>
                                    <td>
                                        @if ($user->photo == '')
                                        <img height="50px" src="{{ asset('userprofile/default.png') }}" alt="">

                                        @endif
                                        <img height="50px" src="{{ asset('userprofile/'.$user->photo) }}" alt="">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td> {{ $user->phone }}</td>
                                    <td> {{ $user->email }}</td>
                                    <td> {{ $user->edit }} / {{ $user->eliminate }}</td>
                                    <td> {{ $user->status }}</td>
                                    <td> {{ $user->share_subbscriber }}</td>
                                    <td> {{ $user->email_verified_at }}</td>
                                    <td> {{ $user->address }}</td>
                                    <td>
                                        <a href="{{ route('ad_user_ad_edit',$user->id) }}" class="btn btn-primary"><i
                                                class="ri ri-edit-line"></i></a>
                                        <a href="{{ route('ad_user_ad_delete',$user->id) }}" class="btn btn-danger"
                                            onClick="return confirm('Are you sure?\n Do You want delete this user:   {{  $user->name }}');"><i
                                                class="ri ri-delete-bin-2-line"></i></a>
                                    </td>

                                </tr>
                                @endforeach
                            </body>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--  user modal --}}
    <div class="modal fade" id="modaluseradd" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Properties</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">

                        <form action="{{ route('ad_user_ad_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">

                                <div class="col-12 mb-2">
                                    <ul class="list-unstyle">
                                        @if ($users !='')
                                        <h4 class="fw-italic">This Categor(y)ies Exist please add another one</h4>
                                        @foreach ($users as $categor)

                                        <div class="text-danger fw-bolder ms-5">
                                            <li class="">{{ $categor->name }}<span class="text-dark"> order </span>
                                                {{ $categor->order }}</li>
                                        </div>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="user">user Name</label>
                                    <input type="text" id="user" placeholder="Home"
                                        class="form-control @error('user') is-invalid @enderror" name="user"
                                        value="{{ old('user') }}">
                                    @error('user')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="showmenu"> Show on Menu?</label>
                                    <select id="showmenu" class="form-control" name="showmenu">
                                        <option value="Show">Show</option>
                                        <option value="Hide">Hide</option>
                                    </select>
                                </div>


                                <div class="col-12 mb-2">

                                    <label for="order">Order Number</label>
                                    <input type="number" id="order"
                                        class="form-control @error('order') is-invalid @enderror" name="order"
                                        placeholder="1" value="{{ old('order') }}">
                                    @error('order')
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
    </div>
    {{-- end create country --}}

</section>
@endsection