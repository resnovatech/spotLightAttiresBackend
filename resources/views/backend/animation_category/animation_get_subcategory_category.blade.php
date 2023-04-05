<label for="" class="form-label">Sub Category</label>
@foreach($check_slug1 as $key=>$all_unit)
<div class="form-check mb-3">



    <input class="form-check-input" value="{{ $all_unit->slug }}" name="animation_sub_cat[]" type="checkbox" id="animation_sub1_cat{{ $key+1 }}">
    <label class="form-check-label" for="animation_sub1_cat{{ $key+1 }}">
        {{ $all_unit->name }}
    </label>

</div>
@endforeach
