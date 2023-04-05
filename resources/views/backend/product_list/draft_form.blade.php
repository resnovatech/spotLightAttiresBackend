@extends('backend.master.master')

@section('title')
Edit Product | {{ $ins_name }}
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
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
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
            <h4 class="mb-sm-0 font-size-18">Edit Product</h4>

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
<form id="main_form" method="post" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $main_product_list->id }}" />
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-end flex-row">
                                            @foreach($assaign_feature_image_list as $key=>$assaign_feature_image_list_all)

                                            <input type="hidden" value="{{ $assaign_feature_image_list_all->filename }}" name="previous_m_imagem[]"/>
                                            <div class="p-2" id="main_image_div{{ $key+1 }}">
                                                <div class="img_upload_box">
                                                    <img src="{{ asset('/') }}{{ $assaign_feature_image_list_all->filename }}"
                                                         class="img-fluid" alt="">
                                                </div>
                                                <button type="button" data-mciid="{{ $key+1 }}" id="main_image_div_delete_button{{ $key+1 }}"
                                                        class="btn btn-danger btn-sm note-btn-block">
                                                    Delete
                                                </button>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
<!--image upload code-->
<div class="image-list">
    <i class="mdi mdi-cloud-download" style="font-size: 26px;"></i>
</div>
<div class="row">
    <div class="col-md-6">



    <div class="field" align="left">
        <a>Upload your images</a>
        <input type="file" id="files" name="files_main[]" multiple />
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
                            <label for="example-text-input" class="col-md-3 col-form-label">Product Name
                                <code>*</code> </label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" value="{{ $main_product_list->product_name }}" id="" name="product_name"
                                       placeholder="Ex: Naruto T-shirt (Word Limits: 0/250)" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Bangla
                                product Name </label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="bangla_product_name" value="{{ $main_product_list->bangla_product_name }}" id=""
                                       placeholder="Ex: Naruto T-shirt (Word Limits: 0/250)" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Category
                                <code>*</code></label>
                            <div class="col-md-9">
                                <div class="custom_select_dropdown">
                                    <input class="form-control" type="text" value="{{ $convert_in_string_cat_list }}" name="cat_name" id="final_category_list" required>
                                </div>
                                <div class="custom_select_menu">
                                    <div class="container">

                                        <div class="owl-slider">
                                            <div id="carousel" class="owl-carousel">
                                                <div class="item">
                                                    <div class="category_box">
                                                        <div class="search-box2 me-2">
                                                            <div class="position-relative">
                                                                <input type="text" id="add_product_category_search"
                                                                       class="form-control border-1"
                                                                       placeholder="Key Word Search...">
                                                                <i class="bx bx-search-alt search-icon"></i>
                                                            </div>
                                                        </div>
                                                        <div class="overflow-auto">
                                                            <ul class="category_list  overflow-auto"  id="add_product_category_search_list">
                                                               @foreach($category_list as $key=>$all_category_list)
                                                                <li  data-catname="{{ $all_category_list->cat_name }}" id="category_name{{ $key+1 }}" class="dynamic_cat">{{ $all_category_list->cat_name }}<span> > </span>
                                                                </li>

