<div class="table-responsive">
    <table class="table align-middle table-bordered ">
        <thead class="table-light">
        <tr>
            {{-- <th style="width: 20px;" class="align-middle">
                <div class="form-check font-size-16">
                    <input class="form-check-input" type="checkbox" id="checkAll">
                    <label class="form-check-label" for="checkAll"></label>
                </div>
            </th> --}}
            <th class="align-middle">Sl.</th>
            <th class="align-middle">Sub category name</th>
            <th class="align-middle">Parent category tree</th>
            {{-- <th class="align-middle">Input date</th> --}}
            <th class="align-middle">Status</th>
            <th class="align-middle">Action</th>
        </tr>
        </thead>
        <tbody>

            @foreach($product_list as $key=>$all_table_sub_cat)
        <tr>
            {{-- <td>
                <div class="form-check font-size-16">
                    <input class="form-check-input" type="checkbox" id="orderidcheck01">
                    <label class="form-check-label" for="orderidcheck01"></label>
                </div>
            </td> --}}
            <td class="text-body fw-bold">{{ $key+1 }}</td>
            <td>{{ $all_table_sub_cat->sub_cat }}</td>
            <td>

                <?php
                                        $input_list_cat = DB::table('categories')
                                                        ->where('sub_cat',$all_table_sub_cat->sub_cat)
                                                        ->orderBy('id','desc')->get();
                                                        //dd($input_date);

                                        ?>
                                        @foreach($input_list_cat as $input_list_cat)

 <span style="font-size: 10px;">{{ $input_list_cat->cat_name }} > {{ $input_list_cat->sub_cat }} >

@if(empty($input_list_cat->child_one))

@else
     {{ $input_list_cat->child_one }} >
@endif

@if(empty($input_list_cat->child_two))

@else
     {{ $input_list_cat->child_two }} >
@endif

@if(empty($input_list_cat->child_three))

@else
     {{ $input_list_cat->child_three }} >
@endif

@if(empty($input_list_cat->child_four))

@else
     {{ $input_list_cat->child_four }} >
@endif

@if(empty($input_list_cat->child_five))

@else
     {{ $input_list_cat->child_five }} >
@endif

@if(empty($input_list_cat->child_six))

@else
     {{ $input_list_cat->child_six }} >
@endif

@if(empty($input_list_cat->child_seven))

@else
     {{ $input_list_cat->child_seven }} >
@endif
@if(empty($input_list_cat->child_eight))

@else
     {{ $input_list_cat->child_eight }}

@endif

<br>
@endforeach
    </span>


            </td>
            {{-- <td>

                <?php
                $input_date = DB::table('categories')
                                ->where('sub_cat',$all_table_sub_cat->sub_cat)
                                ->orderBy('id','desc')->value('created_at');
                                //dd($input_date);

                ?>




{{ \Carbon\Carbon::parse($input_date)->format('d/m/Y'); }}

            </td> --}}
            <td>

                <?php
                $input_status = DB::table('categories')
                                ->where('sub_cat',$all_table_sub_cat->sub_cat)
                                ->orderBy('id','desc')->value('status');
                                //dd($input_date);

                ?>

@if($input_status  == 'Inactive')

                <span class="badge badge-pill badge-soft-danger font-size-12">Inactive</span>
    @else
    <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
    @endif
            </td>

            <td>
                <div class="d-flex gap-3">
                    <a href="javascript:void(0);" class="text-success"><i
                                class="mdi mdi-pencil font-size-18"></i></a>
                                <a href="javascript:void(0);" data-name="{{ $all_table_sub_cat->sub_cat }}" id="table_data_delete{{ $key+1 }}" class="text-danger"><i
                                    class="mdi mdi-delete font-size-18"></i></a>
                </div>
            </td>
        </tr>
@endforeach



        </tbody>
    </table>
</div>
<!--normal pagination code -->
@include('backend.child_category.child_category_pagination_ajax')
<!-- end normal paination code -->


<script>
    $(document).ready(function(){

        //open delete modal
        $("[id^=table_data_delete]").click(function(){
            var data_name= $(this).attr('data-name');
            $("#myModal").modal('show');
            $("#show_cat").text(data_name);
            $("#show_cat1").val(data_name);

        });

        $(".close").click(function(){
            $("#myModal").modal('hide');
        });
        //end open delete modal
//end single check data
$("[id^=apage_link]").click(function(){


var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(10);
//alert(id_for_pass);

// var token = $("input[name='_token']").val();
$.ajax({
url: "{{ route('child_category_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});

//next button
$("[id^=napage_link]").click(function(){

var main_id = $(this).attr('id');
var id_for_pass1 = main_id.slice(11);
var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

// alert(id_for_pass);

$.ajax({
url: "{{ route('child_category_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});
//end next button


//previous button
$("[id^=papage_link]").click(function(){

var main_id = $(this).attr('id');
var id_for_pass1 = main_id.slice(11);
var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

// alert(id_for_pass);

$.ajax({
url: "{{ route('child_category_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});
//end previous button


});

</script>
