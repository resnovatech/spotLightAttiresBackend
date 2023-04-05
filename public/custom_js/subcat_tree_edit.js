$(document).ready(function () {

    //sub cat delete


    $("[id^=tedit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
       // alert(11);

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });



    });




    //end sub cat delete



     //sub child one delete
     $("[id^=c1edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });

    });

    //end child one delete



     //child two delete

     $("[id^=c2edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });

    });
    //end child two delete


     // child three delete
     $("[id^=c3edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });

    });

    //end child three delete

    // child four delete
    $("[id^=c4edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });

    });

    //end child four delete


    // child five delete
    $("[id^=c5edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });


    });

    //end child five delete


    // child six delete
    $("[id^=c6edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });


    });

    //end child six delete


    // child seven delete
    $("[id^=c7edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });

    });

    //end child seven delete


    // child eight delete
    $("[id^=c8edit_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_edit",
            method: 'GET',
            data: {data_type:data_type,data_name:data_name},
            success: function(data) {
              $("#add_and_edit_form_with_ajax").html('');
              $("#add_and_edit_form_with_ajax").html(data);

              //new code
              $('html, body').animate({
                scrollTop: $("#add_and_edit_form_with_ajax").offset().top
            }, 10);


              //new code
            }
        });

    });

    //end child eight delete
});
