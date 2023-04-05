$(document).ready(function () {

    //search bar work

   $('#search_on_cat_name').on('keyup', function () {

    var search_value = $(this).val();

    $.ajax({
    url: "unit_search_ajax",
    type: "GET",
    data: {search_value:search_value},
    success: function (data) {

        $("#main_content_table").html('');
        $('#main_content_table').html(data.options);

    }
});

});
    //mutiple data delete

    $("#delete_button").click(function(){

$("#myModal").modal('show');

});






$("#final_delete").click(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();


$.ajax({
url: "unit_ajax_multiple_delete",
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

$("#inactive_button").click(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();

if(numberOfSubChecked.length == 0){

alert("Please select row.");
}else{

alert('Are You Sure ?');

$.ajax({
url: "unit_ajax_multiple_select",
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
url: "unit_ajax_multiple_select_active",
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
//end single check data

    //slug code start


    $('#a_name').on('change', function () {
        var main_value = $(this).val();

        var final_result = main_value.toLowerCase()
                     .replace(/ /g, '-')
                     .replace(/[^\w-]+/g, '');

        //alert(final_result);

        $('#a_slug').val(final_result);

        });

        //from edit attribute

        $("[id^=a_name]").on('change', function () {

            var main_id = $(this).attr('id');
            var result = main_id.slice(6);
            var main_value = $(this).val();

           // alert(main_value);


            var final_result = main_value.toLowerCase()
                     .replace(/ /g, '-')
                     .replace(/[^\w-]+/g, '');

        //alert(final_result);

        $('#a_slug'+result).val(final_result);

        });

    //end slug code

     //pagination stated

  $("[id^=page_link]").click(function(){


    var main_id = $(this).attr('id');
    var id_for_pass = main_id.slice(9);
    //alert(id_for_pass);

    //var token = $("input[name='_token']").val();
    $.ajax({
    url: "unit_pagi_ajax",
    method: 'GET',
    data: {id_for_pass:id_for_pass},
    success: function(data) {
      $("#main_content_table").html('');
      $("#main_content_table").html(data.options);
    }
    });

    });

    //next page button
    $("#npage_link").click(function(){

    var id_for_pass = 2;

    $.ajax({
    url: "unit_pagi_ajax",
    method: 'GET',
    data: {id_for_pass:id_for_pass},
    success: function(data) {
      $("#main_content_table").html('');
      $("#main_content_table").html(data.options);
    }
    });

    });
});
