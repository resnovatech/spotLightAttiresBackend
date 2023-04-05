@extends('backend.master.master')

@section('title')
Expense List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Expense  List</h4>

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
                                @if (Auth::guard('admin')->user()->can('expense_add'))
<button class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Expense
                                    </button>
@endif
                                </div>
                            </div>
                        </div>
</div>
                    </div>
                    <!-- end page title -->
                      <div class="row mt-3">
                        <div class="col-3">
                            <div class="card">
                                
                                <center>
                                <p>Total Expense</p>
                                <p>{{$total_cloth_expense + $total_expense}}</p>
                                </center>
</div>
</div>

              <div class="col-3">
                            <div class="card">
                                 <center>
                                <p>Last Day Expense</p>
                                <p>{{$total_cloth_expense_last_day + $total_expense_last_day}}</p>
                                </center>
</div>
</div>


       <div class="col-3">
                            <div class="card">
                                 <center>
                                <p>Last 7 Day Expense</p>
                                <p>{{$total_cloth_expense_last_seven_day + $total_expense_last_seven_day}}</p>
                                </center>
</div>
</div>

<div class="col-3">
                            <div class="card">
                                 <center>
                                <p>Last 30 Day Expense</p>
                                <p>{{$total_cloth_expense_last_thirty_day + $total_expense_last_thirty_day}}</p>
                                </center>
</div>
</div>



</ddiv>
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
                                                <th>Category Name</th>

                                    <th>Name</th>
                                    <th>Amount</th>
                                     <th>Date</th>
                                    <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($users as $user)


                                <tr>
                                   <td>


                                    {{ $loop->index+1 }}




                                </td>
<td>{{ $user->expense_category }}</td>
                                    <td>




  {{ $user->expense_type }}



                                    </td>
                                    <td>{{ $user->expense_amount }}</td>
                                   
 <td>{{ $user->created_at->format('d-m-Y') }}</td>

                                    <td>
                                      @if (Auth::guard('admin')->user()->can('expense_update'))
                                          <button type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $user->id }}"
                                          class="btn btn-primary waves-light waves-effect  btn-sm" >
                                          <i class="fas fa-pencil-alt"></i></button>

                                            <!--  Large modal example -->
                                            <div class="modal fade bs-example-modal-lg{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myLargeModalLabel">Update Expense</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.expense.update') }}" method="POST" enctype="multipart/form-data">

                                                                @csrf
                                                                <div class="row">
                                                                    
                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label for="email">Expense category</label>
                                                                       <select class="form-control form-control-sm" name="expense_category">
                                                                           @foreach($users1 as $all_expense_category)
                                                                           <option value="{{$all_expense_category->name}}" {{$all_expense_category->name == $user->expense_category ? 'selected':'' }}>{{$all_expense_category->name}}</option>
                                                                           @endforeach
                                                                       </select>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="name" name="expense_type" placeholder="Enter Name" value="{{ $user->expense_type }}">

                                                        <input type="hidden" class="form-control form-control-sm" id="name" name="id" placeholder="Enter Name" value="{{ $user->id }}">
                                                                    </div>
                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label for="email">Amount</label>
                                                                        <input type="number" class="form-control form-control-sm" id="email" name="expense_amount" placeholder="Enter Amount" value="{{ $user->expense_amount }}">
                                                                    </div>
                                                                  
                                                                </div>

                                                                

                                                              

                                                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->


@endif


                                  @if (Auth::guard('admin')->user()->can('expense_delete'))

<button   type="button" class="btn btn-danger waves-light waves-effect  btn-sm" onclick="deleteTag({{ $user->id}})" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.expense.delete',$user->id) }}" method="POST" style="display: none;">
                      @method('DELETE')
                                                    @csrf

                                                </form>
                                                @endif
                                    </td>
                                </tr>
@endforeach
<?php $count = count($users)?>
@foreach($buying_price_list as $all_buying_price_list)
<tr>
    <td>{{$count = $count+1}}</td>
    <td>Cloth Cost</td>
    <td>{{$all_buying_price_list->product_name}}</td>
    <td>{{$all_buying_price_list->buying_price}}</td>
    <td>{{ $all_buying_price_list->created_at->format('d-m-Y') }}</td>
    <td></td>
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
                <h5 class="modal-title" id="myLargeModalLabel">Add New Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="custom-validation" action="{{ route('admin.expense.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="row">

                          <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">


                                    <div class="row">
                                        
                                         <div class="form-group col-md-12 col-sm-12">
                                                                        <label for="email">Expense category</label>
                                                                       <select class="form-control form-control-sm" name="expense_category">
                                                                           @foreach($users1 as $all_expense_category)
                                                                           <option value="{{$all_expense_category->name }}">{{$all_expense_category->name}}</option>
                                                                           @endforeach
                                                                       </select>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control form-control-sm" id="name" name="expense_type" placeholder="Enter Name" >

                                                     
                                                                    </div>
                                                                    <div class="form-group col-md-12 col-sm-12">
                                                                        <label for="email">Amount</label>
                                                                        <input type="number" class="form-control form-control-sm" id="email" name="expense_amount" placeholder="Enter Amount">
                                                                    </div>
                                                                  
                                                                </div>


                                  </div>

                              </div>
                          </div>



                          <div class="col-lg-12">
                              <div class="">
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







