$(document).ready(function () {

    $("[id^=page_link]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(9);
        //alert(id_for_pass);

        var order_id = $('#order_id').val();
        var customer_name = $('#customer_name').val();
        var delivery_status = $('#delivery_status').val();
        var end = $('#end').val();
        var start = $('#start').val();

        //var token = $("input[name='_token']").val();
        $.ajax({
        url: "invoice_filter_from_list_ajax",
        method: 'GET',
        data: {start:start,end:end,id_for_pass:id_for_pass,order_id:order_id,customer_name:customer_name,delivery_status:delivery_status},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
        });

        });

        //next page button
        $("#npage_link").click(function(){

        var id_for_pass = 2;
        var order_id = $('#order_id').val();
        var customer_name = $('#customer_name').val();
        var delivery_status = $('#delivery_status').val();
        var end = $('#end').val();
        var start = $('#start').val();

        $.ajax({
        url: "invoice_filter_from_list_ajax",
        method: 'GET',
        data: {start:start,end:end,id_for_pass:id_for_pass,order_id:order_id,customer_name:customer_name,delivery_status:delivery_status},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
        });

        });


        $("[id^=apage_link]").click(function(){

            var order_id = $('#order_id').val();
        var customer_name = $('#customer_name').val();
        var delivery_status = $('#delivery_status').val();
        var end = $('#end').val();
        var start = $('#start').val();
        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(10);
        //alert(id_for_pass);

        // var token = $("input[name='_token']").val();
        $.ajax({
        url: "invoice_filter_from_list_ajax",
        method: 'GET',
        data: {start:start,end:end,id_for_pass:id_for_pass,order_id:order_id,customer_name:customer_name,delivery_status:delivery_status},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
        });

        });

        //next button
        $("[id^=napage_link]").click(function(){
            var order_id = $('#order_id').val();
        var customer_name = $('#customer_name').val();
        var delivery_status = $('#delivery_status').val();
        var end = $('#end').val();
        var start = $('#start').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(11);
        var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

        // alert(id_for_pass);

        $.ajax({
        url: "invoice_filter_from_list_ajax",
        method: 'GET',
        data: {start:start,end:end,id_for_pass:id_for_pass,order_id:order_id,customer_name:customer_name,delivery_status:delivery_status},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
        });

        });
        //end next button


        //previous button
        $("[id^=papage_link]").click(function(){
            var order_id = $('#order_id').val();
        var customer_name = $('#customer_name').val();
        var delivery_status = $('#delivery_status').val();
        var end = $('#end').val();
        var start = $('#start').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(11);
        var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

        // alert(id_for_pass);

        $.ajax({
        url: "invoice_filter_from_list_ajax",
        method: 'GET',
        data: {start:start,end:end,id_for_pass:id_for_pass,order_id:order_id,customer_name:customer_name,delivery_status:delivery_status},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
        });

        });
        //end previous button
});
