@extends('backend.master.master')

@section('title')
Role List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Role  List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li> --}}
                    <li class="breadcrumb-item active"></li>
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
                                  @if (Auth::guard('admin')->user()->can('role.create'))
                                   <a href="{{ route('admin.roles.create') }}" type="button"  class="btn btn-raised btn-primary waves-effect  btn-sm" >Add New Role</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @include('flash_message')

<div class="table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                               <th>sl</th>
                                    <th>Role Name</th>
                                    <th >Permission List</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($roles as $role)

                                <tr>
                                   <td>

                                    {{ $loop->index+1 }}

                                    <td>{{ $role->name }}</td>
                                    <td >
                                        <div class="row">


                                        @foreach ($role->permissions as $perm)
                                        <div class="col-md-1">
                                            <span class="badge bg-success mt-1">
                                               {{ $perm->name }}<br>
                                            </span>
                                        </div>
                                        @endforeach
                                    </div>
                                    </td>

                                                <td>
                                                    <div class="btn-group">

@if (Auth::guard('admin')->user()->can('admin.edit'))

                                                        <a href="{{ route('admin.roles.edit',$role->id) }}" type="button" class="btn btn-primary waves-light waves-effect  btn-sm"><i class="fas fa-pencil-alt"></i></a>
@endif
@if (Auth::guard('admin')->user()->can('admin.delete'))


@if($role->id == 13)


@else

                                                        <button type="button" class="btn btn-primary waves-light waves-effect  btn-sm" onclick="deleteTag({{ $role->id }})"><i class="far fa-trash-alt"></i></button>

 <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.delete',$role->id) }}" method="POST" style="display: none;">
  @method('DELETE')
                                                    @csrf

                                                </form>
                                                @endif
                                                @endif
                                                    </div>
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












