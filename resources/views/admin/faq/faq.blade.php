@extends('admin.layouts.app')

@section('heading','Faq Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@if (count($faqpage) == NULL)
@section('create_button')
<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalfaq">
    <i class="ri ri-add-circle-line me-1"></i>
    Add Faq
</button>
@endsection
@endif

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
                                    <th>Details</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <body>

                                <tr>
                                    @foreach ($faqpage as $faq)

                                    <td>{!! $faq->faq_title !!} </td>
                                    <td>{!! $faq->faq_detail !!}</td>
                                    <td> {{ $faq->faq_status }}</td>

                                    <td>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalaboutedit"><i class="ri ri-edit-line"></i></button>

                                    </td>




                                    <div class="modal fade" id="modalaboutedit" data-bs-backdrop="false"
                                        data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div
                                            class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Faq</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <form action="{{ route('ad_faq_ad_update', $faq->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="row my-3">
                                                                <div class="col-12 mb-2">
                                                                    <label for="faqtitle">Faq Title *</label>
                                                                    <input type="text" id="faqtitle"
                                                                        placeholder="About Us"
                                                                        class="form-control @error('faqtitle') is-invalid @enderror"
                                                                        name="faq_title" value="{{ $faq->faq_title }}">
                                                                    @error('faqtitle')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-12 mb-2">
                                                                    <label for="showbottom">Faq Show ?</label>
                                                                    <select name="faq_show" class="form-select"
                                                                        id="showbottom">
                                                                        <option value="Yes">Yes</option>
                                                                        <option value="No">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class=" form-group mb-4">
                                                                    <label for="faqdetail">Faq Detail</label>
                                                                    <textarea id="faqdetail" name="faq_details"
                                                                        class="form-control tinymce-editor">{!! $faq->faq_detail !!}</textarea>
                                                                    @error('faqdetail')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="text-center mt-2">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Add</button>
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
                                </tr>
                            </body>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  social item modal --}}
    <div class="modal fade" id="modalfaq" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Faq</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ route('ad_faq_ad_store') }}" method="POST">
                            @csrf
                            <div class="row my-3">
                                <div class="col-12 mb-2">
                                    <label for="faqtitle">Faq Title *</label>
                                    <input type="text" id="faqtitle" placeholder="About Us"
                                        class="form-control @error('faqtitle') is-invalid @enderror" name="faqtitle">
                                    @error('faqtitle')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="showbottom">Faq Show ?</label>
                                    <select name="faqshow" class="form-select" id="showbottom">
                                        <option value="Yes">Yes</option>
                                        <option value="No">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="faqdetail">Faq Detail</label>
                                    <textarea id="faqdetail" name="faqdetail" class="form-control tinymce-editor"
                                        placeholder="faqdetail">{{ old('faqdetail') }}</textarea>
                                    @error('faqdetail')
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