@endforeach
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                          <div id="sub_cat_div_list">


                                            </div>
                                            <div id="sub_cat_div_list1">


                                            </div>

                                            <div id="sub_cat_div_list2">


                                            </div>
                                            <div id="sub_cat_div_list3">


                                            </div>

                                            <div id="sub_cat_div_list4">


                                            </div>

                                            <div id="sub_cat_div_list5">


                                            </div>

                                            <div id="sub_cat_div_list6">


                                            </div>

                                            <div id="sub_cat_div_list7">


                                            </div>

                                            <div id="sub_cat_div_list8">


                                            </div>



                                            </div>
                                        </div>

                                    </div>
                                    <div class="selection_box">
                                        <div class="container">
                                            <div class="selection_box_content" id="selection_box_content1">
                                                <p>Current selection:
                                                    <span id="get_the_text_value">Mobiles & Tablet > Earphone</span></p>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="category_button">
                                        <div class="container">
                                            <div class="d-flex flex-wrap gap-2">
                                                <a id="confirm_button_p_cat"
                                                        class="btn btn-sm disable btn-outline-secondary waves-effect waves-light">
                                                    Confirm
                                            </a>

                                                <a id="cancel_button_p_cat"
                                                        class="btn btn-sm btn-outline-secondary waves-effect">
                                                    Clear
                                        </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">
                                Video URL </label>
                            <div class="col-md-9">
                                <input class="form-control" name="video_link" type="text" value="{{ $main_product_list->video_link }}" id=""
                                       placeholder="If there is any display video in youtube or other social media">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-3 col-form-label">
                                Product Sku </label>
                            <div class="col-md-9">
                                <input class="form-control" name="sku_product" type="text" value="{{ $main_product_list->sku_product }}" id=""
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
                                        <option value="{{ $all_unit->slug }}" {{ $main_product_list->brand == $all_unit->slug ? 'selected':'' }}>{{ $all_unit->name }}</option>
                                       @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Material</label>
                                    <select class="select2 form-control select2-multiple"
                                            multiple="multiple" data-placeholder="Choose ..." name="material">
                                        <option value="California" {{ $main_product_list->material == 'California' ? 'selected':'' }}>California</option>
                                        <option value="Nevada" {{ $main_product_list->material == 'Nevada' ? 'selected':'' }}>Nevada</option>
                                        <option value="Oregon" {{ $main_product_list->material == 'Oregon'? 'selected':'' }}>Oregon</option>
                                        <option value="Washington" {{ $main_product_list->material == 'Washington' ? 'selected':'' }}>Washington</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Manufacture</label>
                                    <input name="manufacture" value="{{ $main_product_list->manufacture }}" type="text" class="form-control" id=""
                                           placeholder="Enter Manufacture">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Conditions</label>
                                    <select class="form-select" name="condition">
                                        <option value="New" {{ $main_product_list->condition == 'New' ? 'selected':'' }}>New</option>
                                        <option value="Old" {{ $main_product_list->condition == 'Old' ? 'selected':'' }}>Old</option>
                                        <option value="Used" {{ $main_product_list->condition == 'Used'? 'selected':'' }}>Used</option>
                                        <option value="Broken" {{ $main_product_list->condition == 'Broken'? 'selected':'' }}>Broken</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Model Number</label>
                                    <input type="text" name="model_number" value="{{ $main_product_list->model_number }}" class="form-control" id=""
                                           placeholder="Enter Model Number">
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <div class="mb-3">
                                    <label for="" class="form-label">Unit</label>

                                    <select class="form-select" name="unit">
                                        <option>Select</option>
                                        @foreach($unit_list_detail as $all_unit)
                                        <option value="{{ $all_unit->slug }}" {{ $main_product_list->unit == $all_unit->slug ? 'selected':'' }}>{{ $all_unit->name }}</option>
                                       @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label"> Alert Quantity Unit</label>
                                    <input type="number" name="alert_quantity" value="{{ $main_product_list->alert_quantity}}" class="form-control" id=""
                                           placeholder="Alert Quantity Unit">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Manufacture Part Number</label>
                                    <input type="text" name="manufacture_part_number" value="{{ $main_product_list->manufacture_part_number}}" class="form-control" id=""
                                           placeholder="Enter Part Number">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">SEO Keywords</label>
                                    <input type="text" name="seo_keyword" value="{{ $main_product_list->seo_keyword}}" class="form-control" id=""
                                           placeholder="Enter Part Number">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Catalog Number</label>
                                    <input type="text" name="catalog_number" value="{{ $main_product_list->catalog_number}}" class="form-control" id=""
                                           placeholder="Enter Catalog Number">
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
                                        <input class="form-control" name="buying_price" required type="number" value="{{ $main_product_list->buying_price}}" id=""
                                               placeholder="Buying price">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input"  class="col-md-4 col-form-label">Wholesales
                                        Price </label>
                                    <div class="col-md-8">
                                        <input class="form-control" required name="wholesale_price" type="number" value="{{ $main_product_list->wholesale_price}}" id=""
                                               placeholder="Wholesales price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Selling
                                        Price </label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" required name="selling_price" value="{{ $main_product_list->selling_price}}" id="selling_price"
                                               placeholder="Selling price">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-4 col-form-label">Discount </label>
                                    <div class="col-md-8">
                                        <input class="form-control" required type="number" name="discount_main" value="{{ $main_product_list->discount}}" id="discount"
                                               placeholder="Discount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Product
                                        Details </label>
                                    <div class="col-md-10">
                                        <textarea id="summernote" name="product_detail">{!! $main_product_list->alert_quantity!!}</textarea>
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

                                @if(count($assaign_color_list) == 0)

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
@else

