<div class="modal fade bs-example-modal-lg{{ $all_attribute->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Update Order By Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<form class="custom-validation" action="{{ route('order_by_update') }}" method="post" enctype="multipart/form-data">
@csrf

<div class="row">


    <input type="hidden" name="id" value="{{ $all_attribute->id  }}" class="form-control">

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" name="company_name" value="{{ $all_attribute->company_name  }}" class="form-control"
                   >
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Percentage Type</label>
            <select name="percentage_type"  class="form-control">
                <option value="Flat" {{ $all_attribute->company_name  == 'Flat' ? 'selected':'' }}>Flat</option>
                <option value="Percentage" {{ $all_attribute->company_name  == 'Percentage' ? 'selected':'' }}>Percentage</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label for="" class="form-label">Amount</label>
            <input  type="text" name="per" value="{{ $all_attribute->per  }}" class="form-control" id="image"/>
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
