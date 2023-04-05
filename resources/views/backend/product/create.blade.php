@extends('backend.master.master')

@section('title')
Add Product | {{ $ins_name }}
@endsection


@section('css')
<style>
    .select2-selection__choice__remove{
        display: none !important;
    }
    input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  /* display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer; */
}
.remove:hover {
  background: white;
  color: black;
}

    </style>

@endsection

@section('body')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Add New Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Product Page</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!--form section start-->
<form id="main_form" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
    @csrf
<div class="row">
    @include('flash_message')
    <div class="col-9">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header bg-light border-bottom">Basic Information</h5>

                    <div class="card-body">

                        <div class="mb-3">
                            <p class="card-title-desc">
                                Product Images <br>
                                The picture will be displayed on the cover of the product details page.
                                Sizes are between <code>330x330 and 2000x2000px</code>. Pornographic
                                images are
                                prohibited.
                            </p>
                            <div class="image-zone">
<!--image upload code-->
<div class="image-list">
    <i class="mdi mdi-cloud-download" style="font-size: 26px;"></i>
</div>
<div class="row">
    <div class="col-md-6">



     <div class="field" align="left">
        <a>Upload your images</a>
        <input type="file" id="files" name="files_main[]" multiple />

        {{-- <div id="yourBtn" onclick="getFile()">click to upload a file</div>

      <div style='height: 0px;width: 0px; overflow:hidden;'>
        <input type="file" id="files" name="files_main[]" multiple onchange="sub(this)" />
    </div> --}}
      </div>




</div>
    <div class="col-md-6">
        <a class="" id="btn" >Upload From Media File</a>

        <div id="main_content_table">

        </div>
    </div>


  </div>
