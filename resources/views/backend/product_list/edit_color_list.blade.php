<div class="row" id="ajax_div{{ $key+1 }}">

    <?php $assaign_final_value = count($assaign_color_list) - 1;?>

    @if($key == $assaign_final_value)

     <label for="example-text-input" class="col-md-2 col-form-label">Color </label>
                                    <div class="col-md-7">
                                        <select class="select2 form-select">
                                            <option>Select Color</option>

                                            @foreach($attribute_list_color as $all_attribute_list_color)
                                            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_assaign_color->color_id == $all_attribute_list_color->name_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-7"></div>
                                    <div class="col-md-3 mt-3">
                                        <button class="btn btn-danger btn-sm mt-1" data-dnumber ="{{ $key+1 }}" id="delete_button_color{{ $key+1 }}">
                                            <i class="fa fa-trash"> Delete Section </i>
                                        </button>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">

                                        <div class="another_image_box">
                                            <div class="another_image_box_content_box">
                                                <p>Add at least 3 images of your product from different
                                                    angles.Maximum 8 pictures. Size between 500x500 and
                                                    2000x2000 px. Obscene image is strictly
                                                    prohibited.</p>
                                                <div class="d-flex justify-content-start flex-wrap">
<?php  $image_list_color_wise = DB::table('image_lists')->where('product_id',$main_product_list->id)->where('color_id',$all_assaign_color->color_id)->get(); ?>

@foreach($image_list_color_wise as $key=>$all_color_image_list)

<input type="hidden" value="{{ $all_color_image_list->filename }}" name="previous_c_imagec[]"/>
                                                    <div class="p-2" id="child_color_image_div{{ $key+1 }}">
                                                        <div class="img_upload_box">
                                                            <img src="{{ asset('/') }}{{ $all_color_image_list->filename }}"
                                                                 class="img-fluid" alt="">
                                                        </div>
                                                        <button type="button" data-cciid= '{{ $key+1 }}' id="child_color_image_delete_button{{ $key+1 }}"
                                                                class="btn btn-danger btn-sm note-btn-block">
                                                            Delete
                                                        </button>
                                                    </div>
                                                    @endforeach
                                                    <div class="p-2">
                                                        <div id="show_image{{ $key+1 }}">

                                                        </div>
                                                        <div class="upload_custom_button">
                                                            <a class="upload_selected" id="cbtn">
                                                                <i class="fa fa-image upload_icon"></i>
                                                                <span class="upload_text">Media Center</span>
                                                            </a>
                                                        </div>
                                                        <div class="upload_custom_button">
                                                            <a class="upload_selected">
                                                                <i class="fa fa-upload upload_icon"></i>
                                                                <span class="upload_text">
                                                                    <input type="file" data-dnumber ="{{ $key+1 }}" id="pfiles{{ $key+1 }}" name="pfiles{{ $key}}[]" multiple />
                                                                </span>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-3 row">

                                            <div class="col-md-7">
                                                <select class="select2 form-select" name="maincolor[]" data-mainid= "{{ $key+1 }}" id="child_color_select{{ $key+1 }}">
                                                    <option>Select Color</option>
                                                    @foreach($attribute_list_color as $all_attribute_list_color)
                                                    <option value="{{ $all_attribute_list_color->name_list }}" >{{ $all_attribute_list_color->name_list }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <span class="font-size-12 mt-2"> Just select the color to add new color </span>
                                            </div>

                                                </div>

                                        <!--child code -->

                                        <div class="mt-3 mb-3 row" id="child_color_select_result{{ $key+1 }}">
                                        </div>
                                        <!--end child code-->
                                    </div>

<!--child color attribute list -->
<div id="cmyModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Center</h5>
                <button type="button" class="btn btn-danger closeec" >&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    @foreach($image_list as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" id="cdatabase_image{{ $key+1 }}" name="pdatabase_imaged[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                    @foreach($image_list_f as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" id="cdatabase_image{{ $key+1 }}" name="pdatabase_imaged[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary w-md waves-effect waves-light" data-dnumber ="{{ $key+1 }}"  id="cdatabase_image_upload_result{{ $key+1 }}">submit</button>
                </div>

            </div>

        </div>
    </div>
</div>
<!--end child color attribute list -->


    @else


    <label for="example-text-input" class="col-md-2 col-form-label">Color </label>
                                    <div class="col-md-7">
                                        <select class="select2 form-select">
                                            <option>Select Color</option>

                                            @foreach($attribute_list_color as $all_attribute_list_color)
                                            <option value="{{ $all_attribute_list_color->name_list }}" {{ $all_assaign_color->color_id == $all_attribute_list_color->name_list ? 'selected':'' }}>{{ $all_attribute_list_color->name_list }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-7"></div>
                                    <div class="col-md-3 mt-3">
                                        <button class="btn btn-danger btn-sm mt-1" data-dnumber ="{{ $key+1 }}" id="delete_button_color{{ $key+1 }}">
                                            <i class="fa fa-trash"> Delete Section </i>
                                        </button>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-10">

                                        <div class="another_image_box">
                                            <div class="another_image_box_content_box">
                                                <p>Add at least 3 images of your product from different
                                                    angles.Maximum 8 pictures. Size between 500x500 and
                                                    2000x2000 px. Obscene image is strictly
                                                    prohibited.</p>
                                                <div class="d-flex justify-content-start flex-wrap">
                                                    <div class="p-2">
                                                        <div class="img_upload_box">
                                                            <img src="assets/images/product/img-1.png"
                                                                 class="img-fluid" alt="">
                                                        </div>
                                                        <button type="button"
                                                                class="btn btn-danger btn-sm note-btn-block">
                                                            Delete
                                                        </button>
                                                    </div>

                                                    <div class="p-2">
                                                        <div id="show_image{{ $key+1 }}">

                                                        </div>
                                                        <div class="upload_custom_button">
                                                            <a class="upload_selected" id="cbtn">
                                                                <i class="fa fa-image upload_icon"></i>
                                                                <span class="upload_text">Media Center</span>
                                                            </a>
                                                        </div>
                                                        <div class="upload_custom_button">
                                                            <a class="upload_selected">
                                                                <i class="fa fa-upload upload_icon"></i>
                                                                <span class="upload_text">
                                                                    <input type="file" data-dnumber ="{{ $key+1 }}" id="pfiles{{ $key+1 }}" name="pfiles{{ $key}}[]" multiple />
                                                                </span>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

<!--child color attribute list -->
<div id="cmyModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Center</h5>
                <button type="button" class="btn btn-danger closeec" >&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    @foreach($image_list as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" id="cdatabase_image{{ $key+1 }}" name="pdatabase_imaged[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                    @foreach($image_list_f as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" id="cdatabase_image{{ $key+1 }}" name="pdatabase_imaged[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary w-md waves-effect waves-light" data-dnumber ="{{ $key+1 }}"  id="cdatabase_image_upload_result{{ $key+1 }}">submit</button>
                </div>

            </div>

        </div>
    </div>
</div>
<!--end child color attribute list -->


    @endif

</div>



