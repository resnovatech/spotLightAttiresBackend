
                <div class="wrapper" >
                    <table class="table table-striped">
                        <thead class="custom_header_color">
                        <tr>

                            <th  class=" second-col-manage">Product Name</th>
                            <th class="variation-col">Product SKU</th>

                            <th class="price-col">Price</th>
                            <th class="price-col">Stock</th>


                        </tr>
                        </thead>
                        <tbody>
                            @foreach($product_list_outOfStock_new as $key=>$all_product_list)
                        <tr>

                            <td class=" second-col-manage">
                                <?php
            $mm_id = $all_product_list->product_name;
                                $product_id_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('id');
                                $product_name_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('product_name');
                                $product_sku_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('sku_product');
                                $product_price_from_table  = DB::table('main_products')->where('id',$all_product_list->product_name)->value('selling_price');

                                $first_image_f = DB::table('feature_product_images')->where('product_name',$product_id_from_table)->value('filename');

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
                                            {{ $product_name_from_table }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td class="variation-col">{{ $product_sku_from_table }}</td>

                            <td class="price-col"> {{ $product_price_from_table}} BDT  </td>
                            <td class="price-col">



                                {{ $all_product_list->quantity }}


</td>



                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                 <!--pagination all page-->
          @include('backend.product_list.outofstock_ajax_pagination')
          <!--end pagination all page -->
   <!--go to page code -->
   {{-- <span>Go To Page: </span><input type="text" id="ago_to_page_value" /> <button class="btn btn-sm btn-warning" id="ago_to_page_button">Go</button> --}}
   <!--end go to page to -->
   <script type="text/javascript" src="{{ asset('/') }}public/custom_js/outofstock_product_list_page.js"></script>

