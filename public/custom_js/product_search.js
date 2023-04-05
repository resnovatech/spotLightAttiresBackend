$(document).ready(function () {


    //all product search

    $("#all_product_search_button").click(function(){


        var product_sku = $('#all_p_sku').val();
        var product_name = $('#all_p_name').val();
        var brand_name = $('#all_brand_name').val();
        var product_category = $('#all_p_category').val();


        $.ajax({
            url: "search_from_all_product",
            method: 'GET',
            data: {product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
            success: function(data) {

              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
            });

    });


    //end all product search


    //online product search

    $("#online_product_search_button").click(function(){


        var product_sku = $('#online_p_sku').val();
        var product_name = $('#online_p_name').val();
        var brand_name = $('#online_brand_name').val();
        var product_category = $('#online_p_category').val();

        $.ajax({
            url: "search_from_online_product",
            method: 'GET',
            data: {product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
            success: function(data) {

              $("#main_content_table_online").html('');
              $("#main_content_table_online").html(data.options);
            }
            });

    });


    //end online product seaech


    $("[id^=search_normal_page_link]").click(function(){

        var product_sku = $('#all_p_sku').val();
        var product_name = $('#all_p_name').val();
        var brand_name = $('#all_brand_name').val();
        var product_category = $('#all_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass_all = main_id.slice(23);
        //alert(id_for_pass);

        //var token = $("input[name='_token']").val();
    $.ajax({
        url: "ajax_search_for_all_product",
        method: 'GET',
        data: {id_for_pass_all:id_for_pass_all,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });

    //normal next page button
    $("#search_normal_npage_link").click(function(){
        var product_sku = $('#all_p_sku').val();
        var product_name = $('#all_p_name').val();
        var brand_name = $('#all_brand_name').val();
        var product_category = $('#all_p_category').val();
        var id_for_pass_all = 2;

        $.ajax({
        url: "ajax_search_for_all_product",
        method: 'GET',
        data: {id_for_pass_all:id_for_pass_all,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });

    //normal end next button


    $("[id^=search_normal_apage_link]").click(function(){

        var product_sku = $('#all_p_sku').val();
        var product_name = $('#all_p_name').val();
        var brand_name = $('#all_brand_name').val();
        var product_category = $('#all_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass_all = main_id.slice(24);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "ajax_search_for_all_product",
        method: 'GET',
        data: {id_for_pass_all:id_for_pass_all,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });

    //next button
    $("[id^=search_normal_napage_link]").click(function(){
        var product_sku = $('#all_p_sku').val();
        var product_name = $('#all_p_name').val();
        var brand_name = $('#all_brand_name').val();
        var product_category = $('#all_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(25);
        var id_for_pass_all = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "ajax_search_for_all_product",
        method: 'GET',
        data: {id_for_pass_all:id_for_pass_all,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=search_normal_papage_link]").click(function(){
        var product_sku = $('#all_p_sku').val();
        var product_name = $('#all_p_name').val();
        var brand_name = $('#all_brand_name').val();
        var product_category = $('#all_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(25);
        var id_for_pass_all = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "ajax_search_for_all_product",
        method: 'GET',
        data: {id_for_pass_all:id_for_pass_all,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

});
    //end previous button



    /////online product ///////////////////


    $("[id^=search_online_page_link]").click(function(){

        var product_sku = $('#online_p_sku').val();
        var product_name = $('#online_p_name').val();
        var brand_name = $('#online_brand_name').val();
        var product_category = $('#online_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass_online = main_id.slice(23);
        //alert(id_for_pass);

        //var token = $("input[name='_token']").val();
    $.ajax({
        url: "ajax_search_for_online_product",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });

    //online next page button
    $("#search_online_npage_link").click(function(){
        var product_sku = $('#online_p_sku').val();
        var product_name = $('#online_p_name').val();
        var brand_name = $('#online_brand_name').val();
        var product_category = $('#online_p_category').val();
        var id_for_pass_online = 2;

        $.ajax({
        url: "ajax_search_for_online_product",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });

    //online end next button


    $("[id^=search_online_apage_link]").click(function(){

        var product_sku = $('#online_p_sku').val();
        var product_name = $('#online_p_name').val();
        var brand_name = $('#online_brand_name').val();
        var product_category = $('#online_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass_online = main_id.slice(24);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "ajax_search_for_online_product",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });

    //next button
    $("[id^=search_online_napage_link]").click(function(){
        var product_sku = $('#online_p_sku').val();
        var product_name = $('#online_p_name').val();
        var brand_name = $('#online_brand_name').val();
        var product_category = $('#online_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(25);
        var id_for_pass_online = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "ajax_search_for_online_product",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=search_online_papage_link]").click(function(){
        var product_sku = $('#online_p_sku').val();
        var product_name = $('#online_p_name').val();
        var brand_name = $('#online_brand_name').val();
        var product_category = $('#online_p_category').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(25);
        var id_for_pass_online = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "ajax_search_for_online_product",
        method: 'GET',
        data: {id_for_pass_online:id_for_pass_online,product_sku:product_sku,product_name:product_name,brand_name:brand_name,product_category:product_category},
        success: function(data) {
          $("#main_content_table_online").html('');
          $("#main_content_table_online").html(data.options);
        }
    });

});
    //end previous button



});
