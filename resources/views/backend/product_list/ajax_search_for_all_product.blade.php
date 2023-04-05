
                <div class="wrapper" >
                    <table class="table table-striped">
                        <thead class="custom_header_color">
                        <tr>
                            <th class="sticky-coll first-col-manage align-middle">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input" type="checkbox" id="master">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th  class=" second-col-manage">Product Name</th>
                            <th class="variation-col">Product SKU</th>
                            <th class="variation-col">Variation</th>
                            <th class="price-col">Price</th>
                            <th class="price-col">Stock</th>
                            <th class="created-col">Created</th>
                            <th class="sticky-coll-last forth-col-manage"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($product_list as $key=>$all_product_list)
                        <tr>
                            <td class="sticky-coll first-col-manage">
                                <div class="form-check font-size-16">
                                    <input class="form-check-input sub_chk" value="{{$all_product_list->id}}"  data-id="{{$all_product_list->id}}" type="checkbox" id="orderidcheck01">
                                    <label class="form-check-label" for="orderidcheck01"></label>
                                </div>
                            </td>
                            <td class=" second-col-manage">
                                <?php

                                $first_image_f = DB::table('feature_product_images')->where('product_name',$all_product_list->id)->value('filename');

                                ?>
                                <table>
                                    <tr>
                                        <td>
                                            @if(empty($first_image_f))
                                            <img src="{{ asset('/') }}public/no_imagef.jpg" width="80px" alt="">
                                            @else
                                            <img src="{{ asset('/') }}{{ $first_image_f }}" width="80px" alt="">
                                            @endif
                                        </td>
                                        <td class="align-baseline">
                                            {{ $all_product_list->product_name }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="variation-col">{{ $all_product_list->sku_product }}</td>
                            <td class="variation-col">

                                <?php

                                $color_list_all =  DB::table('imageuploads')->where('product_id',$all_product_list->id)->select('color_id')->get();

                                $size_list_all =  DB::table('assaign_sizes')->where('product_name',$all_product_list->id)->select('size_name')->get();
                                ?>

                                Color: <code>
                                  @foreach($color_list_all as $all_color_list)
                                  {{ $all_color_list->color_id }},
                                    @endforeach

                                </code> <br>
                                Size: <code>
                                    @foreach($size_list_all as $all_color_list)
                                    {{ $all_color_list->size_name }}
                                      @endforeach
                                </code>


                            </td>
                            <td class="price-col"> {{ $all_product_list->selling_price }} BDT <a href="javascript:void(0);" data-productId ="{{ $all_product_list->id }}" id="productPriceUpdate{{ $all_product_list->id }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> </td>
                            <td class="price-col">

                                <?php
                              $total_quantity = DB::table('product_colors')->where('product_name',$all_product_list->id)->sum('quantity');

                                    ?>

                                {{ $total_quantity }}


                                <a href="javascript:void(0);" data-productId ="{{ $all_product_list->id }}" id="productQuantityUpdate{{ $all_product_list->id }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                            </td>
                            <td class="created-col">
                                Created at: <br>
                                {{ $all_product_list->created_at->format('d-m-Y') }}
                                <br>
                                Updated at: <br>
                                {{ $all_product_list->updated_at->format('d-m-Y') }}
                            </td>
                            <td class="sticky-coll-last forth-col-manage">
                                <div class="d-flex gap-3">
                                    <a href="{{ route('admin.product.edit',$all_product_list->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    @if (Auth::guard('admin')->user()->can('product_delete'))
                                    <a href="javascript:void(0);"  onclick="deleteTag({{ $all_product_list->id}})" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>

                                    <form id="delete-form-{{ $all_product_list->id }}" action="{{ route('admin.product.delete',$all_product_list->id) }}" method="POST" style="display: none;">

                                                                      @csrf

                                                                  </form>
                                    @endif
                                </div>
                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                 <!--pagination all page-->
          @include('backend.product_list.search_ajax_pagination')
          <!--end pagination all page -->
   <!--go to page code -->
   {{-- <span>Go To Page: </span><input type="text" id="ago_to_page_value" /> <button class="btn btn-sm btn-warning" id="ago_to_page_button">Go</button> --}}
   <!--end go to page to -->
   <script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_list_page.js"></script>
   <script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_price_and_stock_update.js"></script>
   <script type="text/javascript" src="{{ asset('/') }}public/custom_js/product_search.js"></script>
