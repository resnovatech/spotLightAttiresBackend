@extends('backend.master.master')

@section('title')
About Us Page
@endsection

@section('css')

@endsection


@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">About Us Page List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">About Us Page</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    @include('flash_message')
    <div class="col-6">
        <div class="card">

            <div class="card-header">
<h6 class="card-title text-center">Title Section</h6>
            </div>

            <div class="card-body">
                @if(count($about_us_title) == 0)

                <form method="post" action="{{ route('about_us_title_store') }}" enctype="multipart/form-data">
                    @csrf




                    <div class="mb-3">
                        <label for="" class="form-label">Title </label>
<input type="text" class="form-control" name="title_one" />

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Sub-Title </label>
<input type="text" class="form-control" name="title_two" />

                    </div>







                    <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
                </form>

                @else
                <form method="post" action="{{ route('about_us_title_update') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach($about_us_title as $all_category_list_one)

                    <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />


                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
<input type="text" class="form-control" name="title_one" value="{{ $all_category_list_one->title_one }}" />

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Sub-Title</label>
<input type="text" class="form-control" name="title_two" value="{{ $all_category_list_one->title_two }}" />

                    </div>



                    @endforeach
                    <button type="submit"  class="btn btn-sm btn-primary">Update</button>
                </form>
                @endif

            </div>


        </div>
    </div>
    <div class="col-6">
        <div class="card-header">
            <h6 class="card-title text-center">First Section</h6>
        </div>

        <div class="card-body">

            @if(count($aboutus_body_first_list) == 0)

            <form method="post" action="{{ route('about_us_body_first_part_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Main title</label>
<input type="text" class="form-control" name="main_title" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control" name="title_one" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title One Description</label>
<textarea class="form-control" name="title_one_des"></textarea>

                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control" name="title_two" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two Description</label>
<textarea class="form-control" name="title_two_des"></textarea>

                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Title Three</label>
<input type="text" class="form-control" name="title_three" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Three Description</label>
<textarea class="form-control" name="title_three_des"></textarea>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="cat_banner"  class="form-control" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('about_us_body_first_part_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($aboutus_body_first_list as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />


                <div class="mb-3">
                    <label for="" class="form-label">Main title</label>
<input type="text" class="form-control" name="main_title" value="{{ $all_category_list_one->main_title }}" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control" value="{{ $all_category_list_one->title_one }}" name="title_one" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title One Description</label>
<textarea class="form-control" name="title_one_des">{{ $all_category_list_one->title_one_des }}</textarea>

                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control" value="{{ $all_category_list_one->title_two }}" name="title_two" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two Description</label>
<textarea class="form-control" name="title_two_des">{{ $all_category_list_one->title_two_des }}</textarea>

                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Title Three</label>
<input type="text" class="form-control" value="{{ $all_category_list_one->title_three }}" name="title_three" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Three Description</label>
<textarea class="form-control" name="title_three_des">{{ $all_category_list_one->title_three_des }}</textarea>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="cat_banner"  class="form-control" id=""
                           placeholder="Alert Quantity Unit">

                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />
                </div>


                @endforeach
                <button type="submit"  class="btn btn-sm btn-primary">Update</button>
            </form>
            @endif

        </div>
    </div>
    <div class="col-6">
        <div class="card-header">
            <h6 class="card-title text-center">Second Section</h6>
        </div>

        <div class="card-body">

            @if(count($aboutus_body_second_list) == 0)

            <form method="post" action="{{ route('about_us_body_second_part_store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Title </label>
<input type="text" class="form-control"  name="title" />

                </div>

                <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="des"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="cat_banner"  class="form-control" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('about_us_body_second_part_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($aboutus_body_second_list as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                <div class="mb-3">
                    <label for="" class="form-label">Title </label>
<input type="text" class="form-control" value="{{ $all_category_list_one->title }}" name="title" />

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="des">{{ $all_category_list_one->des }}</textarea>
                    </div>

                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input type="file" name="cat_banner"  class="form-control" id=""
                           placeholder="Alert Quantity Unit">

                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />
                </div>

                @endforeach
                <button type="submit"  class="btn btn-sm btn-primary">Update</button>
            </form>
            @endif

        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
