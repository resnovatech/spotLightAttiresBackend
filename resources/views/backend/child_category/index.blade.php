@extends('backend.master.master')

@section('title')
Sub Category information | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Product All Sub Category</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Product Sub categories Listing</h4>
                <p class="card-title-desc">You can <code>Show, Hide & Edit</code> all the sub categories
                    of parent category</p>


                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Category List Tree View</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Category List Table View</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="tree well">
                            <ul>
                                <!--parent category list -->
                                @foreach($sub_category_list as $key=>$all_parent_category)
                                <li>
                                    <span>
                                        <i class="dripicons-folder-open"></i>
                                        {{ $all_parent_category->cat_name }}
                                        <button class="border-none text-dark"
                                        style="margin-left:40px" data-type="00" data-name="{{ $all_parent_category->cat_name }}"  id="cat_add_data_with_ajax{{$key+1}}"><i
                                            class="mdi mdi-plus font-size-13" ></i></button>

                                    </span>
                                    <ul>

                                        <?php
                                        $sub_category_list1 = DB::table('categories')
                                        ->where('cat_name',$all_parent_category->cat_name)->whereNotNull('sub_cat')
                                        ->select('sub_cat')->groupBy('sub_cat')->get();

                                        ?>
                                        <!--sub category list -->
                                        @if(count($sub_category_list1)== 0)

                                        @else
                                        @foreach($sub_category_list1 as $key=>$all_sub_cat_list)
                                        <li>
                                            <span>
                                                <i class="dripicons-minus"></i>
                                                {{ $all_sub_cat_list->sub_cat }}
<!--action button--->
<button class="border-none text-dark"
style="margin-left:40px" data-type="10" data-name="{{ $all_sub_cat_list->sub_cat }}"  id="add_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-plus font-size-13" ></i></button>
<button class=" border-none text-success" data-type="0" data-name="{{ $all_sub_cat_list->sub_cat }}"  id="tedit_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-pencil font-size-13"></i></button>
<button class=" border-none text-danger" data-type="0" data-name="{{ $all_sub_cat_list->sub_cat }}"  id="delete_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-delete font-size-13" ></i></button>
<!--end action button--->
                                            </span>
                                            <ul>
                                                <?php
$child_one_list = DB::table('categories')
->where('cat_name',$all_parent_category->cat_name)
->where('sub_cat',$all_sub_cat_list->sub_cat)->whereNotNull('child_one')
                                        ->select('child_one')->groupBy('child_one')->get();
                                                ?>
                                               <!--child one list -->
                                               @if(count($child_one_list) == 0)


                                               @else
                                               @foreach($child_one_list as $key=>$all_child_list)
                                                <li>
                                                    <span>
                                                        <i class="dripicons-minus"></i>
                                                        {{ $all_child_list->child_one }}
                                                        <!--action button--->
                                        <button class="border-none text-dark" data-type="1" data-name="{{ $all_child_list->child_one }}"  id="c1add_data_with_ajax{{$key+1}}"
                                        style="margin-left:40px"><i
                                            class="mdi mdi-plus font-size-13"></i></button>
                                <button class=" border-none text-success" data-type="1" data-name="{{ $all_child_list->child_one }}"  id="c1edit_data_with_ajax{{$key+1}}"><i
                                            class="mdi mdi-pencil font-size-13"></i></button>
                                <button class=" border-none text-danger" data-type="1" data-name="{{ $all_child_list->child_one }}"  id="c1delete_data_with_ajax{{$key+1}}"><i
                                            class="mdi mdi-delete font-size-13" ></i></button>
                        <!--end action button--->
                                                    </span>
                                                    <ul>

                                            <?php
                                        $child_two_list = DB::table('categories')
                                        ->where('cat_name',$all_parent_category->cat_name)
->where('sub_cat',$all_sub_cat_list->sub_cat)
->where('child_one',$all_child_list->child_one)->whereNotNull('child_two')
                                        ->select('child_two')->groupBy('child_two')->latest()->get();

                                            ?>
                                                        <!--child two list  -->
                                                        @if(count($child_two_list) == 0)


                                                        @else
                                                        @foreach($child_two_list as $key=>$all_child_two_list)
                                                        <li>
                                                            <span>
                                                                <i class="dripicons-minus"></i>
                                                                {{ $all_child_two_list->child_two }}