@foreach($assaign_color_list as $key=>$all_assaign_color)

@include('backend.product_list.edit_color_list')
@endforeach
@endif

                                <div class="mb-3 row">
                                    <label for="example-text-input"
                                           class="col-md-2 col-form-label">Size </label>

                                    <div class="col-md-7">
                                        <div class="mb-3">

                                            @if(count($assaign_product_color) == 0)

                                            <select class="select2 form-control select2-multiple size_list" id="size_list"
                                                  name="size_list[]"  multiple="multiple" data-placeholder="Select Size">
                                                  @foreach($attribute_list_size as $all_attribute_list_color)
                                                  @if(in_array($all_attribute_list_color->name_list , $convert_in_string_size_list))

                                                  <option value="{{ $all_attribute_list_color->name_list }}" selected="true">{{ $all_attribute_list_color->name_list }}</option>

                                                  @else

                                                  <option value="{{ $all_attribute_list_color->name_list }}" >{{ $all_attribute_list_color->name_list }}</option>
                                                  @endif
                                                  @endforeach
                                            </select>
                                            @else

                                            <select class="select2 form-control select2-multiple size_list_edit" id="size_list"
                                            name="size_list[]"  multiple="multiple" data-placeholder="Select Size">
                                            @foreach($attribute_list_size as $all_attribute_list_color)
                                            @if(in_array($all_attribute_list_color->name_list , $convert_in_string_size_list))

                                            <option value="{{ $all_attribute_list_color->name_list }}" selected="true">{{ $all_attribute_list_color->name_list }}</option>

                                            @else

                                            <option value="{{ $all_attribute_list_color->name_list }}" >{{ $all_attribute_list_color->name_list }}</option>
                                            @endif
                                            @endforeach
                                      </select>


                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    {{-- <label for="example-text-input" class="col-md-2 col-form-label">Size
                                        Chart</label> --}}
                                        <label for="example-text-input"
                                        class="col-md-2 col-form-label">Size Chart</label>
                                    <div class="col-md-12" id="tttt">
                                        {{-- <button class="btn btn-success btn-sm mt-2" id="size_chart_id">+ Add new Size
                                        </button> --}}

                                        @if(count($assaign_size_chart_list) == 0)

                                        @foreach($convert_in_string_size_list as $convert_in_string_size_list)

                                        <table>
                                            <tr><td><input id="ss" type="text"  name="size[]" value="{{ $convert_in_string_size_list }}" required placeholder="Enter Size" class="form-control" /></td>
                                                <td><input id="ll" type="text" name="length[]"   required placeholder="Enter Length" class="form-control" required /></td>
                                                <td><input id="sh" type="text" name="shoulder[]" required placeholder="Enter Shoulder" class="form-control" required /></td>
                                                <td><input id="ch" type="text" name="chest[]"  placeholder="Enter Chest" required class="form-control" required /></td>
                                                <td><button type="button" id="dbutton" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete"></i></button></td>
                                            </tr>
    </table>

                                        @endforeach
                                        @else

                                        @foreach($assaign_size_chart_list as $all_assaign_chart_size)
