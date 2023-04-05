<?php

$total_data_online =DB::table('main_products')
                     ->where('action_button','submit')
                     ->where('status','Active')->latest()->count();

$total_serial_number1_online= $total_data_online/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}



?>


<h4 class="card-title">Explanation</h4>
<p class="card-title-desc">The product which is buyer can see and stock > 0 will
    appear in online tab.</p>


<form>
    <div class="row">

        <div class="col-xl col-sm-6">
            <div class="form-group mt-3 mb-0">
                <input type="text" class="form-control" id="online_p_sku"
                       placeholder="Product SKU">
            </div>
        </div>

        <div class="col-xl col-sm-6">
            <div class="form-group mt-3 mb-0">
                <input type="text" class="form-control" id="online_p_name"
                       placeholder="Product Name">
            </div>
        </div>

        <div class="col-xl col-sm-6">
            <div class="form-group mt-3 mb-0">
                <select class="form-control" id="online_brand">
                    <option value="">Select Brand Name</option>
@foreach($brand_list_detail as $search_category_list)
                    <option value="{{ $search_category_list->name }}">{{ $search_category_list->name }}</option>
@endforeach
                </select>
            </div>
        </div>


        <div class="col-xl col-sm-6">
            <div class="form-group mt-3 mb-0">
                <select class="form-control" id="online_p_category">
                    <option value="">Select Parent Category</option>
@foreach($category_list as $search_category_list)
                    <option value="{{ $search_category_list->cat_name }}">{{ $search_category_list->cat_name }}</option>
@endforeach
                </select>
            </div>
        </div>


        <div class="col-xl col-sm-6 align-self-end">
            <div class="mt-3">
                <button type="button" class="btn btn-primary w-md" id="online_product_search_button">Search
                </button>
            </div>
        </div>
    </div>
</form>

<div class="row mt-4 mb-2">
    <div class="col-sm-6">
        <div class="d-flex flex-wrap gap-2">
            <p class="horizontal-center">Selected: <span id="online_numberOfChecked"> 0</span></p>
            <button  id="online_inactive_button" class="btn btn-outline-secondary waves-effect ml-4" disabled>
                Inactive
            </button>
            <button  id="online_active_button" class="btn btn-outline-secondary waves-effect ml-4" disabled>
                Active
            </button>
            <button  id="online_delete_button" class="btn btn-outline-secondary waves-effect" disabled>
                Delete
            </button>
        </div>
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

<div class="view" id="main_content_table_online">
    <div class="wrapper" >
        <table class="table table-striped">
            <thead class="custom_header_color">
            <tr>
                <th class="sticky-coll first-col-manage align-middle">
                    <div class="form-check font-size-16">
                        <input class="form-check-input" type="checkbox" id="online_master">
                        <label class="form-check-label" for="checkAll"></label>
                    </div>
                </th>
                <th  class=" second-col-manage">Product Name</th>
                <th class="variation-col">Product SKU</th>
                <th class="variation-col">Variation</th>
                <th class="price-col">Price</th>
                <th class="price-col">Stock</th>
                <th class="created-col">Created</th>
                <th class="sticky-coll-last forth-col-manage"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($online_product_list as $key=>$all_product_list)
            <tr>
                <td class="sticky-coll first-col-manage">
                    <div class="form-check font-size-16">
                        <input class="form-check-input online_sub_chk" value="{{$all_product_list->id}}"  data-id="{{$all_product_list->id}}" type="checkbox" id="orderidcheck01">
<label class="form-check-label" for="orderidcheck01"></label>
                    </div>
                </td>
                <td class=" second-col-manage">
                    <?php

                    $first_image_f = DB::table('feature_product_images')->where('product_name',$all_product_list->id)->value('filename');

                    ?>
                    <table>
                        <tr>
                            <td>
                                @if(empty($all_product_list->front_image))
                                            <img src="{{ asset('/') }}public/no_imagef.jpg" width="80px" alt="">
                                            @else
                                            <img src="{{ asset('/') }}{{ $all_product_list->front_image }}" width="80px" alt="">
                                            @endif
                            </td>
                            <td class="align-baseline">
                                {{ $all_product_list->product_name }}
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="variation-col">{{ $all_product_list->sku_product }}</td>
                <td class="variation-col">

                    <?php

                    $color_list_all =  DB::table('imageuploads')->where('product_id',$all_product_list->id)->select('color_id')->get();

                    $size_list_all =  DB::table('assaign_sizes')->where('product_name',$all_product_list->id)->select('size_name')->get();
                    ?>

                    Color: <code>
                      @foreach($color_list_all as $all_color_list)
                      {{ $all_color_list->color_id }},
                        @endforeach

                    </code> <br>
                    Size: <code>
                        @foreach($size_list_all as $all_color_list)
                        {{ $all_color_list->size_name }}
                          @endforeach
                    </code>


                </td>
                <td class="price-col"> {{ $all_product_list->selling_price }} BDT <a href="javascript:void(0);" data-productId ="{{ $all_product_list->id }}" id="productPriceUpdate{{ $all_product_list->id }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> </td>
                <td class="price-col">

                    <?php
                  $total_quantity = DB::table('product_colors')->where('product_name',$all_product_list->id)->sum('quantity');

                        ?>

                    {{ $total_quantity }}


                    <a href="javascript:void(0);" data-productId ="{{ $all_product_list->id }}" id="productQuantityUpdate{{ $all_product_list->id }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                </td>
                <td class="created-col">
                    Created at: <br>
                    {{ $all_product_list->created_at->format('d-m-Y') }}
                    <br>
                    Updated at: <br>
                    {{ $all_product_list->updated_at->format('d-m-Y') }}
                </td>
                <td class="sticky-coll-last forth-col-manage">
                    <div class="d-flex gap-3">
                        <a href="{{ route('admin.product.edit',$all_product_list->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                        @if (Auth::guard('admin')->user()->can('product_delete'))
                        <a href="javascript:void(0);"  onclick="deleteTag({{ $all_product_list->id}})" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>

                        <form id="delete-form-{{ $all_product_list->id }}" action="{{ route('admin.product.delete',$all_product_list->id) }}" method="POST" style="display: none;">

                                                          @csrf

                                                      </form>
                        @endif
                    </div>
                </td>

            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
     <!--pagination all page-->
@include('backend.product_list.onine_normal_pagination')
<!--end pagination all page -->
</div>
