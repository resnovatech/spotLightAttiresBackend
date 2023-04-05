$(document).ready(function () {

    //first page code

    $("[id^=page_link_online]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_online = main_id.slice(16);
        //alert(id_for_pass_online);

        //var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_online",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });

    //next page button
    $("#npage_link_online").click(function(){

        var id_for_pass_online = 2;

        $.ajax({
        url: "product_list_all_online",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });

    //end next button

    //end first page code

    //ajax first page code


    $("[id^=apage_link_online]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_online = main_id.slice(17);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_online",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });

    //next button
    $("[id^=napage_link_online]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(18);
        var id_for_pass_online = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_online",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=papage_link_online]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(18);
        var id_for_pass_online = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_online",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

});
    //end previous button


    //end ajax first page code


    ///////////////////////////


    // inactive + active + delete button work

   //multiple data check
   $('#online_master').on('click', function(e) {

    if($(this).is(':checked',true))
    {

       $(".online_sub_chk").prop('checked', true);
     //check value length
     var numberOfChecked = $('.online_sub_chk:checked').length;
     //end check value length
     $('#online_active_button').prop('disabled', false);
     $('#online_inactive_button').prop('disabled', false);
     $('#online_delete_button').prop('disabled', false);
    } else {

       $(".online_sub_chk").prop('checked',false);

        //check value length
     var numberOfChecked = $('.online_sub_chk:checked').length;
     //end check value length
     $('#online_active_button').prop('disabled', true);
     $('#online_inactive_button').prop('disabled', true);
     $('#online_delete_button').prop('disabled', true);

    }

    $('#online_numberOfChecked').text(numberOfChecked);
    });

    //end multiple data check
    //single check data

    $(".online_sub_chk").change(function(){

       var numberOfSubChecked = $('.online_sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();





       if(numberOfSubChecked.length == 0){
        $('#online_active_button').prop('disabled', true);
           $('#online_inactive_button').prop('disabled', true);
           $('#online_delete_button').prop('disabled', true);
       }else{
          $('#online_active_button').prop('disabled', false);
           $('#online_inactive_button').prop('disabled', false);
           $('#online_delete_button').prop('disabled', false);

       }

       $('#online_numberOfChecked').text(numberOfSubChecked.length);
    });


  // end  inactive +active + delete button work


  $("#online_inactive_button").click(function(){

    var numberOfSubChecked = $('.online_sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();

    if(numberOfSubChecked.length == 0){

    alert("Please select row.");
    }else{

    alert('Are You Sure ?');

    $.ajax({
    url: "product_list_all_inactive_online",
    method: 'GET',
    data: {numberOfSubChecked:numberOfSubChecked},
    success: function(data) {
       // $("#myModal").modal('hide');
      $("#main_content_table_online").html('');
      $("#main_content_table_online").html(data.options);
    }
    });

    }

    });


    //end multiple data delete

    //multiple data active status

    $("#online_active_button").click(function(){

    var numberOfSubChecked = $('.online_sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();

    if(numberOfSubChecked.length == 0){

    alert("Please select row.");
    }else{

    alert('Are You Sure ?');

    $.ajax({
    url: "product_list_all_active_online",
    method: 'GET',
    data: {numberOfSubChecked:numberOfSubChecked},
    success: function(data) {
       // $("#myModal").modal('hide');
      $("#main_content_table_online").html('');
      $("#main_content_table_online").html(data.options);
    }
    });

    }

    });

    //end multiple data active status

    //mutiple data delete

    $("#online_delete_button").click(function(){

        $("#myModal_online").modal('show');

        });






        $("#online_final_delete").click(function(){

        var numberOfSubChecked = $('.online_sub_chk:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();


        $.ajax({
        url: "product_list_all_delete_online",
        method: 'GET',
        data: {numberOfSubChecked:numberOfSubChecked},
        success: function(data) {
            $("#myModal_online").modal('hide');
          $("#main_content_table_online").html('');
          $("#online_numberOfChecked").text('');
          $("#main_content_table_online").html(data.options);
        }
        });

        });



    ///////////////////////////////


});
