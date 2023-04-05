@extends('backend.master.master')

@section('title')
Role List | {{ $ins_name }}
@endsection


@section('body')



                  <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0"> Add Role</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li> --}}
                    <li class="breadcrumb-item active"> </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

                    <form class="custom-validation" action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                      <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter a Role Name">
                        </div>

                        <div class="form-group mt-3">
<input type="checkbox" id="checkPermissionAll" value="1" class="filled-in" />
                            <label for="checkPermissionAll">All</label>
                      </div>
                      <hr>
                       @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                      <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
<input type="checkbox" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" class="filled-in" />
                            <label for="checkPermission">{{ $group->name }}</label>
                              </div>
                          </div>
                          <div class="col-md-9 role-{{ $i }}-management-checkbox">
                            @php
                                            $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                          @foreach ($permissions as $permission)
                              <div class="form-group">


                              <input type="checkbox" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" class="filled-in" />
                            <label for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>


                          </div>

                               @php  $j++; @endphp

                              @endforeach
                          </div>
                      </div>
                          @php  $i++; @endphp
                           <hr style="height: 2px;
    background: cornflowerblue;">
                            @endforeach

                                    </div>

                                </div>
                            </div>






                            <div class="col-lg-12">
                                <div class="float-right d-none d-md-block">
                                    <div class="form-group mb-4">
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-lg  waves-effect  btn-sm waves-light mr-1">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </form>





@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
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
            implementAllChecked();
         }
         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);
            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }

</script>

@endsection
