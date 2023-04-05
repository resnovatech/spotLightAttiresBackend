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
            <th >Name</th>
            <th >Email/Phone</th>
            <th>Address</th>
           <th>Join From</th>
           <th>Total Buy</th>
           <th>Joining Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

            @foreach($product_list as $key=>$all_attribute)
        <tr>
            <td>
                <div class="form-check font-size-16">
                    <input class="form-check-input sub_chk" value="{{$all_attribute->id}}"  data-id="{{$all_attribute->id}}" type="checkbox" id="orderidcheck01">
                    <label class="form-check-label" for="orderidcheck01"></label>
                </div>
            </td>
            @if($minus_one == 0)
            <td>{{ $key+1 }}</td>
            @else
            <td>{{ $minus_one = $minus_one+1 }}</td>
            @endif
            <td>{{ $all_attribute->name }} </td>
            <td>
                <p class="mb-1">{{ $all_attribute->email }}</p>
                                <p class="mb-0">{{ $all_attribute->phone }}</p>

            </td>

            <td>{{ $all_attribute->address }}</td>
            <td>

                @if(empty($all_attribute->status))
                <span class="badge bg-success font-size-12">Admin</span>
                @else
                <span class="badge bg-success font-size-12">Web</span>
                @endif

            </td>


            <td>

                <?php $total_buy = DB::table('invoices')->where('client_slug',$all_attribute->slug)->sum('grand_total');?>


                <span class="badge bg-primary">{{ $total_buy }}</span>





            </td>
            <td> {{ $all_attribute->created_at->format('d-m-Y') }}</td>

            <td>
                <div class="d-flex gap-1">

                    <a href="{{ route('client_list_view',$all_attribute->slug  ) }}" class="text-primary"><i class="mdi mdi-eye font-size-18"></i></a>

                    @if (Auth::guard('admin')->user()->can('client_update'))

<button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}">
            <i class="mdi mdi-pencil font-size-14"></i>
            </button>

<!-- Modal -->
@include('backend.client.edit')
@endif
@if (Auth::guard('admin')->user()->can('client_delete'))


                        <button class=" btn btn-transparent btn-sm text-danger"  onclick="deleteTag({{ $all_attribute->id}})"><i
                                    class="mdi mdi-delete font-size-14"></i></button>

                                    <form id="delete-form-{{ $all_attribute->id }}" action="{{ route('client_list_delete',$all_attribute->id) }}" method="POST" style="display: none;">

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
@include('backend.client.ajax_pagination')
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/client_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
