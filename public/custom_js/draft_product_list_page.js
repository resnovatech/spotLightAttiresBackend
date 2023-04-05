$(document).ready(function () {

    //first page code

    $("[id^=page_link_draft]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_draft = main_id.slice(15);
        //alert(id_for_pass_draft);

        //var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_draft",
        method: 'GET',
        data: {id_for_pass_draft:id_for_pass_draft},
        success: function(data) {
          $("#main_content_table_draft").html('');
          $("#main_content_table_draft").html(data.options);
        }
    });

    });

    //next page button
    $("#npage_link_draft").click(function(){

        var id_for_pass_draft = 2;

        $.ajax({
        url: "product_list_all_draft",
        method: 'GET',
        data: {id_for_pass_draft:id_for_pass_draft},
        success: function(data) {
          $("#main_content_table_draft").html('');
          $("#main_content_table_draft").html(data.options);
        }
    });

    });

    //end next button

    //end first page code

    //ajax first page code


    $("[id^=apage_link_draft]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_draft = main_id.slice(16);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_draft",
        method: 'GET',
        data: {id_for_pass_draft:id_for_pass_draft},
        success: function(data) {
          $("#main_content_table_draft").html('');
          $("#main_content_table_draft").html(data.options);
        }
    });

    });

    //next button
    $("[id^=napage_link_draft]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(17);
        var id_for_pass_draft = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_draft",
        method: 'GET',
        data: {id_for_pass_draft:id_for_pass_draft},
        success: function(data) {
          $("#main_content_table_draft").html('');
          $("#main_content_table_draft").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=papage_link_draft]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(17);
        var id_for_pass_draft = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_draft",
        method: 'GET',
        data: {id_for_pass_draft:id_for_pass_draft},
        success: function(data) {
          $("#main_content_table_draft").html('');
          $("#main_content_table_draft").html(data.options);
        }
    });

});
    //end previous button


    //end ajax first page code


    ///////////////////////////


    // inactive + active + delete button work

   //multiple data check
   $('#draft_master').on('click', function(e) {

    if($(this).is(':checked',true))
    {

       $(".draft_sub_chk").prop('checked', true);
     //check value length
     var numberOfChecked = $('.draft_sub_chk:checked').length;
     //end check value length
     $('#draft_active_button').prop('disabled', false);
     $('#draft_inactive_button').prop('disabled', false);
     $('#draft_delete_button').prop('disabled', false);
    } else {

       $(".draft_sub_chk").prop('checked',false);

        //check value length
     var numberOfChecked = $('.draft_sub_chk:checked').length;
     //end check value length
     $('#draft_active_button').prop('disabled', true);
     $('#draft_inactive_button').prop('disabled', true);
     $('#draft_delete_button').prop('disabled', true);

    }

    $('#draft_numberOfChecked').text(numberOfChecked);
    });

    //end multiple data check
    //single check data

    $(".draft_sub_chk").change(function(){

       var numberOfSubChecked = $('.draft_sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();





       if(numberOfSubChecked.length == 0){
        $('#draft_active_button').prop('disabled', true);
           $('#draft_inactive_button').prop('disabled', true);
           $('#draft_delete_button').prop('disabled', true);
       }else{
          $('#draft_active_button').prop('disabled', false);
           $('#draft_inactive_button').prop('disabled', false);
           $('#draft_delete_button').prop('disabled', false);

       }

       $('#draft_numberOfChecked').text(numberOfSubChecked.length);
    });


  // end  inactive +active + delete button work




    //mutiple data delete

    $("#draft_delete_button").click(function(){

        $("#myModal_draft").modal('show');

        });






        $("#draft_final_delete").click(function(){

        var numberOfSubChecked = $('.draft_sub_chk:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();


        $.ajax({
        url: "product_list_all_delete_draft",
        method: 'GET',
        data: {numberOfSubChecked:numberOfSubChecked},
        success: function(data) {
            $("#myModal_draft").modal('hide');
          $("#main_content_table_draft").html('');
          $("#draft_numberOfChecked").text('');
          $("#main_content_table_draft").html(data.options);
        }
        });

        });



    ///////////////////////////////


});
