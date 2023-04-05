
@extends('backend.master.master')

@section('title')
Pick-Up Store Information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pick-Up Store  Information</h4>

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
<div class="table-responsive">
    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>

                                 <th>Pick-up Store Id</th>

                                 <th>Name</th>

                                 <th>Address</th>
                                    <th>Area Name</th>

                                    <th>Phone</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($datas as $all_data)


                                <tr>


                                <td> {{$all_data[0]['id']}}</td>
<td>{{$all_data[0]['name']}}</td>
<td>{{$all_data[0]['address']}}</td>
<td>{{$all_data[0]['area_name']}}</td>
<td>{{$all_data[0]['phone']}}</td>
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























