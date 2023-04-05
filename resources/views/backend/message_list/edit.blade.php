<div class="modal fade bs-example-modal-lg{{ $all_attribute->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Update Contact Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<form class="custom-validation" action="{{ route('contact_us_update') }}" method="post" enctype="multipart/form-data">
@csrf

<div class="row">


    <input type="hidden" name="id" value="{{ $all_attribute->id  }}" class="form-control">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $all_attribute->title  }}"  class="form-control"
                   >
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input  type="text" name="des" value="{{ $all_attribute->des  }}"   class="form-control"
                   >
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Icon</label>
            <input  type="text" name="icon" value="{{ $all_attribute->icon  }}"   class="form-control" id="image"/>
        </div>
    </div>



    <div class="col-md-12">
        <button class="btn btn-primary" type="submit">update form</button>
    </div>
</div>


</form>
</div>

</div>
</div>
</div>
