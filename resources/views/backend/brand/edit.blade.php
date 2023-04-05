<div class="modal fade bs-example-modal-lg{{ $all_attribute->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Update Brand Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<form class="custom-validation" action="{{ route('admin.brand.update') }}" method="post" enctype="multipart/form-data">
@csrf

<div class="row">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Brand Name</label>
            <input type="text" name="name" value="{{ $all_attribute->name  }}" class="form-control" id="a_name{{ $all_attribute->id  }}"
                   >
                   <input type="hidden" name="id" value="{{ $all_attribute->id  }}" class="form-control"
                   >
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Slug</label>
            <input readonly type="text" value="{{ $all_attribute->slug }}"  name="slug"  class="form-control" id="a_slug{{ $all_attribute->id  }}"
                   >
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input  type="file" name="image"  class="form-control" id="image"/>
        </div>
        <img src="{{ asset('/') }}{{ $all_attribute->image }}" style="height: 40px" />
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label"> Status</label>
            <select class="form-control" name="status">
                <option value="">Select Status</option>
                <option value="Active" {{ $all_attribute->status == 'Active' ? 'selected':'' }}>Active</option>
                <option value="Inactive" {{ $all_attribute->status == 'Inactive' ? 'selected':'' }}>Inactive</option>
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
