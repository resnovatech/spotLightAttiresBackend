

@foreach($size_list_all as $all_size_list_all)

@if($all_size_list_all->category_name =='Half - T-SHIRT / Jersey / Raglan')
<tr>

<td>Size: <input id="s" type="text" value="{{$all_size_list_all->size}}" name="size[]" required placeholder="Enter Size" class="form-control" /></td>
<td>Length: <input id="ll" type="text" value="{{$all_size_list_all->length}}" name="length[]" required placeholder="Enter Length" class="form-control" /></td>
<td>Width: <input id="ll" type="text" value="{{$all_size_list_all->width}}" name="width[]" required placeholder="Enter Length" class="form-control" /></td>


</tr>

@else

<tr>

<td>Size: <input id="s" type="text" value="{{$all_size_list_all->size}}" name="size[]" required placeholder="Enter Size" class="form-control" /></td>
<td>Length: <input id="ll" type="text" value="{{$all_size_list_all->length}}" name="length[]" required placeholder="Enter Length" class="form-control" /></td>
<td>Width: <input id="ll" type="text" value="{{$all_size_list_all->width}}" name="width[]" required placeholder="Enter Length" class="form-control" /></td>
<td>Shoulder: <input id="sh" type="text" value="{{$all_size_list_all->shoulder}}" name="shoulder[]" required placeholder="Enter Shoulder" class="form-control" /></td>
<td>Sleeve: <input id="ch" type="text" value="{{$all_size_list_all->sleeve}}" name="chest[]" placeholder="Enter Chest" required class="form-control" /></td>

</tr>
@endif
@endforeach