<table>
                                        <tr><td><input id="ss" type="text" value="{{ $all_assaign_chart_size->size_name }}" name="size[]" required placeholder="Enter Size" class="form-control" /></td>
                                            <td><input id="ll" type="text" name="length[]" value="{{ $all_assaign_chart_size->lenght }}"  required placeholder="Enter Length" class="form-control" /></td>
                                            <td><input id="sh" type="text" name="shoulder[]"value="{{ $all_assaign_chart_size->shoulder }}" required placeholder="Enter Shoulder" class="form-control" /></td>
                                            <td><input id="ch" type="text" name="chest[]" value="{{ $all_assaign_chart_size->chest }}" placeholder="Enter Chest" required class="form-control" /></td>
                                            <td><button type="button" id="dbutton" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete"></i></button></td>
                                        </tr>
</table>
                                        @endforeach

                                        @endif
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

                    @if(count($assaign_product_color) == 0)


                                    <div class="col-md-12 mt-4" id="test_id_size">

                                    </div>
                                @else

                                <div class="col-md-12 mt-4" >

                                    <p class="col-md-12">Product Quantity and Custom Price</p>
<div class="col-md-12 ">
    <a type="button" class="btn btn-success btn-sm" id="add_new_sku1">+ Add new SKU</a>
</div>

<div class="view mt-4">
<div class="wrapper">





<table class="table table-striped"  id="add_new_sku_view1">
     <thead class="custom_header_color">
                                                                    <tr>
                                                                        <th class="sticky-coll first-col">Availability
                                                                        </th>
                                                                        <th class="sticky-coll second-col">Color Family
                                                                        </th>
                                                                        <th class="sticky-coll third-col">Size</th>
                                                                        <th class="custom_width_table">Price</th>
                                                                        <th class="custom_width_table">Quantity</th>
                                                                        <th class="custom_width_table">Seller SKU</th>
                                                                        <th class="custom_width_table">Discount</th>
                                                                        <th class="custom_width_table1">Free Items</th>
                                                                        <th class="sticky-coll-last forth-col"></th>
                                                                    </tr>
                                                                    </thead>


@foreach($assaign_product_color as $all_assaign_product_color)
<tr>
    <td class="sticky-coll first-col">

            <select class="select2 form-control " name="in_available[]" required>

                <option value="Yes" {{ $all_assaign_product_color->availability == 'Yes' ? 'selected':'' }}>Yes</option>
                <option value="No" {{ $all_assaign_product_color->availability == 'No' ? 'selected':'' }}>NO</option>

            </select>

    </td>
    <td class="sticky-coll second-col">
        <select class="select2 form-control " name="in_color[]" required>
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_assaign_product_color->color  ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td class="sticky-coll third-col">
        <select class="select2 form-control"  name="in_size[]" required>
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_assaign_product_color->size  ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="in_price[]" required type="number" value="{{ $all_assaign_product_color->price  }}" id=""
              value="500">
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="quantity[]" required type="number" value="{{ $all_assaign_product_color->quantity  }}" id=""
               placeholder="Quantity">
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="sku[]" required type="text" value="{{ $all_assaign_product_color->sku  }}" id=""
               placeholder="SKU">
    </td>
    <td class="custom_width_table">
        <input class="form-control" type="text" required name="discount[]" value="{{ $all_assaign_product_color->discount }}" id=""
               placeholder="Discount">
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="free_item[]" required type="text" value="{{ $all_assaign_product_color->free_item }}" id=""
               placeholder="Free item">
    </td>
    <td class="sticky-coll-last forth-col">
        <button type="button" class="btn btn-sm btn-outline-danger remove-input-field1"><i
                    class="mdi mdi-delete font-size-18 "></i></button>
    </td>
</tr>

@endforeach

