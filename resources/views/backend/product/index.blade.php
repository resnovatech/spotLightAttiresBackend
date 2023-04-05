@extends('backend.master.master')

@section('title')
Product List | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Product List</h4>

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
                                @if (Auth::guard('admin')->user()->can('product_add'))
<a href="{{ route('admin.product_list_add') }}" class="btn btn-primary dropdown-toggle waves-effect  btn-sm waves-light" type="button" >
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Product
</a>
@endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mt-2">

                        <div class="col-6">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a target="_blank" href="{{ route('print_pdf_for_all_product') }}" type="button" class="btn btn-sm btn-primary">PDF</a>
                                <a target="_blank" href="{{ route('print_excel_for_all_product') }}" type="button" class="btn btn-sm btn-success">EXCEL</a>
                                <a target="_blank" href="{{ route('print_csv_for_all_product') }}" type="button" class="btn btn-sm btn-secondary">CSV</a>
                              </div>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm" name="search_bar" id="search_bar"/>
                        </div>

                    </div>

                    <div class="row mt-1">
                        @include('flash_message')
                        {{-- <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">

                                    <thead class="table-light">
                                        <tr>
                                            <th >
                                                <div class="form-check font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                        </tr>
                                        </thead>
                                </table>
                            </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body"  id="main_content_table">

                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>SL</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>Subcategory Name</th>
                                                <th>Price</th>
                                                <th>SKU</th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                    @foreach($product_list as $key => $all_product_list)
                                            <tr>

                                                <td>
                                                    <div class="form-check font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="customCheck5">
                                                        <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $all_product_list->product_name }}</td>
                                                <td>{{ $all_product_list->cat_name }}</td>
                                                <td>{{ $all_product_list->sub_cat_name }}</td>
                                                <td>
                                                    {{ $all_product_list->price }}
                                                </td>
                                                <td>
                                                    {{ $all_product_list->sku }}
                                                </td>


                                            </tr>
                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                   <!--pagination code --->

                                   <div class="row mt-3">
                                    <div class="col-md-12">

                                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                                          {{-- <li class="page-item active" aria-current="page">
                                            <span class="page-link">1</span>
                                          </li> --}}

                                          <!--check total number greater than 10  -->
                                          @if($total_serial_number > 10)
                                          <!--previous button work -->
                                          <li class="page-item disabled">
                                            <button  class="page-link" id="ppage_link">Previous</button>
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
    <button  class="page-link" id="npage_link">Next</button>
</li>
<!--end next button work -->

                                          @else
                                          <!--end check total number greatee than 10 -->
                                              <!--check total number smaller than 10  -->
                                              <!--previous button work -->
<li class="page-item disabled">
    <button  class="page-link" id="ppage_link">Previous</button>
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
    <button  class="page-link" id="npage_link">Next</button>
</li>
<!--end next button work -->
                                           <!--end check total number smaller than 10  -->
                                        @endif
                                        </ul>
                                   
                                   </div>
                                   </div>
                                      <!--end pagination code -->

                                      <!--go to page code -->
                                      <span>Go To Page: </span><input type="text" id="go_to_page_value" /> <button class="btn btn-sm btn-warning" id="go_to_page_button">Go</button>
                                      <!--end go to page to -->
                                </div>
                            </div>
                        </div> <!-- end col -->
                        {{-- <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product_list as $key => $all_product_list)
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                                </div>
                            </div>
                        </div> --}}
                    </div> <!-- end row -->








@endsection

@section('script')

<script>
    $(document).ready(function(){
        $("[id^=page_link]").click(function(){


            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(9);
            //alert(id_for_pass);

            //var token = $("input[name='_token']").val();
        $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
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
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });

        });

        //end next button

        //table search button

        $('#search_bar').on('keyup', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var search = $(this).val();

            $.ajax({
                url: "{{ route('main_search_button_product') }}",
                type: "GET",
                data: {
                    'search': search
                },
                success: function (data) {

                    $("#main_content_table").html('');
                    $('#main_content_table').html(data.options);

                }
            });


        });
        //end table search button

        //go to page start

        $("#go_to_page_button").click(function(){

            var id_for_pass = $('#go_to_page_value').val();



            $.ajax({
            url: "{{ route('pagination_fetch_data') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });
        });
        //end go to page
    });
    </script>


@endsection







