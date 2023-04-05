@extends('backend.master.master')

@section('title')
Dashboard
@endsection


@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li> --}}
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <!--<div class="col-xl-4">-->
    <!--    <div class="card bg-primary bg-soft">-->
    <!--        <div>-->
    <!--            <div class="row">-->
    <!--                <div class="col-7">-->
    <!--                    <div class="text-primary p-3">-->
    <!--                        <h5 class="text-primary">Welcome Back !</h5>-->



    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="col-5 align-self-end">-->
    <!--                    <img src="{{ asset('/') }}public/new_admin/assets/images/profile-img.png" alt="" class="img-fluid">-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="col-xl-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-copy-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Orders</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $order_list }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-archive-in"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Client</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $client_list }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar-xs me-3">
                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                    <i class="bx bx-purchase-tag-alt"></i>
                                </span>
                            </div>
                            <h5 class="font-size-14 mb-0">Total Product</h5>
                        </div>
                        <div class="text-muted mt-4">
                            <h4>{{ $product_list }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>


                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-4">-->
            <!--    <div class="card">-->
            <!--        <div class="card-body">-->
            <!--            <div class="d-flex align-items-center mb-3">-->
            <!--                <div class="avatar-xs me-3">-->
            <!--                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">-->
            <!--                        <i class="bx bx-purchase-tag-alt"></i>-->
            <!--                    </span>-->
            <!--                </div>-->
            <!--                <h5 class="font-size-14 mb-0">Total Income</h5>-->
            <!--            </div>-->
            <!--            <div class="text-muted mt-4">-->
            <!--                <h4>{{ $total_income }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>-->


            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
            <!-- <div class="col-sm-4">-->
            <!--    <div class="card">-->
            <!--        <div class="card-body">-->
            <!--            <div class="d-flex align-items-center mb-3">-->
            <!--                <div class="avatar-xs me-3">-->
            <!--                    <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">-->
            <!--                        <i class="bx bx-purchase-tag-alt"></i>-->
            <!--                    </span>-->
            <!--                </div>-->
            <!--                <h5 class="font-size-14 mb-0">Total Expense</h5>-->
            <!--            </div>-->
            <!--            <div class="text-muted mt-4">-->
            <!--                <h4>{{ $total_expense }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>-->


            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <!-- end row -->
    </div>
</div>


@endsection
