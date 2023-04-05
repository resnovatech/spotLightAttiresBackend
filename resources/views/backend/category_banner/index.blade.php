@extends('backend.master.master')

@section('title')
Category Banner
@endsection

@section('css')

@endsection


@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Category Banner List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active">Category Banner</li>
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
<h6 class="card-title text-center">First</h6>
            </div>

            <div class="card-body">
                @if(count($category_list_one) == 0)

                <form method="post" action="{{ route('category_banner_store') }}" enctype="multipart/form-data">
                    @csrf


<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Category Name</label>-->

<!--                        <select class="form-select" name="cat_id">-->
<!--                            <option>Select</option>-->
<!--                            @foreach($category_list as $category_list_all)-->
<!--                            <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>-->
<!--                           @endforeach-->
<!--                        </select>-->
<!--                    </div>-->

<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" />-->

<!--                    </div>-->

<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" />-->

<!--                    </div>-->

<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" />-->

<!--                    </div>-->


                    <div class="mb-3">
                        <label for="" class="form-label">Banner</label>
                        <input type="file" name="cat_banner"  class="form-control" id=""
                               placeholder="Alert Quantity Unit">


                    </div>


                    <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
                </form>

                @else
                <form method="post" action="{{ route('category_banner_update') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach($category_list_one as $all_category_list_one)

                    <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Category Name</label>-->

<!--                        <select class="form-select" name="cat_id">-->
<!--                            <option>Select</option>-->
<!--                            @foreach($category_list as $category_list_all)-->
<!--                            <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->cat_id ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>-->
<!--                           @endforeach-->
<!--                        </select>-->
<!--                    </div>-->

<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" value="{{ $all_category_list_one->t_one }}" />-->

<!--                    </div>-->

<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" value="{{ $all_category_list_one->t_two }}" />-->

<!--                    </div>-->

<!--                    <div class="mb-3">-->
<!--                        <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" value="{{ $all_category_list_one->t_three }}" />-->

<!--                    </div>-->

                    <div class="mb-3">
                        <label for="" class="form-label">Banner</label>
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
<!--    <div class="col-6">-->
<!--        <div class="card-header">-->
<!--            <h6 class="card-title text-center">Second</h6>-->
<!--        </div>-->

<!--        <div class="card-body">-->

<!--            @if(count($category_list_two) == 0)-->

<!--            <form method="post" action="{{ route('category_banner_store') }}" enctype="multipart/form-data">-->
<!--                @csrf-->


<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->


<!--                </div>-->


<!--                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>-->
<!--            </form>-->

<!--            @else-->
<!--            <form method="post" action="{{ route('category_banner_update') }}" enctype="multipart/form-data">-->
<!--                @csrf-->
<!--                @foreach($category_list_two as $all_category_list_one)-->

<!--                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->cat_id ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" value="{{ $all_category_list_one->t_one }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" value="{{ $all_category_list_one->t_two }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" value="{{ $all_category_list_one->t_three }}" />-->

<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->

<!--                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />-->
<!--                </div>-->

<!--                @endforeach-->
<!--                <button type="submit"  class="btn btn-sm btn-primary">Update</button>-->
<!--            </form>-->
<!--            @endif-->

<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-6">-->
<!--        <div class="card-header">-->
<!--            <h6 class="card-title text-center">Third</h6>-->
<!--        </div>-->

<!--        <div class="card-body">-->

<!--            @if(count($category_list_three) == 0)-->

<!--            <form method="post" action="{{ route('category_banner_store') }}" enctype="multipart/form-data">-->
<!--                @csrf-->


<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->


<!--                </div>-->


<!--                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>-->
<!--            </form>-->

<!--            @else-->
<!--            <form method="post" action="{{ route('category_banner_update') }}" enctype="multipart/form-data">-->
<!--                @csrf-->
<!--                @foreach($category_list_three as $all_category_list_one)-->

<!--                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->cat_id ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" value="{{ $all_category_list_one->t_one }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" value="{{ $all_category_list_one->t_two }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" value="{{ $all_category_list_one->t_three }}" />-->

<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->

<!--                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />-->
<!--                </div>-->

<!--                @endforeach-->
<!--                <button type="submit"  class="btn btn-sm btn-primary">Update</button>-->
<!--            </form>-->
<!--            @endif-->

<!--        </div>-->
<!--    </div>-->
    
<!--    <div class="col-6">-->
<!--        <div class="card-header">-->
<!--            <h6 class="card-title text-center">Fourth</h6>-->
<!--        </div>-->

<!--        <div class="card-body">-->

<!--            @if(count($category_list_four) == 0)-->

<!--            <form method="post" action="{{ route('category_banner_store') }}" enctype="multipart/form-data">-->
<!--                @csrf-->


<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->


<!--                </div>-->


<!--                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>-->
<!--            </form>-->

<!--            @else-->
<!--            <form method="post" action="{{ route('category_banner_update') }}" enctype="multipart/form-data">-->
<!--                @csrf-->
<!--                @foreach($category_list_four as $all_category_list_one)-->

<!--                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->cat_id ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" value="{{ $all_category_list_one->t_one }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" value="{{ $all_category_list_one->t_two }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" value="{{ $all_category_list_one->t_three }}" />-->

<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->

<!--                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />-->
<!--                </div>-->

<!--                @endforeach-->
<!--                <button type="submit"  class="btn btn-sm btn-primary">Update</button>-->
<!--            </form>-->
<!--            @endif-->

<!--        </div>-->
<!--    </div>-->
    
<!--    <div class="col-6">-->
<!--        <div class="card-header">-->
<!--            <h6 class="card-title text-center">Fifth</h6>-->
<!--        </div>-->

<!--        <div class="card-body">-->

<!--            @if(count($category_list_five) == 0)-->

<!--            <form method="post" action="{{ route('category_banner_store') }}" enctype="multipart/form-data">-->
<!--                @csrf-->


<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->


<!--                </div>-->


<!--                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>-->
<!--            </form>-->

<!--            @else-->
<!--            <form method="post" action="{{ route('category_banner_update') }}" enctype="multipart/form-data">-->
<!--                @csrf-->
<!--                @foreach($category_list_five as $all_category_list_one)-->

<!--                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Category Name</label>-->

<!--                    <select class="form-select" name="cat_id">-->
<!--                        <option>Select</option>-->
<!--                        @foreach($category_list as $category_list_all)-->
<!--                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->cat_id ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>-->
<!--                       @endforeach-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title One</label>-->
<!--<input type="text" class="form-control" name="t_one" value="{{ $all_category_list_one->t_one }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Two</label>-->
<!--<input type="text" class="form-control" name="t_two" value="{{ $all_category_list_one->t_two }}" />-->

<!--                </div>-->

<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Title Three</label>-->
<!--<input type="text" class="form-control" name="t_three" value="{{ $all_category_list_one->t_three }}" />-->

<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="" class="form-label">Banner</label>-->
<!--                    <input type="file" name="cat_banner"  class="form-control" id=""-->
<!--                           placeholder="Alert Quantity Unit">-->

<!--                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />-->
<!--                </div>-->

<!--                @endforeach-->
<!--                <button type="submit"  class="btn btn-sm btn-primary">Update</button>-->
<!--            </form>-->
<!--            @endif-->

<!--        </div>-->
<!--    </div>-->
</div>
@endsection

@section('script')

@endsection