<!--end image upload code-->
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Front Image
                                <code>*</code> </label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" value="" id="" name="front_image"
                                       placeholder="Ex: Naruto T-shirt (Word Limits: 0/250)" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Back Image
                                <code>*</code> </label>
                            <div class="col-md-9">
                                <input class="form-control" type="file" value="" id="" name="back_image"
                                       placeholder="Ex: Naruto T-shirt (Word Limits: 0/250)" required>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Product Name
                                <code>*</code> </label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" value="" id="" name="product_name"
                                       placeholder="Ex: Naruto T-shirt (Word Limits: 0/250)" required>
                            </div>
                        </div>

                        <!--<div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Bangla
                                product Name </label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="bangla_product_name" value="" id=""
                                       placeholder="Ex: Naruto T-shirt (Word Limits: 0/250)" required>
                            </div>
                        </div>-->

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Category
                                <code>*</code></label>
                            <div class="col-md-9">
                                <div class="custom_select_dropdown">
                                    <!--<input class="form-control" type="text" name="cat_name" id="final_category_list" required>-->
                                    <select class="form-control" name="cat_name[]"  id="cat_name_to_sub_cat_new">
                                        <option>--Please Select--</option>
                                        @foreach($category_list as $key=>$all_category_list)
                                        <option value="{{ $all_category_list->cat_name }}">{{ $all_category_list->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>

                          <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Sub Category
                               </label>
                            <div class="col-md-9">
                                <div class="custom_select_dropdown">
                                    <!--<input class="form-control" type="text" name="cat_name" id="final_category_list" required>-->
                                    <select class="form-control" name="cat_name[]"  id="sub_cat_to_first_child_new">

                                    </select>
                                </div>


                            </div>
                        </div>


                                                  <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">First Child
                               </label>
                            <div class="col-md-9">
                                <div class="custom_select_dropdown">
                                    <!--<input class="form-control" type="text" name="cat_name" id="final_category_list" required>-->
                                    <select class="form-control" name="cat_name[]"  id="first_child_to_second_new">

                                    </select>
                                </div>


                            </div>
                        </div>

                           <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Second Child
                                </label>
                            <div class="col-md-9">
                                <div class="custom_select_dropdown">
                                    <!--<input class="form-control" type="text" name="cat_name" id="final_category_list" required>-->
                                    <select class="form-control" name="cat_name[]"  id="second_child_to_third_new">

                                    </select>
                                </div>


                            </div>
                        </div>



                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">
                                Video URL </label>
                            <div class="col-md-9">
                                <input class="form-control" name="video_link" type="text" value="" id=""
                                       placeholder="If there is any display video in youtube or other social media">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">
                                Product Sku </label>
                            <div class="col-md-9">
                                <input class="form-control" name="sku_product" type="text" value="<?php $r_number = mt_rand(1000000000000000, 9999999999999999); echo $r_number; ?>" id=""
                                       placeholder="If there is any display video in youtube or other social media">
                                       {{-- <img src="data:image/png;base64,
                                       {{ DNS1D::getBarcodePNG(<?php echo $r_number ?>, 'I25')}}"
                                       alt="barcode" id="barcode_image"/> --}}
                            </div>
                        </div>


                        <!--product attribute-->

                        <h4 class="card-title mt-4">Product Attribute</h4>
                        <p class="card-title-desc">Boost your item's searchability by filling-up the Key
                            Product Information marked with KEY. The more you fill-up, the easier for
                            buyers to find your product.</p>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <div class="mb-3">
                                    <label for="" class="form-label">Brand</label>
                                    <select class="form-select" name="brand" required>
                                        <option>Select</option>
                                        @foreach($brand_list_detail as $all_unit)
                                        <option value="{{ $all_unit->slug }}">{{ $all_unit->name }}</option>
                                       @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Material</label>
                                    <select class="select2 form-control select2-multiple"
                                            multiple="multiple" data-placeholder="Choose ..." name="material">
                                        <option value="Cotton">Cotton</option>
                                        <option value="Fleece Cotton">Fleece Cotton</option>
                                        <option value="Fleece Polyester">Fleece Polyester</option>
                                        <option value="Polyester">Polyester</option>
                                        <option value="Mesh">Mesh</option>
                                        <option value="Bonded">Bonded</option>
                                         <option value="Metal">Metal</option>
                                    </select>
                                </div>



                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <div class="mb-3">
                                    <label for="" class="form-label">Unit</label>

                                    <select class="form-select" name="unit">
                                        <option>Select</option>
                                        @foreach($unit_list_detail as $all_unit)
                                        <option value="{{ $all_unit->slug }}">{{ $all_unit->name }}</option>
                                       @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"> Alert Quantity Unit</label>
                                    <input type="number" name="alert_quantity" class="form-control" id=""
                                           placeholder="Alert Quantity Unit">
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header bg-light border-bottom">Product Details & Basic Pricing</h5>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Buying
                                        Price </label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="buying_price" required type="number" value="0" id=""
                                               placeholder="Buying price">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input"  class="col-md-4 col-form-label">Wholesales
                                        Price </label>
                                    <div class="col-md-8">
                                        <input class="form-control" name="wholesale_price" required type="number" value="0" id=""
                                               placeholder="Wholesales price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Selling
                                        Price </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" required name="selling_price" value="0" id="selling_price"
                                               placeholder="Selling price">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Discount </label>
                                    <div class="col-md-8">
                                        <input class="form-control" required type="number" name="discount_main" value="0" id="discount"
                                               placeholder="Discount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Product
                                        Details </label>
                                    <div class="col-md-10">
                                        <textarea id="summernote" name="product_detail"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <h5 class="card-header bg-light border-bottom">Product Attributes & Custome
                        Price</h5>

                    <div class="card-body">

                        <p class="card-title-desc">
                            Tip: Add variants when the product have different versions, such as color
                            and size.
                        </p>

                        <div class="row">
                            <div class="col-md-12">

                                <div id="multiple_data_code">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Color </label>
                                    <div class="col-md-7">
                                        <select class="select2 form-select" name="maincolor[]" data-mainid= '0' id="main_color_select0">
                                            <option>Select Color</option>

                                            @foreach($attribute_list_color as $all_attribute_list_color)
                                            <option value="{{ $all_attribute_list_color->name_list }}">{{ $all_attribute_list_color->name_list }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                </div>
<!--multiple data code-->
                                <div class="mb-3 row" id="show_result_of_color_select">

                                </div>
                                </div>
<!--end multiple data code -->

                                <div class="mb-3 row">
                                    <label for="example-text-input"
                                           class="col-md-2 col-form-label">Size </label>

                                    <div class="col-md-7">
                                        <div class="mb-3">

                                            <select class="select2 form-control select2-multiple size_list" id="size_list"
                                                  name="size_list[]"  multiple="multiple" data-placeholder="Select Size">
                                                  @foreach($attribute_list_size as $all_attribute_list_color)
                                                  <option value="{{ $all_attribute_list_color->name_list }}">{{ $all_attribute_list_color->name_list }}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                 <div class="mb-3 row">
                                    <label for="example-text-input"
                                           class="col-md-2 col-form-label">Size Chart</label>

                                    <div class="col-md-7">
                                        <div class="mb-3">

                                            <select class="select2 form-control  size_list_chart" id="size_list_chart"
                                                  name="size_list_chart"   data-placeholder="Select Size Chart">
                                                <option>Select Size Chart</option>
                                                  @foreach($size_list_all as $all_attribute_list_color)
                                                  <option value="{{ $all_attribute_list_color->category_name }}">{{ $all_attribute_list_color->category_name }}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    {{-- <label for="example-text-input" class="col-md-2 col-form-label">Size
                                        Chart</label> --}}

                                    <div class="col-md-12" id="tttt">
                                        {{-- <button class="btn btn-success btn-sm mt-2" id="size_chart_id">+ Add new Size
                                        </button> --}}
                                    </div>
{{--
                                    <div class="col-md-3" id="final_result_size_list" >


                                    </div>

                                    <div class="col-md-3" id="final_result_length_list" >


                                    </div>

                                    <div class="col-md-3" id="final_result_shoulder_list" >


                                    </div>

                                    <div class="col-md-3" id="final_result_chest_list" >


                                    </div> --}}


                                </div>

                                <div class="mt-5 row">


                                    <div class="col-md-12 mt-4" id="test_id_size">

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-3">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Content Score Product</h4>
                <p class="card-title-desc">Required field must be fill up. </p>

                <div class="mt-3">
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="final_result_html" role="progressbar" style="width: 25%"
                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0</div>
                    </div>
                </div>

                <h4 class="card-title mt-3">Required field</h4>
                <hr class="mt-1">
                <ol>
                    <li>Product Name</li>
                    <li>Product Category</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tips</h4>
                <p class="card-title-desc">
                    Keep your title concise but clear. Provide necessary details such as brand, model,
                    color. Do not add repetitive words. Please note that product names must be in Title
                    Case and should not contain any special characters (# ! ?) except if it's a part of
                    a trade name.change
                    Click here to learn more about setting the right product titles.
                </p>
            </div>
        </div>
         <div class="card">
            <div class="card-body">
                <h4 class="card-title">Animation</h4>
                <label for="" class="form-label">Category</label>
                @foreach($animation_category_list as $key=>$all_unit)
                <div class="form-check mb-3">



                    <input class="form-check-input" value="{{ $all_unit->slug }}" name="animation_cat[]" type="checkbox" id="animation_cat{{ $key+1 }}">
                    <label class="form-check-label" for="animation_cat{{ $key+1 }}">
                        {{ $all_unit->name }}
                    </label>

                </div>
                @endforeach

                <div id="animation_sub_cat">

                </div>



            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <label for="" class="form-label">Category</label>
                
                 <div class="form-check mb-3">
                <input class="form-check-input" value="new_product" name="normal_cat[]" type="checkbox" id="normal_cat3">
                <label class="form-check-label" for="normal_cat3">
                    New Product
                </label>
                </div>
                
                
                <div class="form-check mb-3">
                <input class="form-check-input" value="trending" name="normal_cat[]" type="checkbox" id="normal_cat1">
                <label class="form-check-label" for="normal_cat1">
                    Trending Product
                </label>
                </div>
                <!--<div class="form-check mb-3">-->
                <!--<input class="form-check-input" value="best_product" name="normal_cat[]" type="checkbox" id="normal_cat2">-->
                <!--<label class="form-check-label" for="normal_cat2">-->
                <!--    Best Product-->
                <!--</label>-->
                <!--</div>-->
               
              
              <div class="form-check mb-3">
                <input class="form-check-input" value="discount_product" name="normal_cat[]" type="checkbox" id="normal_cat4">
                <label class="form-check-label" for="normal_cat3">
                    Discount Product
                </label>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">

<button type="submit" name="action_button" value="draft" class="btn btn-success">Draft</button>
<button type="submit" name="action_button" value="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

<!-- end row -->
</form>
 <!--  Large modal example -->
 <div class="modal fade" tabindex="-1" id="size_chart_modal">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Add New Size Chart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-editable table-nowrap align-middle table-edits">
                <thead>
                <tr>
                    <th>Size</th>
                    <th>Length</th>
                    <th>Shoulder</th>
                    <th>Chest</th>
                </tr>
                </thead>
                <tbody id="size_list_table">

                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-sm" id="size_list_result_button">Submit</button>
                </div>
            </div>

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Center</h5>
                <button type="button" class="btn btn-danger closee" >&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    @foreach($image_list as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" name="database_image[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                    @foreach($image_list_f as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" name="database_image[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary w-md waves-effect waves-light"  id="database_image_upload_result">submit</button>
                </div>

            </div>

        </div>
    </div>
</div>
<!--color attribute list -->
<div id="pmyModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Center</h5>
                <button type="button" class="btn btn-danger pcloseep" >&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    @foreach($image_list as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" name="pdatabase_image[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                    @foreach($image_list_f as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" name="pdatabase_image[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary w-md waves-effect waves-light"   id="pdatabase_image_upload_result">submit</button>
                </div>

            </div>

        </div>
    </div>
</div>
<!--end color attribute list -->

@endsection


@section('script')
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_page_color_section.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_page.js"></script>
<script>
    $(document).ready(function(){

        //new_cat_n


        $("#cat_name_to_sub_cat_new").change(function(){

            var cat_val = $(this).val();

            //alert(cat_val);

            $.ajax({
url: "{{ route('get_sub_cat_new') }}",
method: 'GET',
data: {cat_val:cat_val},
success: function(data) {
  $("#sub_cat_to_first_child_new").html('');
  $("#sub_cat_to_first_child_new").html(data);
}
});
        });


        ///
          $("#sub_cat_to_first_child_new").change(function(){

              var cat_val = $(this).val();

           // alert(cat_val);

                $.ajax({
url: "{{ route('child_get_new') }}",
method: 'GET',
data: {cat_val:cat_val},
success: function(data) {
  $("#first_child_to_second_new").html('');
  $("#first_child_to_second_new").html(data);
}
});

          });


          ////

          $("#first_child_to_second_new").change(function(){

              var cat_val = $(this).val();

           // alert(cat_val);

                $.ajax({
url: "{{ route('second_child_get_new') }}",
method: 'GET',
data: {cat_val:cat_val},
success: function(data) {
  $("#second_child_to_third_new").html('');
  $("#second_child_to_third_new").html(data);
}
});

          });


        //end_new_cat_n

        ///animation section  start


        $("[id^=animation_cat]").change(function(){





            var get_all_slug = $('input[id^="animation_cat"]:checked').map(function (idx, ele) {
   return $(ele).val();
}).get();

// alert(get_all_slug);

// var token = $("input[name='_token']").val();
$.ajax({
url: "{{ route('animation_get_subcategory_category') }}",
method: 'GET',
data: {get_all_slug:get_all_slug},
success: function(data) {
  $("#animation_sub_cat").html('');
  $("#animation_sub_cat").html(data.options);
}
});

});




        //animation section end


        //percentage increase dcrease

        $('#main_form').on('keyup change paste', 'input, select', function(){

            var numValid = 0;
$("#main_form input[required], #main_form select[required]").each(function() {
    if (this.validity.valid) {
        numValid++;
    }
});

var total_length = jQuery("#main_form input[required], #main_form select[required]").length;


var final_result_progress = (numValid*100)/total_length;

$('#final_result_html').attr("value",final_result_progress);
$('#final_result_html').css('width', final_result_progress+'%');
$('#final_result_html').text(parseInt(final_result_progress)+'%');
//



        });
        //end percentage increase dcrease

        //size list chart

        $("#size_list_chart").change(function(){

            var category_name = $(this).val();

            //alert(category_name);

            $.ajax({
url: "{{ route('get_size_list_category') }}",
method: 'GET',
data: {category_name:category_name},
success: function(data) {
  $("#tttt").html('');
  $("#tttt").html(data);
}
});

        });

        //size list chart end


        ///new code for size start
        $("#size_list").change(function(){
//////////
        //     var size_list = $("#size_list").map(function (idx, ele) {
        //     return $(ele).val();
        //      }).get();


        //   var last_value_of_array = size_list.slice(-1)[0];

        //   var i = 0;
        //   ++i;
        // $("#tttt").append(''
        //     );


});

        $(document).on('click', '.remove-input-field', function () {

            var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(7);


                $(this).parents('tr').remove();




    });

    //from size list to table

     $(".size_list").change(function(){


        var size_list1 = $(this).map(function (idx, ele) {
            return $(ele).val();
             }).get();

             var slelect_multicolor = $('select[name="maincolor[]"]').map(function (idx, ele) {
   return $(ele).val()
}).get();

slelect_multicolor = jQuery.grep(slelect_multicolor, function(value) {
  return value != 'Select Color';
});


var color_length = slelect_multicolor.length;
var main_size_length1 = size_list1.length;

var final_length_value = color_length*main_size_length1;

var selling_price = $('#selling_price').val();
var discount = $('#discount').val();

$.ajax({
            url: "{{ route('multiple_size_post_via_ajax') }}",
            method: 'GET',
            data: {discount:discount,selling_price:selling_price,size_list1:size_list1,slelect_multicolor:slelect_multicolor,color_length:color_length,main_size_length1:main_size_length1,final_length_value:final_length_value},
            success: function(data) {

              $("#test_id_size").html('');
              $("#test_id_size").html(data);
            }
        });
    });

    //end from size list to table




        /// end new code for size end

        $("#btn").click(function(){
            $("#myModal").modal('show');
        });

        $(".closee").click(function(){
            $("#myModal").modal('hide');
        });



$(".pcloseep").click(function(){
    $("#pmyModal").modal('hide');
});


        //database image button

        $("#database_image_upload_result").click(function(){
    var database_image_upload = $('input[name^="database_image[]"]:checked').map(function (idx, ele) {
   return $(ele).val();
}).get();

$.ajax({
            url: "{{ route('database_image_store') }}",
            method: 'GET',
            data: {database_image_upload:database_image_upload},
            success: function(data) {
                $("#myModal").modal('hide');
              $("#main_content_table").html('');
              $("#main_content_table").html(data);
            }
        });

        });

        //color attribute image
        $("#pdatabase_image_upload_result").click(function(){

            var pdatabase_image_upload = $('input[name^="pdatabase_image[]"]:checked').map(function (idx, ele) {
   return $(ele).val();
}).get();


$.ajax({
            url: "{{ route('pdatabase_image_store') }}",
            method: 'GET',
            data: {pdatabase_image_upload:pdatabase_image_upload},
            success: function(data) {
                $("#pmyModal").modal('hide');
              $("#show_image0").html('');
              $("#show_image0").html(data);
            }
        });

        });
        //end color attribute image
    });


</script>
<script type="text/javascript">
    $(document).ready(function() {
      if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove btn btn-danger btn-sm note-btn-block\">Delete</span>" +
                "</span>").insertAfter("#files");
              $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });

              // Old code here
              /*$("<img></img>", {
                class: "imageThumb",
                src: e.target.result,
                title: file.name + " | Click to remove"
              }).insertAfter("#files").click(function(){$(this).remove();});*/

            });
            fileReader.readAsDataURL(f);
          }
          console.log(files);
        });
      } else {
        alert("Your browser doesn't support to File API")
      }
    });
    </script>
<script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 180,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>


<script type="text/javascript">
    $(".custom_select_dropdown").click(function (e) {
        $(".custom_select_menu").show();
        e.stopPropagation();
    });

    $(".custom_select_menu").click(function (e) {
        e.stopPropagation();
    });

    $(document).click(function () {
        $(".custom_select_menu").hide();
    });
</script>

<script>
    jQuery("#carousel").owlCarousel({
        autoplay: false,
        lazyLoad: true,
        dots: false,
        loop: false,
        responsiveClass: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },

            600: {
                items: 2
            },

            1200: {
                items: 3
            },

            1600: {
                items: 4
            }
        }
    });
</script>
@endsection
