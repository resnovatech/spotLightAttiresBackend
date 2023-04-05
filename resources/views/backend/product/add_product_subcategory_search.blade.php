@foreach($final_result_search as $key=>$all_sub_cat)
                <li data-subcatname="{{ $all_sub_cat->sub_cat }}" id="subcategory_name{{ $key+1 }}" class="dynamic_subcat">{{ $all_sub_cat->sub_cat }}<span> <i class="bx bx-right-arrow-alt"></i> </span>
                </li>
                @endforeach


                <script>
                    $(document).ready(function () {

                //category from subcategory
                $("[id^=category_name]").click(function(){

                    var main_category_name = $(this).attr('data-catname');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_category_to_subcategory') }}",
                        method: 'GET',
                        data: {main_category_name:main_category_name},
                        success: function(data) {
                          $("#sub_cat_div_list").html('');
                          $("#sub_cat_div_list").html(data.options);
                        //   $("#selection_box_content").html('');
                        //   $("#selection_box_content").html(main_category_name);
                        }
                        });
                });

                //selection list
                $(".dynamic_cat").click(function(){
                    var data_type= 121;
                    var main_category_name = $(this).attr('data-catname');
                //alert(main_category_name);
                    $.ajax({
                        url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                        method: 'GET',
                        data: {main_category_name:main_category_name,data_type:data_type},
                        success: function(data) {
                          $("#selection_box_content1").html('');
                          $("#selection_box_content1").html(data.options);
                        }
                        });


                });
                //end slection list
                //category from subcategory end

                //subcategory to first child

                 //selection list
                 $(".dynamic_subcat").click(function(){
                    var data_type= 00;
                    var main_subcategory_name = $(this).attr('data-subcatname');

                    $.ajax({
                        url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                        method: 'GET',
                        data: {main_subcategory_name:main_subcategory_name,data_type:data_type},
                        success: function(data) {
                          $("#selection_box_content1").html('');
                          $("#selection_box_content1").html(data.options);
                        }
                        });
                });
                //end slection list

                $("[id^=subcategory_name]").click(function(){

                    var main_subcategory_name = $(this).attr('data-subcatname');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_subcategory_to_first_child') }}",
                        method: 'GET',
                        data: {main_subcategory_name:main_subcategory_name},
                        success: function(data) {
                          $("#sub_cat_div_list1").html('');
                          $("#sub_cat_div_list1").html(data.options);

                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");

                        }
                        });
                });

                //end subcategory to first child

                //child one start
                //selection list
                $(".dynamic_childone").click(function(){
                var data_type= 1;
                var main_childone_name = $(this).attr('data-childone');
                // alert(data_type);
                $.ajax({
                    url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                    method: 'GET',
                    data: {main_childone_name:main_childone_name,data_type:data_type},
                    success: function(data) {
                      $("#selection_box_content1").html('');
                      $("#selection_box_content1").html(data.options);
                    }
                    });
                });
                //end slection list

                $("[id^=childone_name]").click(function(){

                    var main_childone_name = $(this).attr('data-childone');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_first_child_to_second_child') }}",
                        method: 'GET',
                        data: {main_childone_name:main_childone_name},
                        success: function(data) {
                          $("#sub_cat_div_list2").html('');
                          $("#sub_cat_div_list2").html(data.options);

                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");
                        }
                        });
                });

                //end child one


                //child two start

                //selection list
                $(".dynamic_childtwo").click(function(){
                var data_type= 2;
                var main_childtwo_name = $(this).attr('data-childtwo');

                $.ajax({
                    url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                    method: 'GET',
                    data: {main_childtwo_name:main_childtwo_name,data_type:data_type},
                    success: function(data) {
                      $("#selection_box_content1").html('');
                      $("#selection_box_content1").html(data.options);


                    }
                    });
                });
                //end slection list
                $("[id^=childtwo_name]").click(function(){

                    var main_childtwo_name = $(this).attr('data-childtwo');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_second_child_to_third_child') }}",
                        method: 'GET',
                        data: {main_childtwo_name:main_childtwo_name},
                        success: function(data) {
                          $("#sub_cat_div_list3").html('');
                          $("#sub_cat_div_list3").html(data.options);


                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");


                        }
                        });
                });

                //end child two


                //child three start
                //selection list
                $(".dynamic_childthree").click(function(){
                var data_type= 3;
                var main_childthree_name = $(this).attr('data-childthree');

                $.ajax({
                    url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                    method: 'GET',
                    data: {main_childthree_name:main_childthree_name,data_type:data_type},
                    success: function(data) {
                      $("#selection_box_content1").html('');
                      $("#selection_box_content1").html(data.options);
                    }
                    });
                });
                //end slection list
                $("[id^=childthree_name]").click(function(){

                    var main_childthree_name = $(this).attr('data-childthree');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_third_child_to_fourth_child') }}",
                        method: 'GET',
                        data: {main_childthree_name:main_childthree_name},
                        success: function(data) {
                          $("#sub_cat_div_list4").html('');
                          $("#sub_cat_div_list4").html(data.options);

                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");
                        }
                        });
                });

                //child three end


                //child four start
                //selection list
                $(".dynamic_childfour").click(function(){
                var data_type= 4;
                var main_childfour_name = $(this).attr('data-childfour');

                $.ajax({
                    url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                    method: 'GET',
                    data: {main_childfour_name:main_childfour_name,data_type:data_type},
                    success: function(data) {
                      $("#selection_box_content1").html('');
                      $("#selection_box_content1").html(data.options);
                    }
                    });
                });
                //end slection list
                $("[id^=childfour_name]").click(function(){

                    var main_childfour_name = $(this).attr('data-childfour');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_fourth_child_to_fifth_child') }}",
                        method: 'GET',
                        data: {main_childfour_name:main_childfour_name},
                        success: function(data) {
                          $("#sub_cat_div_list5").html('');
                          $("#sub_cat_div_list5").html(data.options);

                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");
                        }
                        });
                });
                //child four end


                //child five start
                //selection list
                $(".dynamic_childfive").click(function(){
                var data_type= 5;
                var main_childfive_name = $(this).attr('data-childfive');

                $.ajax({
                    url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                    method: 'GET',
                    data: {main_childfive_name:main_childfive_name,data_type:data_type},
                    success: function(data) {
                      $("#selection_box_content1").html('');
                      $("#selection_box_content1").html(data.options);
                    }
                    });
                });
                //end slection list
                $("[id^=childfive_name]").click(function(){

                    var main_childfive_name = $(this).attr('data-childfive');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_fifth_child_to_sixth_child') }}",
                        method: 'GET',
                        data: {main_childfive_name:main_childfive_name},
                        success: function(data) {
                          $("#sub_cat_div_list6").html('');
                          $("#sub_cat_div_list6").html(data.options);

                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");
                        }
                        });
                });
                //child five end

                //child six start
                //selection list
                $(".dynamic_childsix").click(function(){
                var data_type= 6;
                var main_childsix_name = $(this).attr('data-childsix');

                $.ajax({
                    url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                    method: 'GET',
                    data: {main_childsix_name:main_childsix_name,data_type:data_type},
                    success: function(data) {
                      $("#selection_box_content1").html('');
                      $("#selection_box_content1").html(data.options);
                    }
                    });
                });
                //end slection list
                $("[id^=childsix_name]").click(function(){

                    var main_childsix_name = $(this).attr('data-childsix');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_sixth_child_to_seven_child') }}",
                        method: 'GET',
                        data: {main_childsix_name:main_childsix_name},
                        success: function(data) {
                          $("#sub_cat_div_list7").html('');
                          $("#sub_cat_div_list7").html(data.options);

                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");
                        }
                        });
                });
                //child six end

                //child seven start
                //selection list
                $(".dynamic_childseven").click(function(){

                var main_childseven_name = $(this).attr('data-childseven');
                var data_type= 7;

                $.ajax({
                    url: "{{ route('slection_list_from_cat_to_eight_child') }}",
                    method: 'GET',
                    data: {main_childseven_name:main_childseven_name,data_type:data_type},
                    success: function(data) {
                      $("#selection_box_content1").html('');
                      $("#selection_box_content1").html(data.options);
                    }
                    });

                });
                //end slection list
                $("[id^=childseven_name]").click(function(){

                    var main_childseven_name = $(this).attr('data-childseven');

                    //alert(main_category_name);


                    $.ajax({
                        url: "{{ route('from_seven_child_to_eight_child') }}",
                        method: 'GET',
                        data: {main_childseven_name:main_childseven_name},
                        success: function(data) {
                          $("#sub_cat_div_list8").html('');
                          $("#sub_cat_div_list8").html(data.options);

                          event.preventDefault();
                          $('#mainchil').animate({
                            scrollLeft: "+=300px"
                          }, "slow");
                        }
                        });
                });
                //child seven end

                //cofirm button

                $("#confirm_button_p_cat").click(function(){

                    var final_value = $("#get_the_text_value").text();

                    //alert(final_value);
                    $("#final_category_list").val(final_value);

                    $(".custom_select_menu").hide();


                });
                //cofirm button

                //clear button
                $("#cancel_button_p_cat").click(function(){


                    $("#sub_cat_div_list8").html('');
                    $("#sub_cat_div_list7").html('');
                    $("#sub_cat_div_list6").html('');
                    $("#sub_cat_div_list5").html('');
                    $("#sub_cat_div_list4").html('');
                    $("#sub_cat_div_list3").html('');
                    $("#sub_cat_div_list2").html('');
                    $("#sub_cat_div_list1").html('');
                    $("#sub_cat_div_list").html('');
                    // $("#sub_cat_div_list8").html('');

                    $("#selection_box_content1").html('');

                });
                //clear button

                //category search
                $('#add_product_category_search').on('keyup', function () {

                    var data_type= 121;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_category_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list").html('');
                          $("#add_product_category_search_list").html(data.options);
                        }
                        });
                });

                //end category search

                //subcategory search
                $('#add_product_subcategory_search').on('keyup', function () {

                    var data_type= 00;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_subcategory_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list1").html('');
                          $("#add_product_category_search_list1").html(data.options);
                        }
                        });
                });
                //end subcategory search


                //child one search
                $('#add_product_childone_search').on('keyup', function () {

                    var data_type= 1;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_childone_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list2").html('');
                          $("#add_product_category_search_list2").html(data.options);
                        }
                        });
                });
                //child one search end


                //child two search
                $('#add_product_childtwo_search').on('keyup', function () {

                    var data_type= 2;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_childtwo_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list3").html('');
                          $("#add_product_category_search_list3").html(data.options);
                        }
                        });
                });
                //child two search end


                //child three search
                $('#add_product_childthree_search').on('keyup', function () {

                    var data_type= 3;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_childthree_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list4").html('');
                          $("#add_product_category_search_list4").html(data.options);
                        }
                        });
                });
                //child three search end

                //child four search
                $('#add_product_childfour_search').on('keyup', function () {

                    var data_type= 4;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_childfour_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list5").html('');
                          $("#add_product_category_search_list5").html(data.options);
                        }
                        });
                });
                //child four search end

                //child five search
                $('#add_product_childfive_search').on('keyup', function () {

                    var data_type= 5;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_childfive_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list6").html('');
                          $("#add_product_category_search_list6").html(data.options);
                        }
                        });
                });
                //child five search end

                //child six search
                $('#add_product_childsix_search').on('keyup', function () {

                    var data_type= 6;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_childsix_search') }}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list7").html('');
                          $("#add_product_category_search_list7").html(data.options);
                        }
                        });
                });
                //child six search end

                //child seven search
                $('#add_product_childseven_search').on('keyup', function () {
                    var data_type= 7;
                    var search_value = $(this).val();

                    $.ajax({
                        url: "{{ route('add_product_childseven_search')}}",
                        method: 'GET',
                        data: {search_value:search_value,data_type:data_type},
                        success: function(data) {
                          $("#add_product_category_search_list8").html('');
                          $("#add_product_category_search_list8").html(data.options);
                        }
                        });
                });
                //chils seven search end

                //child eight search
                // $('#add_product_childeight_search').on('keyup', function () {
                //     var data_type= 8;
                // });
                //child eight search end


                });

                </script>