</table>
</div>
</div>

                                </div>


                                @endif
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
        <!--new-->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Animation</h4>
                <label for="" class="form-label">Category</label>
                @foreach($animation_category_list as $key=>$all_unit)

                <?php

                $ccc_name = DB::table('animationcategories')->where('slug',$all_unit->name)->value('name');


                ?>
                <div class="form-check mb-3">



                    <input class="form-check-input" value="{{ $all_unit->name }}" name="animation_cat[]" type="checkbox" id="animation_cat{{ $key+1 }}" checked>
                    <label class="form-check-label" for="animation_cat{{ $key+1 }}">
                        {{ $ccc_name }}
                    </label>

                </div>
                @endforeach
                @foreach($final_cat_list as $key=>$all_unit)


                <div class="form-check mb-3">



                    <input class="form-check-input" value="{{ $all_unit->slug }}" name="animation_cat[]" type="checkbox" id="animation_cat{{ $key+1 }}" >
                    <label class="form-check-label" for="animation_cat{{ $key+1 }}">
                        {{ $all_unit->name }}
                    </label>

                </div>

                @endforeach

                <div id="animation_sub_cat">

                    <label for="" class="form-label">Sub Category</label>
@foreach($animation_sub_category_list as $key=>$all_unit)

<?php

                $sub_ccc_name = DB::table('animationsubcategories')->where('slug',$all_unit->name)->value('name');


                ?>


<div class="form-check mb-3">



    <input class="form-check-input" value="{{ $all_unit->name }}" name="animation_sub_cat[]" type="checkbox" id="animation_sub1_cat{{ $key+1 }}" checked>
    <label class="form-check-label" for="animation_sub1_cat{{ $key+1 }}">
        {{ $sub_ccc_name }}
    </label>

</div>
@endforeach

                </div>



            </div>
        </div>
<!--new --->
    </div>

    <div class="col-12">


<button type="submit" name="action_button" value="submit" class="btn btn-primary">Update</button>
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

