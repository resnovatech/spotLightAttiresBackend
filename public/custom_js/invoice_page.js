$(document).ready(function () {
//pagination stated

$("[id^=page_link]").click(function(){


    var main_id = $(this).attr('id');
    var id_for_pass = main_id.slice(9);
    //alert(id_for_pass);

    //var token = $("input[name='_token']").val();
    $.ajax({
    url: "invoice_list_pagination_start",
    method: 'GET',
    data: {id_for_pass:id_for_pass},
    success: function(data) {
      $("#main_content_table").html('');
      $("#main_content_table").html(data.options);
    }
    });

    });

    //next page button
    $("#npage_link").click(function(){

    var id_for_pass = 2;

    $.ajax({
    url: "invoice_list_pagination_start",
    method: 'GET',
    data: {id_for_pass:id_for_pass},
    success: function(data) {
      $("#main_content_table").html('');
      $("#main_content_table").html(data.options);
    }
    });

    });

    $("[id^=apage_link]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(10);
        //alert(id_for_pass);

        // var token = $("input[name='_token']").val();
        $.ajax({
        url: "invoice_list_pagination_start",
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
        url: "invoice_list_pagination_start",
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
        url: "invoice_list_pagination_start",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
        });

        });
        //end previous button


        //mutiple data delete

    $("#delete_button").click(function(){

        $("#myModal").modal('show');

        });






        $("#final_delete").click(function(){

        var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();


        $.ajax({
        url: "invoice_list_pagination_start_delete",
        method: 'GET',
        data: {numberOfSubChecked:numberOfSubChecked},
        success: function(data) {
            $("#myModal").modal('hide');
          $("#main_content_table").html('');
          $("#numberOfChecked").text('');
          $("#main_content_table").html(data.options);
        }
        });

        });




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

});