<!--action button--->
<button class="border-none text-dark" data-type="2" data-name="{{ $all_child_two_list->child_two }}"  id="c2add_data_with_ajax{{$key+1}}"
style="margin-left:40px"><i
    class="mdi mdi-plus font-size-13"></i></button>
<button class=" border-none text-success" data-type="2" data-name="{{ $all_child_two_list->child_two }}"  id="c2edit_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-pencil font-size-13"></i></button>
<button class=" border-none text-danger" data-type="2" data-name="{{ $all_child_two_list->child_two }}"  id="c2delete_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-delete font-size-13" ></i></button>
<!--end action button--->
                                                            </span>
                                                            <ul>
                                                                <?php
                                                                $child_three_list = DB::table('categories')
                                                                ->where('cat_name',$all_parent_category->cat_name)
->where('sub_cat',$all_sub_cat_list->sub_cat)
->where('child_one',$all_child_list->child_one)
                        ->where('child_two',$all_child_two_list->child_two)->whereNotNull('child_three')
                                                                ->select('child_three')->groupBy('child_three')->get();

                                                                    ?>
                                                                <!--child three -->
                                                                @if(count($child_three_list) == 0)

                                                                @else
                                                                @foreach($child_three_list as $key=>$all_child_three_list)
                                                                <li>
                                                                    <span>
                                                                        <i class="dripicons-minus"></i>
                                                                        {{ $all_child_three_list->child_three }}
                                                                        <!--action button--->
                                        <button class="border-none text-dark" data-type="3" data-name="{{ $all_child_three_list->child_three }}"  id="c3add_data_with_ajax{{$key+1}}"
                                        style="margin-left:40px"><i
                                            class="mdi mdi-plus font-size-13"></i></button>
                                <button class=" border-none text-success" data-type="3" data-name="{{ $all_child_three_list->child_three }}"  id="c3edit_data_with_ajax{{$key+1}}"><i
                                            class="mdi mdi-pencil font-size-13"></i></button>
                                <button class=" border-none text-danger" data-type="3" data-name="{{ $all_child_three_list->child_three }}"  id="c3delete_data_with_ajax{{$key+1}}"><i
                                            class="mdi mdi-delete font-size-13" ></i></button>
                        <!--end action button--->
                                                                    </span>
                                                                    <ul>
                                                                        <?php
                                                                        $child_four_list = DB::table('categories')
                                                                        ->where('cat_name',$all_parent_category->cat_name)
->where('sub_cat',$all_sub_cat_list->sub_cat)
->where('child_one',$all_child_list->child_one)
                        ->where('child_two',$all_child_two_list->child_two)
                                ->where('child_three',$all_child_three_list->child_three)->whereNotNull('child_four')
                                                                        ->select('child_four')->groupBy('child_four')->get();

                                                                            ?>
                                                                        <!-- children four -->
                                                                        @if(count($child_four_list) == 0 )

                                                                        @else
                                                                        @foreach($child_four_list as $key=>$all_child_four_list)
                                                                        <li>

                                                            <span>
                                                                <i class="dripicons-minus"></i>
                                                                {{ $all_child_four_list->child_four }}
<!--action button--->
<button class="border-none text-dark"
style="margin-left:40px" data-type="4" data-name="{{ $all_child_four_list->child_four }}"  id="c4add_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-plus font-size-13"></i></button>
<button class=" border-none text-success" data-type="4" data-name="{{ $all_child_four_list->child_four }}"  id="c4edit_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-pencil font-size-13"></i></button>
<button class=" border-none text-danger" data-type="4" data-name="{{ $all_child_four_list->child_four }}"  id="c4delete_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-delete font-size-13" ></i></button>
<!--end action button--->
                                                            </span>

                                                                            <ul>

                                                                                <?php
                                                                                $child_five_list = DB::table('categories')
                                                                                ->where('cat_name',$all_parent_category->cat_name)
                                                                                ->where('sub_cat',$all_sub_cat_list->sub_cat)
                                                                                ->where('child_one',$all_child_list->child_one)
                                                                                ->where('child_two',$all_child_two_list->child_two)
                                                                                ->where('child_three',$all_child_three_list->child_three)
                                                                                ->where('child_four',$all_child_four_list->child_four)
                                                                                ->whereNotNull('child_five')
                                                                                ->select('child_five')->distinct('child_five')->get();

                                                                                    ?>
                                                                                    @if(count($child_five_list) == 0)

                                                                                    @else
                                                                                <!--child five -->
                                                                                @foreach($child_five_list as $key=>$all_child_five_list)
                                                                                <li>
                                                                                    <span>
                                                                                        <i class="dripicons-minus"></i>
                                                                                        {{ $all_child_five_list->child_five }}
