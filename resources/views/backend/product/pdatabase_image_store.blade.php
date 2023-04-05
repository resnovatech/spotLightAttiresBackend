
<div class="row">

    @foreach($main_data as $key=>$all_image)
<div class="col-md-4">

<img src="{{ asset('/') }}{{ $all_image }}"  style="height: 60px;"/>

<input type ="hidden" value="{{ $all_image }}" id="pdelete_image{{ $key+1 }}"/>
<input type ="hidden" name="pdatabase_imaged_string{{ $key }}[]" value="{{ $all_image }}" id="array_main{{ $key+1 }}"/>

<a class="btn btn-danger btn-sm w-md waves-effect waves-light"  id="pdatabase_image_delete_result{{ $key+1 }}">remove</a>


</div>
@endforeach
</div>

<script>
    $(document).ready(function(){

        $("[id^=pdatabase_image_delete_result]").click(function(){

            var button_id = $(this).attr('id');
            var index = button_id.slice(29);

            var delete_image = $('#pdelete_image'+index).val();
            var array_main = $('input[name^="pdatabase_imaged[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();



///remove image from array
            array_main = $.grep(array_main, function(value) {
  return value != delete_image;
});
///end image from array

//alert(array_main.length);
var pdatabase_image_upload = array_main;
$.ajax({
            url: "{{ route('pdatabase_image_store') }}",
            method: 'GET',
            data: {pdatabase_image_upload:pdatabase_image_upload},
            success: function(data) {
               // $("#myModal").modal('hide');
              $("#show_image0").html('');
              $("#show_image0").html(data);
            }
        });

        });
    });
</script>
