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
            @if($pass_data_to_ajax == 'size')
            <th>{{ $pass_data_to_ajax }} Type</th>
            @endif
            <th>{{ $pass_data_to_ajax }}  Name</th>
            <th>Slug</th>
            @if($pass_data_to_ajax == 'color')
            <th>{{ $pass_data_to_ajax }} Code</th>
            @endif
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($product_list as $key=>$all_attribute)
        <tr>
            <td>
                <div class="form-check font-size-16">
                    <input class="form-check-input sub_chk" value="{{$all_attribute->id}}"  data-id="{{$all_attribute->id}}" type="checkbox" id="orderidcheck01">
                    <label class="form-check-label" for="orderidcheck01"></label>
                </div>
            </td>
            <td class="text-body fw-bold">{{ $key+1 }}</td>
            @if($pass_data_to_ajax == 'size')
            <td>{{ $all_attribute->name_type }}</td>
            @endif
            <td>{{ $all_attribute->name_list }}</td>
            <td>{{ $all_attribute->slug }}</td>
            @if($pass_data_to_ajax == 'color')
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

                        <button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}"><i
                                    class="mdi mdi-pencil font-size-14"></i></button>

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
@if($pass_data_to_ajax == 'size')
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
                <label for="" class="form-label">{{ $pass_data_to_ajax }} name</label>
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

        @if($pass_data_to_ajax == 'color')
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
@include('backend.attribute.ajax_pagination')
<input type="hidden" id="pass_data_to_ajax1" value="{{ $pass_data_to_ajax }}"/>

<script>

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


var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(10);
//alert(id_for_pass);
var pass_data_to_ajax = $('#pass_data_to_ajax1').val();
// var token = $("input[name='_token']").val();
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

//next button
$("[id^=napage_link]").click(function(){

var main_id = $(this).attr('id');
var id_for_pass1 = main_id.slice(11);
var id_for_pass = parseInt(id_for_pass1) + parseInt(1);
var pass_data_to_ajax = $('#pass_data_to_ajax1').val();
// alert(id_for_pass);

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
//end next button


//previous button
$("[id^=papage_link]").click(function(){

var main_id = $(this).attr('id');
var id_for_pass1 = main_id.slice(11);
var id_for_pass = parseInt(id_for_pass1) - parseInt(1);
var pass_data_to_ajax = $('#pass_data_to_ajax1').val();
// alert(id_for_pass);

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
//end previous button

</script>
