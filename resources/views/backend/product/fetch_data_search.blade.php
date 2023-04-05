
<div class="table-responsive">
    <table class="table table-centered table-nowrap mb-0">
        <thead class="table-light">
        <tr>
            <th style="width: 20px;">
                <div class="form-check font-size-16">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                </div>
            </th>
            <th>SL</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Subcategory Name</th>
            <th>Price</th>
            <th>SKU</th>
           <th>Action</th>
        </tr>
        </thead>
        <tbody>


@foreach($product_list as $key=>$all_product_list)
        <tr>
            <td>
                <div class="form-check font-size-16">
                    <input type="checkbox" class="form-check-input" id="customCheck5">
                    <label class="form-check-label" for="customCheck5">&nbsp;</label>
                </div>
            </td>
            @if($minus_one == 0)
            <td>{{ $key+1 }}</td>
            @else
            <td>{{ $minus_one = $minus_one+1 }}</td>
            @endif
            <td>{{ $all_product_list->product_name }}</td>
            <td>{{ $all_product_list->cat_name }}</td>
            <td>{{ $all_product_list->sub_cat_name }}</td>
            <td>
                {{ $all_product_list->price }}
            </td>
            <td>
                {{ $all_product_list->sku }}
            </td>

            <td>
                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                    View Details
                </button>
            </td>
        </tr>
@endforeach
        </tbody>
    </table>
</div>
<!--pagination code --->

<div class="row  mt-3">
    <input type="hidden" value="{{ $first_search_result }}" name="first_search_result" id="first_search_result" />
    <div class="col-md-12">
      <nav aria-label="...">
        <ul class="pagination pagination-sm">
          {{-- <li class="page-item active" aria-current="page">
            <span class="page-link">1</span>
          </li> --}}

          <!--check total number greater than 10  -->
          @if($total_serial_number > 10)

          <!--previous button work -->
          @if($id_for_pass == 1)

          <li class="page-item disabled">
            <button  class="page-link" id="papage_link">Previous</button>
        </li>

          @else
          <li class="page-item ">
            <button  class="page-link" id="papage_link{{ $id_for_pass }}">Previous</button>
        </li>
        @endif
<!--end previous button work-->

          @for($i = 1; $i <= $total_serial_number; $i++)

          @if($i == 1)
          @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
          @elseif($i == 2)
          @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == 3)
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == 4)
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif

        @elseif($i == 5)
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>

        <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i+1 }}">{{ $i+1 }}</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @if($id_for_pass == 6 || $id_for_pass == 7 )

        @else

       <li class="page-item ">
           <button  class="page-link" >.</button>
       </li>
       <li class="page-item ">
           <button  class="page-link" >.</button>
       </li>
       @endif
        @endif
        @elseif($i == $id_for_pass)
        @if($i == $id_for_pass)
        @if($id_for_pass == $total_serial_number || $id_for_pass == ($total_serial_number - 1))

        @else

        @if($id_for_pass == 6)

         @else
        <li class="page-item">
            <button  class="page-link" id="apage_link{{ $i-1 }}">{{ $i-1 }}</button>
        </li>
        @endif
@endif
        <!--main-->
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
          </li>
          <!--main-->
          @if($id_for_pass == $total_serial_number || $id_for_pass == ($total_serial_number - 1) || $id_for_pass == ($total_serial_number - 2) || $id_for_pass == ($total_serial_number - 3)  )

          @else
          <li class="page-item">
              <button  class="page-link" id="apage_link{{ $i+1 }}">{{ $i+1 }}</button>
          </li>
  @endif
        @if($id_for_pass == $total_serial_number || $id_for_pass == ($total_serial_number - 1) || $id_for_pass == ($total_serial_number - 2) || $id_for_pass == ($total_serial_number - 3) || $id_for_pass == ($total_serial_number - 4) )



      @else
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        @endif
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        {{-- <li class="page-item ">
            <button  class="page-link" >.</button>
        </li>
        <li class="page-item ">
            <button  class="page-link" >.</button>
        </li> --}}
        @endif

        @elseif($i == ($total_serial_number-2) )
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == ($total_serial_number-1) )
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif
        @elseif($i == $total_serial_number )
        @if($i == $id_for_pass)
          <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @else
        <li class="page-item ">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
        @endif

        @endif
        @endfor
