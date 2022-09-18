@extends('admin.layouts.app')

@section('heading','Category Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalcategoryadd">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Category
</button>
@endsection

@section('currentpage', 'Category Section View ')


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
                                    <th>Category Name</th>
                                    <th>Show on Menu</th>
                                    <th>Order</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <body>

                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }} </td>
                                    <td>{{ $category->name }}</td>
                                    <td> {{ $category->show_on_menu }}</td>
                                    <td> {{ $category->order }}</td>
                                    <td> {{ $category->updated_at }}</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalcategoryedit{{ $category->id }}"><i
                                                class="ri ri-edit-line"></i></button>
                                        <a href="{{ route('category_delete',$category->id) }}" class="btn btn-danger"
                                            onClick="return confirm('Are you sure?\n Do You want delete this category:   {{  $category->name }}');"><i
                                                class="ri ri-delete-bin-2-line"></i></a>
                                    </td>


                                </tr>

                                <div class="modal fade" id="modalcategoryedit{{ $category->id }}"
                                    data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category {{ $category->id }}
                                                    ({{ $category->name }})</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="col-12 mb-2">
                                                        <ul class="list-unstyle">
                                                            <h4 class="fw-italic">For changing the category type set
                                                                another one without this list</h4>
                                                            @foreach ($categories as $item)

                                                            <div class="text-danger fw-bolder ms-5">
                                                                <li class="">{{ $item->name }} <span class="text-dark">
                                                                        order </span>{{ $item->order }}</li>
                                                            </div>
                                                            @endforeach

                                                        </ul>
                                                    </div>

                                                    <form action="{{ route('category_update', $category->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="category_name">Category Name</label>
                                                                <input type="text" id="category_name" placeholder="Home"
                                                                    class="form-control @error('category') is-invalid @enderror"
                                                                    name="category_name" value="{{ $category->name }}">
                                                                @error('category_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="showmenuu"> Show on Menu?</label>
                                                                <select id="showmenuu" class="form-control"
                                                                    name="showmenuu">
                                                                    <option value="Show" @if($category->show_on_menu
                                                                        =='Show') selected @endif>Show</option>
                                                                    <option value="Hide" @if($category->show_on_menu
                                                                        =='Hide') selected @endif>Hide</option>
                                                                </select>
                                                            </div>


                                                            <div class="col-12 mb-2">

                                                                <label for="ordering">Order Number</label>
                                                                <input type="number" id="ordering"
                                                                    class="form-control @error('ordering') is-invalid @enderror"
                                                                    name="ordering" placeholder="1"
                                                                    value="{{ $category->order }}">
                                                                @error('ordering')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>


                                                            <div class="text-center mt-2">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
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


    {{--  category modal --}}
    <div class="modal fade" id="modalcategoryadd" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Properties</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">

                        <form action="{{ route('category_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">

                                <div class="col-12 mb-2">
                                    <ul class="list-unstyle">
                                        @if ($categories !='')
                                        <h4 class="fw-italic">This Categor(y)ies Exist please add another one</h4>
                                        @foreach ($categories as $categor)

                                        <div class="text-danger fw-bolder ms-5">
                                            <li class="">{{ $categor->name }}<span class="text-dark"> order </span>
                                                {{ $categor->order }}</li>
                                        </div>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="category">Category Name</label>
                                    <input type="text" id="category" placeholder="Home"
                                        class="form-control @error('category') is-invalid @enderror" name="category"
                                        value="{{ old('category') }}">
                                    @error('category')
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