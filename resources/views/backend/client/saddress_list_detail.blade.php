@if($main_value == 'custome')
<h5 class="card-title mt-0">Name: <input type="text" name="client_name" class="form-control" value=""/></h5>
    <p class="card-text">Address/phone/email:<textarea name="client_address" class="form-control"></textarea></p>

@else

<h5 class="card-title mt-0">Name: <input type="text" name="client_name" class="form-control" value="{{ $ajax_client_list12->name }}"/></h5>
    <p class="card-text">Address/phone/email:<textarea name="client_address" class="form-control">{{ $ajax_client_list11->address }}</textarea></p>

    @endif

