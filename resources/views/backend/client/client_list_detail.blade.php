 <h5 class="card-title mt-0">Name: <input type="hidden" class="form-control" value="{{ $ajax_client_list->name }}"/>{{ $ajax_client_list->name }}</h5>
                                    <p class="card-text">Phone Number: <input type="hidden" class="form-control" value="{{ $ajax_client_list->phone }}" />{{ $ajax_client_list->phone }}<br>
                                        Email: <input type="hidden" class="form-control" value="{{ $ajax_client_list->email }}"/>{{ $ajax_client_list->email }}<br>
                                        <span > <input type="hidden" id="v_address" class="form-control" value="{{ $ajax_client_list->address }}"/></span><span id="r_address">{{ $ajax_client_list->address }}</span></p>


                                        <a data-cslug="{{ $ajax_client_list->slug }}" class="card-link" id="edit_client_main_addresss"> Edit Address <i class="mdi mdi-pencil me-1"></i></a>



<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Main Address Info</h5>
                <button type="button" class="btn btn-danger closee" >&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div id="show_data_for_client_edit">

                    </div>

                </div>
                <div class="mt-5">
                    <a class="btn btn-primary w-md waves-effect waves-light"  id="update_client_info">update</a>
                </div>

            </div>

        </div>
    </div>
</div>




<script>
                                            $(document).ready(function (){



                                                $("#update_client_info").click(function () {

                                            var update_address_value = $('#update_address_value').val();

                                            $('#r_address').text('');
                                            $('#r_address').text('Address:'+update_address_value);

                                            $('#v_address').val('');
                                            $('#v_address').val(update_address_value);



                                            $("#myModal").modal('hide');

                                            //alert(update_address_value);

                                                });


                                                $("#edit_client_main_addresss").click(function () {

                                                    var main_slug_edit = $(this).attr('data-cslug');

                                                    //alert(main_slug_edit);

                                                    $.ajax({
    url: "{{ route('client_list_edit') }}",
    method: 'GET',
    data: {main_slug_edit:main_slug_edit},
    success: function(data) {
      $("#show_data_for_client_edit").html('');
      $("#show_data_for_client_edit").html(data.options);
    }
    });

                                                    $("#myModal").modal('show');

                                            });


                                            $(".closee").click(function(){
                                       $("#myModal").modal('hide');
                                           });

                                        });
</script>
