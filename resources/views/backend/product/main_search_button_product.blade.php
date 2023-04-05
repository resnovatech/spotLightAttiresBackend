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


@foreach($product_list as $key => $all_product_list)
        <tr>
            <td>
                <div class="form-check font-size-16">
                    <input type="checkbox" class="form-check-input" id="customCheck5">
                    <label class="form-check-label" for="customCheck5">&nbsp;</label>
                </div>
            </td>

            <td>{{ $key+1 }}</td>
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

<div class="row mt-3">
    <input type="hidden" value="{{ $search }}" name="first_search_result" id="first_search_result" />
<div class="col-md-12">
  <nav aria-label="...">
    <ul class="pagination pagination-sm">
      {{-- <li class="page-item active" aria-current="page">
        <span class="page-link">1</span>
      </li> --}}

      <!--check total number greater than 10  -->
      @if($total_serial_number > 10)
      <!--previous button work -->
      <li class="page-item disabled">
        <button  class="page-link" id="sppage_link">Previous</button>
    </li>
      <!--end previous  button work-->

      @for($i = 1; $i <= $total_serial_number; $i++)

      @if($i == 1)
      <li class="page-item active">
        <button  class="page-link" id="spage_link{{ $i }}">{{ $i }}</button>
    </li>
      @elseif($i == 2)
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>
    @elseif($i == 3)
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>
    @elseif($i == 4)
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>

    @elseif($i == 5)
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>

    @elseif($i == 6)
    <li class="page-item">
        <button  class="page-link"  >.</button>
    </li>
    @elseif($i == 7)
    <li class="page-item">
        <button  class="page-link"  >.</button>
    </li>

    @elseif($i == ($total_serial_number-2) )
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>
    @elseif($i == ($total_serial_number-1) )
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>
    @elseif($i == $total_serial_number )
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>

    @endif
    @endfor
<!--next button work -->
<li class="page-item ">
<button  class="page-link" id="snpage_link">Next</button>
</li>
<!--end next button work -->

      @else
      <!--end check total number greatee than 10 -->
          <!--check total number smaller than 10  -->
          <!--previous button work -->
<li class="page-item disabled">
<button  class="page-link" id="sppage_link">Previous</button>
</li>
<!--end previous button work -->
      @for($i = 1; $i <= $total_serial_number; $i++)

      @if($i == 1)
      <li class="page-item active">
        <button  class="page-link" id="spage_link{{ $i }}">{{ $i }}</button>
    </li>
      @else
    <li class="page-item">
        <button  class="page-link" id="spage_link{{ $i }}" >{{ $i }}</button>
    </li>
    @endif
    @endfor
    <!--next button work -->
<li class="page-item ">
<button  class="page-link" id="snpage_link">Next</button>
</li>
<!--end next button work -->
       <!--end check total number smaller than 10  -->
    @endif
    </ul>
  </nav>
</div>
</div>
  <!--end pagination code -->
<!--go to page code -->
<span>Go To Page: </span><input type="text" id="sgo_to_page_value" /> <button class="btn btn-sm btn-warning" id="sgo_to_page_button">Go</button>
<!--end go to page to -->
  <script>
    $(document).ready(function(){
        $("[id^=spage_link]").click(function(){

            var first_search_result = $('#first_search_result').val();
            var main_id = $(this).attr('id');
            var id_for_pass = main_id.slice(10);
            //alert(id_for_pass);

            //var token = $("input[name='_token']").val();
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

        //next page button
        $("#snpage_link").click(function(){
            var first_search_result = $('#first_search_result').val();
            var id_for_pass = 2;

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

        //go to page start

        $("#sgo_to_page_button").click(function(){
            var first_search_result = $('#first_search_result').val();
var id_for_pass = $('#sgo_to_page_value').val();



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
