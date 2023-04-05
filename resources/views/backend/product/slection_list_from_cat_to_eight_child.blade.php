@if($data_type1 == 121)
<p>Current selection:
    <span id="get_the_text_value">{{ $final_result }}</span></p>
@elseif($data_type1 == 00)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }} </span></p>
    @endforeach
@elseif($data_type1 == 1)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }}>{{$all_final->child_one }}</span></p>
    @endforeach
@elseif($data_type1 == 2)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }}>{{$all_final->child_one }}>{{$all_final->child_two }}</span></p>
    @endforeach
@elseif($data_type1 == 3)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }}>{{$all_final->child_one }}>{{$all_final->child_two }}>{{$all_final->child_three }}</span></p>
    @endforeach
@elseif($data_type1 == 4)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }}>{{$all_final->child_one }}>{{$all_final->child_two }}>{{$all_final->child_three }}>{{$all_final->child_four }}</span></p>
    @endforeach
@elseif($data_type1 == 5)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }}>{{$all_final->child_one }}>{{$all_final->child_two }}>{{$all_final->child_three }}>{{$all_final->child_four }}>{{$all_final->child_five }}</span></p>
    @endforeach
@elseif($data_type1 == 6)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }}>{{$all_final->child_one }}>{{$all_final->child_two }}>{{$all_final->child_three }}>{{$all_final->child_four }}>{{$all_final->child_five }}>{{$all_final->child_six }}</span></p>
    @endforeach
@elseif($data_type1 == 7)
<p>Current selection:
    @foreach($final_result as $all_final)
    <span id="get_the_text_value">{{ $all_final->cat_name }}>{{$all_final->sub_cat }}>{{$all_final->child_one }}>{{$all_final->child_two }}>{{$all_final->child_three }}>{{$all_final->child_four }}>{{$all_final->child_five }}>{{$all_final->child_six }}>{{$all_final->child_seven }}</span></p>
    @endforeach
@endif


