$(document).ready(function () {

    $("[id^=main_color_select]").change(function(){



    var main_color_name = $(this).val();
    var main_data_id = $(this).attr('data-mainid');



    $.ajax({
        url: "pass_data_create_color",
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
        url: "child_color_select",
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

});
