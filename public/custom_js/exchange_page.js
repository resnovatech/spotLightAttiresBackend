$(document).ready(function () {

    $("[id^=page_linkex]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(11);
        //alert(id_for_pass);

        //var token = $("input[name='_token']").val();
        $.ajax({
        url: "exchange_list_pagination_start",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_tableex").html('');
          $("#main_content_tableex").html(data.options);
        }
        });

        });

        //next page button
        $("#npage_linkex").click(function(){

        var id_for_pass = 2;

        $.ajax({
        url: "exchange_list_pagination_start",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_tableex").html('');
          $("#main_content_tableex").html(data.options);
        }
        });

        });


        $("[id^=apage_linkex]").click(function(){


            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(12);
            //alert(id_for_pass);

            // var token = $("input[name='_token']").val();
            $.ajax({
            url: "exchange_list_pagination_start",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tableex").html('');
              $("#main_content_tableex").html(data.options);
            }
            });

            });

            //next button
            $("[id^=napage_linkex]").click(function(){

            var main_id = $(this).attr('id');
            var id_for_pass1 = main_id.slice(13);
            var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

            // alert(id_for_pass);

            $.ajax({
            url: "exchange_list_pagination_start",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tableex").html('');
              $("#main_content_tableex").html(data.options);
            }
            });

            });
            //end next button


            //previous button
            $("[id^=papage_linkex]").click(function(){

            var main_id = $(this).attr('id');
            var id_for_pass1 = main_id.slice(13);
            var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

            // alert(id_for_pass);

            $.ajax({
            url: "exchange_list_pagination_start",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_tableex").html('');
              $("#main_content_tableex").html(data.options);
            }
            });

            });
            //end previous button



            //mutiple data delete

    $("#delete_button_exchage").click(function(){

        $("#myModal_exchage").modal('show');

        });






        $("#final_delete_exchage").click(function(){

        var numberOfSubChecked = $('.sub_chk_exchage:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();


        $.ajax({
        url: "exchange_list_pagination_start_delete",
        method: 'GET',
        data: {numberOfSubChecked:numberOfSubChecked},
        success: function(data) {
            $("#myModal_exchage").modal('hide');
          $("#main_content_tableex").html('');
          $("#numberOfChecked").text('');
          $("#main_content_tableex").html(data.options);
        }
        });

        });




             //multiple data check
             $('#master_exchage').on('click', function(e) {

        if($(this).is(':checked',true))
        {

           $(".sub_chk_exchage").prop('checked', true);
         //check value length
         var numberOfChecked = $('.sub_chk_exchage:checked').length;
         //end check value length
         $('#active_button').prop('disabled', false);
         $('#inactive_button').prop('disabled', false);
         $('#delete_button_exchage').prop('disabled', false);
        } else {

           $(".sub_chk_exchage").prop('checked',false);

            //check value length
         var numberOfChecked = $('.sub_chk_exchage:checked').length;
         //end check value length
         $('#active_button').prop('disabled', true);
         $('#inactive_button').prop('disabled', true);
         $('#delete_button_exchage').prop('disabled', true);

        }

        $('#numberOfChecked_exchage').text(numberOfChecked);
        });

        //end multiple data check
        //single check data

        $(".sub_chk_exchage").change(function(){

           var numberOfSubChecked = $('.sub_chk_exchage:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();





           if(numberOfSubChecked.length == 0){
            $('#active_button').prop('disabled', true);
               $('#inactive_button').prop('disabled', true);
               $('#delete_button_exchage').prop('disabled', true);
           }else{
            $('#active_button').prop('disabled', false);
               $('#inactive_button').prop('disabled', false);
               $('#delete_button_exchage').prop('disabled', false);

           }

           $('#numberOfChecked_exchage').text(numberOfSubChecked.length);
        });
        //end single check data
});