<!--next button work -->
@if($id_for_pass == $total_serial_number)
<li class="page-item disabled">
    <button  class="page-link disabled" id="napage_link">Next</button>
</li>
@else
<li class="page-item ">
    <button  class="page-link" id="napage_link{{ $id_for_pass }}">Next</button>
</li>
@endif
<!--end next button work-->

          @else
          <!--end check total number greatee than 10 -->
              <!--check total number smaller than 10  -->
              <!--previous button work -->
              @if($id_for_pass == 1)

          <li class="page-item disabled">
            <button  class="page-link" id="papage_link">Previous</button>
        </li>

          @else
          <li class="page-item ">
            <button  class="page-link" id="papage_link{{ $id_for_pass }}">Previous</button>
        </li>
        @endif
<!--end previous button work-->
          @for($i = 1; $i <= $total_serial_number; $i++)



          @if($i == 1)

@if($id_for_pass == 1)
<li class="page-item active">
    <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
</li>
@else
          <li class="page-item">
            <button  class="page-link" id="apage_link{{ $i }}">{{ $i }}</button>
        </li>
@endif

        @else

        @if($i == $id_for_pass)

        <li class="page-item active">
            <button  class="page-link" id="apage_link{{ $i }}" >{{ $i }}</button>
        </li>

        @else
        <li class="page-item">
            <button  class="page-link" id="apage_link{{ $i }}" >{{ $i }}</button>
        </li>
@endif

@endif


        @endfor
           <!--end check total number smaller than 10  -->
<!--next button work -->

@if($id_for_pass == $total_serial_number)
<li class="page-item disabled">
    <button  class="page-link disabled" id="napage_link">Next</button>
</li>
@else
<li class="page-item ">
    <button  class="page-link" id="napage_link{{ $id_for_pass }}">Next</button>
</li>
@endif
<!--end next button work-->
        @endif
        </ul>
      </nav>
   </div>
   </div>
  <!--end pagination code -->

  <!--go to page code -->
<span>Go To Page: </span><input type="text" id="asgo_to_page_value" /> <button class="btn btn-sm btn-warning" id="asgo_to_page_button">Go</button>
<!--end go to page to -->


  <script>
  $(document).ready(function(){
    $("[id^=apage_link]").click(function(){

        var first_search_result = $('#first_search_result').val();
        var main_id = $(this).attr('id');
        var id_for_pass = main_id.slice(10);
        //alert(id_for_pass);

       // var token = $("input[name='_token']").val();
    $.ajax({
        url: "{{ route('pagination_fetch_data_search') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass,first_search_result:first_search_result},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });

    //next button
    $("[id^=napage_link]").click(function(){
        var first_search_result = $('#first_search_result').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(11);
        var id_for_pass = parseInt(id_for_pass1) + parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "{{ route('pagination_fetch_data_search') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass,first_search_result:first_search_result},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

    });
    //end next button


    //previous button
    $("[id^=papage_link]").click(function(){
        var first_search_result = $('#first_search_result').val();
        var main_id = $(this).attr('id');
        var id_for_pass1 = main_id.slice(11);
        var id_for_pass = parseInt(id_for_pass1) - parseInt(1);

       // alert(id_for_pass);

       $.ajax({
        url: "{{ route('pagination_fetch_data_search') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass,first_search_result:first_search_result},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data.options);
        }
    });

});
    //end previous button

    //go to page start

    $("#asgo_to_page_button").click(function(){
            var first_search_result = $('#first_search_result').val();
var id_for_pass = $('#asgo_to_page_value').val();



$.ajax({
            url: "{{ route('pagination_fetch_data_search') }}",
            method: 'GET',
            data: {id_for_pass:id_for_pass,first_search_result:first_search_result},
            success: function(data) {
              $("#main_content_table").html('');
              $("#main_content_table").html(data.options);
            }
        });
});
//end go to page
});
</script>
