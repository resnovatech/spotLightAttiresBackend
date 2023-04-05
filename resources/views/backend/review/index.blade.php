@extends('backend.master.master')

@section('title')
Review information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Review Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active">All Review</li>
                </ol>
            </div>

        </div>
    </div>
    <div class="col-12">
        <h4 class="card-title">Review Listing</h4>
        <p class="card-title-desc">You can <code>Show, Hide & Edit</code> all Review</p>
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

            </button>
            <button type="" id="delete_button" class="btn btn-sm btn-outline-danger waves-effect ml-4" disabled>
                Delete All
            </button>

        </div>
    </div>

    <div class="col-sm-6">

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
                            <th >User Name</th>
                            <th >Product name</th>
                            <th >Total Star</th>
                            <th >Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($review_infromation as $key=>$all_attribute)
                        <tr>
                            <td>
                                <div class="form-check font-size-16">
                                    <input class="form-check-input sub_chk" value="{{$all_attribute->id}}"  data-id="{{$all_attribute->id}}" type="checkbox" id="orderidcheck01">
                                    <label class="form-check-label" for="orderidcheck01"></label>
                                </div>
                            </td>
                            <td class="text-body fw-bold">{{ $key+1 }}</td>
                            <td>

                                <?php
$user_name = DB::table('users')->where('id',$all_attribute->user_id )->value('name');

                                    ?>
                                {{ $user_name}}
                            </td>
                            <td>{{ $all_attribute->product_name }} </td>
                            <td>{{ $all_attribute->total_star }}</td>
                            <td>{{ $all_attribute->des }}</td>


                            <td>
                                <div class="d-flex gap-1">
                                    @if (Auth::guard('admin')->user()->can('review_update'))

                                    <button class="btn btn-transparent btn-sm text-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg{{ $all_attribute->id }}">
                                                                <i class="mdi mdi-pencil font-size-14"></i>
                                                                </button>

                                        <!-- Modal -->
                                        @include('backend.review.edit')
                                    @endif

    @if (Auth::guard('admin')->user()->can('review_delete'))


                                        <button class=" btn btn-transparent btn-sm text-danger"  onclick="deleteTag({{ $all_attribute->id}})"><i
                                                    class="mdi mdi-delete font-size-14"></i></button>

                                                    <form id="delete-form-{{ $all_attribute->id }}" action="{{ route('review_list_delete',$all_attribute->id) }}" method="POST" style="display: none;">

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
                @include('backend.review.normal_pagination')
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
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/review_page_search.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/review_page.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/delete_code.js"></script>
@endsection
