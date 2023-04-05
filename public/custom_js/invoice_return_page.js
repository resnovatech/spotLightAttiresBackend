$(document).ready(function () {

    $("[id^=page_linkrt]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(11);
        //alert(id_for_pass);

        //var token = $("input[name='_token']").val();
        $.ajax({
        url: "invoice_return_pagination_start",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_tabler").html('');
          $("#main_content_tabler").html(data.options);
        }
        });

        });

        //next page button
        $("#npage_linkrt").click(function(){

        var id_for_pass = 2;

        $.ajax({
        url: "invoice_return_pagination_start",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_tabler").html('');
          $("#main_content_tabler").html(data.options);
        }
        });

        });


        $("[id^=apage_linkrt]").click(function(){


            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(12);
            //alert(id_for_pass);

            // var token = $("input[name='_token']").val();
            $.ajax({
            url: "invoice_return_pagination_start",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tabler").html('');
              $("#main_content_tabler").html(data.options);
            }
            });

            });

            //next button
            $("[id^=napage_linkrt]").click(function(){

            var main_id = $(this).attr('id');
            var id_for_pass1 = main_id.slice(13);
            var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

            // alert(id_for_pass);

            $.ajax({
            url: "invoice_return_pagination_start",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tabler").html('');
              $("#main_content_tabler").html(data.options);
            }
            });

            });
            //end next button


            //previous button
            $("[id^=papage_linkrt]").click(function(){

            var main_id = $(this).attr('id');
            var id_for_pass1 = main_id.slice(13);
            var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

            // alert(id_for_pass);

            $.ajax({
            url: "invoice_return_pagination_start",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tabler").html('');
              $("#main_content_tabler").html(data.options);
            }
            });

            });
            //end previous button



            //mutiple data delete

    $("#delete_button_return").click(function(){

        $("#myModal_return").modal('show');

        });






        $("#final_delete_return").click(function(){

        var numberOfSubChecked = $('.sub_chk_return:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();


        $.ajax({
        url: "invoice_return_pagination_start_delete",
        method: 'GET',
        data: {numberOfSubChecked:numberOfSubChecked},
        success: function(data) {
            $("#myModal_return").modal('hide');
          $("#main_content_tabler").html('');
          $("#numberOfChecked").text('');
          $("#main_content_tabler").html(data.options);
        }
        });

        });




             //multiple data check
             $('#master_return').on('click', function(e) {

        if($(this).is(':checked',true))
        {

           $(".sub_chk_return").prop('checked', true);
         //check value length
         var numberOfChecked = $('.sub_chk_return:checked').length;
         //end check value length
         $('#active_button').prop('disabled', false);
         $('#inactive_button').prop('disabled', false);
         $('#delete_button_return').prop('disabled', false);
        } else {

           $(".sub_chk_return").prop('checked',false);

            //check value length
         var numberOfChecked = $('.sub_chk_return:checked').length;
         //end check value length
         $('#active_button').prop('disabled', true);
         $('#inactive_button').prop('disabled', true);
         $('#delete_button_return').prop('disabled', true);

        }

        $('#numberOfChecked_return').text(numberOfChecked);
        });

        //end multiple data check
        //single check data

        $(".sub_chk_return").change(function(){

           var numberOfSubChecked = $('.sub_chk_return:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();





           if(numberOfSubChecked.length == 0){
            $('#active_button').prop('disabled', true);
               $('#inactive_button').prop('disabled', true);
               $('#delete_button_return').prop('disabled', true);
           }else{
            $('#active_button').prop('disabled', false);
               $('#inactive_button').prop('disabled', false);
               $('#delete_button_return').prop('disabled', false);

           }

           $('#numberOfChecked_return').text(numberOfSubChecked.length);
        });
        //end single check data
});
