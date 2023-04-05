@extends('backend.master.master')
@section('title')
Client View | {{ $ins_name }}
@endsection

@section('css')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    text{
        font-size: 12px !important;
    }
    </style>
@endsection


@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">User Profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Welcome Back !</h5>
                            {{-- <p>It will seem like simplified</p> --}}
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('/') }}public/new_admin/assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ asset('/') }}public/cuser.jpg" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{ $client_list_view->name }}</h5>
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15"> {{ $client_list_view->created_at->format('d-m-Y') }}</h5>
                                    <p class="text-muted mb-0">Joining Date</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">@if(empty($client_list_view->status))
                                        <span class="badge bg-success font-size-12">Admin</span>
                                        @else
                                        <span class="badge bg-success font-size-12">Web</span>
                                        @endif</h5>
                                    <p class="text-muted mb-0">Client From</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Personal Information</h4>

                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">Full Name :</th>
                            <td>{{ $client_list_view->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mobile :</th>
                            <td>{{ $client_list_view->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">E-mail :</th>
                            <td>{{ $client_list_view->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Home Address :</th>
                            <td>{{ $client_list_view->address }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Others Address</h4>
                <div class="">
                    <ul class="verti-timeline list-unstyled">

                        @foreach($delivery_address_detail as $all_d_address)
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-15"><a href="#" class="text-dark">{{ $all_d_address->title }}</a></h5>
                                        <span class="text-primary">{{ $all_d_address->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>

            </div>
        </div>
        <!-- end card -->
    </div>

    <div class="col-xl-8">

        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium mb-2">Total Order</p>
                                <h4 class="mb-0">{{ $total_order }}</h4>
                            </div>

                            <div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-check-circle font-size-24"></i>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium mb-2">Pending Order</p>
                                <h4 class="mb-0">{{ $total_order_pending }}</h4>
                            </div>

                            <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-hourglass font-size-24"></i>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium mb-2">Total Buy</p>
                                <h4 class="mb-0">{{ $total_order_money }}</h4>
                            </div>

                            <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-package font-size-24"></i>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">

            <div class="card-body">

                <h4 class="card-title mb-4">Order</h4>
                <div class="row">
                    <div class="col-md-3">
                <select class="form-control form-control-sm" id="search_order_year_calender_wise">
                    <option value="2022" {{ $year_value == '2022' ? 'selected':''}}>2022</option>
                    <option value="2023" {{ $year_value == '2023' ? 'selected':''}}>2023</option>
                    <option value="2024" {{ $year_value == '2024' ? 'selected':''}}>2024</option>
                    <option value="2025" {{ $year_value == '2025' ? 'selected':''}}>2025</option>
                </select>
                    </div>
            </div>
            <div id="search_order_year_calender_wise_result">
                <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Order List</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap table-hover mb-0">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order Processing Stage</th>
                            <th scope="col">Amount</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice_detail as $key=>$all_invoice_detail)
<?php
                            $product_name = DB::table('main_products')
                            ->where('id', $all_invoice_detail->product_id )->value('product_name');


                                                    ?>
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $product_name }}</td>
                            <td>
                                {{ $all_invoice_detail->created_at->format('d-m-Y') }}


                            </td>
                            <td>

                                @if(empty($all_invoice_detail->delivery_status))

                                <button type="button" class="btn btn-info btn-sm btn-rounded">
                                    Pending
                                </button>

                                @else
                                <button type="button" class="btn btn-info btn-sm btn-rounded" >
                                    {{ $all_invoice_detail->delivery_status }}
                                </button>
                                @endif

                            </td>
                            <td>{{ $all_invoice_detail->discount_price }}</td>

                        </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<input type="hidden" value="{{ $client_list_view->slug }}"  id="client_slug_ajax"/>
@endsection


@section('script')

<script>
    $(document).ready(function () {
    $("#search_order_year_calender_wise").change(function(){

        var year_value = $(this).val();
        var slug_value = $('#client_slug_ajax').val();
        //var url = window.location.origin;
        var getUrl = window.location;
var url = getUrl.origin + '/' +getUrl.pathname.split('/')[1];


        var final_url = url+'/admin/search_order_year_calender_wise/'+slug_value+'/'+year_value;
//alert(final_url);
        window.location.replace(final_url);


    });

});
</script>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Month Name ', 'Total Order'],
      ['January',{{ $january_order }}],
      ['February',{{ $feb_order }}],
      ['March',{{ $mar_order }}],
      ['April',{{ $apr_order }}],
      ['May',{{ $may_order }}],
      ['June',{{ $jun_order }}],
      ['July',{{ $jul_order }}],
      ['August',{{ $august_order }}],
      ['September',{{ $septem_order }}],
      ['October',{{ $oct_order }}],
      ['November',{{ $nov_order }}],
      ['December',{{ $dec_order }}],
    ]);

    var options = {
      title:'Monthly Total Order',
       hAxis: {
              title: 'Total Order',
              minValue: 0
            },
            vAxis: {
              title: 'Month Name'
            }
    };

    var chart = new google.visualization.BarChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }
    </script>

@endsection
