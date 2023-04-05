@extends('backend.master.master')

@section('title')
Shipping Price information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Shipping Price Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active"> All Shipping Price</li>
                </ol>
            </div>

        </div>
    </div>
    <div class="col-12">
        <h4 class="card-title"> Shipping Price Listing</h4>
        <p class="card-title-desc">You can <code>Show, Hide & Edit</code> all Shipping Prices</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-sm-2">
        <div class="d-flex flex-wrap gap-2">
            <p class="horizontal-center">Selected:<span id="numberOfChecked"> 0</span></p>
            <button type="" id="delete_button" class="btn btn-outline-danger waves-effect" disabled>
                Delete
            </button>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="search-box me-2 mb-2 d-inline-block">
            <div class="position-relative">
                <input type="text" name="search_on_cat_name" class="form-control" id="search_on_cat_name" placeholder="Search...">
                <i class="bx bx-search-alt search-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="text-sm-end">
            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="mdi mdi-plus me-1"></i> New Customers</button>
        </div>
             <!-- Modal -->
     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add Shipping Price Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    </button>
    </div>
    <div class="modal-body">
        <form class="mt-3" method="Post" action="{{ route('shipping_price_list_store') }}">
            @csrf

            <div class="row">
                <div class="col-lg-6 mb-2">
                    <div>
                        <label class="form-label">Title</label>
                        <input class="form-control" name="title" id="a_name" type="text" placeholder="Title">
                    </div>
                </div>


                <div class="col-lg-6 mb-2">
                    <div>
                        <label class="form-label">Price</label>
                        <input class="form-control" name="price" id="p" type="text" placeholder="Price">
                    </div>
                </div>


                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </div>

        </form>
    </div>

    </div>
    </div>
    </div>
    </div><!-- end col-->
</div>
<!-- search bar --->

<!-- end search bar --->

<div class="row">

    <div class="col-xl-12">
        @include('flash_message')
        <div class="card">
            <div class="card-body" id="main_content_table">
                <div class="table-responsive">
                    <table class="table  table-striped">
                        <thead class="table-light">
                        <tr>
                            <th style="width: 20px;" >
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="master">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th >Sl.</th>
                            <th >Title</th>
                            <th >Price</th>

                           <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($client_list as $key=>$all_attribute)
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input sub_chk" value="{{$all_attribute->id}}"  data-id="{{$all_attribute->id}}" type="checkbox" id="orderidcheck01">
                                    <label class="form-check-label" for="orderidcheck01"></label>
                                </div>
                            </td>
                            <td class="text-body fw-bold">{{ $key+1 }}</td>
                            <td>{{ $all_attribute->title }} </td>
                            <td>
                                <p class="mb-1">{{ $all_attribute->price }}</p>


                            </td>

                            <td> {{ $all_attribute->created_at->format('d-m-Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">



                                    @if (Auth::guard('admin')->user()->can('ship_price_update'))

<button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}">
                            <i class="mdi mdi-pencil font-size-14"></i>
                            </button>

    <!-- Modal -->
    @include('backend.ship_price.edit')
@endif
    @if (Auth::guard('admin')->user()->can('ship_price_delete'))


                                        <button class=" btn btn-transparent btn-sm text-danger"  onclick="deleteTag({{ $all_attribute->id}})"><i
                                                    class="mdi mdi-delete font-size-14"></i></button>

                                                    <form id="delete-form-{{ $all_attribute->id }}" action="{{ route('shipping_price_list_delete',$all_attribute->id) }}" method="POST" style="display: none;">

                                                                                      @csrf

                                                                                  </form>
                                                                                  @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
                @include('backend.ship_price.normal_pagination')
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure ?</h1>
                {{-- <button type="button" class="btn btn-danger close" >&times;</button> --}}
            </div>
            <div class="modal-body">
{{-- <button>ddddqw</button> --}}
                    <button class="btn btn-success w-md waves-effect waves-light"  id="final_delete">Yes</button>
                    <button class="btn btn-danger w-md waves-effect waves-light closee" id="">Cancel</button>


            </div>

        </div>
    </div>
</div>
<!--end modal for delete -->
@endsection


@section('script')



<script type="text/javascript">
$(document).ready(function () {

    $(".closee").click(function(){
$("#myModal").modal('hide');
});
});
</script>

<script type="text/javascript" src="{{ asset('/') }}public/custom_js/ship_price_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
@endsection
