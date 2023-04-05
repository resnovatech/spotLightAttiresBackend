
<div class="row">

    @foreach($main_data as $key=>$all_image)
<div class="col-md-4">

<img src="{{ asset('/') }}{{ $all_image }}"  style="height: 60px;"/>

<input type ="hidden" value="{{ $all_image }}" id="cdelete_image{{ $key+1 }}"/>
<input type ="hidden" name="pdatabase_imaged_string{{ $key }}[]" value="{{ $all_image }}" id="array_main{{ $key+1 }}"/>

<a class="btn btn-danger btn-sm w-md waves-effect waves-light" data-dnumber ="{{ $main_data_id1}}"  id="cdatabase_image_delete_result{{ $key+1 }}">remove</a>


</div>
@endforeach
</div>

<script>
    $(document).ready(function(){

        $("[id^=cdatabase_image_delete_result]").click(function(){
            var main_data_id1 = $(this).attr('data-dnumber');


            var button_id = $(this).attr('id');
            var index = button_id.slice(29);

            var delete_image = $('#cdelete_image'+index).val();
            var array_main = $('input[name^="cdatabase_imaged[]"]').map(function (idx, ele) {
   return $(ele).val();
}).get();




// ///remove image from array
            array_main = $.grep(array_main, function(value) {
  return value != delete_image;
});
// ///end image from array

// //alert(array_main.length);
 var cdatabase_image_upload = array_main;
// alert(cdatabase_image_upload);

$.ajax({
            url: "{{ route('cdatabase_image_store') }}",
            method: 'GET',
            data: {cdatabase_image_upload:cdatabase_image_upload,main_data_id1:main_data_id1},
            success: function(data) {
               // $("#myModal").modal('hide');
              $("#show_image"+main_data_id1).html('');
              $("#show_image"+main_data_id1).html(data);
            }
        });

        });
    });
</script>
