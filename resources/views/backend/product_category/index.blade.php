@extends('backend.master.master')

@section('title')
Category information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Product Category</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Product category search & input field</h4>
                <p class="card-title-desc">You can <code>Search & Input</code> new category here</p>



                    <div class="row">

                        <div class="col-xl col-sm-6">
                            <div class="form-group mt-3 mb-0">
                                <input type="text" name="search_on_cat_name" class="form-control" id="search_on_cat_name"
                                       placeholder="Product Category Name Search">
                            </div>
                        </div>

                        {{-- <div class="col-xl col-sm-6">
                            <div class="form-group mt-3 mb-0">
                                <input type="text" name="create_date" class="form-control" id="orderid-input"
                                       placeholder="Select date" data-date-format="dd M, yyyy"
                                       data-date-orientation="bottom auto" data-provide="datepicker"
                                       data-date-autoclose="true">
                            </div>
                        </div> --}}

                        <div class="col-xl col-sm-6">
                            <div class="form-group mt-3 mb-0">
                                <select class="form-control" name="search_on_status" id="search_on_status">
                                    <option value="0">Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>



                    </div>


                <div class="row mt-4 mb-2">
                    @include('flash_message')
                    <div class="col-sm-6">
                        <div class="d-flex flex-wrap gap-2">
                            <p class="horizontal-center" >Selected:<span id="numberOfChecked"> 0</span></p>
                            <button type="" id="inactive_button" class="btn btn-sm btn-outline-secondary waves-effect ml-4" disabled>
                                Inactive
                            </button>
                            <button type="" id="active_button" class="btn btn-sm btn-outline-success waves-effect ml-4" disabled>
                                active
                            </button>
                            <button type="" id="delete_button" class="btn btn-sm btn-outline-danger waves-effect ml-4" disabled>
                                Delete All
                            </button>



                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">
                            <button type="button"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                <i class="mdi mdi-plus me-1"></i> Add New Product Category
                            </button>
                        </div>
                    </div><!-- end col-->
                </div>
                <div class="row mt-4 mb-2" id="main_content_table">
                    <div class="col-sm-12">
                        <div class="table-responsive" >
                            <table id="" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" class="check-all" type="checkbox" id="master">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Serial No.</th>
                                    <th class="align-middle"> Image</th>
                                    <th class="align-middle">Product Category name</th>
                                    <th class="align-middle">Input Date</th>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($category_list as $key=>$all_catregory )
                                <tr id="tr_{{$all_catregory->id}}">
                                    <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input sub_chk" value="{{$all_catregory->id}}"  data-id="{{$all_catregory->id}}" type="checkbox" >
                                            <label class="form-check-label" for="orderidcheck01"></label>
                                        </div>
                                    </td>
                                    <td class="text-body fw-bold">{{ $key+1 }}</td>
                                    <td class="text-body fw-bold">

                                        @if(empty($all_catregory->icon ))
                                        <img src="{{ asset('/') }}public/no_image.jpg" style="height: 50px"/>
                                        @else

                                        <img src="{{ asset('/') }}{{ $all_catregory->icon }}" style="height: 50px"/>
                                        @endif

                                    </td>
                                    <td>{{ $all_catregory->cat_name }}</td>
                                    <td>{{ $all_catregory->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if($all_catregory->status == "Active")
                                        <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-soft-danger font-size-12">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex gap-3">
                                            <button class="btn btn-success btn-sm text-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_catregory->id }}"><i
                                                        class="mdi mdi-pencil font-size-18"></i></button>

         <!-- Modal -->
         <div class="modal fade bs-example-modal-lg{{ $all_catregory->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
        </div>
        <div class="modal-body">
        <form class="custom-validation" action="{{ route('admin.product_category.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="" class="form-label">Category Icon</label>
                    <input type="file" name="icon" class="form-control" id="">
                    <img src="{{ asset('/') }}{{ $all_catregory->icon  }}" style="height:40px;" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="" class="form-label">Parent Category Name</label>
                    <input type="text" name="cat_name" value="{{ $all_catregory->cat_name }}" class="form-control" id=""
                           placeholder="Parent Category Name">

                           <input type="hidden" class="form-control form-control-sm" value="{{ $all_catregory->id }}" name="id" placeholder="Enter Name">
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="" class="form-label">Product Status</label>
                    <select class="form-control" name="status">
                        <option value="">Select Status</option>
                        <option value="Active" {{ $all_catregory->status == 'Active' ? 'selected':'' }}>Active</option>
                        <option value="Inactive" {{ $all_catregory->status == 'Inactive' ? 'selected':'' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </div>


        </form>
        </div>

        </div>
        </div>
        </div>




                                            <button class=" btn btn-danger btn-sm text-light"  onclick="deleteTag({{ $all_catregory->id}})"><i
                                                        class="mdi mdi-delete font-size-18"></i></button>

                                                        <form id="delete-form-{{ $all_catregory->id }}" action="{{ route('admin.product_category.delete',$all_catregory->id) }}" method="POST" style="display: none;">
                                                            @method('DELETE')
                                                                                          @csrf

                                                                                      </form>
                                        </div>
                                    </td>
                                </tr>

        @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!--start pagination -->
                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                            {{-- <li class="page-item active" aria-current="page">
                              <span class="page-link">1</span>
                            </li> --}}

                            <!--check total number greater than 10  -->
                            @if($total_serial_number > 10)
                            <!--previous button work -->
                            <li class="page-item disabled">
                              <button  class="page-link" id="ppage_link"><i class="mdi mdi-chevron-left"></i></button>
                          </li>
                            <!--end previous  button work-->

                            @for($i = 1; $i <= $total_serial_number; $i++)

                            @if($i == 1)
                            <li class="page-item active">
                              <button  class="page-link" id="page_link{{ $i }}">{{ $i }}</button>
                          </li>
                            @elseif($i == 2)
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>
                          @elseif($i == 3)
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>
                          @elseif($i == 4)
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>

                          @elseif($i == 5)
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>

                          @elseif($i == 6)
                          <li class="page-item">
                              <button  class="page-link"  >.</button>
                          </li>
                          @elseif($i == 7)
                          <li class="page-item">
                              <button  class="page-link"  >.</button>
                          </li>

                          @elseif($i == ($total_serial_number-2) )
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>
                          @elseif($i == ($total_serial_number-1) )
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>
                          @elseif($i == $total_serial_number )
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>

                          @endif
                          @endfor
        <!--next button work -->
        <li class="page-item ">
        <button  class="page-link" id="npage_link"><i class="mdi mdi-chevron-right"></i></button>
        </li>
        <!--end next button work -->

                            @else
                            <!--end check total number greatee than 10 -->
                                <!--check total number smaller than 10  -->
                                <!--previous button work -->
        <li class="page-item disabled">
        <button  class="page-link" id="ppage_link"><i class="mdi mdi-chevron-left"></i></button>
        </li>
        <!--end previous button work -->
                            @for($i = 1; $i <= $total_serial_number; $i++)

                            @if($i == 1)
                            <li class="page-item active">
                              <button  class="page-link" id="page_link{{ $i }}">{{ $i }}</button>
                          </li>
                            @else
                          <li class="page-item">
                              <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
                          </li>
                          @endif
                          @endfor
                          <!--next button work -->
        <li class="page-item ">
        <button  class="page-link" id="npage_link"> <i class="mdi mdi-chevron-right"></i></button>
        </li>
        <!--end next button work -->
                             <!--end check total number smaller than 10  -->
                          @endif
                          </ul>
                          <!--pagination end-->
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
<!-- end row -->
 <!--  Large modal example -->
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
 aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myLargeModalLabel">Add New Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="needs-validation" action="{{ route('admin.product_category.store') }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Category Icon</label>
                            <input type="file" name="icon" class="form-control" id="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Parent Category Name</label>
                            <input type="text" name="cat_name" class="form-control" id=""
                                   placeholder="Parent Category Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--modal for delete -->
<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure ?</h1>
                {{-- <button type="button" class="btn btn-danger close" >&times;</button> --}}
            </div>
            <div class="modal-body">

                    <button class="btn btn-success w-md waves-effect waves-light"  id="final_delete">Yes</button>
                    <button class="btn btn-danger w-md waves-effect waves-light close"  >Cancel</button>


            </div>

        </div>
    </div>
</div>
<!--end modal for delete -->
@endsection


@section('script')
<script>
    $(document).ready(function(){

        //mutiple data delete

        $("#delete_button").click(function(){

            $("#myModal").modal('show');

        });


        $(".close").click(function(){
            $("#myModal").modal('hide');
        });



        $("#final_delete").click(function(){

            var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
   return $(ele).val();
}).get();


$.ajax({
            url: "{{ route('multiple_delete_category_main') }}",
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
            url: "{{ route('multiple_delete_category') }}",
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

        //multiple active status
        $("#active_button").click(function(){

var numberOfSubChecked = $('.sub_chk:checked').map(function (idx, ele) {
return $(ele).val();
}).get();

if(numberOfSubChecked.length == 0){

alert("Please select row.");
}else{

alert('Are You Sure ?');

$.ajax({
url: "{{ route('multiple_select_active') }}",
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

        //end multiple active status

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
        $("[id^=page_link]").click(function(){


            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(9);
            //alert(id_for_pass);

            //var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('pagination_fetch_data_search_category') }}",
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
            url: "{{ route('pagination_fetch_data_search_category') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });

        });

        //end next button
        //search by category
        $('#search_on_cat_name').on('keyup', function () {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var category_name = $(this).val();
var category_status = $('#search_on_status').val();
// alert(category_status);
$.ajax({
    url: "{{ route('search_on_category_name') }}",
    type: "GET",
    data: {
        'category_name':category_name,'category_status':category_status
    },
    success: function (data) {

        $("#main_content_table").html('');
        $('#main_content_table').html(data.options);

    }
});


});
//end table search button

//search by status
$("#search_on_status").change(function(){

    var category_status = $(this).val();
    var category_name1 = $('#search_on_cat_name').val();
    if(category_name1 === ''){

        var category_name = 0;

    }else{
        var category_name = category_name1;
    }
// alert(category_name);

$.ajax({
    url: "{{ route('search_on_category_name') }}",
    type: "GET",
    data: {
        'category_name':category_name,'category_status':category_status
    },
    success: function (data) {

        $("#main_content_table").html('');
        $('#main_content_table').html(data.options);

    }
});

});
//end search by status
    });
        </script>
<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "You will not be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
<!-- bootstrap-datepicker js -->
<script src="{{ asset('/') }}public/new_admin/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
@endsection
