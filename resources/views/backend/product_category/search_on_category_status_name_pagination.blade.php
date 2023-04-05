
<div class="col-sm-12">
    <div class="table-responsive" >
    <table class="table table-centered table-nowrap mb-0">
        <thead class="table-light">
        <tr>
            <th style="width: 20px;" class="align-middle">
                <div class="form-check font-size-16">
                    <input class="form-check-input" class="check-all" type="checkbox" id="master">
                    <label class="form-check-label" for="checkAll"></label>
                </div>
            </th>
            <th class="align-middle">Serial No.</th>
            <th class="align-middle">Image</th>
            <th class="align-middle">Product Category name</th>
            <th class="align-middle">Input Date</th>
            <th class="align-middle">Status</th>
            <th class="align-middle">Action</th>
        </tr>
        </thead>
        <tbody>


@foreach($product_list as $key=>$all_catregory)
        <tr id="tr_{{$all_catregory->id}}">
            <td>
                <div class="form-check font-size-16">
                    <input class="form-check-input sub_chk" value="{{$all_catregory->id}}"  data-id="{{$all_catregory->id}}" type="checkbox" >
                    <label class="form-check-label" for="orderidcheck01"></label>
                </div>
            </td>
            @if($minus_one == 0)
            <td class="text-body fw-bold">{{ $key+1 }}</td>
            @else
            <td class="text-body fw-bold">{{ $minus_one = $minus_one+1 }}</td>
            @endif
            <td class="text-body fw-bold">

                @if(empty($all_catregory->icon ))
                <img src="{{ asset('/') }}public/no_image.jpg" style="height: 50px"/>
                @else

                <img src="{{ asset('/') }}{{ $all_catregory->icon }}" style="height: 50px"/>
                @endif

            </td>
            <td>{{ $all_catregory->cat_name }}</td>
            <td>{{ $all_catregory->created_at->format('d/m/Y') }}</td>
            <td>
                @if($all_catregory->status == "Active")
                <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                @else
                <span class="badge badge-pill badge-soft-danger font-size-12">Inactive</span>
                @endif
            </td>

            <td>
                <div class="d-flex gap-3">
                    <button class="btn btn-success btn-sm text-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_catregory->id }}"><i
                                class="mdi mdi-pencil font-size-18"></i></button>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg{{ $all_catregory->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Update Category Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<form class="custom-validation" action="{{ route('admin.product_category.update') }}" method="post" enctype="multipart/form-data">
@csrf

<div class="row">
<div class="col-md-12">
<div class="mb-3">
<label for="" class="form-label">Category Icon</label>
<input type="file" name="icon" class="form-control" id="">
<img src="{{ asset('/') }}{{ $all_catregory->icon  }}" style="height:40px;" />
</div>
</div>
<div class="col-md-12">
<div class="mb-3">
<label for="" class="form-label">Parent Category Name</label>
<input type="text" name="cat_name" value="{{ $all_catregory->cat_name }}" class="form-control" id=""
   placeholder="Parent Category Name">

   <input type="hidden" class="form-control form-control-sm" value="{{ $all_catregory->id }}" name="id" placeholder="Enter Name">
</div>
</div>

<div class="col-md-12">
<div class="mb-3">
<label for="" class="form-label">Product Status</label>
<select class="form-control" name="status">
<option value="">Select Status</option>
<option value="Active" {{ $all_catregory->status == 'Active' ? 'selected':'' }}>Active</option>
<option value="Inactive" {{ $all_catregory->status == 'Inactive' ? 'selected':'' }}>Inactive</option>
</select>
</div>
</div>
<div class="col-md-12">
<button class="btn btn-primary" type="submit">Submit form</button>
</div>
</div>


</form>
</div>

</div>
</div>
</div>




                    <button class=" btn btn-danger btn-sm text-light"  onclick="deleteTag({{ $all_catregory->id}})"><i
                                class="mdi mdi-delete font-size-18"></i></button>

                                <form id="delete-form-{{ $all_catregory->id }}" action="{{ route('admin.product_category.delete',$all_catregory->id) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                                                  @csrf

                                                              </form>
                </div>
            </td>
        </tr>
@endforeach
        </tbody>
    </table>
    </div>
<!--pagination code --->

<div class="row  mt-3">
    <div class="col-md-12">
      <nav aria-label="...">
        <ul class="pagination pagination-rounded justify-content-end mb-2">
          {{-- <li class="page-item active" aria-current="page">
            <span class="page-link">1</span>
          </li> --}}

          <!--check total number greater than 10  -->
          @if($total_serial_number > 10)

          <!--previous button work -->
          @if($id_for_pass == 1)

          <li class="page-item disabled">
            <button  class="page-link" id="papage_link"> <i class="mdi mdi-chevron-left"></i></button>
        </li>

          @else
          <li class="page-item ">
            <button  class="page-link" id="papage_link{{ $id_for_pass }}"> <i class="mdi mdi-chevron-left"></i></button>
        </li>
        @endif
<!--end previous button work-->

          @for($i = 1; $i <= $total_serial_number; $i++)

          <!-- 1 to 5 code --->
          <!-- end 1 to 5 code --->

          @if($i == 1)
          @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
          @elseif($i == 2)
          @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == 3)
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == 4)
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif

        @elseif($i == 5)
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i+1 }}">{{ $i+1 }}</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @if($id_for_pass == 6 || $id_for_pass == 7 )

         @else

        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        @endif
        @endif

        @elseif($i == $id_for_pass)
        @if($i == $id_for_pass)
        @if($id_for_pass == $total_serial_number || $id_for_pass == ($total_serial_number - 1))

        @else

        @if($id_for_pass == 6)

         @else
        <li class="page-item">
            <button  class="page-link" id="apage_link{{ $i-1 }}">{{ $i-1 }}</button>
        </li>
        @endif
