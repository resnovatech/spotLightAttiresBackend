@extends('backend.master.master')

@section('title')
Second Banner
@endsection

@section('css')

@endsection


@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"> Second Banner List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">

                    <li class="breadcrumb-item active"> Second Banner</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="card-header">
            <h6 class="card-title text-center">First Section</h6>
        </div>
    @include('flash_message')
    <div class="col-6 mt-2">
        <div class="card">

            <div class="card-header">
<h6 class="card-title text-center">First</h6>
            </div>

            <div class="card-body">
                @if(count($category_list_one) == 0)

                <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="mb-3">
                        <label for="" class="form-label">Button Link</label>

                        <select class="form-control form-control-sm" name="cat_id" required>
                          
                            <option value="allProduct" selected>AllProduct</option>

                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" required/>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                    </div>

                    <!--<div class="mb-3">-->
                    <!--    <label for="email">Position</label>-->
                    <!--    <select  class="form-control form-control-sm"  name="position">-->
                    <!--        <option>--- Please Select ---</option>-->
                    <!--        <option value="Under Slider">Under Slider</option>-->
                    <!--        <option value="After First Two Banner">After First Two Banner</option>                                                             <option value="After First Four Banner">After First Four Banner</option>-->
                    <!--    </select>-->

                    <!--</div>-->


                    <div class="mb-3">
                        <label for="" class="form-label">Banner</label>
                        <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                               placeholder="Alert Quantity Unit" required>


                    </div>


                    <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
                </form>

                @else
                <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                    @csrf
                    @foreach($category_list_one as $all_category_list_one)

                    <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                  
                    
                     <div class="mb-3">
                        <label for="" class="form-label">Button Link</label>

                        <select class="form-control form-control-sm" name="cat_id" required>
                          
                            <option value="allProduct" selected>AllProduct</option>

                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                    

                    <div class="mb-3">
                        <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                    </div>

                    <!--<div class="mb-3">-->
                    <!--    <label for="email">Position</label>-->
                    <!--    <select  class="form-control form-control-sm"  name="position">-->
                    <!--        <option>--- Please Select ---</option>-->
                    <!--        <option value="Under Slider" {{ 'Under Slider' == $all_category_list_one->position ? 'selected':'' }}>Under Slider</option>-->
                    <!--        <option value="After First Banner" {{ 'After First Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Banner</option>-->
                    <!--        <option value="After First Two Banner" {{ 'After First Two Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Two Banner</option>-->
                    <!--        <option value="After First Four Banner" {{ 'After First Four Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Four Banner</option>-->
                    <!--    </select>-->

                    <!--</div>-->

                    <div class="mb-3">
                        <label for="" class="form-label">Banner</label>
                        <input type="file" name="cat_banner"  class="form-control" id=""
                               placeholder="Alert Quantity Unit">
<small>620*688</small><br>
                               <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />
                    </div>

                    @endforeach
                    <button type="submit"  class="btn btn-sm btn-primary">Update</button>
                </form>
                @endif

            </div>


        </div>
    </div>
    <div class="col-6 mt-2">
        <div class="card-header">
            <h6 class="card-title text-center">Second</h6>
        </div>

        <div class="card-body">

            @if(count($category_list_two) == 0)

            <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                     
                        <option value="trending" selected>Trending</option>
                      
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name"  required/>

                    </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--            <select  class="form-control form-control-sm"  name="position">-->
                <!--                <option>--- Please Select ---</option>-->
                <!--                <option value="Under Slider">Under Slider</option>-->
                <!--                <option value="After First Two Banner">After First Two Banner</option>                                                             <option value="After First Four Banner">After First Four Banner</option>-->
                <!--            </select>-->

                <!--</div>-->

                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($category_list_two as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        <option value="trending" {{ 'trending' == $all_category_list_one->button_link ? 'selected':'' }}>Trending</option>
                      
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--    <select  class="form-control form-control-sm"  name="position">-->
                <!--        <option>--- Please Select ---</option>-->
                <!--        <option value="Under Slider" {{ 'Under Slider' == $all_category_list_one->position ? 'selected':'' }}>Under Slider</option>-->
                <!--        <option value="After First Two Banner" {{ 'After First Two Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Two Banner</option>                             <option value="After First Four Banner" {{ 'After First Four Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Four Banner</option>-->
                <!--    </select>-->

                <!--</div>-->
                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">
                           <small>425*337</small><br>
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
            <h6 class="card-title text-center">Third</h6>
        </div>

        <div class="card-body">

            @if(count($category_list_three) == 0)

            <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                      
                            <option value="new_product" selected>New Product</option>
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" required/>

                    </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--            <select  class="form-control form-control-sm"  name="position">-->
                <!--                <option>--- Please Select ---</option>-->
                <!--                <option value="Under Slider">Under Slider</option>-->
                <!--                <option value="After First Two Banner">After First Two Banner</option>                                                             <option value="After First Four Banner">After First Four Banner</option>-->
                <!--            </select>-->

                <!--</div>-->

                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($category_list_three as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                      
                        <option value="new_product" {{ 'new_product' == $all_category_list_one->button_link ? 'selected':'' }}>New Product</option>
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--    <select  class="form-control form-control-sm"  name="position">-->
                <!--        <option>--- Please Select ---</option>-->
                <!--        <option value="Under Slider" {{ 'Under Slider' == $all_category_list_one->position ? 'selected':'' }}>Under Slider</option>-->
                <!--        <option value="After First Two Banner" {{ 'After First Two Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Two Banner</option>                             <option value="After First Four Banner" {{ 'After First Four Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Four Banner</option>-->
                <!--    </select>-->

                <!--</div>-->
                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">
                           <small>425*337</small><br>
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
            <h6 class="card-title text-center">Four</h6>
        </div>

        <div class="card-body">

            @if(count($category_list_four) == 0)

            <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                       
                      
                        <option value="discount_product">Discount Product</option>
                  
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name"  required/>

                    </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--            <select  class="form-control form-control-sm"  name="position">-->
                <!--                <option>--- Please Select ---</option>-->
                <!--                <option value="Under Slider">Under Slider</option>-->
                <!--                <option value="After First Two Banner">After First Two Banner</option>                                                             <option value="After First Four Banner">After First Four Banner</option>-->
                <!--            </select>-->

                <!--</div>-->

                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($category_list_four as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" required/>

                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                     
                        <option value="discount_product" {{ 'discount_product' == $all_category_list_one->button_link ? 'selected':'' }}>Discount Product</option>
                  
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--    <select  class="form-control form-control-sm"  name="position">-->
                <!--        <option>--- Please Select ---</option>-->
                <!--        <option value="Under Slider" {{ 'Under Slider' == $all_category_list_one->position ? 'selected':'' }}>Under Slider</option>-->
                <!--        <option value="After First Two Banner" {{ 'After First Two Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Two Banner</option>                             <option value="After First Four Banner" {{ 'After First Four Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Four Banner</option>-->
                <!--    </select>-->

                <!--</div>-->
                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">
                           <small>881*322</small><br>
                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />
                </div>

                @endforeach
                <button type="submit"  class="btn btn-sm btn-primary">Update</button>
            </form>
            @endif

        </div>
    </div>
</div>

<div class="row mt-4">

<div class="card-header">
            <h6 class="card-title text-center">Second Section</h6>
        </div>
   
    <div class="col-12 mt-3">
        <div class="card-header">
            <h6 class="card-title text-center">Five</h6>
        </div>

        <div class="card-body">

            @if(count($category_list_five) == 0)

            <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>


 <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name"  required/>

                    </div>
                    
                    
                    
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--            <select  class="form-control form-control-sm"  name="position">-->
                <!--                <option>--- Please Select ---</option>-->
                <!--                <option value="Under Slider">Under Slider</option>-->
                <!--                <option value="After First Two Banner">After First Two Banner</option>-->
                <!--                <option value="After First Four Banner">After First Four Banner</option>-->
                <!--            </select>-->

                <!--</div>-->

                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($category_list_five as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->button_link ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--    <select  class="form-control form-control-sm"  name="position">-->
                <!--        <option>--- Please Select ---</option>-->
                <!--        <option value="Under Slider" {{ 'Under Slider' == $all_category_list_one->position ? 'selected':'' }}>Under Slider</option>-->
                <!--        <option value="After First Banner" {{ 'After First Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Banner</option>                            <option value="After First Four Banner" {{ 'After First Four Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Four Banner</option>-->
                <!--    </select>-->

                <!--</div>-->
                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">
                           <small>1531*500</small><br>
                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />
                </div>

                @endforeach
                <button type="submit"  class="btn btn-sm btn-primary">Update</button>
            </form>
            @endif

        </div>
    </div>
    <div class="card-header">
            <h6 class="card-title text-center">Third Section</h6>
        </div>
    <div class="col-6 mt-3">
        <div class="card-header">
            <h6 class="card-title text-center">Six</h6>
        </div>

        <div class="card-body">

            @if(count($category_list_six) == 0)

            <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" required/>

                    </div>
                    
                    
                    

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--            <select  class="form-control form-control-sm"  name="position">-->
                <!--                <option>--- Please Select ---</option>-->
                <!--                <option value="Under Slider">Under Slider</option>-->
                <!--                <option value="After First Two Banner">After First Two Banner</option>-->
                <!--               <option value="After First Four Banner">After First Four Banner</option>-->
                <!--            </select>-->

                <!--</div>-->

                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($category_list_six as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->button_link ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>
                
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                    
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--    <select  class="form-control form-control-sm"  name="position">-->
                <!--        <option>--- Please Select ---</option>-->
                <!--        <option value="Under Slider" {{ 'Under Slider' == $all_category_list_one->position ? 'selected':'' }}>Under Slider</option>-->
                <!--        <option value="After First Two Banner" {{ 'After First Two Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Two Banner</option>-->
                <!--        <option value="After First Four Banner" {{ 'After First Four Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Four Banner</option>-->
                <!--    </select>-->

                <!--</div>-->
                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">
                           <small>746*281</small><br>
                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />
                </div>

                @endforeach
                <button type="submit"  class="btn btn-sm btn-primary">Update</button>
            </form>
            @endif

        </div>
    </div>

    <div class="col-6 mt-3">
        <div class="card-header">
            <h6 class="card-title text-center">Seven</h6>
        </div>

        <div class="card-body">

            @if(count($category_list_seven) == 0)

            <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>
                
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name"  required/>

                    </div>
                    
                    
                    

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--            <select  class="form-control form-control-sm"  name="position">-->
                <!--                <option>--- Please Select ---</option>-->
                <!--                <option value="Under Slider">Under Slider</option>-->
                <!--                <option value="After First Two Banner">After First Two Banner</option>-->
                <!--               <option value="After First Four Banner">After First Four Banner</option>-->
                <!--            </select>-->

                <!--</div>-->

                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($category_list_seven as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->button_link ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                </div>

                <!--<div class="mb-3">-->
                <!--    <label for="email">Position</label>-->
                <!--    <select  class="form-control form-control-sm"  name="position">-->
                <!--        <option>--- Please Select ---</option>-->
                <!--        <option value="Under Slider" {{ 'Under Slider' == $all_category_list_one->position ? 'selected':'' }}>Under Slider</option>-->
                <!--        <option value="After First Two Banner" {{ 'After First Two Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Two Banner</option>-->
                <!--        <option value="After First Four Banner" {{ 'After First Four Banner' == $all_category_list_one->position ? 'selected':'' }}>After First Four Banner</option>-->
                <!--    </select>-->

                <!--</div>-->
                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">
                           <small>746*281</small><br>

                           <img style="height:100px;" src="{{ asset('/') }}{{ $all_category_list_one->image }}" />
                </div>

                @endforeach
                <button type="submit"  class="btn btn-sm btn-primary">Update</button>
            </form>
            @endif

        </div>
    </div>
<div class="card-header">
            <h6 class="card-title text-center">Fourth Section</h6>
        </div>
    <div class="col-12 mt-3">
        <div class="card-header">
            <h6 class="card-title text-center">Eight</h6>
        </div>

        <div class="card-body">

            @if(count($category_list_eight) == 0)

            <form method="post" action="{{ route('second_banner_store') }}" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}">{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name"  required/>

                    </div>
                    
                    

                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" required/>

                </div>

                

                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">


                </div>


                <button type="submit"  class="btn btn-sm btn-primary">Submit</button>
            </form>

            @else
            <form method="post" action="{{ route('second_banner_update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($category_list_eight as $all_category_list_one)

                <input type="hidden" value="{{ $all_category_list_one->id }}" name="id" />

                <div class="mb-3">
                    <label for="" class="form-label">Button Link</label>

                    <select class="form-control form-control-sm" name="cat_id" required>
                        <option>Select</option>
                        @foreach($category_list as $category_list_all)
                        <option value="{{ $category_list_all->cat_name }}" {{ $category_list_all->cat_name == $all_category_list_one->button_link ? 'selected':'' }}>{{ $category_list_all->cat_name }}</option>
                       @endforeach
                    </select>
                </div>
                
                
                <div class="mb-3">
                        <label for="" class="form-label">Button Name</label>
<input type="text" class="form-control form-control-sm" name="button_name" value="{{ $all_category_list_one->button_name }}" required/>

                    </div>
                    
                    
                <div class="mb-3">
                    <label for="" class="form-label">Title One</label>
<input type="text" class="form-control form-control-sm" name="t_one" value="{{ $all_category_list_one->first_title }}" required/>

                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Title Two</label>
<input type="text" class="form-control form-control-sm" name="t_two" value="{{ $all_category_list_one->second_title }}" required/>

                </div>

               
                <div class="mb-3">
                    <label for="" class="form-label">Banner</label>
                    <input type="file" name="cat_banner"  class="form-control form-control-sm" id=""
                           placeholder="Alert Quantity Unit">
                           <small>1531*400</small><br>
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
