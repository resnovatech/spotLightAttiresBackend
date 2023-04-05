<option>Please Select</option>
@foreach($main_product_color as $all_ajax_product_color)
<option value="{{ $all_ajax_product_color->color_id }}">{{ $all_ajax_product_color->color_id }}</option>
@endforeach
