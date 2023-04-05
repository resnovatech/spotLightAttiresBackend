


@if($cat_type == 'Category')


<div class="form-group col-md-12 col-sm-12">
    <label for="password">Category Name</label>
<input type="text" class="form-control "  name="cat_name" placeholder="Enter Name">


</div>
@elseif($cat_type == 'SubCategory')
<?php
$categorylist = DB::table('product_categories')
                        ->select('cat_name')->distinct('cat_name')->get();
?>

<div class="form-group col-md-12 col-sm-12">
    <label for="password">Category Name</label>
<select  class="form-control "  name="cat_name" id="cat_name">
<option value="0">--- Please Select ---</option>
@foreach($categorylist as $all_category)
<option value="{{ $all_category->cat_name }}">{{ $all_category->cat_name }}</option>
@endforeach

</select>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">SubCategory Name</label>
<input type="text" class="form-control "  name="sub_cat" placeholder="Enter Name">


</div>

@elseif($cat_type == 'FirstChild')

<?php
$FirstChildlist = DB::table('categories')->whereNotNull('sub_cat')
                        ->select('sub_cat')->distinct('sub_cat')->get();
?>

<div class="form-group col-md-12 col-sm-12">
    <label for="password">SubCategory Name</label>
<select  class="form-control child_list"  name="sub_cat" id="sub_cat">
<option value="0">--- Please Select ---</option>
@foreach($FirstChildlist as $all_category)
<option value="{{ $all_category->sub_cat }}">{{ $all_category->sub_cat }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">First Child Name</label>
<input type="text" class="form-control"  name="child_one" placeholder="Enter Name">


</div>



@elseif($cat_type == 'SecondChild')

<?php
$SecondChildlist = DB::table('categories')->whereNotNull('child_one')
                        ->select('child_one')->distinct('child_one')->get();
?>


<div class="form-group col-md-12 col-sm-12">
    <label for="password">First Child Name</label>
<select  class="form-control child_list"  name="child_one" id="child_one">
<option value="0">--- Please Select ---</option>
@foreach($SecondChildlist as $all_category)
<option value="{{ $all_category->child_one }}">{{ $all_category->child_one }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Second Child Name</label>
<input type="text" class="form-control"  name="child_two" placeholder="Enter Name">


</div>


@elseif($cat_type == 'ThirdChild')

<?php
$ThirdChildlist = DB::table('categories')->whereNotNull('child_two')
                        ->select('child_two')->distinct('child_two')->get();
?>

<div class="form-group col-md-12 col-sm-12">
    <label for="password">Second Child Name</label>
<select  class="form-control child_list"  name="child_two" id="child_two">
<option value="0">--- Please Select ---</option>
@foreach($ThirdChildlist as $all_category)
<option value="{{ $all_category->child_two }}">{{ $all_category->child_two }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Third Child Name</label>
<input type="text" class="form-control "  name="child_three" placeholder="Enter Name">


</div>

@elseif($cat_type == 'FourthChild')

<?php
$FourthChildlist = DB::table('categories')->whereNotNull('child_three')
                        ->select('child_three')->distinct('child_three')->get();
?>

<div class="form-group col-md-12 col-sm-12">
    <label for="password">Third Child Name</label>
<select  class="form-control child_list"  name="child_three" id="child_three">
<option value="0">--- Please Select ---</option>
@foreach($FourthChildlist as $all_category)
<option value="{{ $all_category->child_three }}">{{ $all_category->child_three }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Fourth Child Name</label>
<input type="text" class="form-control "  name="child_four" placeholder="Enter Name">


</div>


@elseif($cat_type == 'FifthChild')

<?php
$FifthChildlist = DB::table('categories')->whereNotNull('child_four')
                        ->select('child_four')->distinct('child_four')->get();
?>
<div class="form-group col-md-12 col-sm-12">
    <label for="password">Fourth Child Name</label>
<select  class="form-control child_list"  name="child_four" id="child_four">
<option value="0">--- Please Select ---</option>
@foreach($FifthChildlist as $all_category)
<option value="{{ $all_category->child_four }}">{{ $all_category->child_four }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Fifth Child Name</label>
<input type="text" class="form-control "  name="child_five" placeholder="Enter Name">


</div>

@elseif($cat_type == 'SixthChild')
<?php
$SixthChildlist = DB::table('categories')->whereNotNull('child_five')
                        ->select('child_five')->distinct('child_five')->get();
?>
<div class="form-group col-md-12 col-sm-12">
    <label for="password">Fifth Child Name</label>
<select  class="form-control child_list"  name="child_five" id="child_five">
<option value="0">--- Please Select ---</option>
@foreach($SixthChildlist as $all_category)
<option value="{{ $all_category->child_five }}">{{ $all_category->child_five }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Sixth Child Name</label>
<input type="text" class="form-control "  name="child_six" placeholder="Enter Name">


</div>

@elseif($cat_type == 'SeventhChild')

<?php
$SeventhChildlist = DB::table('categories')->whereNotNull('child_six')
                        ->select('child_six')->distinct('child_six')->get();
?>
<div class="form-group col-md-12 col-sm-12">
    <label for="password">Sixth Child Name</label>
<select  class="form-control child_list"  name="child_six" id="child_six">
<option value="0">--- Please Select ---</option>
@foreach($SeventhChildlist as $all_category)
<option value="{{ $all_category->child_six }}">{{ $all_category->child_six }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Seventh Child Name</label>
<input type="text" class="form-control "  name="child_seven" placeholder="Enter Name">


</div>

@elseif($cat_type == 'EightChild')
<?php
$EightChildlist = DB::table('categories')->whereNotNull('child_seven')
                        ->select('child_seven')->distinct('child_seven')->get();
?>
<div class="form-group col-md-12 col-sm-12">
    <label for="password">Seven Child Name</label>
<select  class="form-control child_list"  name="child_seven" id="child_seven">
<option value="0">--- Please Select ---</option>
@foreach($EightChildlist as $all_category)
<option value="{{ $all_category->child_seven }}">{{ $all_category->child_seven }}</option>
@endforeach

</select>
<small class="text-danger" id="final_result_cat1"></small>
</div>
<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Eight Child Name</label>
<input type="text" class="form-control "  name="child_eight" placeholder="Enter Name">


</div>

@endif

<script type="text/javascript">
    $(document).ready(function () {

        $('.child_list').on('change', function () {
            var child_name = $(this).val();
            var cat_type = $('#cat_type').val();
//alert(child_name);

$.ajax({
            url: "{{ route('child__name_from_list') }}",
            method: 'GET',
            data: {child_name:child_name,cat_type:cat_type},
            success: function(data) {
              //$("#final_result_cat1").text('');
              $("#final_result_cat1").text(data);
            }
        });
    });
});
    </script>
