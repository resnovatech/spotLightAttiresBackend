$(document).ready(function () {
    $("[id^=apage_link]").click(function(){


        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(10);
        //alert(id_for_pass);

        // var token = $("input[name='_token']").val();
        $.ajax({
        url: "animation_category_pagination_start",
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
        url: "animation_category_pagination_start",
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
        url: "animation_category_pagination_start",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
        });

        });
        //end previous button
});
