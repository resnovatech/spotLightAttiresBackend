@extends('backend.master.master')

@section('title')
Attribute Information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Product All Attribute</li>
                </ol>
            </div>

        </div>
    </div>
    <div class="col-12">
        <h4 class="card-title">Product Attributes Listing</h4>
        <p class="card-title-desc">You can <code>Show, Hide & Edit</code> all Attributes</p>
    </div>
</div>
<!-- end page title -->

<!-- search bar --->
<div class="row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <div class="text-sm-end">
            <div class="form-group">
                <input type="text" name="search_on_cat_name" class="form-control" id="search_on_cat_name"
                       placeholder="Search">
            </div>
        </div>
    </div>
</div>
<!-- end search bar --->
<div class="row mt-2">
    <div class="col-sm-6 col-xl-6">
        <div class="d-flex flex-wrap gap-2">
            <p class="horizontal-center" >Selected:<span id="numberOfChecked"> 0</span></p>
            <button type="" id="inactive_button" class="btn btn-sm btn-outline-secondary waves-effect ml-4" disabled>
                Inactive
            </button>
            <button type="" id="active_button" class="btn btn-sm btn-outline-success waves-effect ml-4" disabled>
                active
            </button>
            <button type="" id="delete_button" class="btn btn-sm btn-outline-danger waves-effect ml-4" disabled>
                Delete All
            </button>

        </div>
    </div>

    <div class="col-sm-6">
        <div class="text-sm-end">
            <button type="button"
                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                <i class="mdi mdi-plus me-1"></i> Add New Attribute
            </button>
        </div>
            <!-- Modal -->
     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add Attribute Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    </button>
    </div>
    <div class="modal-body">
        <form class="mt-3" method="Post" action="{{ route('admin.attribute.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Attributes Type</label>
                        <select class="form-control" name="a_type">
                            <option value="Color">Color</option>
                            <option value="Size">Size</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Attributes Name</label>
                        <input type="text" name="a_name" class="form-control" id="a_name"
                               >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Slug</label>
                        <input readonly type="text" name="a_slug"  class="form-control" id="a_slug"
                               >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Staus</label>
                        <select class="form-control" name="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
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
    </div>
    <div class="col-xl-12">
        @include('flash_message')
        <div class="card">
            <div class="card-body" id="main_content_table">


                   <div class="table-responsive">
                    <table class="table  table-striped">
                        <thead class="table-light">
                        <tr>
                            <th style="width: 20px;" >
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="master">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th >Sl.</th>
                            <th >Attributes name</th>
                            <th >Slug</th>
                            <th >Terms</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($attribute_list as $key=>$all_attribute)
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input sub_chk" value="{{$all_attribute->id}}"  data-id="{{$all_attribute->id}}" type="checkbox" id="orderidcheck01">
                                    <label class="form-check-label" for="orderidcheck01"></label>
                                </div>
                            </td>
                            <td class="text-body fw-bold">{{ $key+1 }}</td>
                            <td>{{ $all_attribute->a_name }} </td>
                            <td>{{ $all_attribute->a_slug }}</td>
                            <td>

                            <?php
$term_detail = DB::table('attribute_details')
->where('main_id_att',$all_attribute->a_slug)->get();

                            ?>

                            @foreach($term_detail as $all_term_list)

                            @if($all_term_list->main_id_att == 'color')
                            <span class="badge bg-black font-size-12" style="background-color: red;">{{ $all_term_list->name_list }}</span>

@elseif($all_term_list->main_id_att == 'size')
<span class="badge bg-black font-size-12">{{ $all_term_list->name_list }}({{ $all_term_list->name_type }})</span>
                            @else
                                <span class="badge bg-black font-size-12">{{ $all_term_list->name_list }}</span>
                                @endif
                               @endforeach
                            </td>
                            <td>
                                @if($all_attribute->status == 'Active')

                                <span class="badge badge-pill badge-soft-success font-size-12">Active</span>

                                @else
                                <span class="badge badge-pill badge-soft-danger font-size-12">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-1">

                                    @if (Auth::guard('admin')->user()->can('attribute_view'))
                                    <a class="btn btn-transparent btn-sm text-info" href="{{ route('admin.attribute_detail',$all_attribute->a_slug) }}">
                                        <i class="mdi mdi-eye font-size-14"></i>
                                    </a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->can('attribute_update'))

