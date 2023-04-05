<h4 class="card-title">Add Sub categories Form</h4>

                <form class="mt-3" action="{{ route('admin.child_category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <?php
                    $categorylist = DB::table('product_categories')
                                            ->select('cat_name')->distinct()->latest()->get();
                    ?>
@if($data_type == 00)

<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Category Name</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="cat_name" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Sub Category Name</label>
        <input type="text" class="form-control "   name="sub_cat" placeholder="Enter Name">


        </div>
                            </div>

@elseif($data_type == 10)


                    <div class="row">



<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">SubCategory Name</label>
<input type="text" class="form-control " value="{{ $data_name }}"  name="sub_cat" placeholder="Enter Name">
<input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

</div>

<div class="form-group col-md-12 col-sm-12 mt-3">
    <label for="password">Child One</label>
    <input type="text" class="form-control "   name="child_one" placeholder="Enter Name">


    </div>
                        </div>





@elseif($data_type == 1)
<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child One</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="child_one" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Two</label>
        <input type="text" class="form-control "   name="child_two" placeholder="Enter Name">


        </div>
                            </div>



@elseif($data_type == 2)
<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Two</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="child_two" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Three</label>
        <input type="text" class="form-control "   name="child_three" placeholder="Enter Name">


        </div>
                            </div>

@elseif($data_type == 3)

<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Three</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="child_three" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Four</label>
        <input type="text" class="form-control "   name="child_four" placeholder="Enter Name">


        </div>
                            </div>



@elseif($data_type == 4)

<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Four</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="child_four" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Five</label>
        <input type="text" class="form-control "   name="child_five" placeholder="Enter Name">


        </div>
                            </div>


@elseif($data_type == 5)

<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Five</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="child_five" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Six</label>
        <input type="text" class="form-control "   name="child_six" placeholder="Enter Name">


        </div>
                            </div>

@elseif($data_type == 6)


<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Six</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="child_six" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Seven</label>
        <input type="text" class="form-control "   name="child_seven" placeholder="Enter Name">


        </div>
                            </div>



@elseif($data_type == 7)

<div class="row">



    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Seven</label>
    <input type="text" class="form-control " value="{{ $data_name }}"  name="child_seven" placeholder="Enter Name">
    <input type="hidden" class="form-control " value="{{ $data_type }}"  name="data_type" placeholder="Enter Name">

    </div>

    <div class="form-group col-md-12 col-sm-12 mt-3">
        <label for="password">Child Eight</label>
        <input type="text" class="form-control "   name="child_eight" placeholder="Enter Name">


        </div>
                            </div>

@elseif($data_type == 8)
<h1>Limited to EighthChild</h1>
@endif
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
    <button class="btn btn-primary" type="submit">Add</button>
</div>
</form>


