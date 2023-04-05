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
            <th >Unit name</th>
            <th >Slug</th>

            <th>Status</th>
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
            <td>{{ $all_attribute->slug }}</td>

            <td>
                @if($all_attribute->status == 'Active')

                <span class="badge badge-pill badge-soft-success font-size-12">Active</span>

                @else
                <span class="badge badge-pill badge-soft-danger font-size-12">Inactive</span>
                @endif
            </td>

            <td>
                <div class="d-flex gap-1">



                    @if (Auth::guard('admin')->user()->can('unit_update'))

<button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}">
            <i class="mdi mdi-pencil font-size-14"></i>
            </button>

<!-- Modal -->
@include('backend.unit.edit')
@endif
@if (Auth::guard('admin')->user()->can('unit_delete'))


                        <button class=" btn btn-transparent btn-sm text-danger"  onclick="deleteTag({{ $all_attribute->id}})"><i
                                    class="mdi mdi-delete font-size-14"></i></button>

                                    <form id="delete-form-{{ $all_attribute->id }}" action="{{ route('admin.unit.delete',$all_attribute->id) }}" method="POST" style="display: none;">
                                        @method('DELETE')
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
@include('backend.unit.ajax_pagination')
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/unit_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/unit_page_search.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/unit_page_search_ajax.js"></script>
