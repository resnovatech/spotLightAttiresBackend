$(document).ready(function () {




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


 //pagination stated

 $("[id^=page_link]").click(function(){

   var search_value = $('#search_value').val();
var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(9);
//alert(id_for_pass);

//var token = $("input[name='_token']").val();
$.ajax({
url: "brand_search_ajax_part2",
method: 'GET',
data: {id_for_pass:id_for_pass,search_value:search_value},
success: function(data) {
 $("#main_content_table").html('');
 $("#main_content_table").html(data.options);
}
});

});

//next page button
$("#npage_link").click(function(){
   var search_value = $('#search_value').val();
var id_for_pass = 2;

$.ajax({
url: "brand_search_ajax_part2",
method: 'GET',
data: {id_for_pass:id_for_pass,search_value:search_value},
success: function(data) {
 $("#main_content_table").html('');
 $("#main_content_table").html(data.options);
}
});

});


});