@endif
<!-- main -->
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
    <!--main-->
        @if($id_for_pass == $total_serial_number || $id_for_pass == ($total_serial_number - 1) || $id_for_pass == ($total_serial_number - 2) || $id_for_pass == ($total_serial_number - 3)  )

        @else
        <li class="page-item">
            <button  class="page-link" id="apage_link{{ $i+1 }}">{{ $i+1 }}</button>
        </li>
@endif
      @if($id_for_pass == $total_serial_number || $id_for_pass == ($total_serial_number - 1) || $id_for_pass == ($total_serial_number - 2) || $id_for_pass == ($total_serial_number - 3) || $id_for_pass == ($total_serial_number - 4) )



      @else
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        @endif


        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        {{-- <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li> --}}
        @endif

        @elseif($i == ($total_serial_number-2) )

        @if($i == $id_for_pass)

          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>

        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == ($total_serial_number-1) )
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == $total_serial_number )
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif

        @endif
        @endfor
<!--next button work -->
@if($id_for_pass == $total_serial_number)
<li class="page-item disabled">
    <button  class="page-link disabled" id="napage_link"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@else
<li class="page-item ">
    <button  class="page-link" id="napage_link{{ $id_for_pass }}"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@endif
<!--end next button work-->

          @else
          <!--end check total number greatee than 10 -->
              <!--check total number smaller than 10  -->
              <!--previous button work -->
              @if($id_for_pass == 1)

          <li class="page-item disabled">
            <button  class="page-link" id="papage_link"> <i class="mdi mdi-chevron-left"></i></button>
        </li>

          @else
          <li class="page-item ">
            <button  class="page-link" id="papage_link{{ $id_for_pass }}"> <i class="mdi mdi-chevron-left"></i></button>
        </li>
        @endif
<!--end previous button work-->
          @for($i = 1; $i <= $total_serial_number; $i++)



          @if($i == 1)
          @if($id_for_pass == 1)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else

        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @else

        @if($i == $id_for_pass)

        <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}" >{{ $i }}</button>
        </li>

        @else
        <li class="page-item">
            <button  class="page-link" id="apage_link{{ $i }}" >{{ $i }}</button>
        </li>
