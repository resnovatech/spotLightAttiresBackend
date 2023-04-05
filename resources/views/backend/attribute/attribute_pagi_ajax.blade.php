{{-- <h4 class="card-title">Product Sub categories Listing</h4>
                <p class="card-title-desc">You can <code>Show, Hide & Edit</code> all the sub categories
                    of parent category</p> --}}
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

                            @foreach($product_list as $key=>$all_attribute)
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
                                <div class="d-flex gap-3">
                                    @if (Auth::guard('admin')->user()->can('attribute_view'))
                                    <a class="btn btn-transparent btn-sm text-info" href="{{ route('admin.attribute_detail',$all_attribute->a_slug) }}">
                                        <i class="mdi mdi-eye font-size-14"></i>
                                    </a>
                                    @endif
                                    @if (Auth::guard('admin')->user()->can('attribute_update'))

                                        <button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}"><i
                                                    class="mdi mdi-pencil font-size-18"></i></button>

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
                                                    class="mdi mdi-delete font-size-18"></i></button>

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
                @include('backend.attribute.ajax_pagination')


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

// var token = $("input[name='_token']").val();
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

//next button
$("[id^=napage_link]").click(function(){

var main_id = $(this).attr('id');
var id_for_pass1 = main_id.slice(11);
var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

// alert(id_for_pass);

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
//end next button


//previous button
$("[id^=papage_link]").click(function(){

var main_id = $(this).attr('id');
var id_for_pass1 = main_id.slice(11);
var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

// alert(id_for_pass);

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
//end previous button

</script>
