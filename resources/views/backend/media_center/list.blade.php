@extends('backend.master.master')

@section('title')
Media Center
@endsection


@section('css')

@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Media Center Information</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active">Product All Image</li>
                </ol>
            </div>

        </div>
    </div>

</div>
<div class="row">
    <div class="col-xl-6">
        <button type="button" class="btn btn-danger w-md"  id="active_button" disabled>
             Delete All
        </button>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">


                <div class="row">
                <div class="popup-gallery d-flex flex-wrap">



                    @foreach($feature_image_list as $key=>$all_feature_image)
                    <div class="col-xl-2">
                        <div class="card">
                            <div class="card-body">
                    <a href="{{ asset('/') }}{{ $all_feature_image->filename }}" title="Image">
                        <div class="img-fluid">
                            <img src="{{ asset('/') }}{{ $all_feature_image->filename }}" alt="" width="120">
                        </div>
                    </a>
                    <div class="card-footer">
                       <input type="checkbox"  class="sub_check" value="{{ $all_feature_image->id }}" name="fimage[]"  id="fimage{{ $all_feature_image->id }}" />
                    </div>
                            </div>

                        </div>
                    </div>
@endforeach

@foreach($main_image_list as $key=>$all_feature_image)
<div class="col-xl-2">
    <div class="card">
        <div class="card-body">
<a href="{{ asset('/') }}{{ $all_feature_image->filename }}" title="Image">
    <div class="img-fluid">
        <img src="{{ asset('/') }}{{ $all_feature_image->filename }}" alt="" width="120">
    </div>
</a>
<div class="card-footer">
    <input type="checkbox" class="sub_check12" value="{{ $all_feature_image->id }}" name="nimage[]"  id="nimage{{ $all_feature_image->id }}" />
</div>
</div>

</div>
</div>
@endforeach

                </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Are You Sure ?</h1>
                    {{-- <button type="button" class="btn btn-danger close" >&times;</button> --}}
                </div>
                <div class="modal-body">
    {{-- <button>ddddqw</button> --}}
                        <button class="btn btn-success w-md waves-effect waves-light"  id="final_delete">Yes</button>
                        <button class="btn btn-danger w-md waves-effect waves-light closee" id="">Cancel</button>


                </div>

            </div>
        </div>
    </div>
    <!--end modal for delete -->
@endsection

@section('script')

<script>


$(document).ready(function () {

$(".sub_check").change(function(){

    if($(this).is(':checked',true))
    {
        var numberOfSubChecked = $('.sub_check:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();
   // alert(numberOfSubChecked);
    }else{
        var numberOfSubChecked = $('.sub_check:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();
        //alert(numberOfSubChecked);
    }

    if(numberOfSubChecked.length == 0){

        $('#active_button').prop('disabled', true);

    }else{
        $('#active_button').prop('disabled', false);
    }
});

////

$("#active_button").click(function(){

$("#myModal").modal('show');

});


///

$(".closee").click(function(){

$("#myModal").modal('hide');

// $('.sub_check').is(':checked',false)

$('.sub_check').attr('checked', false);

});

//final delect code

$("#final_delete").click(function(){

    var numberOfSubChecked = $('.sub_check:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();


    var numberOfSubChecked12 = $('.sub_check12:checked').map(function (idx, ele) {
    return $(ele).val();
    }).get();


    $.ajax({
        url: "{{ route('delete_all_data_from_media') }}",
        method: 'GET',
        data: {numberOfSubChecked:numberOfSubChecked,numberOfSubChecked12:numberOfSubChecked12},
        success: function(data) {
            $("#myModal").modal('hide');
            location.reload(true);
        }
        });

});

});
</script>

@endsection
