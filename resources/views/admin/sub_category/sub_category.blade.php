@extends('admin.layouts.app')

@section('heading','subcategory Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalsubsubcategoryadd">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Sub subcategory
</button>
@endsection

@section('currentpage', 'subcategory Section View ')


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
                                    <th>Sub Category </th>
                                    <th>Category </th>
                                    <th>Show on Menu</th>
                                    <th>Order</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <body>

                                @foreach($sub_categories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory->id }} </td>
                                    <td>{{ $subcategory->sub_category }}</td>
                                    <td>{{ $subcategory->rCategory->name }}</td>
                                    <td> {{ $subcategory->show_on_menu }}</td>
                                    <td> {{ $subcategory->sub_category_order }}</td>
                                    <td> {{ $subcategory->updated_at }}</td>
                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalsubcategoryedit{{ $subcategory->id }}"><i
                                                class="ri ri-edit-line"></i></button>
                                        <a href="{{ route('sub_category_delete',$subcategory->id) }}"
                                            class="btn btn-danger"
                                            onClick="return confirm('Are you sure?\n Do You want delete this subcategory:   {{  $subcategory->name }}');"><i
                                                class="ri ri-delete-bin-2-line"></i></a>
                                    </td>


                                </tr>

                                <div class="modal fade" id="modalsubcategoryedit{{ $subcategory->id }}"
                                    data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit subcategory {{ $subcategory->id }}
                                                    ({{ $subcategory->sub_category }})</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="col-12 mb-2">
                                                        <ul class="list-unstyle">
                                                            <h4 class="fw-italic">For changing the subcategory type set
                                                                another one without this list</h4>
                                                            @foreach ($sub_categories as $item)

                                                            <div class="text-danger fw-bolder ms-5">
                                                                <li class="">{{ $item->sub_category }} <span
                                                                        class="text-dark">
                                                                        order </span>{{ $item->sub_category_order }}
                                                                </li>
                                                            </div>
                                                            @endforeach

                                                        </ul>
                                                    </div>

                                                    <form action="{{ route('sub_category_update', $subcategory->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row my-3">
                                                            <div class="col-12 mb-2">
                                                                <label for="category"> Category</label>
                                                                <select id="category" class="form-control"
                                                                    name="category">
                                                                    @foreach ($categories as $item)
                                                                    <option value="{{ $item->id }}" @if ($item->id ==
                                                                        $subcategory->category_id ) selected
                                                                        @endif>{{ $item->name }}
                                                                    </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="subcategory_name">subcategory Name</label>
                                                                <input type="text" id="subcategory_name"
                                                                    placeholder="Home"
                                                                    class="form-control @error('subcategory') is-invalid @enderror"
                                                                    name="subcategory_name"
                                                                    value="{{ $subcategory->sub_category }}">
                                                                @error('subcategory_name')
                                                                <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="col-12 mb-2">
                                                                <label for="showmenuu"> Show on Menu?</label>
                                                                <select id="showmenuu" class="form-control"
                                                                    name="showmenuu">
                                                                    <option value="Show" @if($subcategory->show_on_menu
                                                                        =='Show') selected @endif>Show</option>
                                                                    <option value="Hide" @if($subcategory->show_on_menu
                                                                        =='Hide') selected @endif>Hide</option>
                                                                </select>
                                                            </div>



                                                            <div class="col-12 mb-2">

                                                                <label for="ordering">Order Number</label>
                                                                <input type="number" id="ordering"
                                                                    class="form-control @error('ordering') is-invalid @enderror"
                                                                    name="ordering" placeholder="1"
                                                                    value="{{ $subcategory->sub_category_order }}">
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


    {{--  subcategory modal --}}
    <div class="modal fade" id="modalsubsubcategoryadd" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">

                        <form action="{{ route('sub_category_store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="category_name">Under Category?</label>
                                <select id="category_name" class="form-control" name="category_name">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id}}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="subcat">Sub Category Name</label>
                                <input type="text" id="subcat"
                                    class="form-control @error('subcategory') is-invalid @enderror" name="subcategory"
                                    value="{{ old('subcategory') }}">
                                @error('subcategory')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="showmenu"> Show on Menu?</label>
                                <select id="showmenu" class="form-control" name="showmenu">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
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
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- end create country --}}

</section>
@endsection