<!--action button--->
<button class="border-none text-dark" data-type="5" data-name="{{ $all_child_five_list->child_five }}"  id="c5add_data_with_ajax{{$key+1}}"
style="margin-left:40px"><i
    class="mdi mdi-plus font-size-13"></i></button>
<button class=" border-none text-success" data-type="5" data-name="{{ $all_child_five_list->child_five }}"  id="c5edit_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-pencil font-size-13" ></i></button>
<button class=" border-none text-danger" data-type="5" data-name="{{ $all_child_five_list->child_five }}"  id="c5delete_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-delete font-size-13" ></i></button>
<!--end action button--->
                                                                                    </span>
                                                                                    <ul>

                                                                                        <?php
                                                                                        $child_six_list = DB::table('categories')
                                                                                        ->where('cat_name',$all_parent_category->cat_name)
                                                                                ->where('sub_cat',$all_sub_cat_list->sub_cat)
                                                                                ->where('child_one',$all_child_list->child_one)
                                                                                ->where('child_two',$all_child_two_list->child_two)
                                                                                ->where('child_three',$all_child_three_list->child_three)
                                                                                ->where('child_four',$all_child_four_list->child_four)
                                                ->where('child_five',$all_child_five_list->child_five)->whereNotNull('child_six')
                                                                                        ->select('child_six')->groupBy('child_six')->get();

                                                                                            ?>

@if(count($child_six_list) == 0)

@else
@foreach($child_six_list as $key=>$all_child_six_list)
                                                                                        <!--child six -->
                                                                                        <li>
                                                                                            <span>
                                                                                                <i class="dripicons-minus"></i>
                                                                                                {{ $all_child_six_list->child_six }}
<!--action button--->
<button class="border-none text-dark" data-type="6" data-name="{{ $all_child_six_list->child_six }}"  id="c6add_data_with_ajax{{$key+1}}"
style="margin-left:40px"><i
    class="mdi mdi-plus font-size-13"></i></button>
<button class=" border-none text-success" data-type="6" data-name="{{ $all_child_six_list->child_six }}"  id="c6edit_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-pencil font-size-13" ></i></button>
<button class=" border-none text-danger" data-type="6" data-name="{{ $all_child_six_list->child_six }}"  id="c6delete_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-delete font-size-13" ></i></button>
<!--end action button--->

                                                                                            </span>
                                                                                            <ul>
                                                                                                <?php
                                                                                                $child_seven_list = DB::table('categories')
                                                                                                ->where('cat_name',$all_parent_category->cat_name)
                                                                                ->where('sub_cat',$all_sub_cat_list->sub_cat)
                                                                                ->where('child_one',$all_child_list->child_one)
                                                                                ->where('child_two',$all_child_two_list->child_two)
                                                                                ->where('child_three',$all_child_three_list->child_three)
                                                                                ->where('child_four',$all_child_four_list->child_four)
                                                ->where('child_five',$all_child_five_list->child_five)
                                                        ->where('child_six',$all_child_six_list->child_six)->whereNotNull('child_seven')
                                                                                                ->select('child_seven')->groupBy('child_seven')->get();

                                                                                                    ?>
                                                                                                    @if(count($child_seven_list) == 0)

                                                                                                    @else

                                                                                                    @foreach($child_seven_list as $key=>$all_child_seven_list)
                                                                                                <!--child seven-->
                                                                                                <li>
                                                                                                    <span>
                                                                                                        <i class="dripicons-minus"></i>
                                                                                                        {{ $all_child_seven_list->child_seven }}
<!--action button--->
<button class="border-none text-dark" data-type="7" data-name="{{ $all_child_seven_list->child_seven }}"  id="c7add_data_with_ajax{{$key+1}}"
style="margin-left:40px"><i
    class="mdi mdi-plus font-size-13"></i></button>
<button class=" border-none text-success" data-type="7" data-name="{{ $all_child_seven_list->child_seven }}"  id="c7edit_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-pencil font-size-13"></i></button>
<button class=" border-none text-danger" data-type="7" data-name="{{ $all_child_seven_list->child_seven }}"  id="c7delete_data_with_ajax{{$key+1}}"><i
    class="mdi mdi-delete font-size-13" ></i></button>
