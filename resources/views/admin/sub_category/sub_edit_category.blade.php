@extends('admin.layouts.app')

@section('heading','Sub category of Navigation bar')
 
@section('create_button')
 
    <a href="{{ route('sub_category_view') }}" class="btn btn-primary"><i class="fas fa-eye" width="20"> </i> View</a>

@endsection



@section('main_content')
        



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{  route('sub_category_update', $single_sub_category->id) }}" method="POST" >
                                        @csrf

                                        <div class="form-group mb-2">
                                            <label for="subcat">Sub Category Name</label> 
                                            <input type="text" id="subcat"  class="form-control @error('sub_category_name') is-invalid @enderror" name="sub_category_name"
                                            value="{{ $single_sub_category->sub_category_name }}">
                                            @error('sub_category_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror  
                                        </div>

                                        <div class="form-group mb-2"> 
                                            <label for="category_name">Under Category?</label>
                                            <select id="category_name" class="form-control" name="category_name">
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($single_sub_category->category_id == $category->id) selected @endif> {{ $category->name }}</option>
                                                
                                                @endforeach
                                            </select>
                                                  
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="url"> Show on Menu?</label>
                                            <select id="url" class="form-control" name="showmenu">
                                                <option value="Show" @if($single_sub_category->show_on_menu =='Show') selected @endif>Show</option>
                                                <option value="Hide" @if($single_sub_category->show_on_menu =='Hide') selected @endif>Hide</option>
                                            </select>   
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="position">Order Number</label>
                                            <input type="number" id="adrate" class="form-control @error('sub_category_order') is-invalid @enderror" name="sub_category_order"
                                            placeholder="1" value="{{ $single_sub_category->sub_category_order }}">
                                            @error('sub_category_order')
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