<button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}">
                            <i class="mdi mdi-pencil font-size-14"></i>
                            </button>

    <!-- Modal -->
     <div class="modal fade bs-example-modal-lg{{ $all_attribute->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update Attribute Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    </button>
    </div>
    <div class="modal-body">
    <form class="custom-validation" action="{{ route('admin.attribute.update') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Attributes Type</label>
                <select class="form-control" name="a_type">
                    <option value="Color" {{ $all_attribute->a_type == 'Color' ? 'selected':'' }}>Color</option>
                    <option value="Size" {{ $all_attribute->a_type == 'Size' ? 'selected':'' }}>Size</option>
                    <option value="Others" {{ $all_attribute->a_type == 'Others' ? 'selected':'' }}>Others</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Attributes Name</label>
                <input type="text" name="a_name" value="{{ $all_attribute->a_name  }}" class="form-control" id="a_name{{ $all_attribute->id  }}"
                       >
                       <input type="hidden" name="id" value="{{ $all_attribute->id  }}" class="form-control"
                       >
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Slug</label>
                <input readonly type="text" value="{{ $all_attribute->a_slug }}"  name="a_slug"  class="form-control" id="a_slug{{ $all_attribute->id  }}"
                       >
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Product Status</label>
                <select class="form-control" name="status">
                    <option value="">Select Status</option>
                    <option value="Active" {{ $all_attribute->status == 'Active' ? 'selected':'' }}>Active</option>
                    <option value="Inactive" {{ $all_attribute->status == 'Inactive' ? 'selected':'' }}>Inactive</option>
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
@endif
    @if (Auth::guard('admin')->user()->can('attribute_delete'))


                                        <button class=" btn btn-transparent btn-sm text-danger"  onclick="deleteTag({{ $all_attribute->id}})"><i
                                                    class="mdi mdi-delete font-size-14"></i></button>

                                                    <form id="delete-form-{{ $all_attribute->id }}" action="{{ route('admin.attribute.delete',$all_attribute->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
                                                                                      @csrf

                                                                                  </form>
                                                                                  @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
                @include('backend.attribute.normal_pagination')


        <!--end card body -->
            </div>
        </div>
    </div>


</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure ?</h1>
                {{-- <button type="button" class="btn btn-danger close" >&times;</button> --}}
            </div>
            <div class="modal-body">

                    <button class="btn btn-success w-md waves-effect waves-light"  id="final_delete">Yes</button>
                    <button class="btn btn-danger w-md waves-effect waves-light close"  >Cancel</button>


            </div>

        </div>
    </div>
</div>
<!--end modal for delete -->
@endsection

@section('script')
<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "You will not be able to revert this!",
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
///attribute with jquery

$(document).ready(function () {

   //search bar work

   $('#search_on_cat_name').on('keyup', function () {

    var search_value = $(this).val();

    $.ajax({
    url: "{{ route('attribute_search_ajax') }}",
    type: "GET",
    data: {search_value:search_value},
    success: function (data) {

        $("#main_content_table").html('');
        $('#main_content_table').html(data.options);

    }
});

});
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
url: "{{ route('attri_pagi_ajax_multiple_delete') }}",
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
url: "{{ route('attri_pagi_ajax_multiple_select') }}",
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

//multiple data active status

$("#active_button").click(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();

if(numberOfSubChecked.length == 0){

alert("Please select row.");
}else{

alert('Are You Sure ?');

$.ajax({
url: "{{ route('attri_pagi_ajax_multiple_select_active') }}",
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

//end multiple data active status


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

$('#a_name').on('change', function () {
var main_value = $(this).val();

var final_result = main_value.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');

//alert(final_result);

$('#a_slug').val(final_result);

});

//from edit attribute

$("[id^=a_name]").on('change', function () {

    var main_id = $(this).attr('id');
    var result = main_id.slice(6);
    var main_value = $(this).val();

   // alert(main_value);


    var final_result = main_value.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');

//alert(final_result);

$('#a_slug'+result).val(final_result);

});


  //pagination stated

  $("[id^=page_link]").click(function(){


var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(9);
//alert(id_for_pass);

//var token = $("input[name='_token']").val();
$.ajax({
url: "{{ route('attribute_pagi_ajax') }}",
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
url: "{{ route('attribute_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});


});
</script>
@endsection
