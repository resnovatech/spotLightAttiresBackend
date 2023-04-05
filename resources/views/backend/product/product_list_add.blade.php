@extends('backend.master.master')

@section('title')
Add Product | {{ $ins_name }}
@endsection


@section('css')
<style>
    input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
    </style>
@endsection

@section('body')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Add Product</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li> --}}
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @include('flash_message')

                  <form method="post" action="{{url('admin/image_store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">



                    <div class="field" align="left">
                        <h3>Upload your images</h3>
                        <input type="file" id="files" name="files[]" multiple />
                      </div>




         </div>
                    <div class="col-md-6">
                        <a class="btn btn-success w-md waves-effect waves-light" id="btn" >Media Center</a>

                        <div id="main_content_table">

                        </div>
                    </div>

                    <div class="mt-5">
                      <button class="btn btn-primary w-md waves-effect waves-light" type="submit" id="final_reset_button">Add</button>
                  </div>
                  </div>
                </form>

            </div>
        </div>
    </div>
</div>

 <!-- Modal HTML -->
 <div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Center</h5>
                <button type="button" class="btn btn-danger close" >&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    @foreach($image_list as $all_image_list)
                    <div class="col-md-3">
                        <img src="{{ asset('/') }}{{ $all_image_list->filename }}" style="height:50px;"/><br>
                        <input type="checkbox" name="database_image[]" value="{{ $all_image_list->filename }}"/>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5">
                    <button class="btn btn-primary w-md waves-effect waves-light"  id="database_image_upload_result">submit</button>
                </div>

            </div>

        </div>
    </div>
</div>
</div>

@endsection


@section('script')
<script>
    $(document).ready(function(){
        $("#btn").click(function(){
            $("#myModal").modal('show');
        });

        $(".close").click(function(){
            $("#myModal").modal('hide');
        });

        //database image button

        $("#database_image_upload_result").click(function(){

            //var database_image_upload = $('input[name^="database_image[]"]').val();

            var database_image_upload = $('input[name^="database_image[]"]:checked').map(function (idx, ele) {
   return $(ele).val();
}).get();

// var quotations = [];

//  alert(values);

  

        });
    });
</script>
<script type="text/javascript">
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });

          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/

        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>


@endsection
