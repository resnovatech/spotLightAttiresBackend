@extends('backend.master.master')

@section('title')
Create Blog | {{ $ins_name }}
@endsection


@section('css')

@endsection

@section('body')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Add New Blog</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Blog Page</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!--form section start-->
<form id="main_form" method="post" action="{{ route('blog_store') }}" enctype="multipart/form-data">
    @csrf
<div class="row">
    @include('flash_message')
    <div class="col-12">
        <div class="card">
            <div class="row">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <select name="cat_name" class="form-control">
                            @foreach($category_list as $all_category_list)
                             <option value="{{ $all_category_list->name }}">{{ $all_category_list->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control"
                               >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea id="summernote" name="des"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control"
                               >
                    </div>
                </div>
            <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!--ddd-->


@endsection


@section('script')

<script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 180,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>


<script type="text/javascript">
    $(".custom_select_dropdown").click(function (e) {
        $(".custom_select_menu").show();
        e.stopPropagation();
    });

    $(".custom_select_menu").click(function (e) {
        e.stopPropagation();
    });

    $(document).click(function () {
        $(".custom_select_menu").hide();
    });
</script>

<script>
    jQuery("#carousel").owlCarousel({
        autoplay: false,
        lazyLoad: true,
        dots: false,
        loop: false,
        responsiveClass: true,
        nav: true,
        responsive: {
            0: {
                items: 1
            },

            600: {
                items: 2
            },

            1200: {
                items: 3
            },

            1600: {
                items: 4
            }
        }
    });
</script>
@endsection
