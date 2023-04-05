<?php
$loop_color_length = $color_length - 1;
$loop_size_length = $size_length_new - 1;
?>

<p class="col-md-12">Product Quantity and Custom Price1</p>
<div class="col-md-12 ">
    <a type="button" class="btn btn-success btn-sm" id="add_new_sku">+ Add new SKU</a>
</div>

<div class="view mt-4">
<div class="wrapper">





<table class="table table-striped"  id="add_new_sku_view">
     <thead class="custom_header_color">
                                                                    <tr>
                                                                       
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


@for($i=0;$i<=$loop_color_length;$i++)
@for($j=0;$j<=$loop_size_length;$j++)


<tr>
   
    <td class="sticky-coll second-col">
        <select class="select2 form-control " name="in_color[]" required>
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td class="sticky-coll third-col">
        <select class="select2 form-control"  name="in_size[]" required>
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[$j] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="in_price[]" required type="number" value="{{ $selling_price }}" id=""
              value="500">
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="quantity[]" required type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="sku[]" required type="text" value="null" id=""
               placeholder="SKU">
    </td>
    <td class="custom_width_table">
        <input class="form-control" type="text" required name="discount[]" value="{{ $discount }}" id=""
               placeholder="Discount">
    </td>
    <td class="custom_width_table">
        <input class="form-control" name="free_item[]" required type="text" value="0" id=""
               placeholder="Free item">
    </td>
    <td class="sticky-coll-last forth-col">
        <button type="button" class="btn btn-sm btn-outline-danger remove-input-field1"><i
                    class="mdi mdi-delete font-size-18 "></i></button>
    </td>
</tr>

@endfor
@endfor

</table>
</div>
</div>
<script>
$(document).ready(function(){
$(document).on('click', '.remove-input-field1', function () {




    $(this).parents('tr').remove();




});

//new row add

$("#add_new_sku").click(function(){

    var i = 0;

    ++i;
        $("#add_new_sku_view").append('<tr><td class="sticky-coll second-col"><select class="select2 form-control" required name="in_color[]" id="extra_c'+i+'"> @foreach($attribute_list_color as $all_attribute_list_color)<option value="{{ $all_attribute_list_color->name_list }}">{{ $all_attribute_list_color->name_list }}</option> @endforeach</select></td><td class="sticky-coll third-col"><select name="in_size[]" required class="select2 form-control " id="extra_s'+i+'">@foreach($attribute_list_size as $all_attribute_list_color)<option value="{{ $all_attribute_list_color->name_list }}">{{ $all_attribute_list_color->name_list }}</option>@endforeach</select></td><td class="custom_width_table"><input class="form-control" type="number" name="in_price[]" required value="{{ $selling_price }}" id="1extra_c'+i+'" ></td><td class="custom_width_table"><input class="form-control" type="number" value="" id="2extra_c'+i+'" name="quantity[]" required  placeholder="Quantity"></td><td class="custom_width_table"><input class="form-control" type="text" name="sku[]" required value="null" id="3extra_c'+i+'"placeholder="SKU"></td><td class="custom_width_table"><input class="form-control" required type="text" value="{{ $discount }}" id="4extra_c'+i+'" placeholder="Discount" name="discount[]"></td><td ><input class="form-control" required type="text" value="0" id="5extra_c'+i+'" placeholder="Free item" name="free_item[]"></td><td class="sticky-coll-last forth-col"><button type="button" class="btn btn-sm btn-outline-danger remove-input-field1"><i class="mdi mdi-delete font-size-18 "></i></button></td></tr>');

});
//end add new row
});
</script>
