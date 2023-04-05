<div class="table-responsive">
    <table class="table align-middle table-nowrap table-check">
        <thead class="table-light">
        <tr>
            <th style="width: 20px;" class="align-middle">
                <div class="form-check font-size-16">
                    <input class="form-check-input" type="checkbox" id="checkAll">
                    <label class="form-check-label" for="checkAll"></label>
                </div>
            </th>
            <th class="align-middle">Order ID</th>
            <th class="align-middle">Billing Name</th>
            <th class="align-middle">Date</th>
            <th class="align-middle">Total</th>
            <th class="align-middle">Payment Status</th>
            <th class="align-middle">Pay Status</th>
            <th class="align-middle">Delivery Status</th>
            <th class="align-middle">Order From</th>
            <th class="align-middle">View Details</th>
            <th class="align-middle">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($product_list as $all_invoice_list)
        <tr>
            <td>
                <div class="form-check font-size-16">
                    <input class="form-check-input sub_chk" value="{{$all_invoice_list->id}}"  data-id="{{$all_invoice_list->id}}" type="checkbox" id="master">
                    <label class="form-check-label" for="orderidcheck01"></label>
                </div>
            </td>
            <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $all_invoice_list->order_id }}</a> </td>
            <td>

                @if($all_invoice_list->order_status == 'Web')

                <?php

                $client_name = DB::table('users')
                ->where('id', $all_invoice_list->client_slug )->value('name');
                                    ?>

                                    {{ $client_name }}
                @else

                <?php

$client_name = DB::table('clients')
->where('slug', $all_invoice_list->client_slug )->value('name');
                ?>

                {{ $client_name }}
@endif

            </td>
            <td>
                {{ $all_invoice_list->pay_date }}
            </td>
            <td>
                {{ $all_invoice_list->grand_total }}
            </td>
            <td>
                @if($all_invoice_list->due == 0 )
                <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                @else
                <span class="badge badge-pill badge-soft-danger font-size-12">UnPaid</span>
                @endif
            </td>
            <td>
                @if(empty($all_invoice_list->delivery_status))

                <button type="button" class="btn btn-info btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".oorderdetailsModal{{ $all_invoice_list->id }}">
                    Pending
                </button>

                @else
                <button type="button" class="btn btn-info btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".oorderdetailsModal{{ $all_invoice_list->id }}">
                    {{ $all_invoice_list->delivery_status }}
                </button>
                @endif

                                <!-- Modal -->
<div class="modal fade oorderdetailsModal{{ $all_invoice_list->id }}" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="orderdetailsModalLabel">Delivery Status</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">

<form action="{{ route('update_delivery_status') }}" method="post">
@csrf
<input type="hidden" value="{{ $all_invoice_list->id }}" name="id" />
    <select class="form-control" name="delivery_status">
        @if(empty($all_invoice_list->delivery_status))
        <option value="Pending" selected>Pending</option>
        <option value="Ready To Ship" >Ready To Ship</option>
        <option value="Delivered" >Delivered</option>
        <option value="Cancelled" >Cancelled</option>
        @else

        <option value="Pending" {{ $all_invoice_list->delivery_status == 'Pending' ? 'selected':'' }}>Pending</option>
        <option value="Ready To Ship" {{ $all_invoice_list->delivery_status == 'Ready To Ship' ? 'selected':'' }}>Ready To Ship</option>
        <option value="Delivered" {{ $all_invoice_list->delivery_status == 'Delivered' ? 'selected':'' }}>Delivered</option>
        <option value="Cancelled" {{ $all_invoice_list->delivery_status == 'Cancelled' ? 'selected':'' }}>Cancelled</option>
        @endif

    </select>

    <button type="submit" class="btn btn-primary  mt-2">Update</button>

</form>

</div>

</div>
</div>
</div>
<!-- end modal -->

            </td>
            <td>
                @if(empty($all_invoice_list->order_status))
                <span class="badge badge-pill badge-soft-success font-size-12">Admin</span>
                @else
                <span class="badge badge-pill badge-soft-danger font-size-12">Web</span>
                @endif

            </td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal{{ $all_invoice_list->id }}">
                    View Details
                </button>
                <!-- Modal -->