<!--end action button--->

                                                                                                    </span>
                                                                                            <ul>

                                                                                                <?php
                                                                                                $child_eight_list = DB::table('categories')
                                                                                                ->where('cat_name',$all_parent_category->cat_name)
                                                                                ->where('sub_cat',$all_sub_cat_list->sub_cat)
                                                                                ->where('child_one',$all_child_list->child_one)
                                                                                ->where('child_two',$all_child_two_list->child_two)
                                                                                ->where('child_three',$all_child_three_list->child_three)
                                                                                ->where('child_four',$all_child_four_list->child_four)
                                                ->where('child_five',$all_child_five_list->child_five)
                                                        ->where('child_six',$all_child_six_list->child_six)
                                                        ->where('child_seven',$all_child_seven_list->child_seven)->whereNotNull('child_eight')
                                                                                                ->select('child_eight')->groupBy('child_eight')->get();

                                                                                                    ?>

@if(count($child_eight_list) == 0)


@else

@foreach($child_eight_list as $key=>$all_child_eight_list)
                                                                                                <!--child eight -->
                                                                                                <li>
                                                                                                    <span>
                                                                                                        <i class="dripicons-minus"></i>
                                                                                                        {{ $all_child_eight_list->child_eight }}

                                                                                                        <!--action button--->
                                        <button class="border-none text-dark" data-type="8" data-name="{{ $all_child_eight_list->child_eight }}"  id="c8add_data_with_ajax{{$key+1}}"
                                        style="margin-left:40px"><i
                                            class="mdi mdi-plus font-size-13"></i></button>
                                <button class=" border-none text-success" data-type="8" data-name="{{ $all_child_eight_list->child_eight }}"  id="c8edit_data_with_ajax{{$key+1}}"><i
                                            class="mdi mdi-pencil font-size-13"></i></button>
                                <button class=" border-none text-danger" data-type="8" data-name="{{ $all_child_eight_list->child_eight }}"  id="c8delete_data_with_ajax{{$key+1}}"><i
                                            class="mdi mdi-delete font-size-13" ></i></button>
                        <!--end action button--->
                                                                                                    </span>
                                                                                                </li>
                                                                                                <!--child eight -->
                                                                                                @endforeach
                                                                                                @endif
                                                                                            </ul>
                                                                                                </li>
                                                                                                @endforeach
                                                                                                @endif
                                                                                                <!--end child seven -->
                                                                                            </ul>
                                                                                        </li>
                                                                                        @endforeach
                                                                                        @endif
                                                                                        <!--end child six -->
                                                                                    </ul>
                                                                                </li>
                                                                                @endforeach
                                                                                @endif
                                                                                <!--end child five -->
                                                                            </ul>
                                                                        </li>

                                                                        @endforeach
                                                                        @endif
                                                                        <!-- end child four -->
                                                                    </ul>
                                                                </li>
                                                                @endforeach
                                                                @endif
                                                                <!-- end child three -->

                                                            </ul>
                                                        </li>
                                                        @endforeach
                                                        @endif
<!--end child two list -->
                                                    </ul>
                                                </li>
                                                @endforeach
                                                @endif
                                                <!--end child one list -->

                                            </ul>
                                        </li>
                                        @endforeach
                                        @endif
                                        <!--end subcategory-->
                                    </ul>
                                </li>
                                <!--end parent category list -->
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                         <!--ajax result-->
                        <div id="main_content_table">
                        <div class="table-responsive">
                            <table class="table align-middle table-bordered ">
                                <thead class="table-light">
                                <tr>
                                    {{-- <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th> --}}
                                    <th class="align-middle">Sl.</th>
                                    <th class="align-middle">Sub category name</th>
                                    <th class="align-middle">Parent category tree</th>
                                    {{-- <th class="align-middle">Input date</th> --}}
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($sub_category_list_table as $key=>$all_table_sub_cat)
                                <tr>
                                    {{-- <td>
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                            <label class="form-check-label" for="orderidcheck01"></label>
                                        </div>
                                    </td> --}}
                                    <td class="text-body fw-bold">{{ $key+1 }}</td>
                                    <td>{{ $all_table_sub_cat->sub_cat }}</td>
                                    <td>

                                        <?php
                                        $input_list_cat = DB::table('categories')
                                                        ->where('sub_cat',$all_table_sub_cat->sub_cat)
                                                        ->orderBy('id','desc')->get();
                                                        //dd($input_date);

                                        ?>
                                        @foreach($input_list_cat as $input_list_cat)

 <span style="font-size: 10px;">{{ $input_list_cat->cat_name }} > {{ $input_list_cat->sub_cat }} >

