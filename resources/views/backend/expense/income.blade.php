@extends('backend.master.master')

@section('title')
Income List |{{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Income  List</h4>

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
                               
                            </div>
                        </div>
</div>
                    </div>
                    <!-- end page title -->
                      <div class="row mt-3">
                        <div class="col-3">
                            <div class="card">
                                
                                <center>
                                <p>Total Income</p>
                                <p>{{$total_income}}</p>
                                </center>
</div>
</div>

              <div class="col-3">
                            <div class="card">
                                 <center>
                                <p>Last Day Income</p>
                                <p>{{$total_income_last_day}}</p>
                                </center>
</div>
</div>


       <div class="col-3">
                            <div class="card">
                                 <center>
                                <p>Last 7 Day Income</p>
                                <p>{{$total_income_last_seven_day}}</p>
                                </center>
</div>
</div>

<div class="col-3">
                            <div class="card">
                                 <center>
                                <p>Last 30 Day Income</p>
                                <p>{{$total_income_last_thirty_day}}</p>
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
                                                <th>Selling Qty</th>

                                    <th>Selling Price</th>
                                    
                                    <th>Buying Price</th>
                                    <th>Income</th>
                                     <th>Date</th>
                            
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($invoice_detial_list as $all_invoice_detial_list)
<?php  
 $buying_price = DB::table('main_products')->where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = DB::table('main_products')->where('id',$all_invoice_detial_list->product_id)->value('selling_price');
?>

                                <tr>
                                   <td>{{ $loop->index+1 }}</td>
<td>{{ $all_invoice_detial_list->qty}}</td>
                                    <td>{{ $all_invoice_detial_list->price }}</td>
                                    <td>{{ $buying_price }}</td>
                                     <td>{{ ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount) }}</td> 
 <td>{{ $all_invoice_detial_list->created_at->format('d-m-Y') }}</td>

                                   
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







