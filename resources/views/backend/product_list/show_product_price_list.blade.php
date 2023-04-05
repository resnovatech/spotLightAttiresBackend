<form method="POST" action="{{ route('update_product_price_list') }}">
    @csrf
<div class="row">
    <div class="col-md-12">
        <label>Price</label>
        <input type="text" value="{{ $update_data_price }}" name="common_price" class="form-control"/>

        <input type="hidden" value="{{ $product_id_for_price_update }}" name="product_id" class="form-control"/>
    </div>
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
@foreach($ajax_price_list as $all_price_ajax)
            <tr>
                <th>
                    <input type="text" value="{{ $all_price_ajax->color }}" name="color[]" class="form-control" readonly/>
                    <input type="hidden" value="{{ $all_price_ajax->id }}" name="id[]" class="form-control"/>
                </th>
                <th><input type="text" value="{{ $all_price_ajax->size }}" name="size[]" class="form-control" readonly/></th>
                <th><input type="text" value="{{ $all_price_ajax->price }}" name="price[]" class="form-control" /></th>
            </tr>
@endforeach
        </table>
    </div>
</div>
<button type="submit" class="btn btn-success btn-sm">Update</button>
</form>
