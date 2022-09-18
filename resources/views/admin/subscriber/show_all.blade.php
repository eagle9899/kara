@extends('admin.layouts.app')

@section('heading','Subcriber Section')

@section('headinglink')
<a href="{{ route('admin_home') }}">Dashboard</a>
@endsection

@section('create_button')

<a href="{{ route('ad_subscriber_mailto_all') }}">
    <button type="button" class="btn btn-primary">
        <i class="ri ri-add-circle-line me-1"></i>
        Send Email
    </button>
</a>

@endsection

@section('currentpage', 'Subcriber section view all ')


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
                                    <th>Subcriber Email</th>
                                    <th>Show on Menu</th>
                                    <th>Updated at</th>
                                </tr>
                            </thead>

                            <body>

                                @foreach($allsubscriber as $subcriber)
                                <tr>
                                    <td>{{ $subcriber->id }} </td>
                                    <td>{{ $subcriber->email }}</td>
                                    <td> {{ $subcriber->status }}</td>
                                    <td>@php
                                        $date = strtotime($subcriber->updated_at);
                                        $date = date('M/Y/d', $date);
                                        $hour = strtotime($subcriber->updated_at);
                                        $hour = date('h:i:s A', $hour);
                                        @endphp {{ $date }}<br> {{ $hour }}</td>

                                </tr>
                                @endforeach
                            </body>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--  subcriber modal --}}

    {{-- end create country --}}

</section>
@endsection