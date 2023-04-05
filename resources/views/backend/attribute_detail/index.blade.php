@extends('backend.master.master')

@section('title')
{{ $id }} | {{ $ins_name }}
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

                    <li class="breadcrumb-item active">Product All Sub Category</li>
                </ol>
            </div>

        </div>
    </div>
    <div class="col-12">
        <h4 class="card-title">Product Attributes</h4>
        <p class="card-title-desc">You can <code>Show & Edit</code> all the product attributes</p>
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

<div class="row mt-3">
    @include('flash_message')
    <div class="col-sm-6">
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
                <i class="mdi mdi-plus me-1"></i> Add New Attribute Detail
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
        <h4 class="card-title">Add new {{ $id }}</h4>

        <form class="mt-3" method="post" action="{{ route('admin.attribute_detail.store') }}">
            @csrf
            <div class="row">

                @if($id == 'size')
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Size Type</label>
                        <select class="form-control" name="name_type">
                            <option value="EU">EU</option>
                            <option value="other">other</option>
                            <option value="Full Look">Full Look</option>
                            <option value="CM">CM</option>
                            <option value="HEIGHT">HEIGHT</option>
                            <option value="Suit Only">Suit Only</option>
                            <option value="Int">Int</option>
                        </select>
                    </div>
                </div>
                @endif
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">{{ $id }} name</label>
                        <input type="text" class="form-control" name="name_list" id="name_list">
                        <input type="hidden" class="form-control" value="{{ $id }}" name="main_id_att" id="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" readonly>
                    </div>
                </div>

                @if($id == 'color')
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Color Code</label>
                        <input type="text" name="name_code" class="form-control" id="colorpicker-default" value="#50a5f1">
                    </div>
                </div>
                @endif
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
        <div class="card">
            <div class="card-body" id="main_content_table">



                <div class="table-responsive">
                    <table class="table  table-striped">
                        <thead class="table-light">
                        <tr>
                            <th style="width: 20px;">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="master">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th>Sl.</th>
                            @if($id == 'size')
                            <th>{{ $id }} Type</th>
                            @endif
                            <th>{{ $id }}  Name</th>
                            <th>Slug</th>
                            @if($id == 'color')
                            <th>{{ $id }} Code</th>
                            @endif
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
                            @if($id == 'size')
                            <td>{{ $all_attribute->name_type }}</td>
                            @endif
                            <td>{{ $all_attribute->name_list }}</td>
                            <td>{{ $all_attribute->slug }}</td>
                            @if($id == 'color')
                            <td>{{ $all_attribute->name_code }}</td>
                            @endif
                            <td>
                                @if($all_attribute->status == 'Active')

                                <span class="badge badge-pill badge-soft-success font-size-12">Active</span>

                                @else
                                <span class="badge badge-pill badge-soft-danger font-size-12">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-1">

                                    @if (Auth::guard('admin')->user()->can('attribute_detail_update'))

                                        <button class="btn btn-transparent btn-sm text-success"
                                        data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}">
                                        <i class="mdi mdi-pencil font-size-14"></i></button>

     <!-- Modal -->
     <div class="modal fade bs-example-modal-lg{{ $all_attribute->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Update Attribute Detail Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    </button>
    </div>
    <div class="modal-body">
    <form class="custom-validation" action="{{ route('admin.attribute_detail.update') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        @if($id == 'size')
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Size Type</label>
                                <select class="form-control" name="name_type">
                                    <option value="EU" {{ $all_attribute->status == 'EU' ? 'selected':'' }}>EU</option>
                                    <option value="other" {{ $all_attribute->status == 'other' ? 'selected':'' }}>other</option>
                                    <option value="Full Look" {{ $all_attribute->status == 'Full Look' ? 'selected':'' }}>Full Look</option>
                                    <option value="CM" {{ $all_attribute->status == 'CM' ? 'selected':'' }}>CM</option>
                                    <option value="HEIGHT" {{ $all_attribute->status == 'HEIGHT' ? 'selected':'' }}>HEIGHT</option>
                                    <option value="Suit Only" {{ $all_attribute->status == 'Suit Only' ? 'selected':'' }}>Suit Only</option>
                                    <option value="Int" {{ $all_attribute->status == 'Int' ? 'selected':'' }}>Int</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">{{ $id }} name</label>
                                <input type="text" class="form-control" name="name_list" value="{{ $all_attribute->name_list}}" id="name_list{{ $all_attribute->id}}">
                                <input type="hidden" class="form-control" value="{{ $all_attribute->id}}" name="id" id="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $all_attribute->slug}}" id="slug{{ $all_attribute->id}}" readonly>
                            </div>
                        </div>

                        @if($id == 'color')
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Color Code</label>
                                <input type="color" name="name_code" value="{{ $all_attribute->name_code}}" class="form-control"  value="#50a5f1">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Staus</label>
                                <select class="form-control" name="status">
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
    @if (Auth::guard('admin')->user()->can('attribute_detail_delete'))


                                        <button class=" btn btn-transparent btn-sm text-danger"  onclick="deleteTag({{ $all_attribute->id}})"><i
                                                    class="mdi mdi-delete font-size-14"></i></button>

                                                    <form id="delete-form-{{ $all_attribute->id }}" action="{{ route('admin.attribute_detail.delete',$all_attribute->id) }}" method="POST" style="display: none;">
                                                        @method('DELETE')
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
                @include('backend.attribute_detail.normal_pagination')

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
<input type="hidden" id="pass_data_to_ajax" value="{{ $id }}"/>
@endsection

