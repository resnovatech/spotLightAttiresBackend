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
            <th >Image</th>
            <th >Category Name</th>
            <th >Subcategory List</th>

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
            <td class="text-body fw-bold">{{ $key+1 }}</td>
            <td>
                <img src="{{ asset('/') }}{{ $all_attribute->image }}" style="height: 40px" />
            </td>
            <td>{{ $all_attribute->name }} </td>


            <td>
<?php

$users = DB::table('animationsubcategories')->where('cat_name',$all_attribute->slug)->get();

?>
@foreach($users as $all_user)
                {{ $all_user->name }},
                @endforeach



            </td>



            <td>
                <div class="d-flex gap-1">



                    @if (Auth::guard('admin')->user()->can('animation_category_update'))

<button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}">
            <i class="mdi mdi-pencil font-size-14"></i>
            </button>

<!-- Modal -->
@include('backend.animation_category.edit')
@endif
@if (Auth::guard('admin')->user()->can('animation_category_delete'))


                        <button class=" btn btn-transparent btn-sm text-danger"  onclick="deleteTag({{ $all_attribute->id}})"><i
                                    class="mdi mdi-delete font-size-14"></i></button>

                                    <form id="delete-form-{{ $all_attribute->id }}" action="{{ route('animation_category_delete',$all_attribute->id) }}" method="POST" style="display: none;">
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
@include('backend.animation_category.ajax_pagination')
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/animation_category_page_ajax.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/animation_category_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
