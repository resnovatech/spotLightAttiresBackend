$(document).ready(function () {

     // cat delete


     $("[id^=cat_add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $.ajax({
            url: "show_child_for_add",
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




    //end  cat delete

    //sub cat delete


    $("[id^=add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $.ajax({
            url: "show_child_for_add",
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
     $("[id^=c1add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_add",
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

     $("[id^=c2add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_add",
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
     $("[id^=c3add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_add",
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
    $("[id^=c4add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $.ajax({
            url: "show_child_for_add",
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
    $("[id^=c5add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $.ajax({
            url: "show_child_for_add",
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
    $("[id^=c6add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');

        $.ajax({
            url: "show_child_for_add",
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
    $("[id^=c7add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $.ajax({
            url: "show_child_for_add",
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
    $("[id^=c8add_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $.ajax({
            url: "show_child_for_add",
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