@endif

@endif


        @endfor
           <!--end check total number smaller than 10  -->
<!--next button work -->

@if($id_for_pass == $total_serial_number)
<li class="page-item disabled">
    <button  class="page-link disabled" id="napage_link"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@else
<li class="page-item ">
    <button  class="page-link" id="napage_link{{ $id_for_pass }}"> <i class="mdi mdi-chevron-right"></i></button>
</li>
@endif
<!--end next button work-->
        @endif
        </ul>
      </nav>
   </div>
   </div>
  <!--end pagination code -->
</div>
  <script>
  $(document).ready(function(){
     //mutiple data delete

     $("#delete_button").click(function(){

$("#myModal").modal('show');

});


$(".close").click(function(){
$("#myModal").modal('hide');
});



$("#final_delete").click(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();


$.ajax({
url: "{{ route('multiple_delete_category_main') }}",
method: 'GET',
data: {numberOfSubChecked:numberOfSubChecked},
success: function(data) {
    $("#myModal").modal('hide');
  $("#main_content_table").html('');
  $("#numberOfChecked").text('');
  $("#main_content_table").html(data.options);
}
});

});

$("#inactive_button").click(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();

if(numberOfSubChecked.length == 0){

alert("Please select row.");
}else{

alert('Are You Sure ?');

$.ajax({
url: "{{ route('multiple_delete_category') }}",
method: 'GET',
data: {numberOfSubChecked:numberOfSubChecked},
success: function(data) {
   // $("#myModal").modal('hide');
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

}

});


//end multiple data delete

//multiple data check
$('#master').on('click', function(e) {

if($(this).is(':checked',true))
{

$(".sub_chk").prop('checked', true);
//check value length
var numberOfChecked = $('.sub_chk:checked').length;
//end check value length
$('#active_button').prop('disabled', false);
$('#inactive_button').prop('disabled', false);
$('#delete_button').prop('disabled', false);
} else {

$(".sub_chk").prop('checked',false);

 //check value length
var numberOfChecked = $('.sub_chk:checked').length;
//end check value length
$('#active_button').prop('disabled', true);
$('#inactive_button').prop('disabled', true);
$('#delete_button').prop('disabled', true);

}

$('#numberOfChecked').text(numberOfChecked);
});

//end multiple data check
//single check data

$(".sub_chk").change(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();





if(numberOfSubChecked.length == 0){
    $('#active_button').prop('disabled', true);
    $('#inactive_button').prop('disabled', true);
    $('#delete_button').prop('disabled', true);
}else{
    $('#active_button').prop('disabled', false);
    $('#inactive_button').prop('disabled', false);
    $('#delete_button').prop('disabled', false);

}

$('#numberOfChecked').text(numberOfSubChecked.length);
});
//end single check data
    $("[id^=apage_link]").click(function(){

        var category_name1 = $('#search_on_cat_name').val();
    if(category_name1 === ''){

        var category_name = 0;

    }else{
        var category_name = category_name1;
    }
            var category_status = $('#search_on_status').val();
        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(10);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{ route('search_on_category_status_name_pagination') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass,category_status:category_status,category_name:category_name},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });

    //next button
    $("[id^=napage_link]").click(function(){
        var category_name1 = $('#search_on_cat_name').val();
    if(category_name1 === ''){

        var category_name = 0;

    }else{
        var category_name = category_name1;
    }
            var category_status = $('#search_on_status').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(11);
        var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "{{ route('search_on_category_status_name_pagination') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass,category_status:category_status,category_name:category_name},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=papage_link]").click(function(){
        var category_name1 = $('#search_on_cat_name').val();
    if(category_name1 === ''){

        var category_name = 0;

    }else{
        var category_name = category_name1;
    }
            var category_status = $('#search_on_status').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(11);
        var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "{{ route('search_on_category_status_name_pagination') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass,category_status:category_status,category_name:category_name},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

});
    //end previous button


});
</script>
