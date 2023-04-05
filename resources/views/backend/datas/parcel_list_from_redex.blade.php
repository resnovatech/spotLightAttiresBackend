@extends('backend.master.master')

@section('title')
Parcel Information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Parcel Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<form class="form-inline" method="get" action="{{ route('search_product_status') }}">
<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-2">

            <input name="parcel_id" placeholder="Parcel Id / Tracking Id" class="form-control form-control-sm" type="text"  id="example-text-input">
          </div>
    </div>

    <div class="col-sm-2">




            <button type="submit" name="final_button" value="track" class="btn  btn-sm btn-primary mb-2">Track Parcel</button>
            <button type="submit" name="final_button" value="detail" class="btn  btn-sm btn-primary mb-2">See detail</button>
          </form>

    </div>
</div>
</form>
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
<div class="table-responsive">
    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>



                                 <th>Name</th>
                                 <th>phone</th>
                                 <th>Address</th>
                                <th>Delivery Area</th>
                                <th>Parcel Weight</th>
                                <th>Collection Amount</th>
                                <th>Selling Price</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($parcel_list as $all_data)


                                <tr>


                                <td> {{$all_data->customer_name}}</td>
<td>{{$all_data->customer_phone}}</td>
<td>{{$all_data->customer_address}}</td>
<td>{{$all_data->delivery_area}}</td>
<td>{{$all_data->parcel_weight}}</td>
<td>{{$all_data->cash_collection_amount}}</td>
<td>{{$all_data->value}}</td>
                                </tr>
@endforeach


                                        </tbody>
                                    </table>
</div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
@endsection


@section('script')
@endsection
