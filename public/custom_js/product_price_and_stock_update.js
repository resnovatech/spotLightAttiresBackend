$(document).ready(function () {

    $("[id^=productPriceUpdate]").click(function(){

        var product_id_for_price_update = $(this).attr('data-productId');

        $.ajax({
            url: "show_product_price_list",
            method: 'GET',
            data: {product_id_for_price_update:product_id_for_price_update},
            success: function(data) {
                $("#product_price_update_modal").modal('show');
              $("#product_price_update_result").html('');
              $("#product_price_update_result").html(data.options);
            }
            });

    });

    $("[id^=productQuantityUpdate]").click(function(){

        var product_id_for_quantity_update = $(this).attr('data-productId');

        


        $.ajax({
            url: "show_product_quantity_list",
            method: 'GET',
            data: {product_id_for_quantity_update:product_id_for_quantity_update},
            success: function(data) {
                $("#product_quantity_update_modal").modal('show');
              $("#product_quantity_update_result").html('');
              $("#product_quantity_update_result").html(data.options);
            }
            });

    });


});
