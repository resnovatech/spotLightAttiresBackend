<form method="POST" action="{{ route('update_product_quantity_list') }}">
    @csrf
<div class="row">
    <div class="col-md-12">


        <input type="hidden" value="{{ $product_id_for_quantity_update }}" name="product_id" class="form-control"/>
    </div>
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
            </tr>
@foreach($ajax_quantity_list as $all_quantity_ajax)
            <tr>
                <th>
                    <input type="text" value="{{ $all_quantity_ajax->color }}" name="color[]" class="form-control" readonly/>
                    <input type="hidden" value="{{ $all_quantity_ajax->id }}" name="id[]" class="form-control"/>
                </th>
                <th><input type="text" value="{{ $all_quantity_ajax->size }}" name="size[]" class="form-control" readonly/></th>
                <th><input type="text" value="{{ $all_quantity_ajax->quantity }}" name="quantity[]" class="form-control" /></th>
            </tr>
@endforeach
        </table>
    </div>
</div>
<button type="submit" class="btn btn-success btn-sm">Update</button>
</form>
