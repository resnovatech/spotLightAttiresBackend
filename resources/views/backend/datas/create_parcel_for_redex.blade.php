@extends('backend.master.master')

@section('title')
Create Parcel | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Create Parcel</h4>

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


                    <form class="custom-validation" action="{{ route('store_parcel_for_redex') }}" method="post" enctype="multipart/form-data">
                        @csrf
                          <div class="row">

                              <div class="col-lg-12">
                                  <div class="card">
                                      <div class="card-body">
<div class="row">
<div class="form-group col-md-6 col-sm-6">
                              <label for="password">Customer Name <span style="color:red;">*</span></label>
                  <input type="text" class="form-control form-control-sm"  name="customer_name" placeholder="Enter Name" required>


                                                      </div>

        <div class="form-group col-md-6 col-sm-6">
                                                        <label for="password">Customer Phone <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control form-control-sm"  name="customer_phone" placeholder="Enter " required>


                                                                                </div>


                                                                                <div class="form-group col-md-6 col-sm-6">
                                                                                    <label for="password">Delivery Area Detail <span style="color:red;">*</span></label>
                                                                        <textarea class="form-control form-control-sm"  name="delivery_area"
                                                                        placeholder="Enter " required>
                                                                        </textarea>


                                                                                                            </div>

                                                                                                            <div class="form-group col-md-6 col-sm-6">
                                                                                                                <label for="password">Delivery Area <span style="color:red;">*</span></label>

                                                                                                                <select class="form-control form-control-sm"  name="delivery_area_id" required>
                                                                                                                    <option>--Please Select--</option>
                                                                                                                    @foreach($area_list['areas'] as $areas)

                                                                                                                    <option value="{{ $areas['id'] }}">{{ $areas['name'] }} - {{ $areas['district_name'] }}</option>

                                                                                                                    @endforeach
                                                                                                                </select>



                                                                                                            </div>


                                                                                                            <div class="form-group col-md-6 col-sm-6">
                                                                                                                <label for="password">Customer Address <span style="color:red;">*</span></label>
                                                                                                    <textarea class="form-control form-control-sm"  name="customer_address"
                                                                                                    placeholder="Enter " required>
                                                                                                    </textarea>


                                                                                                                                        </div>


                                                                                                                                        <div class="form-group col-md-6 col-sm-6">
                                                                                                                                            <label for="password">Cash Collection Amount <span style="color:red;">*</span></label>
                                                                                                                                <input type="number" class="form-control form-control-sm"  name="cash_collection_amount" placeholder="Enter " required>


                                                                                                                                                                    </div>



                                                                                                                                                    <div class="form-group col-md-6 col-sm-6">
                                                                                                                                                                        <label for="password">Parcel Weight <span style="color:red;">*</span></label>
                                                                                                                                                            <input type="text" class="form-control form-control-sm"  name="parcel_weight" placeholder="Enter " required>


                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="form-group col-md-6 col-sm-6">
                                                                                                                                                                                                    <label for="password">Invoice Id</label>
                                                                                                                                                                                        <input type="text" class="form-control form-control-sm"  name="merchant_invoice_id" placeholder="Enter Name">


                                                                                                                                                                                                                            </div>




                                                                                                            <div class="form-group col-md-6 col-sm-6">
                                                                                                                <label for="password">Instruction</label>
                                                                                                    <textarea class="form-control form-control-sm"  name="instruction"
                                                                                                    placeholder="Enter Name">
                                                                                                    </textarea>


                                                                                                                                        </div>
                                                                                                                                        <div class="form-group col-md-6 col-sm-6">
                                                                                                                                            <label for="password">Selling price of the product <span style="color:red;">*</span></label>
                                                                                                                                <input type="text" class="form-control form-control-sm"  name="value" placeholder="Enter " required>


                                                                                                                                                                    </div>

                  </div>


                                      </div>

                                  </div>
                              </div>



                              <div class="col-lg-12">

                                          <div>
                                              <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                                 Submit
                                              </button>
                                          </div>

                              </div>
                          </div> <!-- end col -->
                      </form>







@endsection


@section('script')
@endsection
