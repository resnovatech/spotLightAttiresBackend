$(document).ready(function () {

  // inactive + active + delete button work

   //multiple data check
   $('#master').on('click', function(e) {

    if($(this).is(':checked',true))
    {

       $(".sub_chk").prop('checked', true);
     //check value length
     var numberOfChecked = $('.sub_chk:checked').length;
     //end check value length
     $('#active_button').prop('disabled', false);
     $('#inactive_button').prop('disabled', false);
     $('#delete_button').prop('disabled', false);
    } else {

       $(".sub_chk").prop('checked',false);

        //check value length
     var numberOfChecked = $('.sub_chk:checked').length;
     //end check value length
     $('#active_button').prop('disabled', true);
     $('#inactive_button').prop('disabled', true);
     $('#delete_button').prop('disabled', true);

    }

    $('#numberOfChecked').text(numberOfChecked);
    });

    //end multiple data check
    //single check data

    $(".sub_chk").change(function(){

       var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();





       if(numberOfSubChecked.length == 0){
        $('#active_button').prop('disabled', true);
           $('#inactive_button').prop('disabled', true);
           $('#delete_button').prop('disabled', true);
       }else{
        $('#active_button').prop('disabled', false);
           $('#inactive_button').prop('disabled', false);
           $('#delete_button').prop('disabled', false);

       }

       $('#numberOfChecked').text(numberOfSubChecked.length);
    });


  // end  inactive +active + delete button work


  $("#inactive_button").click(function(){

    var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();

    if(numberOfSubChecked.length == 0){

    alert("Please select row.");
    }else{

    alert('Are You Sure ?');

    $.ajax({
    url: "product_list_all_inactive",
    method: 'GET',
    data: {numberOfSubChecked:numberOfSubChecked},
    success: function(data) {
       // $("#myModal").modal('hide');
      $("#main_content_table").html('');
      $("#main_content_table").html(data.options);
    }
    });

    }

    });


    //end multiple data delete

    //multiple data active status

    $("#active_button").click(function(){

    var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();

    if(numberOfSubChecked.length == 0){

    alert("Please select row.");
    }else{

    alert('Are You Sure ?');

    $.ajax({
    url: "product_list_all_active",
    method: 'GET',
    data: {numberOfSubChecked:numberOfSubChecked},
    success: function(data) {
       // $("#myModal").modal('hide');
      $("#main_content_table").html('');
      $("#main_content_table").html(data.options);
    }
    });

    }

    });

    //end multiple data active status

    //mutiple data delete

    $("#delete_button").click(function(){

        $("#myModal").modal('show');

        });






        $("#final_delete").click(function(){

        var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
        return $(ele).val();
        }).get();


        $.ajax({
        url: "product_list_all_delete",
        method: 'GET',
        data: {numberOfSubChecked:numberOfSubChecked},
        success: function(data) {
            $("#myModal").modal('hide');
          $("#main_content_table").html('');
          $("#numberOfChecked").text('');
          $("#main_content_table").html(data.options);
        }
        });

        });

});
