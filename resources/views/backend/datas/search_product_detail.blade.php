
@extends('backend.master.master')

@section('title')
Parcel  Information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Parcel  Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
                        <div class="col-sm-6">
                            <div class="float-right d-md-block">
                                <div class="dropdown">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')

                                    @foreach($another_value as $all_another)


                                <h5> Tracking Id: {{ $all_another->tracking_id }}</h5>
                                <h5> Customer Address: {{ $all_another->customer_address }}</h5>
                                <h5> Delivery Area: {{ $all_another->delivery_area }}</h5>
                                <h5> Charge: {{ $all_another->charge }}</h5>
                                <h5> Customer Name: {{ $all_another->customer_name }}</h5>
                                <h5> Customer Phone: {{ $all_another->customer_phone }}</h5>
                                <h5> Cash Collection Amount: {{ $all_another->cash_collection_amount }}</h5>
                                <h5> Parcel Weight: {{ $all_another->parcel_weight }}</h5>
                                <h5> Status: {{ $all_another->status }}</h5>
                                <h5> Created at: {{ $all_another->created_at }}</h5>
                                <h5> Delivery Type: {{ $all_another->delivery_type }}</h5>
                                <h5> Value: {{ $all_another->value }}</h5>




@endforeach


                                    {{-- <pre>{!!$final_result!!}</pre> --}}




</div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->








@endsection

@section('script')

@endsection























