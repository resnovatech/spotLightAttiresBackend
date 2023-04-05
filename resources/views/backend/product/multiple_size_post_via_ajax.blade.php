<table class="table">
    <tr>
        <th>Availability</th>
        <th>Color Family</th>
        <th>Size</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Seller SKU</th>
        <th>Discount</th>
        <th>Free Items</th>
        <th>Action</th>
    </tr>
@if($color_length == 1  && $size_length_new == 1)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@elseif($color_length == 1  && $size_length_new == 2)
@foreach($size_list1 as $all_size_list1)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach
@elseif($color_length == 1  && $size_length_new == 3)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 1  && $size_length_new == 4)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 1  && $size_length_new == 5)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 1  && $size_length_new == 6)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 1  && $size_length_new == 7)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 1  && $size_length_new == 8)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 1  && $size_length_new == 9)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length ==1  && $size_length_new == 10)

@foreach($size_list1 as $all_size_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_size_list? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach
@elseif($color_length == 2  && $size_length_new == 2)
<!--same length code --->
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[1] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
<!--same length code --->
@elseif($color_length == 2  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach



@elseif($color_length == 2  && $size_length_new == 3)
@for($i=0;$i<=1;$i++)
@for($j=0;$j<=2;$j++)

<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[$j] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endfor
@endfor

@elseif($color_length == 2  && $size_length_new == 4)

@elseif($color_length == 2  && $size_length_new == 5)

@elseif($color_length == 2  && $size_length_new == 6)

@elseif($color_length == 2  && $size_length_new == 7)

@elseif($color_length == 2  && $size_length_new == 8)

@elseif($color_length == 2  && $size_length_new == 9)

@elseif($color_length ==2  && $size_length_new == 10)

@elseif($color_length == 3  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 3  && $size_length_new == 2)

@elseif($color_length == 3  && $size_length_new == 3)
<!--same length code --->
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[1] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[2] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
<!--same length code --->
@elseif($color_length == 3  && $size_length_new == 4)

@elseif($color_length == 3  && $size_length_new == 5)

@elseif($color_length == 3  && $size_length_new == 6)

@elseif($color_length == 3  && $size_length_new == 7)

@elseif($color_length == 3  && $size_length_new == 8)

@elseif($color_length == 3  && $size_length_new == 9)

@elseif($color_length ==3  && $size_length_new == 10)

@elseif($color_length == 4  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 4  && $size_length_new == 2)

@elseif($color_length == 4  && $size_length_new == 3)

@elseif($color_length == 4  && $size_length_new == 4)

<!--same length code --->
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[1] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[2] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[3] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
<!--same length code --->

@elseif($color_length == 4  && $size_length_new == 5)

@elseif($color_length == 4  && $size_length_new == 6)

@elseif($color_length == 4  && $size_length_new == 7)

@elseif($color_length == 4  && $size_length_new == 8)

@elseif($color_length == 4  && $size_length_new == 9)

@elseif($color_length ==4  && $size_length_new == 10)

@elseif($color_length == 5  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 5  && $size_length_new == 2)

@elseif($color_length == 5  && $size_length_new == 3)

@elseif($color_length == 5  && $size_length_new == 4)

@elseif($color_length == 5  && $size_length_new == 5)

<!--same length code --->
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[1] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[2] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[3] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[4] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor



<!--same length code --->

@elseif($color_length == 5  && $size_length_new == 6)

@elseif($color_length == 5  && $size_length_new == 7)

@elseif($color_length == 5  && $size_length_new == 8)

@elseif($color_length == 5  && $size_length_new == 9)

@elseif($color_length ==5  && $size_length_new == 10)

@elseif($color_length == 6  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 6  && $size_length_new == 2)

@elseif($color_length == 6  && $size_length_new == 3)

@elseif($color_length == 6  && $size_length_new == 4)

@elseif($color_length == 6  && $size_length_new == 5)

@elseif($color_length == 6  && $size_length_new == 6)

<!--same length code --->
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[1] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[2] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[3] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[4] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[5] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
<!--same length code --->

@elseif($color_length == 6  && $size_length_new == 7)

@elseif($color_length == 6  && $size_length_new == 8)

@elseif($color_length == 6  && $size_length_new == 9)

@elseif($color_length ==6  && $size_length_new == 10)

@elseif($color_length == 7  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 7  && $size_length_new == 2)

@elseif($color_length == 7  && $size_length_new == 3)

@elseif($color_length == 7  && $size_length_new == 4)

@elseif($color_length == 7  && $size_length_new == 5)

@elseif($color_length == 7  && $size_length_new == 6)

@elseif($color_length == 7  && $size_length_new == 7)

<!--same length code --->
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[1] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[2] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[3] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor

@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[4] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[5] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
@for ($i = 0; $i < $color_length; $i++)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $color_list[$i] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[6] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>

@endfor
<!--same length code --->

@elseif($color_length == 7  && $size_length_new == 8)

@elseif($color_length == 7  && $size_length_new == 9)

@elseif($color_length ==7  && $size_length_new == 10)


@elseif($color_length == 8  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach
@elseif($color_length == 8  && $size_length_new == 2)
@elseif($color_length == 8  && $size_length_new == 3)
@elseif($color_length == 8  && $size_length_new == 4)
@elseif($color_length == 8  && $size_length_new == 5)
@elseif($color_length == 8  && $size_length_new == 6)
@elseif($color_length == 8  && $size_length_new == 7)

@elseif($color_length == 8  && $size_length_new == 9)
@elseif($color_length ==8  && $size_length_new == 10)

@elseif($color_length == 9  && $size_length_new == 1)

@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach

@elseif($color_length == 9  && $size_length_new == 2)

@elseif($color_length == 9  && $size_length_new == 3)

@elseif($color_length == 9  && $size_length_new == 4)

@elseif($color_length == 9  && $size_length_new == 5)

@elseif($color_length == 9  && $size_length_new == 6)

@elseif($color_length == 9  && $size_length_new == 7)
@elseif($color_length == 9  && $size_length_new == 8)

@elseif($color_length ==9  && $size_length_new == 10)

@elseif($color_length == 10  && $size_length_new == 1)
@foreach($color_list as $all_color_list)
<tr>
    <td>
        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
        </div>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
            @foreach($attribute_list_color as $all_attribute_list_color)
            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $all_color_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
            @endforeach
        </select>
    </td>
    <td style="width:120px;">
        <select class="select2 form-control ">
        @foreach($attribute_list_size as $all_attribute_list_color)
        <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_attribute_list_color->name_list == $size_list1[0] ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
        @endforeach
    </select>
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
              value="500">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="number" value="" id=""
               placeholder="Quantity">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="SKU">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Discount">
    </td>
    <td style="width:120px;">
        <input class="form-control" type="text" value="" id=""
               placeholder="Free item">
    </td>
    <td>
        <a href="javascript:void(0);" class="text-danger"><i
                    class="mdi mdi-delete font-size-18"></i></a>
    </td>
</tr>
@endforeach
@elseif($color_length == 10  && $size_length_new == 2)

@elseif($color_length == 10  && $size_length_new == 3)

@elseif($color_length == 10  && $size_length_new == 4)

@elseif($color_length == 10  && $size_length_new == 5)

@elseif($color_length == 10  && $size_length_new == 6)

@elseif($color_length == 10  && $size_length_new == 7)

@elseif($color_length == 10  && $size_length_new == 8)


@elseif($color_length == 10  && $size_length_new == 9)



@endif
</table>
