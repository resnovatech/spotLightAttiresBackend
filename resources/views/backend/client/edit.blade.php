<div class="modal fade bs-example-modal-lg{{ $all_attribute->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Update Client Information</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
</button>
</div>
<div class="modal-body">
<form class="custom-validation" action="{{ route('client_list_update') }}" method="post" enctype="multipart/form-data">
@csrf

<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Client Name</label>
            <input type="text" name="name" value="{{ $all_attribute->name  }}" class="form-control" id="a_name{{ $all_attribute->id  }}"
                   >
                   <input type="hidden" name="id" value="{{ $all_attribute->id  }}" class="form-control"
                   >
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" value="{{ $all_attribute->phone  }}" name="phone" class="form-control" id="p{{ $all_attribute->id  }}"
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

    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" value="{{ $all_attribute->email  }}" name="email" class="form-control"
                   >
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Customer Type</label>
                        <select class="select form-control" name="c_type" id="">
                            <option value="Normal" {{ $all_attribute->c_type == 'Normal' ? 'Selected':'' }}>Normal</option>
                            <option value="Vip" {{ $all_attribute->c_type == 'Vip' ? 'Selected':'' }}>Vip</option>
                        </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="" class="form-label">Address</label>
            <textarea  name="address" class="form-control">{{ $all_attribute->address  }}</textarea>
        </div>
    </div>
<?php $all_other_address = DB::table('delivary_addresses')->where('client_slug',$all_attribute->slug)->get();?>
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
                <div class="col-md-5"><input type="text" required placeholder="Address Tittle" name="title[]" value="{{ $view_all_other_address->title }}" id="title_edit{{ $all_attribute->id }}"  class="form-control"/></div>
                <div class="col-md-5"><input type="text" required name="d_address[]" value="{{ $view_all_other_address->address }}" placeholder="Address" id="address_edit{{ $all_attribute->id }}"  class="form-control"/></div><div class="col-md-2">
                    <button type="button" id="remove_edit{{ $all_attribute->id+$key+1 }}" data-mainr_edit="{{ $all_attribute->id+$key+1 }}" class="btn btn-sm btn-outline-danger remove-input-field_edit">Delete</button>
                </div>
            </div>

            @endforeach

        </div>
        <div class="text-sm-end mt-3">
            <a
            class="mt-3 btn btn-light waves-effect btn-label waves-light" data-mainloop="{{ $all_attribute->id }}" id="add_more_address_edit{{ $all_attribute->id }}"><i
            class="bx bx-plus-medical label-icon "></i>Add More Address</a>
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