@if(empty($input_list_cat->child_one))

@else
     {{ $input_list_cat->child_one }} >
@endif

@if(empty($input_list_cat->child_two))

@else
     {{ $input_list_cat->child_two }} >
@endif

@if(empty($input_list_cat->child_three))

@else
     {{ $input_list_cat->child_three }} >
@endif

@if(empty($input_list_cat->child_four))

@else
     {{ $input_list_cat->child_four }} >
@endif

@if(empty($input_list_cat->child_five))

@else
     {{ $input_list_cat->child_five }} >
@endif

@if(empty($input_list_cat->child_six))

@else
     {{ $input_list_cat->child_six }} >
@endif

@if(empty($input_list_cat->child_seven))

@else
     {{ $input_list_cat->child_seven }} >
@endif
@if(empty($input_list_cat->child_eight))

@else
     {{ $input_list_cat->child_eight }}

@endif

<br>
@endforeach
    </span>


                                    </td>
                                    {{-- <td>

                                        <?php
                                        $input_date = DB::table('categories')
                                                        ->where('sub_cat',$all_table_sub_cat->sub_cat)
                                                        ->orderBy('id','desc')->value('created_at');
                                                        //dd($input_date);

                                        ?>




{{ \Carbon\Carbon::parse($input_date)->format('d/m/Y'); }}

                                    </td> --}}
                                    <td>

                                        <?php
                                        $input_status = DB::table('categories')
                                                        ->where('sub_cat',$all_table_sub_cat->sub_cat)
                                                        ->orderBy('id','desc')->value('status');
                                                        //dd($input_date);

                                        ?>

@if($input_status  == 'Inactive')

                                        <span class="badge badge-pill badge-soft-danger font-size-12">Inactive</span>
                            @else
                            <span class="badge badge-pill badge-soft-success font-size-12">Active</span>
                            @endif
                                    </td>

                                    <td>
                                        <div class="d-flex gap-3">
                                            <a href="javascript:void(0);" class="text-success"><i
                                                        class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="javascript:void(0);" data-name="{{ $all_table_sub_cat->sub_cat }}" id="table_data_delete{{ $key+1 }}" class="text-danger"><i
                                                        class="mdi mdi-delete font-size-18"></i></a>
                                        </div>
                                    </td>
                                </tr>
@endforeach



                                </tbody>
                            </table>
                        </div>
                        <!--normal pagination code -->
@include('backend.child_category.child_category_pagination')
                        <!-- end normal paination code -->
                        </div>
                        <!--ajax result-->
                    </div>
                </div>





            </div>
        </div>
    </div>

    <div class="col-xl-4">
        @include('flash_message')
        <div class="card">
            <div class="card-body"  id="add_and_edit_form_with_ajax">

                <h4 class="card-title">Add Sub categories Form</h4>

                <form class="mt-3" action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <?php

                        $checkfor_first_child = DB::table('categories')
                        ->whereNotNull('sub_cat')->count();

                        $checkfor_second_child = DB::table('categories')
                        ->whereNotNull('child_one')->count();


                        $checkfor_three_child = DB::table('categories')
                        ->whereNotNull('child_two')->count();


                        $checkfor_four_child = DB::table('categories')
                        ->whereNotNull('child_three')->count();

                        $checkfor_five_child = DB::table('categories')
                        ->whereNotNull('child_four')->count();

                        $checkfor_six_child = DB::table('categories')
                        ->whereNotNull('child_five')->count();

                        $checkfor_seven_child = DB::table('categories')
                        ->whereNotNull('child_six')->count();
                        $checkfor_eight_child = DB::table('categories')
                        ->whereNotNull('child_seven')->count();

                        //dd($checkfor_first_child);


                         ?>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Type of category</label>
                                <select class="form-control" name="cat_type" id="cat_type">
                                    <option value="0">--- >Please Select One <---</option>
                                    <option value="SubCategory">SubCategory</option>
                                    @if($checkfor_first_child == 0)

                                    @else
                                    <option value="FirstChild">FirstChild</option>
                                    @endif
                                    @if($checkfor_second_child == 0)

                                    @else
                                    <option value="SecondChild">SecondChild</option>
                                    @endif
                                    @if($checkfor_three_child == 0)

                                    @else
                                    <option value="ThirdChild">ThirdChild</option>
                                    @endif
                                    @if($checkfor_four_child == 0)

                                    @else
                                    <option value="FourthChild">FourthChild</option>
                                    @endif

                                    @if($checkfor_five_child == 0)

                                    @else
                                    <option value="FifthChild">FifthChild</option>
                                    @endif
                                    @if($checkfor_six_child == 0)

                                    @else
                                    <option value="SixthChild">SixthChild</option>
                                    @endif
                                    @if($checkfor_seven_child == 0)

                                    @else
                                    <option value="SeventhChild">SeventhChild</option>
                                    @endif
                                    @if($checkfor_eight_child == 0)

                                    @else
                                    <option value="EightChild">EightChild</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div  id="final_result_cat">
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Staus</label>
                                <select class="form-control" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">

