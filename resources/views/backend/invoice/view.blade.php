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
                    <a href="{{ route('invoice_list_edit',$invoice->id) }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-pen"></i> Edit Invoice
                    </a>

                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fas fa-money-bill"></i> Make Payment
                    </button>
@endif

                    <a href="{{ route('invoice_list_print',$invoice->id) }}" class="btn btn-info waves-effect waves-light"><i class="fas fa-print"></i> Print
                    </a>
                    <button type="button" class="btn btn-warning waves-effect waves-light"><i class="fas fa-envelope"></i> Email
                    </button>
                    <button type="button" class="btn btn-dark waves-effect waves-light"><i class="fas fa-envelope"></i> SMS
                    </button>


                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="deleteTag({{ $invoice->id}})"><i class="fas fa-trash-alt "></i> Delete Invoice
                    </button>

                    <form id="delete-form-{{ $invoice->id }}" action="{{ route('invoice_list_delete',$invoice->id) }}" method="POST" style="display: none;">

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
                    <div class="col-sm-6 text-sm-end">
                        <address class="mt-2 mt-sm-0">
                            <strong>Shipped To:</strong><br>
                           {{ $ship_address_detail->name }}<br>
                           {{ $ship_address_detail->address }}
                        </address>
                    </div>
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
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Due</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->due }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="border-0 text-end">
                                <strong>Total Pay</strong>
                            </td>
                            <td class="border-0 text-end">
                                <h4 class="m-0">{{ $invoice->grand_total-$invoice->due}}</h4>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Credit Transactions:</h4>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Invoice Id</th>
                            <th>Date</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Due</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($payment_detail as $key=>$all_payment_detail)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $all_payment_detail->order_id }}</td>
                            <td>

                                @if(empty($all_payment_detail->pay_date))

                                {{ $all_payment_detail->created_at->format('d-m-Y') }}


@else
                                {{ date("d-m-Y", strtotime($all_payment_detail->pay_date)) }}
                                @endif



                            </td>
                            <td>{{ $all_payment_detail->pay_method }}</td>
                            <td>{{ $all_payment_detail->grand_total }}</td>
                            <td>{{ $all_payment_detail->due }}</td>
                            <td>{{ $all_payment_detail->note }}</td>
                        </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end row -->
 <!--  Large modal example -->
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Payment </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if($invoice->due == 0)

                <h4>Already Paid, Due Amount {{ $invoice->due  }}</h4>

                @else
                <form action="{{ route('invoice_payment_store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label>Due Amount</label>
                            <div>
                                <div class="input-group">
                                    <input type="hidden" name="client_slug" class="form-control" value="{{ $invoice->client_slug }}">
                                    <input type="hidden" name="invoice_id" class="form-control" value="{{ $invoice->id }}">
                                    <input type="hidden" name="order_id" class="form-control" value="{{ $invoice->order_id }}">
                                    <input type="number" name="amount" class="form-control" value="{{ $invoice->due }}">
                                    <input type="hidden" name="total_pay" class="form-control" value="{{ $invoice->total_pay }}">
                                    <input type="hidden" name="previous_due" class="form-control" value="{{ $invoice->due }}">
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div> --}}
                                </div><!-- input-group -->
                            </div>
                        </div>

                        <div class="form-group col-lg-6 mb-3">
                            <label>date</label>
                            <input type="date" name="pay_date" class="form-control">
                        </div>
                        <div class="form-group col-lg-12 mb-3">
                            <label>Payment Method</label>
                            <select class="form-control" name="pay_method" id="">
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                                <option value="Bank">Bank</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 mb-3">
                            <label>Note</label>
                            <input type="text" name="note"  class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                @endif
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
@endsection
