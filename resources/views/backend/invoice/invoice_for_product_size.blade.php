<option>Please Select</option>
@foreach($main_product_size as $all_ajax_product_color)
<option value="{{ $all_ajax_product_color->size_name }}">{{ $all_ajax_product_color->size_name }}</option>
@endforeach