<h1 class="modal-title text-danger">Are You Sure ?</h1>
    <h3 class="modal-title text-danger">All The child category under <span id="show_cat"></span> will be delete</h3>

    <form method="GET" action="{{ route('admin.child_category.delete') }}">
        <input type="hidden" id="show_cat1" name="delete_data" />
    <button class="btn btn-success w-md waves-effect waves-light"  type="submit">Yes</button>
    </form>
                    <button class="btn btn-danger w-md waves-effect waves-light close"  >Cancel</button>


            </div>

        </div>
    </div>
</div>
<!--end modal for delete  -->

<!-- Modal HTML -->
<div id="myModal1" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">

<h1 class="modal-title text-danger">Are You Sure ?</h1>
    <h3 class="modal-title text-danger">All The child category under <span id="show_cat_tree"></span> will be delete </h3>

    <form method="GET" action="{{ route('admin.child_category_tree.delete') }}">
        <input type="hidden" id="show_cat_tree1" name="delete_data_tree" />
        <input type="hidden" id="show_cat_tree_type" name="delete_data_tree_type" />
    <button class="btn btn-success w-md waves-effect waves-light"  type="submit">Yes</button>
    </form>
                    <button class="btn btn-danger w-md waves-effect waves-light close1"  >Cancel</button>


            </div>

        </div>
    </div>
</div>
<!--end modal for delete tree -->
@endsection


@section('script')

<script type="text/javascript" src="{{ asset('/') }}public/custom_js/subcat_tree.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/subcat_tree_add.js"></script>
<script type="text/javascript" src="{{ asset('/') }}public/custom_js/subcat_tree_edit.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //open delete modal
        $("[id^=table_data_delete]").click(function(){
            var data_name= $(this).attr('data-name');
            $("#myModal").modal('show');
            $("#show_cat").text(data_name);
            $("#show_cat1").val(data_name);

        });

        $(".close").click(function(){
            $("#myModal").modal('hide');
        });
        //end open delete modal

        //add with ajax

        // $("[id^=add_data_with_ajax]").click(function(){

        //     var data_type= $(this).attr('data-type');
        //     var data_name= $(this).attr('data-name');

        //     alert(data_name+data_type);
        // });
        //add with ajax

        $('#cat_type').on('change', function () {
            var cat_type = $(this).val();
//alert(cat_type);

$.ajax({
            url: "{{ route('category_type') }}",
            method: 'GET',
            data: {cat_type:cat_type},
            success: function(data) {
              $("#final_result_cat").html('');
              $("#final_result_cat").html(data);
            }
        });
    });

    //pagination stated

    $("[id^=page_link]").click(function(){


var main_id = $(this).attr('id');
var id_for_pass = main_id.slice(9);
//alert(id_for_pass);

//var token = $("input[name='_token']").val();
$.ajax({
url: "{{ route('child_category_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});

//next page button
$("#npage_link").click(function(){

var id_for_pass = 2;

$.ajax({
url: "{{ route('child_category_pagi_ajax') }}",
method: 'GET',
data: {id_for_pass:id_for_pass},
success: function(data) {
  $("#main_content_table").html('');
  $("#main_content_table").html(data.options);
}
});

});

//end next button

    //pagination end
});
    </script>
<script>
    $(function () {
        $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree li.parent_li > span').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('dripicons-plus').removeClass('dripicons-minus');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('dripicons-minus').removeClass('dripicons-plus');
            }
            e.stopPropagation();
        });
    });
</script>
@endsection
