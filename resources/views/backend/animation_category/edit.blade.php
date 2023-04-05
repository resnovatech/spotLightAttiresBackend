<div class="modal fade bs-example-modal-lg{{ $all_attribute->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Update Animation Subcategory Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<form class="custom-validation" action="{{ route('animation_category_update') }}" method="post" enctype="multipart/form-data">
@csrf

<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label"> Name</label>
            <input type="text" name="name" value="{{ $all_attribute->name  }}" class="form-control" id="a_name{{ $all_attribute->id  }}"
                   >
                   <input type="hidden" name="id" value="{{ $all_attribute->id  }}" class="form-control"
                   >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Slug</label>
            <input readonly type="text" value="{{ $all_attribute->slug }}"  name="slug"  class="form-control" id="a_slug{{ $all_attribute->id  }}"
                   >
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input  type="file" name="image"  class="form-control" id="image" />
            <img src="{{ asset('/') }}{{ $all_attribute->image }}" height="30px"/>
        </div>
    </div>
    <hr class="mt-4">


<?php $all_other_address = DB::table('animationsubcategories')->where('cat_name',$all_attribute->slug)->get();?>
    {{-- <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Shipping Address</label>
            <textarea  name="shipping_address" class="form-control">{{ $all_attribute->shipping_address }}</textarea>
        </div>
    </div> --}}

    <div class="col-md-12">


        <div id="dynamicAddRemove_edit{{ $all_attribute->id }}">

            @foreach($all_other_address as $key=>$view_all_other_address)


            <div class="row mt-2" id="remove_id_edit{{ $all_attribute->id+$key+1 }}">
                <div class="col-md-5"><input type="text" required placeholder="Sub Category Name" name="title[]" value="{{ $view_all_other_address->name }}" id="title_edit{{ $all_attribute->id }}"  class="form-control"/></div>
<div class="col-md-2">
                    <button type="button" id="remove_edit{{ $all_attribute->id+$key+1 }}" data-mainr_edit="{{ $all_attribute->id+$key+1 }}" class="btn btn-sm btn-outline-danger remove-input-field_edit">Delete</button>
                </div>
            </div>

            @endforeach

        </div>
        <div class="text-sm-end mt-3">
            <a
            class="mt-3 btn btn-light waves-effect btn-label waves-light" data-mainloop="{{ $all_attribute->id }}" id="add_more_address_edit{{ $all_attribute->id }}"><i
            class="bx bx-plus-medical label-icon "></i>Add More Subcategory</a>
            </div>
    </div>
    <div class="col-md-12 mt-3">
        <button class="btn btn-primary" type="submit">update form</button>
    </div>
</div>


</form>
</div>

</div>
</div>
</div>
