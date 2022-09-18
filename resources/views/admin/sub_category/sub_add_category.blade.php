@extends('admin.layouts.app')

@section('heading','Create Sub Category Section ')


@section('create_button')

<a href="{{ route('sub_category_view') }}" class="btn btn-primary"><i class="fas fa-eye"> </i> View</a>

@endsection


@section('main_content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('sub_category_store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="subcat">Sub Category Name</label>
                        <input type="text" id="subcat"
                            class="form-control @error('sub_category_name') is-invalid @enderror"
                            name="sub_category_name" value="{{ old('sub_category_name') }}">
                        @error('sub_category_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="category_name">Under Category?</label>
                        <select id="category_name" class="form-control" name="category_name">
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
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
                        <input type="number" id="order" class="form-control @error('order') is-invalid @enderror"
                            name="order" placeholder="1" value="{{ old('order') }}">
                        @error('order')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                        <button type="reset" class="btn btn-secondary mr-1 mb-1">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection