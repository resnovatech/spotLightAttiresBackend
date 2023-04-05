@extends('backend.master.master')

@section('title')
Product List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Product Management</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Product List Page</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

                    <div class="row mt-2">
                        @include('flash_message')
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab">
                                                All
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#online" role="tab">
                                                Online
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#draft" role="tab">
                                                Draft
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#outStock" role="tab">
                                                Out of Stock
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#deleteItems" role="tab">
                                                Delete Items
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content p-3 text-muted">
                                        <div class="tab-pane active" id="all" role="tabpanel">

                                            <h4 class="card-title">Explanation</h4>
                                            <p class="card-title-desc">The product which is buyer can see and stock > 0 will
                                                appear in online tab.</p>


                                            <form>
                                                <div class="row">

                                                    <div class="col-xl col-sm-6">
                                                        <div class="form-group mt-3 mb-0">
                                                            <input type="text" class="form-control" id="all_p_sku"
                                                                   placeholder="Product SKU">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl col-sm-6">
                                                        <div class="form-group mt-3 mb-0">
                                                            <input type="text" class="form-control" id="all_p_name"
                                                                   placeholder="Product Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl col-sm-6">
                                                        <div class="form-group mt-3 mb-0">
                                                            <select class="form-control" id="all_brand_name">
                                                                <option value="">Select Brand Name</option>
@foreach($brand_list_detail as $search_category_list)
                                                                <option value="{{ $search_category_list->name }}">{{ $search_category_list->name }}</option>
@endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl col-sm-6">
                                                        <div class="form-group mt-3 mb-0">
                                                            <select class="form-control" id="all_p_category">
                                                                <option value="">Select Parent Category</option>
@foreach($category_list as $search_category_list)
                                                                <option value="{{ $search_category_list->cat_name }}">{{ $search_category_list->cat_name }}</option>
@endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl col-sm-6 align-self-end">
                                                        <div class="mt-3">
                                                            <button type="button" class="btn btn-primary w-md"  id="all_product_search_button">Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="row mt-4 mb-2">
                                                <div class="col-sm-6">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <p class="horizontal-center">Selected: <span id="numberOfChecked"> 0</span></p>
                                                        <button  id="inactive_button" class="btn btn-outline-secondary waves-effect ml-4" disabled>
                                                            Inactive
                                                        </button>
                                                        <button  id="active_button" class="btn btn-outline-secondary waves-effect ml-4" disabled>
                                                            Active
                                                        </button>
                                                        <button  id="delete_button" class="btn btn-outline-secondary waves-effect" disabled>
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

                                            <div class="view" id="main_content_table">
                                                <div class="wrapper" >
                                                    <table class="table table-striped">
                                                        <thead class="custom_header_color">
                                                        <tr>
                                                            <th class="sticky-coll first-col-manage align-middle">
                                                                <div class="form-check font-size-16">
                                                                    <input class="form-check-input" type="checkbox" id="master">
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
                                                            @foreach($product_list as $key=>$all_product_list)
                                                        <tr>
                                                            <td class="sticky-coll first-col-manage">
                                                                <div class="form-check font-size-16">
                                                                    <input class="form-check-input sub_chk" value="{{$all_product_list->id}}"  data-id="{{$all_product_list->id}}" type="checkbox" id="orderidcheck01">
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
                                          @include('backend.product_list.normal_pagination')
                                          <!--end pagination all page -->
                                            </div>



                                        </div>
                                        <div class="tab-pane" id="online" role="tabpanel">
                                           @include('backend.product_list.online')
                                        </div>
                                        <div class="tab-pane" id="draft" role="tabpanel">
                                           @include('backend.product_list.draft')
                                        </div>
                                        <div class="tab-pane" id="outStock" role="tabpanel">
                                           @include('backend.product_list.outofstock')
                                        </div>
                                        <div class="tab-pane" id="deleteItems" role="tabpanel">
                                            @include('backend.product_list.deletelist')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

 @include('backend.product_list.all_modal')
 @include('backend.product_list.all_modal_stock_and_price')
 <!-- Modal HTML  permanent delete product-->
                <div id="myModal_delete" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Are You Sure ?</h1>
                                {{-- <button type="button" class="btn btn-danger close" >&times;</button> --}}
                            </div>
                            <div class="modal-body">
                {{-- <button>ddddqw</button> --}}
                                    <button class="btn btn-success w-md waves-effect waves-light"  id="final_delete_delete">Yes</button>
                                    <button class="btn btn-danger w-md waves-effect waves-light closee_delete" id="">Cancel</button>


                            </div>

                        </div>
                    </div>
                </div>
                <!--end modal for delete draft product -->

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {

        $(".closee").click(function(){
    $("#myModal").modal('hide');
    });

    $(".closee_online").click(function(){
    $("#myModal_online").modal('hide');
    });


    $(".closee_draft").click(function(){
    $("#myModal_draft").modal('hide');
    });

    $(".closee_delete").click(function(){
    $("#myModal_delete").modal('hide');
    });

    $(".closee_product_price_update_modal").click(function(){
    $("#product_price_update_modal").modal('hide');
    });

    $(".closee_product_quantity_update_modal").click(function(){
    $("#product_quantity_update_modal").modal('hide');
    });





    });
    </script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_list_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/online_product_list_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/draft_product_list_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/outofstock_product_list_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_product_list_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_price_and_stock_update.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_search.js"></script>
<script>
    $(document).ready(function(){
      
      //new_delete
      
      $("#final_delete_delete").click(function(){

        var get_final_value_delete= $('.delete_sub_chk:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();


        $.ajax({
        url: "{{route('new_code_to_delete_all_data')}}",
        method: 'GET',
        data: {get_final_value_delete:get_final_value_delete},
        success: function(data) {
            $("#myModal_delete").modal('hide');
          $("#main_content_table_delete").html('');
          $("#delete_numberOfChecked").text('');
          $("#main_content_table_delete").html(data.options);
        }
        });

        });
      
      //new_delete_all
        $("[id^=page_link]").click(function(){


            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(9);
            //alert(id_for_pass);

            //var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });

        });

        //next page button
        $("#npage_link").click(function(){

            var id_for_pass = 2;

            $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });

        });

        //end next button

        //table search button

        $('#search_bar').on('keyup', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var search = $(this).val();

            $.ajax({
                url: "{{ route('main_search_button_product') }}",
                type: "GET",
                data: {
                    'search': search
                },
                success: function (data) {

                    $("#main_content_table").html('');
                    $('#main_content_table').html(data.options);

                }
            });


        });
        //end table search button

        //go to page start

        $("#go_to_page_button").click(function(){

            var id_for_pass = $('#go_to_page_value').val();



            $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });
        });
        //end go to page
    });
    </script>
<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "Your data will  be move to trash folder!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }




</script>

<script>
    $(document).ready(function(){
        $("[id^=page_link]").click(function(){


            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(9);
            //alert(id_for_pass);

            //var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });

        });

        //next page button
        $("#npage_link").click(function(){

            var id_for_pass = 2;

            $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });

        });

        //end next button

        //table search button

        $('#search_bar').on('keyup', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var search = $(this).val();

            $.ajax({
                url: "{{ route('main_search_button_product') }}",
                type: "GET",
                data: {
                    'search': search
                },
                success: function (data) {

                    $("#main_content_table").html('');
                    $('#main_content_table').html(data.options);

                }
            });


        });
        //end table search button

        //go to page start

        $("#go_to_page_button").click(function(){

            var id_for_pass = $('#go_to_page_value').val();



            $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });
        });
        //end go to page
    });
    </script>


<script type="text/javascript">
    function pdeleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "Your data will  be deleted permanently !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }




</script>

@endsection







