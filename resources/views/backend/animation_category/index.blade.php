@extends('backend.master.master')

@section('title')
Animation Category information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Animation Category Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active">Product All Animation Category</li>
                </ol>
            </div>

        </div>
    </div>
    <div class="col-12">
        <h4 class="card-title">Product Animation Category Listing</h4>
        <p class="card-title-desc">You can <code>Show, Hide & Edit</code> all Animation Categorys</p>
    </div>
</div>
<!-- search bar --->
<div class="row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <div class="text-sm-end">
            <div class="form-group">
                <input type="text" name="search_on_cat_name" class="form-control" id="search_on_cat_name"
                       placeholder="Search">
            </div>
        </div>
    </div>
</div>
<!-- end search bar --->

<div class="row mt-2">
    <div class="col-sm-6 col-xl-6">
        <div class="d-flex flex-wrap gap-2">
            <p class="horizontal-center" >Selected:<span id="numberOfChecked"> 0</span></p>

            <button type="" id="delete_button" class="btn btn-sm btn-outline-danger waves-effect ml-4" disabled>
                Delete All
            </button>

        </div>
    </div>

    <div class="col-sm-6">
        <div class="text-sm-end">
            <button type="button"
                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"
                    data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">
                <i class="mdi mdi-plus me-1"></i> Add New Animation Category
            </button>
        </div>
            <!-- Modal -->
     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add Animation Category Information</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    </button>
    </div>
    <div class="modal-body">
        <form class="mt-3" method="Post" action="{{ route('animation_category_store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="a_name"
                               >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Slug</label>
                        <input readonly type="text" name="slug"  class="form-control" id="a_slug"
                               >
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input  type="file" name="image"  class="form-control" id="image" required/>
                    </div>
                </div>
                <hr class="mt-4">


                <div id="dynamicAddRemove">

                </div>
                <div class="col-sm-12 ">
                    <button type="button" id="add_more_address" class="mt-3 btn btn-light waves-effect btn-label waves-light"><i
                                class="bx bx-plus-medical label-icon "></i> Add New Subcategory
                    </button>
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
    </div>
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
                            <th >Image</th>
                            <th >Category Name</th>
                            <th >Subcategory List</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($category_list as $key=>$all_attribute)
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
                @include('backend.animation_category.normal_pagination')
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
    var i = 0;
    $("#add_more_address").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<div class="row mt-2" id="remove_id'+i+'"><div class="col-md-5"><input type="text" required placeholder="Subcategory Name" name="title[]" id="title'+i+'"  class="form-control"/></div><div class="col-md-2"><button type="button" id="remove'+i+'" data-mainr="'+i+'" class="btn btn-sm btn-outline-danger remove-input-field">Delete</button></div></div>');
    });




    $(document).on('click', '.remove-input-field', function () {
        var main_id = $(this).attr('data-mainr');
        console.log(main_id);
        $('#remove_id'+main_id).remove();

    });


</script>

<script type="text/javascript">
    var i = 0;
    $("[id^=add_more_address_edit]").click(function () {
        var main_id_edit = $(this).attr('data-mainloop');

        //alert(main_id_edit);
        ++i;
        $("#dynamicAddRemove_edit"+main_id_edit).append('<div class="row mt-2" id="remove_id_edit'+i+'"><div class="col-md-5"><input type="text" required placeholder="Subcategory Name" name="title[]" id="title_edit'+i+'"  class="form-control"/></div><div class="col-md-2"><button type="button" id="remove_edit'+i+'" data-mainr_edit="'+i+'" class="btn btn-sm btn-outline-danger remove-input-field_edit">Delete</button></div></div>');
    });




    $(document).on('click', '.remove-input-field_edit', function () {
        var main_id = $(this).attr('data-mainr_edit');
        //console.log(main_id);
        $('#remove_id_edit'+main_id).remove();

    });


</script>

<script type="text/javascript">
$(document).ready(function () {

    $(".closee").click(function(){
$("#myModal").modal('hide');
});
});
</script>

<script type="text/javascript" src="{{ asset('/') }}public/custom_js/animation_category_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
@endsection
