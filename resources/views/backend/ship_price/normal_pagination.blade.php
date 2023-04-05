 <!--start pagination -->
 <ul class="pagination pagination-rounded justify-content-end mb-2">
    {{-- <li class="page-item active" aria-current="page">
      <span class="page-link">1</span>
    </li> --}}

    <!--check total number greater than 10  -->
    @if($total_serial_number > 10)
    <!--previous button work -->
    <li class="page-item disabled">
      <button  class="page-link" id="ppage_link"><i class="mdi mdi-chevron-left"></i></button>
  </li>
    <!--end previous  button work-->

    @for($i = 1; $i <= $total_serial_number; $i++)

    @if($i == 1)
    <li class="page-item active">
      <button  class="page-link" id="page_link{{ $i }}">{{ $i }}</button>
  </li>
    @elseif($i == 2)
  <li class="page-item">
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
  </li>
  @elseif($i == 3)
  <li class="page-item">
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
  </li>
  @elseif($i == 4)
  <li class="page-item">
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
  </li>

  @elseif($i == 5)
  <li class="page-item">
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
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
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
  </li>
  @elseif($i == ($total_serial_number-1) )
  <li class="page-item">
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
  </li>
  @elseif($i == $total_serial_number )
  <li class="page-item">
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
  </li>

  @endif
  @endfor
<!--next button work -->
<li class="page-item ">
<button  class="page-link" id="npage_link"><i class="mdi mdi-chevron-right"></i></button>
</li>
<!--end next button work -->

    @else
    <!--end check total number greatee than 10 -->
        <!--check total number smaller than 10  -->
        <!--previous button work -->
<li class="page-item disabled">
<button  class="page-link" id="ppage_link"><i class="mdi mdi-chevron-left"></i></button>
</li>
<!--end previous button work -->
    @for($i = 1; $i <= $total_serial_number; $i++)

    @if($i == 1)
    <li class="page-item active">
      <button  class="page-link" id="page_link{{ $i }}">{{ $i }}</button>
  </li>
    @else
  <li class="page-item">
      <button  class="page-link" id="page_link{{ $i }}" >{{ $i }}</button>
  </li>
  @endif
  @endfor
  <!--next button work -->
<li class="page-item ">
<button  class="page-link" id="npage_link"> <i class="mdi mdi-chevron-right"></i></button>
</li>
<!--end next button work -->
     <!--end check total number smaller than 10  -->
  @endif
  </ul>
  <!--pagination end-->
