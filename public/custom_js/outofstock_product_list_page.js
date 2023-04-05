$(document).ready(function () {

    //first page code

    $("[id^=page_link_outOfStock]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_outOfStock = main_id.slice(20);
        //alert(id_for_pass_outOfStock);

        //var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_outOfStock",
        method: 'GET',
        data: {id_for_pass_outOfStock:id_for_pass_outOfStock},
        success: function(data) {
          $("#main_content_table_outOfStock").html('');
          $("#main_content_table_outOfStock").html(data.options);
        }
    });

    });

    //next page button
    $("#npage_link_outOfStock").click(function(){

        var id_for_pass_outOfStock = 2;

        $.ajax({
        url: "product_list_all_outOfStock",
        method: 'GET',
        data: {id_for_pass_outOfStock:id_for_pass_outOfStock},
        success: function(data) {
          $("#main_content_table_outOfStock").html('');
          $("#main_content_table_outOfStock").html(data.options);
        }
    });

    });

    //end next button

    //end first page code

    //ajax first page code


    $("[id^=apage_link_outOfStock]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass_outOfStock = main_id.slice(21);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "product_list_all_outOfStock",
        method: 'GET',
        data: {id_for_pass_outOfStock:id_for_pass_outOfStock},
        success: function(data) {
          $("#main_content_table_outOfStock").html('');
          $("#main_content_table_outOfStock").html(data.options);
        }
    });

    });

    //next button
    $("[id^=napage_link_outOfStock]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(22);
        var id_for_pass_outOfStock = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_outOfStock",
        method: 'GET',
        data: {id_for_pass_outOfStock:id_for_pass_outOfStock},
        success: function(data) {
          $("#main_content_table_outOfStock").html('');
          $("#main_content_table_outOfStock").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=papage_link_outOfStock]").click(function(){

        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(22);
        var id_for_pass_outOfStock = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "product_list_all_outOfStock",
        method: 'GET',
        data: {id_for_pass_outOfStock:id_for_pass_outOfStock},
        success: function(data) {
          $("#main_content_table_outOfStock").html('');
          $("#main_content_table_outOfStock").html(data.options);
        }
    });

});
    //end previous button


    //end ajax first page code


    ///////////////////////////

});
