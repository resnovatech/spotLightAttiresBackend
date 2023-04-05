$(document).ready(function () {

    //first page code

    $("[id^=page_link_delete]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_delete = main_id.slice(16);
        //alert(id_for_pass_delete);

        //var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_deletelist",
        method: 'GET',
        data: {id_for_pass_delete:id_for_pass_delete},
        success: function(data) {
          $("#main_content_table_delete").html('');
          $("#main_content_table_delete").html(data.options);
        }
    });

    });

    //next page button
    $("#npage_link_delete").click(function(){

        var id_for_pass_delete = 2;

        $.ajax({
        url: "product_list_all_deletelist",
        method: 'GET',
        data: {id_for_pass_delete:id_for_pass_delete},
        success: function(data) {
          $("#main_content_table_delete").html('');
          $("#main_content_table_delete").html(data.options);
        }
    });

    });

    //end next button

    //end first page code

    //ajax first page code


    $("[id^=apage_link_delete]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_delete = main_id.slice(17);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_deletelist",
        method: 'GET',
        data: {id_for_pass_delete:id_for_pass_delete},
        success: function(data) {
          $("#main_content_table_delete").html('');
          $("#main_content_table_delete").html(data.options);
        }
    });

    });

    //next button
    $("[id^=napage_link_delete]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(18);
        var id_for_pass_delete = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_deletelist",
        method: 'GET',
        data: {id_for_pass_delete:id_for_pass_delete},
        success: function(data) {
          $("#main_content_table_delete").html('');
          $("#main_content_table_delete").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=papage_link_delete]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(18);
        var id_for_pass_delete = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_deletelist",
        method: 'GET',
        data: {id_for_pass_delete:id_for_pass_delete},
        success: function(data) {
          $("#main_content_table_delete").html('');
          $("#main_content_table_delete").html(data.options);
        }
    });

});
    //end previous button


    //end ajax first page code


    ///////////////////////////


    // inactive + active + delete button work

   //multiple data check
   $('#delete_master').on('click', function(e) {

    if($(this).is(':checked',true))
    {

       $(".delete_sub_chk").prop('checked', true);
     //check value length
     var numberOfChecked = $('.delete_sub_chk:checked').length;
     //end check value length
     $('#delete_active_button').prop('disabled', false);
     $('#delete_inactive_button').prop('disabled', false);
     $('#delete_delete_button').prop('disabled', false);
    } else {

       $(".delete_sub_chk").prop('checked',false);

        //check value length
     var numberOfChecked = $('.delete_sub_chk:checked').length;
     //end check value length
     $('#delete_active_button').prop('disabled', true);
     $('#delete_inactive_button').prop('disabled', true);
     $('#delete_delete_button').prop('disabled', true);

    }

    $('#delete_numberOfChecked').text(numberOfChecked);
    });

    //end multiple data check
    //single check data

    $(".delete_sub_chk").change(function(){

       var numberOfSubChecked = $('.delete_sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();





       if(numberOfSubChecked.length == 0){
        $('#delete_active_button').prop('disabled', true);
           $('#delete_inactive_button').prop('disabled', true);
           $('#delete_delete_button').prop('disabled', true);
       }else{
          $('#delete_active_button').prop('disabled', false);
           $('#delete_inactive_button').prop('disabled', false);
           $('#delete_delete_button').prop('disabled', false);

       }

       $('#delete_numberOfChecked').text(numberOfSubChecked.length);
    });


  // end  inactive +active + delete button work




    //mutiple data delete

    $("#delete_delete_button").click(function(){

        $("#myModal_delete").modal('show');

        });






       



    ///////////////////////////////


});