<div class="modal fade orderdetailsModal{{ $all_invoice_list->id }}" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id=orderdetailsModalLabel">Order Details</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<p class="mb-2">Invoice id: <span class="text-primary">{{ $all_invoice_list->order_id }}</span></p>
<p class="mb-4">Billing Name: <span class="text-primary">{{ $client_name }}</span></p>


<?php

$product_list = DB::table('invoice_details')
        ->where('invoice_id', $all_invoice_list->id )->get();
                                ?>


<div class="table-responsive">
    <table class="table align-middle table-nowrap">
        <thead>
        <tr>
            <th scope="col">Product</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
            @foreach($product_list as $all_product_list)
<?php
            $product_image = DB::table('feature_product_images')
            ->where('product_name', $all_product_list->product_id )->value('filename');


            $product_name = DB::table('main_products')
            ->where('id', $all_product_list->product_id )->value('product_name');


                                    ?>
        <tr>
            <th scope="row">
                <div>
                    <img src="{{ asset('/') }}{{ $product_image}}" alt="" class="avatar-sm">
                </div>
            </th>
            <td>
                <div>
                    <h5 class="text-truncate font-size-14">{{ $product_name }}({{ $all_product_list->color }} )</h5>
                    <p class="text-muted mb-0"> {{ $all_product_list->price }} x  {{ $all_product_list->qty }}</p>
                </div>
            </td>
            <td>{{ $all_product_list->total_price }}</td>
        </tr>
@endforeach
        <tr>
            <td colspan="2">
                <h6 class="m-0 text-right">Sub Total:</h6>
            </td>
            <td>
    {{ $all_invoice_list->total_net_price}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h6 class="m-0 text-right">Discount:</h6>
            </td>
            <td>
                {{ $all_invoice_list->total_discount}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h6 class="m-0 text-right">Vat/Tax:</h6>
            </td>
            <td>
                {{ $all_invoice_list->total_vat_tax}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h6 class="m-0 text-right">Shipping:</h6>
            </td>
            <td>
                {{ $all_invoice_list->delivery_charge}}
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h6 class="m-0 text-right">Total:</h6>
            </td>
            <td>
                {{ $all_invoice_list->grand_total}}
            </td>
        </tr>
        </tbody>
    </table>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- end modal -->
            </td>
            <td>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="{{ route('invoice_list_view',$all_invoice_list->id ) }}" class="dropdown-item"><i class="mdi mdi-eye font-size-16 text-info me-1"></i> View</a></li>

                        @if($all_invoice_list->delivery_status == 'Ready To Ship' || $all_invoice_list->delivery_status == 'Cancelled')


                        @else
                        <li><a href="{{ route('exchange_list',$all_invoice_list->id ) }}" class="dropdown-item"><i class="mdi mdi-arrow-left-right-bold
                            font-size-16 text-primary me-1"></i> Exchnage</a></li>
                        <li><a href="{{ route('invoice_return',$all_invoice_list->id ) }}" class="dropdown-item"><i class="mdi mdi-arrow-left-thick font-size-16 text-warning me-1"></i> Return</a></li>
@endif

                        @if($all_invoice_list->order_status == 'Web')

                        @else
                        <li><a href="{{ route('invoice_list_edit',$all_invoice_list->id ) }}" class="dropdown-item"><i class="mdi mdi-pencil font-size-16 text-success me-1"></i> Edit</a></li>
                        @endif
                        @if (Auth::guard('admin')->user()->can('invoice_delete'))
                        <li><a href="#" class="dropdown-item" onclick="deleteTag({{ $all_invoice_list->id}})"><i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i> Delete</a></li>
                        @endif
                    </ul>
                    <form id="delete-form-{{ $all_invoice_list->id }}" action="{{ route('invoice_list_delete',$all_invoice_list->id) }}" method="POST" style="display: none;">

                        @csrf

                    </form>
                </div>
            </td>
        </tr>
      @endforeach

        </tbody>
    </table>
</div>
<!--pagination start -->
@include('backend.invoice.normal_pagination')
<!--pagination end -->
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>



<script type="text/javascript" src="{{ asset('/') }}public/custom_js/invoice_page_search.js"></script>
