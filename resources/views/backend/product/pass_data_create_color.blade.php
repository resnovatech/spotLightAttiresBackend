<div class="row" id="ajax_div{{ $main_data_id+1 }}">
<div class="col-md-7"></div>
<div class="col-md-3">
    <button class="btn btn-danger btn-sm mt-1" data-dnumber ="{{ $main_data_id+1 }}" id="delete_button_color{{ $main_data_id+1 }}">
        <i class="fa fa-trash"> Delete Section </i>
    </button>
</div>
<div class="col-md-2"></div>
<div class="col-md-10">

    <div class="another_image_box">
        <div class="another_image_box_content_box">
            <p>Add at least 3 images of your product from different
                angles.Maximum 8 pictures. Size between 500x500 and
                2000x2000 px. Obscene image is strictly
                prohibited.</p>
            <div class="d-flex justify-content-start flex-wrap">

                <div class="p-2">
                    <div id="show_image0">

                    </div>
                    <div class="upload_custom_button">
                        <a class="upload_selected" id="pbtn">
                            <i class="fa fa-image upload_icon"></i>
                            <span class="upload_text">Media Center</span>
                        </a>
                    </div>
                    <div class="upload_custom_button">
                        <a class="upload_selected">
                            <i class="fa fa-upload upload_icon"></i>

                            <span class="upload_text">
                                <input type="file" data-dnumber ="{{ $main_data_id+1 }}" id="pfiles{{ $main_data_id+1 }}" name="pfiles{{ $main_data_id}}[]" multiple />
                            </span>

                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 mb-3 row">

        <div class="col-md-7">
            <select class="select2 form-select" name="maincolor[]" data-mainid= "{{ $main_data_id+1 }}" id="child_color_select{{ $main_data_id+1 }}">
                <option>Select Color</option>
                @foreach($attribute_list_color as $all_attribute_list_color)
                <option value="{{ $all_attribute_list_color->name_list }}" >{{ $all_attribute_list_color->name_list }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <span class="font-size-12 mt-2"> Just select the color to add new color </span>
        </div>

            </div>

    <!--child code -->

    <div class="mt-3 mb-3 row" id="child_color_select_result{{ $main_data_id+1 }}">
    </div>
    <!--end child code-->
</div>
</div>



<script type="text/javascript">
    $(document).ready(function() {

        $("[id^=main_color_select]").change(function(){



var main_color_name = $(this).val();
var main_data_id = $(this).attr('data-mainid');



$.ajax({
    url: "{{ route('pass_data_create_color') }}",
    method: 'GET',
    data: {main_color_name:main_color_name,main_data_id:main_data_id},
    success: function(data) {
      $("#show_result_of_color_select").html('');
      $("#show_result_of_color_select").html(data.options);
    //   $("#selection_box_content").html('');
    //   $("#selection_box_content").html(main_category_name);
    }
    });

});

//child color select



$("[id^=child_color_select]").change(function(){



var main_color_name = $(this).val();
var main_data_id = $(this).attr('data-mainid');
// alert(main_data_id );

$.ajax({
    url: "{{ route('child_color_select') }}",
    method: 'GET',
    data: {main_color_name:main_color_name,main_data_id:main_data_id},
    success: function(data) {
      $("#child_color_select_result"+main_data_id).html('');
      $("#child_color_select_result"+main_data_id).html(data.options);
    //   $("#selection_box_content").html('');
    //   $("#selection_box_content").html(main_category_name);
    }
    });

});

//remove div from color attribute

$("[id^=delete_button_color]").click(function(){

var main_data_id1 = $(this).attr('data-dnumber');

//alert(main_data_id1);

$('#ajax_div'+main_data_id1).remove();

$('#child_color_select'+main_data_id1).prop("selected", false)
});


//image section










//end image section

        $("#pbtn").click(function(){
    $("#pmyModal").modal('show');
});
        $("[id^=pfiles]").on("change", function(e) {
            var main_data_id1 = $(this).attr('data-dnumber');
           // alert(22);
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove image</span>" +
                "</span>").insertAfter("#show_image0");
              $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });

              // Old code here
              /*$("<img></img>", {
                class: "imageThumb",
                src: e.target.result,
                title: file.name + " | Click to remove"
              }).insertAfter("#files").click(function(){$(this).remove();});*/

            });
            fileReader.readAsDataURL(f);
          }
          console.log(files);
        });

    });
    </script>