@section('script')
<script>

$(document).ready(function () {

    //search bar work

    $('#search_on_cat_name').on('keyup', function () {

        var search_value = $(this).val();
        var pass_data_to_ajax = $('#pass_data_to_ajax').val();

        //alert(pass_data_to_ajax);

        $.ajax({
    url: "{{ route('attribute_detail_search_ajax') }}",
    type: "GET",
    data: {search_value:search_value,pass_data_to_ajax:pass_data_to_ajax},
    success: function (data) {

        $("#main_content_table").html('');
        $('#main_content_table').html(data.options);

    }
});

    });

    //search bar work




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

var pass_data_to_ajax = $('#pass_data_to_ajax').val();
$.ajax({
url: "{{ route('attri_detail_pagi_ajax_multiple_delete') }}",
method: 'GET',
data: {numberOfSubChecked:numberOfSubChecked,pass_data_to_ajax:pass_data_to_ajax},
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

var pass_data_to_ajax = $('#pass_data_to_ajax').val();

$.ajax({
url: "{{ route('attri_detail_pagi_ajax_multiple_select') }}",
method: 'GET',
data: {numberOfSubChecked:numberOfSubChecked,pass_data_to_ajax:pass_data_to_ajax},
success: function(data) {
   // $("#myModal").modal('hide');
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

}

});


//end multiple data delete

//multiple data status update

$("#active_button").click(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();

if(numberOfSubChecked.length == 0){

alert("Please select row.");
}else{

alert('Are You Sure ?');

var pass_data_to_ajax = $('#pass_data_to_ajax').val();

$.ajax({
url: "{{ route('attri_detail_pagi_ajax_multiple_select_active') }}",
method: 'GET',
data: {numberOfSubChecked:numberOfSubChecked,pass_data_to_ajax:pass_data_to_ajax},
success: function(data) {
   // $("#myModal").modal('hide');
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

}

});

//multiple data satus update


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
$('#name_list').on('change', function () {
var main_value = $(this).val();

var final_result = main_value.toLowerCase()
             .replace(/ /g, '-')
             .replace(/[^\w-]+/g, '');

//alert(final_result);

$('#slug').val(final_result);

});

$("[id^=name_list]").on('change', function () {

var main_id = $(this).attr('id');
var result = main_id.slice(9);
var main_value = $(this).val();

// alert(main_value);


var final_result = main_value.toLowerCase()
         .replace(/ /g, '-')
         .replace(/[^\w-]+/g, '');

//alert(final_result);

$('#slug'+result).val(final_result);

});

 //pagination stated

 $("[id^=page_link]").click(function(){


var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(9);
var pass_data_to_ajax = $('#pass_data_to_ajax').val();
//alert(id_for_pass);

//var token = $("input[name='_token']").val();
$.ajax({
url: "{{ route('attribute_detail_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass,pass_data_to_ajax:pass_data_to_ajax},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});

//next page button
$("#npage_link").click(function(){
    var pass_data_to_ajax = $('#pass_data_to_ajax').val();
var id_for_pass = 2;

$.ajax({
url: "{{ route('attribute_detail_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass,pass_data_to_ajax:pass_data_to_ajax},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});

});
    </script>
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

@endsection
