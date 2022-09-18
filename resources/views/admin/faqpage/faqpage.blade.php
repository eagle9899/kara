@extends('admin.layouts.app')

@section('heading','Faq Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection
 
@section('create_button')
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalfaqadd" >
        <i class="ri ri-add-circle-line me-1"></i> 
        Add Faq
    </button>
@endsection

@section('currentpage', 'Faq Section View ') 

 
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
                                        <th>Title</th>  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <body>
                                     @foreach ($faq_data as $faq_item)
                                    <tr>
                                        <td >{!! $faq_item->faq_title !!} </td> 
                                         
                                        <td>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalfaqedit{{ $faq_item->id }}" ><i class="ri ri-edit-line"></i></button>
                                            <a href="{{ route('ad_faqpage_ad_destroy',$faq_item->id) }}" type="button" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i  class="ri ri-delete-bin-2-line"></i></a> 
                                        </td>
                
                                            
                                    </tr>

                                    <div class="modal fade" id="modalfaqedit{{ $faq_item->id }}" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit FAQ </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <div class="form-group">
                                                        
                                                        <form action="{{ route('ad_faqpage_ad_update',$faq_item->id ) }}" method="post" >
                                                            @csrf
                                                            <div class="row my-3">
                                                                <div class="col-12 mb-2">     
                                                                    <label for="faq_title">FAQ Title*</label> 
                                                                    <input type="text" id="faq_title" placeholder="About Us" class="form-control @error('faq_title') is-invalid @enderror" name="faq_title"
                                                                        value="{{ $faq_item->faq_title }}">
                                                                    @error('faq_title')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror 
                                                                </div>
                                                                  
                                                                <div class="col-12 mb-2">  
                                                                    
                                                                    <label for="faq_detail">Faq Detail</label>
                                                                    <textarea id="faq_detail" class="form-control tinymce-editor @error('faq_detail') is-invalid @enderror" name="faq_detail" >{{ $faq_item->faq_detail }}</textarea>
                                                                    @error('faq_detail')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror 
                                                                </div>
                                    
                                    
                                                                <div class="text-center mt-2">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
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
                {{--  faq modal --}}
            <div class="modal fade" id="modalfaqadd" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Faq</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <form action="{{ route('ad_faqpage_ad_store') }}" method="POST" >
                                    @csrf
                                    <div class="row my-3">
                                        <div class="col-12 mb-2">     
                                            <label for="faq_title">FAQ Title*</label> 
                                            <input type="text" id="faq_title" placeholder="About Us" class="form-control @error('faq_title') is-invalid @enderror" name="faq_title"
                                                >
                                            @error('faq_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror 
                                        </div>
                                                                  
                                        <div class="col-12 mb-2">  
                                                              
                                            <label for="faq_detail">Faq Detail</label>
                                            <textarea id="faq_detail" class="form-control tinymce-editor @error('faq_detail') is-invalid @enderror" name="faq_detail" ></textarea>
                                            @error('faq_detail')
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
        {{-- end create country --}}            
    </section>
@endsection