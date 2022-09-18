@extends('admin.layouts.app')

@section('heading','Home Advertisement Data Table')
@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection
@section('create_button')
<a href="{{ route('ad_home_ad_create') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-add-circle-line me-1"></i> 
        Create
    </button>
</a> 
@endsection
 
@section('currentpage','Advertisemt/ Home Advertisement')

@section('main_content')

    <section class="section">
        <div class="row">
          
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive mt-5">
                            <table class="table table-bordered form-tabledata" >
                                <thead>
                                    <tr> 
                                        <th>ID</th>
                                        <th>URL</th>
                                        <th>Status</th>
                                        <th>R/Currency</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($advertise as $ads)
                                    <tr>
                                        <td > {{ $ads->id }} </td>     
                                        <td>{{ $ads->url }}</td>  
                                        <td> <span class="badge @if( $ads->status =='Show')bg-success @else bg-danger @endif">{{ $ads->status }}</span></td> 
                                        <td>{{ $ads->rate }} / {{ $ads->currency }}</td>      
                                        <td> {{ $ads->updated_at }}</td>     
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modal{{ $ads->id }}" ><i class="ri ri-table-line"></i></button>
                                            <a href="{{ route('ad_home_ad_edit', $ads->id) }}" type="button" class="btn btn-primary" ><i class="ri ri-edit-line"></i></a>
                                            <a href="{{ route('ad_home_ad_delete',$ads->id) }}" type="button" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i  class="ri ri-delete-bin-2-line"></i></a>                                                      
                                        </td>
                                    </tr>
                                    {{-- view modal --}}
                                    <div class="modal fade" id="modal{{ $ads->id }}" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Details of Home Advertisement</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12"><label class="form-label">Ads ID:</label> {{ $ads->id }}</div>
                                                         
                                                    </div>
                                                    <div class="form-group">
                                                                       
                                                        <div class="col-md-12"><label class="form-label">Photo(s): </label><img class="w-25" src="{{ asset('uploads/'.$ads->photo) }}" alt=""></div> <br>
                                                        <div class="col-md-12"><label class="form-label">URL:</label> {{ $ads->url }}</div> 
                                                        <div class="col-md-12"><label class="form-label">Position: </label> {{ $ads->position }}</div>
                                                        <div class="col-md-12"><label class="form-label">Status: </label> {{ $ads->status }}</div> 
                                                        <div class="col-md-12"><label class="form-label">Currency: </label> {{ $ads->currency }}</div>
                                                        <div class="col-md-12"><label class="form-label">Rate: </label> {{ $ads->rate }} </div>
                                                        <div class="col-md-12"><label class="form-label">Created At:</label> {{ $ads->created_at }}</div> 
                                                        <div class="col-md-12"><label class="form-label">Updated At: </label> {{ $ads->updated_at }}</div>  
                                                                            
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
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