<script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_page.js"></script>
<script>
    $(document).ready(function(){
        
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

        $("[id^=main_image_div_delete_button]").click(function(){


            var main_data_id = $(this).attr('data-mciid');

            $('#main_image_div'+main_data_id).remove();


        });


        $("[id^=child_color_image_delete_button]").click(function(){


            var main_data_id = $(this).attr('data-cciid');

            $('#child_color_image_div'+main_data_id).remove();


});


        $("[id^=main_color_select]").change(function(){



var main_color_name = $(this).val();
var main_data_id = $(this).attr('data-mainid');



$.ajax({
    url: "{{ route('pass_data_create_color') }}",
    method: 'GET',
    data: {main_color_name:main_color_name,main_data_id:main_data_id},
    success: function(data) {
      $("#show_result_of_color_select").html('');
      $("#show_result_of_color_select").html(data.options);
    //   $("#selection_box_content").html('');
    //   $("#selection_box_content").html(main_category_name);
    }
    });

});

//child color select



$("[id^=child_color_select]").change(function(){



var main_color_name = $(this).val();
var main_data_id = $(this).attr('data-mainid');
// alert(main_data_id );

$.ajax({
    url: "{{ route('child_color_select') }}",
    method: 'GET',
    data: {main_color_name:main_color_name,main_data_id:main_data_id},
    success: function(data) {
      $("#child_color_select_result"+main_data_id).html('');
      $("#child_color_select_result"+main_data_id).html(data.options);
    //   $("#selection_box_content").html('');
    //   $("#selection_box_content").html(main_category_name);
    }
    });

});

//remove div from color attribute

$("[id^=delete_button_color]").click(function(){

var main_data_id1 = $(this).attr('data-dnumber');

//alert(main_data_id1);

$('#ajax_div'+main_data_id1).remove();

$('#child_color_select'+main_data_id1).prop("selected", false)
});


//image section










//end image section


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


        ///new code for size start
        $("#size_list").change(function(){
//////////
            var size_list = $("#size_list").map(function (idx, ele) {
            return $(ele).val();
             }).get();


          var last_value_of_array = size_list.slice(-1)[0];

          var i = 0;
          ++i;
        $("#tttt").append('<tr><td><input id="ss'+i+'" type="text" value="'+ last_value_of_array +'" name="size[]" required placeholder="Enter Size" class="form-control" /></td><td><input id="ll'+i+'" type="text" name="length[]" required placeholder="Enter Length" class="form-control" /></td><td><input id="sh'+i+'" type="text" name="shoulder[]" required placeholder="Enter Shoulder" class="form-control" /></td><td><input id="ch'+i+'" type="text" name="chest[]" placeholder="Enter Chest" required class="form-control" /></td><td><button type="button" id="dbutton'+i+'" class="btn btn-sm btn-outline-danger remove-input-field"><i class="mdi mdi-delete"></i></button></td></tr>'
            );


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

    // strat_edit page

    $(".size_list_edit").change(function(){


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

    //end edit page

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

        $("#add_new_sku1").click(function(){

var i = 0;

++i;
    $("#add_new_sku_view1").append('<tr><td class="sticky-coll first-col"><select id="lkj'+i+'" name="in_available[]" class="select2 form-control" required><option value="Yes">Yes</option><option value="No">NO</option></select></td><td class="sticky-coll second-col"><select class="select2 form-control" required name="in_color[]" id="extra_c'+i+'"> @foreach($attribute_list_color as $all_attribute_list_color)<option value="{{ $all_attribute_list_color->name_list }}">{{ $all_attribute_list_color->name_list }}</option> @endforeach</select></td><td class="sticky-coll third-col"><select name="in_size[]" required class="select2 form-control " id="extra_s'+i+'">@foreach($attribute_list_size as $all_attribute_list_color)<option value="{{ $all_attribute_list_color->name_list }}">{{ $all_attribute_list_color->name_list }}</option>@endforeach</select></td><td class="custom_width_table"><input class="form-control" type="number" name="in_price[]" required value="" id="1extra_c'+i+'" ></td><td class="custom_width_table"><input class="form-control" type="number" value="" id="2extra_c'+i+'" name="quantity[]" required  placeholder="Quantity"></td><td class="custom_width_table"><input class="form-control" type="text" name="sku[]" required value="" id="3extra_c'+i+'"placeholder="SKU"></td><td class="custom_width_table"><input class="form-control" required type="text" value="" id="4extra_c'+i+'" placeholder="Discount" name="discount[]"></td><td ><input class="form-control" required type="text" value="0" id="5extra_c'+i+'" placeholder="Free item" name="free_item[]"></td><td class="sticky-coll-last forth-col"><button type="button" class="btn btn-sm btn-outline-danger remove-input-field1"><i class="mdi mdi-delete font-size-18 "></i></button></td></tr>');

});
//end add new row

$(document).on('click', '.remove-input-field1', function () {




$(this).parents('tr').remove();




});

$("#cbtn").click(function(){
$("#cmyModal").modal('show');
});
$(".closeec").click(function(){
$("#cmyModal").modal('hide');
});

        $("[id^=pfiles]").on("change", function(e) {
            var key1 = $(this).attr('data-dnumber');
           // alert(22);
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove image</span>" +
                "</span>").insertAfter("#show_image"+key1);
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



        //color attribute image
$("[id^=cdatabase_image_upload_result]").click(function(){
var main_data_id1 = $(this).attr('data-dnumber');
var cdatabase_image_upload = $('input[name^="pdatabase_imaged[]"]:checked').map(function (idx, ele) {
return $(ele).val();
}).get();


$.ajax({
url: "{{ route('cdatabase_image_store') }}",
method: 'GET',
data: {cdatabase_image_upload:cdatabase_image_upload,main_data_id1:main_data_id1},
success: function(data) {
$("#cmyModal").modal('hide');
$("#show_image"+main_data_id1).html('');
$("#show_image"+main_data_id1).html(data);
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
                "<br/><span class=\"remove\">Remove image</span>" +
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
