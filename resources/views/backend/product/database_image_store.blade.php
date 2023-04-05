
<div class="row">

    @foreach($main_data as $key=>$all_image)
<div class="col-md-4">

<img src="{{ asset('/') }}{{ $all_image }}"  style="height: 60px;"/>

<input type ="hidden" value="{{ $all_image }}" id="delete_image{{ $key+1 }}"/>
<input type ="hidden" name="database_imaged[]" value="{{ $all_image }}" id="array_main{{ $key+1 }}"/>

<a class="btn btn-danger btn-sm w-md waves-effect waves-light"  id="database_image_delete_result{{ $key+1 }}">remove</a>


</div>
@endforeach
</div>

<script>
    $(document).ready(function(){

        $("[id^=database_image_delete_result]").click(function(){

            var button_id = $(this).attr('id');
            var index = button_id.slice(28);

            var delete_image = $('#delete_image'+index).val();
            var array_main = $('input[name^="database_imaged[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();



///remove image from array
            array_main = $.grep(array_main, function(value) {
  return value != delete_image;
});
///end image from array

//alert(array_main.length);
var database_image_upload = array_main;
$.ajax({
            url: "{{ route('database_image_store') }}",
            method: 'GET',
            data: {database_image_upload:database_image_upload},
            success: function(data) {
               // $("#myModal").modal('hide');
              $("#main_content_table").html('');
              $("#main_content_table").html(data);
            }
        });

        });
    });
</script>
