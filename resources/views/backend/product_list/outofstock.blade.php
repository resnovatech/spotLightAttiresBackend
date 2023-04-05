<?php

$total_data_outOfStock =DB::table('product_quantities')->where('quantity',0)->latest()->count();

$total_serial_number1_outOfStock= $total_data_outOfStock/10;

if (is_float($total_serial_number1_outOfStock)){
    $total_serial_number_outOfStock = ceil($total_serial_number1_outOfStock);

}else{
    $total_serial_number_outOfStock = $total_serial_number1_outOfStock;
}



?>


<h4 class="card-title">Explanation</h4>
<p class="card-title-desc">The product which is buyer can see and stock > 0 will
    appear in online tab.</p>




<div class="row mt-4 mb-2">
    <div class="col-sm-6">

    </div>
    <div class="col-sm-6">
        <div class="text-sm-end">
            @if (Auth::guard('admin')->user()->can('product_add'))
            <a href="{{ route('admin.product_list_add') }}"
                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">
                <i class="mdi mdi-plus me-1"></i> Add New Product
        </a>
            @endif
        </div>
    </div><!-- end col-->
</div>

<div class="view" id="main_content_table_outOfStock">
    <div class="wrapper" >
        <table class="table table-striped">
            <thead class="custom_header_color">
            <tr>

                <th  class=" second-col-manage">Product Name</th>
                <th class="variation-col">Product SKU</th>

                <th class="price-col">Price</th>
                <th class="price-col">Stock</th>


            </tr>
            </thead>
            <tbody>
                @foreach($outOfStock_product_list as $key=>$all_product_list)
            <tr>

                <td class=" second-col-manage">
                    <?php
$mm_id = $all_product_list->product_name;
                    $product_id_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('id');
                    $product_name_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('product_name');
                    $product_sku_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('sku_product');
                    $product_price_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('selling_price');

                    $first_image_f = DB::table('feature_product_images')->where('product_name',$product_id_from_table)->value('filename');

                    ?>
                    <table>
                        <tr>
                            <td>
                                @if(empty($first_image_f))
                                <img src="{{ asset('/') }}public/no_imagef.jpg" width="80px" alt="">
                                @else
                                <img src="{{ asset('/') }}{{ $first_image_f }}" width="80px" alt="">
                                @endif
                            </td>
                            <td class="align-baseline">
                                {{ $product_name_from_table }}
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="variation-col">{{ $product_sku_from_table }}</td>

                <td class="price-col"> {{ $product_price_from_table}} BDT  </td>
                <td class="price-col">



                    {{ $all_product_list->quantity }}

                </td>




            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
     <!--pagination all page-->
@include('backend.product_list.outofstock_normal_pagination')
<!--end pagination all page -->
</div>
