@extends('backend.master.master')

@section('title')
First Banner List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">First Banner List  List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active"> </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
                        <div class="col-sm-6">
                            <div class="float-right d-md-block">
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('admin.create'))
<button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Banner
                                    </button>
@endif
                                </div>
                            </div>
                        </div>
</div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-3">
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
                                               <th>Category</th>
                                                <th>Button Name</th>
                                    <th>First Title</th>
                                    <th>Second Title</th>
                                    <th>Third Title</th>
                                    <th>Fourth Title</th>
                                    <th>Banner</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($category_list_one as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>
                                     <td>{{ $user->button_link }}</td>
                                     
                                      <td>{{ $user->button_name }}</td>

                                    <td>{{ $user->first_title }}</td>

                                    <td>{{ $user->second_title }}</td>

                                    <td>{{ $user->four_title }}</td>

                                    <td>{{ $user->third_title }}</td>

                                    <td><img src="{{ asset('/') }}{{ $user->image }}" height="50px;"/></td>

                                    <td>
                                      @if (Auth::guard('admin')->user()->can('admin.edit'))
                                          <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></button>

                                            <!--  Large modal example -->
                                            <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Update Banner</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('first_banner_update') }}" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" class="form-control form-control-sm" id="name" name="id" placeholder="Enter Name" value="{{ $user->id }}">
                                                                @csrf

                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Button Link</label>

                                                                    <select class="form-control form-control-sm" name="cat_id" required>
                                                                        <option>Select</option>
                                                                        @foreach($category_list as $category_list_all)
                                                                        <option value="{{ $category_list_all->slug }}" {{ $category_list_all->slug  == $user->button_link ? 'selected':'' }}>{{ $category_list_all->name }}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                    
                    
                     <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control" name="button_name" value="{{ $user->button_name }}" required/>

                    </div>
                    


                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Title One</label>
                                            <input type="text" class="form-control" name="t_one" value="{{ $user->first_title }}" required/>

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Title Two</label>
                                            <input type="text" class="form-control" name="t_two" value="{{ $user->second_title }}" required/>

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Title Three</label>
                                            <input type="text" class="form-control" name="four_title" value="{{ $user->four_title }}" />

                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Title Four</label>
                                            <input type="text" class="form-control" name="t_three" value="{{ $user->third_title }}" required/>

                                                                </div>


                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Banner</label>
                                                                    <input type="file" name="cat_banner"  class="form-control" id=""
                                                                           placeholder="Alert Quantity Unit">
                                                                           <small>1600*642</small><br>
                                                                           <img style="height:100px;" src="{{ asset('/') }}{{ $user->image }}" />

                                                                </div>

                                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->


@endif

{{-- <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="window.location.href='{{ route('admin.users.view',$user->id) }}'"><i class="fa fa-eye"></i></button> --}}

                                  @if (Auth::guard('admin')->user()->can('admin.delete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('first_banner_delete',$user->id) }}" method="POST" style="display: none;">
                     
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




  <!--  Large modal example -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add New Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('first_banner_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Button Link</label>

                        <select class="form-control form-control-sm" name="cat_id" required>
                            <option>Select</option>
                            @foreach($category_list as $category_list_all)
                            <option value="{{ $category_list_all->slug }}">{{ $category_list_all->name }}</option>
                           @endforeach
                        </select>
                    </div>
                    
                     <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control" name="button_name" required />

                    </div>
                    
                    


                    <div class="mb-3">
                        <label for="" class="form-label">Title One</label>
<input type="text" class="form-control" name="t_one" required />

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control" name="t_two" required />

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title Three</label>
<input type="text" class="form-control" name="four_title" />

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title Four</label>
<input type="text" class="form-control" name="t_three" required />

                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Banner</label>
                        <input type="file" name="cat_banner"  class="form-control" id=""
                               placeholder="Alert Quantity Unit" required>
<small>1600*642</small>

                    </div>



                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                  </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('script')

     <script>
         /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
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
@endsection







