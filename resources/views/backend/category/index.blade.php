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
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Category Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
                        <div class="col-sm-6">
                            <div class="float-right d-md-block">
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('category_add'))
<button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add Category Information
                                    </button>
@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')
<div class="table-responsive">
    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                            <th>SL</th>

                                    <th>Name </th>




                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($category_list as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>

                                <td>



                                    {{ $user->cat_name }}


                                </td>


                                    <td>
                                      @if (Auth::guard('admin')->user()->can('category_update'))

                    <button type="button"  data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></button>


                                          <!-- Modal -->
                                          <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form class="custom-validation" action="{{ route('admin.category.update') }}" method="post" enctype="multipart/form-data">
                              @csrf
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
<div class="row">
<div class="form-group col-md-12 col-sm-12">
                                    <label for="password">Category Name</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $user->cat_name }}" name="cat_name" placeholder="Enter Name">

                        <input type="hidden" class="form-control form-control-sm" value="{{ $user->id }}" name="id" placeholder="Enter Name">
                                                            </div>

                        </div>


                                            </div>

                                        </div>
                                    </div>



                                    <div class="col-lg-12">

                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                                       Update
                                                    </button>
                                                </div>

                                    </div>
                                </div> <!-- end col -->
                            </form>
      </div>

    </div>
  </div>
</div>


@endif






                                  @if (Auth::guard('admin')->user()->can('category_delete'))

 <button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.category.delete',$user->id) }}" method="POST" style="display: none;">
                      @method('DELETE')
                                                    @csrf

                                                </form>
                                                @endif
                                    </td>
                                </tr>
@endforeach


                                        </tbody>
                                    </table>
</div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->






<!--  Modal content for the above example -->

  <!--  Large modal example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Category Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <div class="row">

                        <?php

                        $checkfor_first_child = DB::table('categories')
                        ->whereNotNull('sub_cat')->count();

                        $checkfor_second_child = DB::table('categories')
                        ->whereNotNull('child_one')->count();


                        $checkfor_three_child = DB::table('categories')
                        ->whereNotNull('child_two')->count();


                        $checkfor_four_child = DB::table('categories')
                        ->whereNotNull('child_three')->count();

                        $checkfor_five_child = DB::table('categories')
                        ->whereNotNull('child_four')->count();

                        $checkfor_six_child = DB::table('categories')
                        ->whereNotNull('child_five')->count();

                        $checkfor_seven_child = DB::table('categories')
                        ->whereNotNull('child_six')->count();
                        $checkfor_eight_child = DB::table('categories')
                        ->whereNotNull('child_seven')->count();

                        //dd($checkfor_first_child);


                         ?>

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label for="password">Category type</label>
                                <select  class="form-control form-control-sm"  name="cat_type" id="cat_type">
                                    <option value="0">--- Please Select ---</option>
                                      <option value="Category">Category</option>
                                      <option value="SubCategory">SubCategory</option>
                                      @if($checkfor_first_child == 0)

                                      @else
                                      <option value="FirstChild">FirstChild</option>
                                      @endif
                                      @if($checkfor_second_child == 0)

                                      @else
                                      <option value="SecondChild">SecondChild</option>
                                      @endif
                                      @if($checkfor_three_child == 0)

                                      @else
                                      <option value="ThirdChild">ThirdChild</option>
                                      @endif
                                      @if($checkfor_four_child == 0)

                                      @else
                                      <option value="FourthChild">FourthChild</option>
                                      @endif

                                      @if($checkfor_five_child == 0)

                                      @else
                                      <option value="FifthChild">FifthChild</option>
                                      @endif
                                      @if($checkfor_six_child == 0)

                                      @else
                                      <option value="SixthChild">SixthChild</option>
                                      @endif
                                      @if($checkfor_seven_child == 0)

                                      @else
                                      <option value="SeventhChild">SeventhChild</option>
                                      @endif
                                      @if($checkfor_eight_child == 0)

                                      @else
                                      <option value="EightChild">EightChild</option>
                                      @endif


                                        </select>
                   </div>
                                    </div>
<div class="row"  id="final_result_cat">
{{-- <div class="form-group col-md-12 col-sm-12">
                          <label for="password">Category Name</label>
              <input type="text" class="form-control form-control-sm"  name="cat_name" placeholder="Enter Name">


 </div> --}}
 </div>

</div>
</div>
</div>



                          <div class="col-lg-12">

                                      <div>
                                          <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                             Submit
                                          </button>
                                      </div>

                          </div>
                      </div> <!-- end col -->
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('script')

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
<script type="text/javascript">
    $(document).ready(function () {

        $('#cat_type').on('change', function () {
            var cat_type = $(this).val();
//alert(cat_type);

$.ajax({
            url: "{{ route('category_type') }}",
            method: 'GET',
            data: {cat_type:cat_type},
            success: function(data) {
              $("#final_result_cat").html('');
              $("#final_result_cat").html(data);
            }
        });
    });
});
    </script>
@endsection







