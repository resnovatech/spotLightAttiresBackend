$(document).ready(function () {

    //sub cat delete


    $("[id^=delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    $(".close1").click(function(){
        $("#myModal1").modal('hide');
    });


    //end sub cat delete



     //sub child one delete
     $("[id^=c1delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    //end child one delete



     //child two delete

     $("[id^=c2delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });
    //end child two delete


     // child three delete
     $("[id^=c3delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    //end child three delete

    // child four delete
    $("[id^=c4delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    //end child four delete


    // child five delete
    $("[id^=c5delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    //end child five delete


    // child six delete
    $("[id^=c6delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    //end child six delete


    // child seven delete
    $("[id^=c7delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    //end child seven delete


    // child eight delete
    $("[id^=c8delete_data_with_ajax]").click(function(){
        var data_name= $(this).attr('data-name');
        var data_type= $(this).attr('data-type');
        $("#myModal1").modal('show');

        $("#show_cat_tree").text(data_name);
         $("#show_cat_tree1").val(data_name);
         $("#show_cat_tree_type").val(data_type);


    });

    //end child eight delete
});
