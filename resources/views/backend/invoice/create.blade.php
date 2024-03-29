@extends('backend.master.master')

@section('title')
Invoice information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">New Invoice Generate</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
</div> <!-- container-fluid -->

<!--Invoice Generate section start-->
<form method="POST" action="{{ route('invoice_list_store') }}">
    @csrf
<div class="row">
    @include('flash_message')
    <div class="col-xl-8">
        <div class="card">
            <h5 class="card-header">Client Information</h5>

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Select Client</label>
                            <select class="select2 form-control show_all_addresss" name="client_slug"
                                    data-placeholder="Choose ..." id="select_client_name_from_list">
                                <option value="0">Select Client</option>
                                @foreach($client_list_all as $all_client_print)
                                <option value="{{ $all_client_print->slug }}">{{ $all_client_print->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary"><i class="mdi mdi-home me-1"></i>Client
                                        Home Address</h5>
                                </div>
                                <div class="card-body" id="main_address_view_from_client">


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Shipping Address</label>
                            <select class="select2 form-control"
                                    data-placeholder="Choose ..." id="shipping_address_via_client">

                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-success"><i class="mdi mdi-home me-1"></i>
                                        Shipping Address</h5>
                                </div>
                                <div class="card-body" id="address_detail_from_ship">
                                    {{-- <h5 class="card-title mt-0">Name: Rakib Hasan Badhan</h5>
                                    <p class="card-text">Phone Number: 017000000 <br>
                                        Email: admin@gmail.com <br>
                                        Address: DCC Kha, House#25, Flat#7/C, Shahjadpur, Gulshan,
                                        Dhaka-1212</p>
                                    <a href="#" class="card-link text-success"> Edit Address <i
                                                class="mdi mdi-pencil me-1"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <h5 class="card-header">Invoice</h5>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Invoice #</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="order_id" value="<?php echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);?>" id="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Payment Term</label>
                    <div class="col-md-9">
                        <select class="form-select" name="payment_term">
                            <option>Select</option>
                            <option>Instant Payment</option>
                            <option>After Delivery</option>
                            <option>Due end of Month</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Date</label>
                    <div class="col-md-9">
                        <div class="input-group" id="datepicker2">
                            <input type="text" name="pay_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="dd M, yyyy"
                                   data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                   data-provide="datepicker" data-date-autoclose="true">

                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                        </div>
                    </div>
                </div>
                
                            <input type="hidden" name="due_date" class="form-control" value="3">
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Warehouse</label>
                    <div class="col-md-9">
                        <select class="form-select" name="ware_house">
                        
                            <option value="SpotLightAttires">SpotLightAttires</option>
                          
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Order Form</label>
                    <div class="col-md-9">
                        <select class="form-select" name="order_from">
                            <option>Select</option>
                            <option>Facebook</option>
                            <option>Over the Call</option>
                            <option>Friends</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-3 col-form-label">Order BY</label>
                    <div class="col-md-9">
                        <select class="form-select" name="order_by">
                            <option>Select</option>
                            @foreach($order_by_list as $all_order_by_list)
                            <option value="{{ $all_order_by_list->company_name }}">{{ $all_order_by_list->company_name }}</option>
@endforeach
                        </select>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Product Information</h5>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap table-check" id="dynamicAddRemove">
                        <thead class="table-light">
                        <tr>
                            <th style="width:200px"> Product Name</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>After Dis.</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td style="width:200px">
                                <select class=" form-control main_product_id select2" name="main_product_id[]" id="main_product_id0" >
                                    <option value="0">Please Select</option>
                                    @foreach($main_product_list_all as $main_product_list_all_print)
                                    <option value="{{ $main_product_list_all_print->id }}">{{ $main_product_list_all_print->product_name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="width: 100px; max-width:100px; min-width:100px;">
                                <select class=" form-control main_product_size" name="main_product_size[]" id="main_product_size0" >
                                </select>
                            </td>
                            <td style="width: 100px; max-width:100px; min-width:100px;">
                                <select class=" form-control main_product_color" name="main_product_color[]" id="main_product_color0" >
                                </select>
                            </td>
                            <td><input type="number" min="1" class="form-control p_quantity" name="p_quantity[]" id="p_quantity0" placeholder="Quantity"></td>
                            <td><input type="text" class="form-control" name="unit_price[]" id="unit_price0" placeholder="Unit Price" readonly></td>
                            <td><input type="text" class="form-control" name="total_amount[]" id="total_amount0" placeholder="Total Amount" readonly></td>
                            <td><input type="number" min="0" class="form-control unit_discount" value="0" name="unit_discount[]" id="unit_discount0" placeholder="Unit Discount"></td>
                            <td><input type="text" class="form-control" id="after_discount0" name="after_discount[]" placeholder="After Discount" readonly></td>
                            <td>
                                {{-- <div class="d-flex gap-3">
                                    <a href="javascript:void(0);" class="text-danger"><i
                                                class="mdi mdi-delete-forever font-size-22"></i></a>
                                </div> --}}
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <button id="main_add_new_product" type="button" class="btn btn-light waves-effect btn-label waves-light"><i
                                class="bx bx-plus-medical label-icon "></i> Add New Product
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-8"></div>
                    <div class="col-xl-4">


                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Net Price</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_net_price_f" value="" id="total_net_price_f" readonly>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Total Discount</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_net_discountprice_f" value="" id="total_net_discountprice_f" readonly>
                            </div>
                        </div>

                                                      <input class="form-control" type="hidden" name="total_vat_tax" value="0" id="total_vat_tax">
                         
                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Delivery Charge</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="total_d_charge" value="0" id="total_d_charge">
                            </div>
                        </div>
 <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Client Special Discount(%)</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="client_special_discount" value="0" id="client_special_discount">
                            </div>

                        </div>

                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Grand Total</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="total_grand_price_f" value="" id="total_grand_price_f" readonly>


                            </div>
                        </div>

                      
                        <div class="mb-2 row" id="show_order_by_price">
                        </div>

                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Total Pay</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="total_payble_price" value="0" id="total_payble_price">
                            </div>

                        </div>
                        <div class="mb-2 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">COD</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="cash_on_delivery_id" value="0" id="cash_on_delivery_id">
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body" style="background-color: #1f7556 !important; border-radius: 15px;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-10 mb-1 text-white">Total Due</h5>
                                        <p class=" text-white font-size-16  mb-1" id="total_final_due" >
                                            0 Taka
                                        </p>
                                        <input type="hidden" name="total_final_due" id="total_final_due1"/>
                                    </div>
                                    <div class="ms-3">
                                        <button type="submit" class="btn btn-success">
                                            <i class="mdi mdi-cart-arrow-right me-1"></i> Checkout </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection


@section('script')

<script type="text/javascript">
    $(document).on('change', 'input.unit_discount', function () {

        var main_id = $(this).attr('id');
        var get_id_from_main = main_id.slice(13);


        var unit_discount = $('#unit_discount'+get_id_from_main).val();
        var after_discount_price = $('#total_amount'+get_id_from_main).val();


        var total_net_discountprice_f = $('#total_net_discountprice_f').val();




        //alert(get_id_from_main);

        //var main_price_before_discount = main_product_price * p_quantity;
        var main_price_after_discount = after_discount_price - unit_discount;


      // $('#total_amount'+get_id_from_main).val(main_price_before_discount);
      $('#after_discount'+get_id_from_main).val('');
         $('#after_discount'+get_id_from_main).val(main_price_after_discount);

         //main discount price to total discount

         var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="unit_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}

$('#total_net_discountprice_f').val('');
         $('#total_net_discountprice_f').val(final_total_net_discountprice);

         //main discount price to total discount end


         //net price total from discount
         var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}


         //net price total from discount end


         //after discount price total from discount

         var final_total_net_grandprice = 0;
    var total_net_grandprice = $('input[name="after_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_grandprice.length; i++) {
    final_total_net_grandprice += total_net_grandprice[i] << 0;
}


var final_total_vat_per = $('#total_vat_tax').val();
var final_total_d_charge = $('#total_d_charge').val();

         //after price total from discount end

//percentage calculator

var final_grand_price_f_all = (parseFloat(final_total_net_price)*parseFloat(final_total_vat_per)) / 100;
var ff_pp_v = parseFloat(final_total_net_price) + parseFloat(final_grand_price_f_all);

//end percentage calculator

var final_cal_value_from_quantity = (parseFloat(final_total_net_grandprice)+parseFloat(ff_pp_v)+parseFloat(final_total_d_charge)) - parseFloat(final_total_net_price);

var client_special_amount = $('#client_special_discount').val();

if( client_special_amount == 0){
var get_final_amount_cus = final_cal_value_from_quantity;
}else{
var client_special_amount_f = (parseFloat(final_cal_value_from_quantity)*parseFloat(client_special_amount)) / 100;
var get_final_amount_cus = final_cal_value_from_quantity - client_special_amount_f;


}


$('#total_grand_price_f').val(get_final_amount_cus);
//$('#total_payble_price').val(get_final_amount_cus);

    //end grand total price












    });
</script>

<script type="text/javascript">
    $(document).on('change', 'input.p_quantity', function () {

        var main_id = $(this).attr('id');
        var get_id_from_main = main_id.slice(10);

        var p_quantity = $('#p_quantity'+get_id_from_main).val();
        var unit_discount = $('#unit_discount'+get_id_from_main).val();
        var main_product_price = $('#unit_price'+get_id_from_main).val();

       // alert(get_id_from_main);

        var main_price_before_discount = main_product_price * p_quantity;

        var main_price_after_discount = main_price_before_discount - unit_discount;


       $('#total_amount'+get_id_from_main).val(main_price_before_discount);
    $('#after_discount'+get_id_from_main).val(main_price_after_discount);

    //multiple net price from quantity
       var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}


$('#total_net_price_f').val(final_total_net_price);
    //end multiple net price from quantity

    //start total discount start

    var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="unit_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}


$('#total_net_discountprice_f').val(final_total_net_discountprice);


    //end total discount

    //start grand total price

    var final_total_net_grandprice = 0;
    var total_net_grandprice = $('input[name="after_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_grandprice.length; i++) {
    final_total_net_grandprice += total_net_grandprice[i] << 0;
}


var final_total_vat_per = $('#total_vat_tax').val();
var final_total_d_charge = $('#total_d_charge').val();


//percentage calculator

var final_grand_price_f_all = (parseFloat(final_total_net_price)*parseFloat(final_total_vat_per)) / 100;
var ff_pp_v = parseFloat(final_total_net_price) + parseFloat(final_grand_price_f_all);

//end percentage calculator

var final_cal_value_from_quantity = (parseFloat(final_total_net_grandprice)+parseFloat(ff_pp_v)+parseFloat(final_total_d_charge)) - parseFloat(final_total_net_price);

var client_special_amount = $('#client_special_discount').val();

if( client_special_amount == 0){
var get_final_amount_cus = final_cal_value_from_quantity;
}else{
var client_special_amount_f = (parseFloat(final_cal_value_from_quantity)*parseFloat(client_special_amount)) / 100;
var get_final_amount_cus = final_cal_value_from_quantity - client_special_amount_f;


}


$('#total_grand_price_f').val(get_final_amount_cus);
//$('#total_payble_price').val(get_final_amount_cus);

    //end grand total price




    });
</script>
<script type="text/javascript">
     $(document).on('change', 'select.main_product_color', function () {

        var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(18);
var main_product_id = $('#main_product_id'+get_id_from_main).val();
var main_product_color = $('#main_product_color'+get_id_from_main).val();
var main_product_size = $('#main_product_size'+get_id_from_main).val();


//price
$.ajax({
    url: "{{ route('invoice_for_product_price_from_color') }}",
    method: 'GET',
    data: {main_product_id:main_product_id,main_product_color:main_product_color,main_product_size:main_product_size},
    success: function(data) {
      $("#unit_price"+get_id_from_main).val('');
      $("#unit_price"+get_id_from_main).val(data);

      //change total amount
      var new_q = $("#p_quantity"+get_id_from_main).val();
       var main_new_am = parseFloat(data)*parseFloat(new_q);
      $("#total_amount"+get_id_from_main).val(parseFloat(main_new_am));



      //end change total amount


      //change total amount discount
      var unit_discount1 = $("#unit_discount"+get_id_from_main).val();
      var discount_result1 = parseFloat(main_new_am)-parseFloat(unit_discount1);
      $("#after_discount"+get_id_from_main).val(discount_result1);
      //end change total amount discount


      //total net price start


      var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#total_net_price_f').val('');
         $('#total_net_price_f').val(final_total_net_price);

      //end total net price


      //start total discount

      var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="unit_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}

$('#total_net_discountprice_f').val('');
         $('#total_net_discountprice_f').val(final_total_net_discountprice);

      //end total discount


      //start after discount price
      var final_total_net_grandprice = 0;
    var total_net_grandprice = $('input[name="after_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_grandprice.length; i++) {
    final_total_net_grandprice += total_net_grandprice[i] << 0;
}


var final_total_vat_per = $('#total_vat_tax').val();
var final_total_d_charge = $('#total_d_charge').val();


//percentage calculator

var final_grand_price_f_all = (parseFloat(final_total_net_price)*parseFloat(final_total_vat_per)) / 100;
var ff_pp_v = parseFloat(final_total_net_price) + parseFloat(final_grand_price_f_all);

//end percentage calculator

var final_cal_value_from_quantity = (parseFloat(final_total_net_grandprice)+parseFloat(ff_pp_v)+parseFloat(final_total_d_charge)) - parseFloat(final_total_net_price);

var client_special_amount = $('#client_special_discount').val();

if( client_special_amount == 0){
var get_final_amount_cus = final_cal_value_from_quantity;
}else{
var client_special_amount_f = (parseFloat(final_cal_value_from_quantity)*parseFloat(client_special_amount)) / 100;
var get_final_amount_cus = final_cal_value_from_quantity - client_special_amount_f;


}


$('#total_grand_price_f').val(get_final_amount_cus);
//$('#total_payble_price').val(get_final_amount_cus);

    //end grand total price

      //end total after discount price

      //per calculator start

      //per calculator end
    }
    });
    //end price

    //main price discount
    $.ajax({
    url: "{{ route('invoice_for_product_price_discount_from_color') }}",
    method: 'GET',
    data: {main_product_id:main_product_id,main_product_color:main_product_color,main_product_size:main_product_size},
    success: function(data) {
      $("#unit_discount"+get_id_from_main).val('');
      $("#unit_discount"+get_id_from_main).val(data);

       //total net price start


       var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#total_net_price_f').val('');
         $('#total_net_price_f').val(final_total_net_price);

      //end total net price


      //start total discount

      var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="unit_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}

$('#total_net_discountprice_f').val('');
         $('#total_net_discountprice_f').val(final_total_net_discountprice);

      //end total discount


      //start after discount price
      var final_total_net_grandprice = 0;
    var total_net_grandprice = $('input[name="after_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_grandprice.length; i++) {
    final_total_net_grandprice += total_net_grandprice[i] << 0;
}


var final_total_vat_per = $('#total_vat_tax').val();
var final_total_d_charge = $('#total_d_charge').val();


//percentage calculator

var final_grand_price_f_all = (parseFloat(final_total_net_price)*parseFloat(final_total_vat_per)) / 100;
var ff_pp_v = parseFloat(final_total_net_price) + parseFloat(final_grand_price_f_all);

//end percentage calculator

var final_cal_value_from_quantity = (parseFloat(final_total_net_grandprice)+parseFloat(ff_pp_v)+parseFloat(final_total_d_charge)) - parseFloat(final_total_net_price);

var client_special_amount = $('#client_special_discount').val();

if( client_special_amount == 0){
var get_final_amount_cus = final_cal_value_from_quantity;
}else{
var client_special_amount_f = (parseFloat(final_cal_value_from_quantity)*parseFloat(client_special_amount)) / 100;
var get_final_amount_cus = final_cal_value_from_quantity - client_special_amount_f;


}


$('#total_grand_price_f').val(get_final_amount_cus);
//$('#total_payble_price').val(get_final_amount_cus);

    //end grand total price

      //end total after discount price

      //per calculator start

      //per calculator end
    }
    });
    //end price discount main

    });
</script>
<script type="text/javascript">
     $(document).on('change', 'select.main_product_id', function () {

//main product id
var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(15);
var main_product_id = $('#main_product_id'+get_id_from_main).val();

//console.log(get_id_from_main);
//product size
$.ajax({
    url: "{{ route('invoice_for_product_size') }}",
    method: 'GET',
    data: {main_product_id:main_product_id},
    success: function(data) {
     // $("#unit_price"+get_id_from_main).val('');
     $("#main_product_size"+get_id_from_main).html('');
      $("#main_product_size"+get_id_from_main).html(data);
    }
    });
    //end product size

//price
$.ajax({
    url: "{{ route('invoice_for_product_price') }}",
    method: 'GET',
    data: {main_product_id:main_product_id},
    success: function(data) {
     // $("#unit_price"+get_id_from_main).val('');
      $("#unit_price"+get_id_from_main).val(data);

      //change total amount
      var new_q = $("#p_quantity"+get_id_from_main).val();
       var main_new_am = parseFloat(data)*parseFloat(new_q);
      $("#total_amount"+get_id_from_main).val(parseFloat(main_new_am));



      //end change total amount


      //change total amount discount
      var unit_discount1 = $("#unit_discount"+get_id_from_main).val();
      var discount_result1 = parseFloat(main_new_am)-parseFloat(unit_discount1);
      $("#after_discount"+get_id_from_main).val(discount_result1);
      //end change total amount discount


      //total net price start


      var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#total_net_price_f').val('');
         $('#total_net_price_f').val(final_total_net_price);

      //end total net price


      //start total discount

      var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="unit_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}

$('#total_net_discountprice_f').val('');
         $('#total_net_discountprice_f').val(final_total_net_discountprice);

      //end total discount


      //start after discount price
      var final_total_net_grandprice = 0;
    var total_net_grandprice = $('input[name="after_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_grandprice.length; i++) {
    final_total_net_grandprice += total_net_grandprice[i] << 0;
}


var final_total_vat_per = $('#total_vat_tax').val();
var final_total_d_charge = $('#total_d_charge').val();


//percentage calculator

var final_grand_price_f_all = (parseFloat(final_total_net_price)*parseFloat(final_total_vat_per)) / 100;
var ff_pp_v = parseFloat(final_total_net_price) + parseFloat(final_grand_price_f_all);

//end percentage calculator

var final_cal_value_from_quantity = (parseFloat(final_total_net_grandprice)+parseFloat(ff_pp_v)+parseFloat(final_total_d_charge)) - parseFloat(final_total_net_price);

var client_special_amount = $('#client_special_discount').val();

if( client_special_amount == 0){
var get_final_amount_cus = final_cal_value_from_quantity;
}else{
var client_special_amount_f = (parseFloat(final_cal_value_from_quantity)*parseFloat(client_special_amount)) / 100;
var get_final_amount_cus = final_cal_value_from_quantity - client_special_amount_f;


}


$('#total_grand_price_f').val(get_final_amount_cus);
//$('#total_payble_price').val(get_final_amount_cus);

    //end grand total price

      //end total after discount price

      //per calculator start

      //per calculator end
    }
    });
    //end price

    //main price discount
    $.ajax({
    url: "{{ route('invoice_for_product_price_discount') }}",
    method: 'GET',
    data: {main_product_id:main_product_id},
    success: function(data) {
     // $("#unit_price"+get_id_from_main).val('');
      $("#unit_discount"+get_id_from_main).val(data);

       //total net price start


       var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#total_net_price_f').val('');
         $('#total_net_price_f').val(final_total_net_price);

      //end total net price


      //start total discount

      var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="unit_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}

$('#total_net_discountprice_f').val('');
         $('#total_net_discountprice_f').val(final_total_net_discountprice);

      //end total discount


      //start after discount price
      var final_total_net_grandprice = 0;
    var total_net_grandprice = $('input[name="after_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_grandprice.length; i++) {
    final_total_net_grandprice += total_net_grandprice[i] << 0;
}


var final_total_vat_per = $('#total_vat_tax').val();
var final_total_d_charge = $('#total_d_charge').val();


//percentage calculator

var final_grand_price_f_all = (parseFloat(final_total_net_price)*parseFloat(final_total_vat_per)) / 100;
var ff_pp_v = parseFloat(final_total_net_price) + parseFloat(final_grand_price_f_all);

//end percentage calculator

var final_cal_value_from_quantity = (parseFloat(final_total_net_grandprice)+parseFloat(ff_pp_v)+parseFloat(final_total_d_charge)) - parseFloat(final_total_net_price);
var client_special_amount = $('#client_special_discount').val();

if( client_special_amount == 0){
var get_final_amount_cus = final_cal_value_from_quantity;
}else{
var client_special_amount_f = (parseFloat(final_cal_value_from_quantity)*parseFloat(client_special_amount)) / 100;
var get_final_amount_cus = final_cal_value_from_quantity - client_special_amount_f;


}


$('#total_grand_price_f').val(get_final_amount_cus);
//$('#total_payble_price').val(get_final_amount_cus);

    //end grand total price

      //end total after discount price

      //per calculator start

      //per calculator end
    }
    });
    //end price discount main

    //product color
    $.ajax({
    url: "{{ route('invoice_for_product_color') }}",
    method: 'GET',
    data: {main_product_id:main_product_id},
    success: function(data) {
     // $("#unit_price"+get_id_from_main).val('');
      $("#main_product_color"+get_id_from_main).html('');
      $("#main_product_color"+get_id_from_main).html(data);
    }
    });
    //end product color



});
</script>
<script type="text/javascript">
    //   $(document).on('click', 'select.main_product_id', function () {

    //     //main product id
    //     // var main_id = $(this).attr('id');
    //     // console.log(main_id);
    //     //end main product
    //   $('select[name*="main_product_id[]"] option').attr('disabled',false);
    //   $('select[name*="main_product_id[]"]').each(function(){
    //     var $this = $(this);
    //     $('select[name*="main_product_id[]"]').not($this).find('option').each(function(){
    //          if($(this).attr('value') == $this.val())
    //          $(this).attr('disabled',true);

    //     });
    //   });
    // });
</script>
<script type="text/javascript">
    var i = 0;
    $("#main_add_new_product").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width:200px"><select class="select form-control main_product_id select2" name="main_product_id[]" id="main_product_id'+i+'" data-placeholder="Choose ..."><option value="0">Please Select</option> @foreach($main_product_list_all as $main_product_list_all_print)<option value="{{ $main_product_list_all_print->id }}">{{ $main_product_list_all_print->product_name }}</option>@endforeach</select></td> <td><select class="select form-control main_product_size"  name="main_product_size[]" id="main_product_size'+i+'" data-placeholder="Choose ..."></select></td><td><select class="select form-control main_product_color"  name="main_product_color[]" id="main_product_color'+i+'" data-placeholder="Choose ..."></select></td><td><input type="number" class="form-control p_quantity" min="1" name="p_quantity[]" id="p_quantity'+i+'" placeholder="Quantity"></td><td><input type="text" class="form-control" name="unit_price[]" id="unit_price'+i+'" placeholder="Unit Price" readonly></td><td><input type="text" class="form-control" name="total_amount[]" id="total_amount'+i+'" placeholder="Total Amount" readonly></td><td><input type="number" min="0" class="form-control unit_discount" value="0" name="unit_discount[]" id="unit_discount'+i+'" placeholder="Unit Discount"></td><td><input type="text" class="form-control" id="after_discount'+i+'" name="after_discount[]" placeholder="After Discount" readonly></td><td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete-forever font-size-22"></i></button></td></tr>'
            );
            $('.select2').select2();
    });
    // $(document).on('click', '.remove-input-field', function () {
    //     $(this).parents('tr').remove();
    // });
</script>

<script type="text/javascript">

$(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();


        ////////****////////////////////

         //total net price start


       var final_total_net_price = 0;
    var total_net_price = $('input[name="total_amount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_price.length; i++) {
    final_total_net_price += total_net_price[i] << 0;
}

$('#total_net_price_f').val('');
         $('#total_net_price_f').val(final_total_net_price);

      //end total net price


      //start total discount

      var final_total_net_discountprice = 0;
    var total_net_discountprice = $('input[name="unit_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_discountprice.length; i++) {
    final_total_net_discountprice += total_net_discountprice[i] << 0;
}

$('#total_net_discountprice_f').val('');
         $('#total_net_discountprice_f').val(final_total_net_discountprice);

      //end total discount


      //start after discount price
      var final_total_net_grandprice = 0;
    var total_net_grandprice = $('input[name="after_discount[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();

for (var i = 0; i < total_net_grandprice.length; i++) {
    final_total_net_grandprice += total_net_grandprice[i] << 0;
}


var final_total_vat_per = $('#total_vat_tax').val();
var final_total_d_charge = $('#total_d_charge').val();


//percentage calculator

var final_grand_price_f_all = (parseFloat(final_total_net_price)*parseFloat(final_total_vat_per)) / 100;
var ff_pp_v = parseFloat(final_total_net_price) + parseFloat(final_grand_price_f_all);

//end percentage calculator

var final_cal_value_from_quantity = (parseFloat(final_total_net_grandprice)+parseFloat(ff_pp_v)+parseFloat(final_total_d_charge)) - parseFloat(final_total_net_price);

var client_special_amount = $('#client_special_discount').val();

if( client_special_amount == 0){
var get_final_amount_cus = final_cal_value_from_quantity;
}else{
var client_special_amount_f = (parseFloat(final_cal_value_from_quantity)*parseFloat(client_special_amount)) / 100;
var get_final_amount_cus = final_cal_value_from_quantity - client_special_amount_f;


}


$('#total_grand_price_f').val(get_final_amount_cus);
//$('#total_payble_price').val(get_final_amount_cus);

    //end grand total price

      //end total after discount price

      //per calculator start

      //per calculator end
    });
</script>



<script>
$(document).ready(function () {

    ///vat tax  start price

       ///end vat tax end price

    //delivary charge

    $("#total_d_charge").change(function(){

var total_net_price_f = $('#total_net_price_f').val();

var total_grand_price_f = $('#total_grand_price_f').val();

var total_net_discountprice_f = $('#total_net_discountprice_f').val();
 var total_d_charge = $(this).val();
var total_vat_tax = $('#total_vat_tax').val();

var final_grand_price_f_all = (parseFloat(total_net_price_f)*parseFloat(total_vat_tax)) / 100;


var ff_mm = (parseFloat(total_d_charge)+parseFloat(final_grand_price_f_all) + parseFloat(total_net_price_f))- parseFloat(total_net_discountprice_f);

$('#total_grand_price_f').val(ff_mm);
//$('#total_payble_price').val(ff_mm);


});

    //end delivary Charge


    //total payble start
    $("#total_payble_price").change(function(){

        var total_grand_price_f = $('#total_grand_price_f').val();

        var total_payble_price = $(this).val();

        var cash_on_delivery_id = $('#cash_on_delivery_id').val();

        var final_due_price = parseFloat(total_grand_price_f) - (parseFloat(total_payble_price)+parseFloat(cash_on_delivery_id));

        $('#total_final_due').text(final_due_price+' TAKA');
        $('#total_final_due1').val(final_due_price);

    });
    //total payble end


    //cod payble start
    $("#cash_on_delivery_id").change(function(){

var total_grand_price_f = $('#total_grand_price_f').val();

var total_payble_price = $("#total_payble_price").val();

var cash_on_delivery_id = $(this).val();

var final_due_price = parseFloat(total_grand_price_f) - (parseFloat(total_payble_price)+parseFloat(cash_on_delivery_id));

$('#total_final_due').text(final_due_price+' TAKA');

$('#total_final_due1').val(final_due_price);

});
//cod payble end



    $(".show_all_addresss").change(function(){

        var main_value = $(this).val();

        $.ajax({
    url: "{{ route('client_list_detail') }}",
    method: 'GET',
    data: {main_value:main_value},
    success: function(data) {
      $("#main_address_view_from_client").html('');
      $("#main_address_view_from_client").html(data.options);
    }
    });

    });

    $("#select_client_name_from_list").change(function(){

        var main_value = $(this).val();
           

        $.ajax({
    url: "{{ route('address_list_detail') }}",
    method: 'GET',
    data: {main_value:main_value},
    success: function(data) {
      $("#shipping_address_via_client").html('');
      $("#shipping_address_via_client").html(data.options);
    }
    });

///////////

    $.ajax({
    url: "{{ route('invoice_data_discount') }}",
    method: 'GET',
    data: {main_value:main_value},
    success: function(data) {
      $("#client_special_discount").val('');
      $("#client_special_discount").val(data);
    }
    });


});


$("#shipping_address_via_client").change(function(){

var main_value = $(this).val();

var main_value1 = $('#select_client_name_from_list').val();


$.ajax({
    url: "{{ route('saddress_list_detail') }}",
    method: 'GET',
    data: {main_value:main_value,main_value1:main_value1},
    success: function(data) {
      $("#address_detail_from_ship").html('');
      $("#address_detail_from_ship").html(data.options);
    }
    });


});

///product base  code multiple

$("[id^=main_product_id]").change(function(){

    var main_id = $(this).attr('id');
    var get_id_from_main = main_id.slice(15);

    //console.log(get_id_from_main);

});
/////

$("#order_by").change(function(){

var grand_total = $('#total_grand_price_f').val();
var order_by = $(this).val();

//console.log(get_id_from_main);


$.ajax({
    url: "{{ route('catch_order_by_price') }}",
    method: 'GET',
    data: {grand_total:grand_total,order_by:order_by},
    success: function(data) {
      $("#show_order_by_price").html('');
      $("#show_order_by_price").html(data);
    }
    });


});

});
</script>
@endsection
