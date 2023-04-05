@extends('backend.master.master')

@section('title')
Invoice information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Invoice List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">

    @include('flash_message')
    <div class="col-12">
        <div class="card">
            <div class="card-body">



                <div class="row mb-2">
                    <div class="col-sm-4">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <input type="text" id="search_on_cat_name" class="form-control" placeholder="Search...">
                                <i class="bx bx-search-alt search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            @if (Auth::guard('admin')->user()->can('invoice_add'))
                            <a href="{{ route('invoice_create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Invoice</a>
                            @endif
                        </div>
                    </div><!-- end col-->
                    <div class="col-sm-6 col-xl-6">
                        <div class="d-flex flex-wrap gap-2">
                            <p class="horizontal-center" >Selected:<span id="numberOfChecked"> 0</span></p>

                            <button type="" id="delete_button" class="btn btn-sm btn-outline-danger waves-effect ml-4" disabled>
                                Delete All
                            </button>

                        </div>
                    </div>
                </div>

                <!--new tab system --->
  <!-- Nav tabs -->
  <ul class="nav nav-tabs mt-2" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
            <span class="d-none d-sm-block">All</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
            <span class="d-none d-sm-block">Ready To Ship({{ $total_datar }})</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
            <span class="d-none d-sm-block"> Delivered({{ $total_datad }})</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">Cancelled({{ $total_datac }})</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">Returned({{ $total_data_return }})</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#settings12" role="tab">
            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
            <span class="d-none d-sm-block">Exchanged({{ $total_data_exchanged }})</span>
        </a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content p-3 text-muted">
    <div class="tab-pane active" id="home" role="tabpanel">
        <p class="mb-0">
           @include('backend.invoice.main_index')
        </p>
    </div>
    <div class="tab-pane" id="profile" role="tabpanel">
        <p class="mb-0">
            @include('backend.invoice.readyToShip')
        </p>
    </div>
    <div class="tab-pane" id="messages" role="tabpanel">
        <p class="mb-0">
            @include('backend.invoice.delivered')
        </p>
    </div>
    <div class="tab-pane" id="settings" role="tabpanel">
        <p class="mb-0">
            @include('backend.invoice.cancelled')
        </p>
    </div>
    <div class="tab-pane" id="settings1" role="tabpanel">
        <p class="mb-0">
            @include('backend.invoice.return')
        </p>
    </div>
    <div class="tab-pane" id="settings12" role="tabpanel">
        <p class="mb-0">
            @include('backend.invoice.exchange')
        </p>
    </div>
</div>

                <!--end new tab system  --->

            </div>
        </div>
    </div>
</div>
<!-- end row -->
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
<div id="myModal_return" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure ?</h1>
                {{-- <button type="button" class="btn btn-danger close" >&times;</button> --}}
            </div>
            <div class="modal-body">
{{-- <button>ddddqw</button> --}}
                    <button class="btn btn-success w-md waves-effect waves-light"  id="final_delete_return">Yes</button>
                    <button class="btn btn-danger w-md waves-effect waves-light closeee" id="">Cancel</button>


            </div>

        </div>
    </div>
</div>
<!--end modal for delete -->
<!--end modal for delete -->
<div id="myModal_exchage" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Are You Sure ?</h1>
                {{-- <button type="button" class="btn btn-danger close" >&times;</button> --}}
            </div>
            <div class="modal-body">
{{-- <button>ddddqw</button> --}}
                    <button class="btn btn-success w-md waves-effect waves-light"  id="final_delete_exchage">Yes</button>
                    <button class="btn btn-danger w-md waves-effect waves-light closeeee" id="">Cancel</button>


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

    $(".closeee").click(function(){
    $("#myModal_return").modal('hide');
    });


    $(".closeeee").click(function(){
    $("#myModal_exchage").modal('hide');
    });


    });
    </script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/invoice_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/invoice_page_r.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/invoice_page_c.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/invoice_page_d.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/invoice_page_search.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/invoice_return_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/exchange_page.js"></script>
@endsection
