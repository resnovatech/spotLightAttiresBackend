<h4 class="card-title">Update attributes</h4>
<form class="custom-validation" action="{{ route('admin.attribute.update') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Attributes Type</label>
                <select class="form-control" name="a_type">
                    <option value="Color" {{ $all_attribute->a_type == 'Color' ? 'selected':'' }}>Color</option>
                    <option value="Size" {{ $all_attribute->a_type == 'Size' ? 'selected':'' }}>Size</option>
                    <option value="Others" {{ $all_attribute->a_type == 'Others' ? 'selected':'' }}>Others</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Attributes Name</label>
                <input type="text" name="a_name" value="{{ $all_attribute->a_name  }}" class="form-control" id="a_name{{ $all_attribute->id  }}"
                       >
                       <input type="hidden" name="id" value="{{ $all_attribute->id  }}" class="form-control"
                       >
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Slug</label>
                <input readonly type="text" value="{{ $all_attribute->a_slug }}"  name="a_slug"  class="form-control" id="a_slug{{ $all_attribute->id  }}"
                       >
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="" class="form-label">Product Status</label>
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
