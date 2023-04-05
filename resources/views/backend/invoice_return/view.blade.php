@extends('backend.master.master')

@section('title')
Invoice Detail | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Invoice & Payment Section</h4>

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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="button-items justify-content-center">

                    @if($invoice->order_status == 'Web')

                    @else
                    <a href="{{ route('invoice_return_edit',$invoice->id) }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-pen"></i> Edit Invoice
                    </a>


@endif

                    <a href="{{ route('invoice_return_print',$invoice->id) }}" class="btn btn-info waves-effect waves-light"><i class="fas fa-print"></i> Print
                    </a>
                    <button type="button" class="btn btn-warning waves-effect waves-light"><i class="fas fa-envelope"></i> Email
                    </button>
                    <button type="button" class="btn btn-dark waves-effect waves-light"><i class="fas fa-envelope"></i> SMS
                    </button>


                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="deleteTag({{ $invoice->id}})"><i class="fas fa-trash-alt "></i> Delete Invoice
                    </button>

                    <form id="delete-form-{{ $invoice->id }}" action="{{ route('invoice_return_delete',$invoice->id) }}" method="POST" style="display: none;">

                        @csrf

                    </form>


                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <h4 class="float-end font-size-16">Order #{{ $invoice->order_id }}</h4>
                    <div class="mb-4">
                        <img src="{{ asset('/') }}{{ $logo }}" alt="logo" height="20" />
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            {{ $client_addresss_detail->name }}<br>
                            {{ $client_addresss_detail->email }}<br>
                            {{ $client_addresss_detail->phone }}<br>
                            {{ $client_addresss_detail->address }}
                        </address>
                    </div>
                    {{-- <div class="col-sm-6 text-sm-end">
                        <address class="mt-2 mt-sm-0">
                            <strong>Shipped To:</strong><br>
                           {{ $ship_address_detail->name }}<br>
                           {{ $ship_address_detail->address }}
                        </address>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <address>
                            <strong>Payment Method:</strong><br>
                            {{ $invoice->payment_term }}<br>
                            {{ $client_addresss_detail->email }}
                        </address>
                    </div>
                    <div class="col-sm-6 mt-3 text-sm-end">
                        <address>
                            <strong>Order Date:</strong><br>
                            {{ $invoice->pay_date }}<br><br>
                        </address>
                    </div>
                </div>
                <div class="py-2 mt-3">
                    <h3 class="font-size-15 fw-bold">Order summary</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 70px;">No.</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th class="text-end">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($invoice_detail as $key=>$all_invoice_detail)

                          <?php



                            $product_name = DB::table('main_products')
                            ->where('id', $all_invoice_detail->product_id )->value('product_name');


                                                    ?>

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product_name }}</td>
                            <td>{{ $all_invoice_detail->qty }}</td>
                            <td>{{ $all_invoice_detail->price }}</td>
                            <td class="text-end">{{ $all_invoice_detail->total_price }}</td>
                        </tr>
                         @endforeach

                        <tr>
                            <td colspan="4" class="text-end">Sub Total</td>
                            <td class="text-end"> {{ $invoice->total_net_price }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Shipping</strong>
                            </td>
                            <td class="border-0 text-end">{{ $invoice->delivery_charge }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Discount</strong>
                            </td>
                            <td class="border-0 text-end">{{ $invoice->total_discount }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Vat/Tax</strong>
                            </td>
                            <td class="border-0 text-end">{{ $invoice->total_vat_tax }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Total</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->grand_total }}</h4>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Due</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->due }}</h4>
                            </td>
                        </tr> --}}
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Total Pay</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->grand_total}}</h4>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-print-none">
                    {{-- <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end row -->

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
@endsection
