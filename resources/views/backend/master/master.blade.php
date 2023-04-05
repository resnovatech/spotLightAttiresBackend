<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ResNova App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}{{ $icon }}">
<!--    Library owl carousel-->
<link rel="stylesheet" href="{{ asset('/') }}public/new_admin/assets/libs/owl.carousel/assets/owl.carousel.min.css">

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- Lightbox css -->
<link href="{{ asset('/') }}public/new_admin/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />

<!--    Library select2-->
<link href="{{ asset('/') }}public/new_admin/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/') }}public/new_admin/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('/') }}public/new_admin/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
<!-- DataTables -->
<link href="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- ResNova Bootstrap Css -->
    <link href="{{ asset('/') }}public/new_admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- ResNova Icons Css -->
    <link href="{{ asset('/') }}public/new_admin/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- ResNova App Css-->
    <link href="{{ asset('/') }}public/new_admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

  <style>
    .swal2-confirm{
    margin-left: 10px;
    }
    .second-col{
        left : 0px !important;
    }
    .third-col{
        left : 0px !important;
    }
  </style>

    @yield('css')

</head>

<body data-sidebar="dark">
<!-- Begin page -->
<div id="layout-wrapper">


    <!-- Top Header Section Start-->

    @include('backend.include.header');

    <!-- Top Header Section End-->


    <!-- Left Header Section Start-->

    @include('backend.include.sidebar');

    <!-- Left Header Section End-->


    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('body')

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Footer Section Start-->

        @include('backend.include.footer')

        <!-- Footer Section End-->


    </div>
    <!-- END layout-wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('/') }}public/new_admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}public/new_admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}public/new_admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('/') }}public/new_admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/') }}public/new_admin/assets/libs/node-waves/waves.min.js"></script>

    <!-- Required datatable js -->
<script src="{{ asset('/') }}public/new_admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Datatable init js -->
<script src="{{ asset('/') }}public/new_admin/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('/') }}public/new_admin/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>


     <!--    Library Select2-->
     <script src="{{ asset('/') }}public/new_admin/assets/libs/select2/js/select2.min.js"></script>

      <!--    Library Select2 & Datepicker-->

    <script src="{{ asset('/') }}public/new_admin/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


  <!-- Magnific Popup-->
  <script src="{{ asset('/') }}public/new_admin/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- lightbox init js-->
  <script src="{{ asset('/') }}public/new_admin/assets/js/pages/lightbox.init.js"></script>


     <!-- Plugins js -->
     <script src="{{ asset('/') }}public/new_admin/assets/libs/dropzone/min/dropzone.min.js"></script>
     <!--    Library owl carousel-->
     <script src="{{ asset('/') }}public/new_admin/assets/libs/owl.carousel/owl.carousel.min.js"></script>
 <!-- apexcharts -->
 <script src="{{ asset('/') }}public/new_admin/assets/libs/apexcharts/apexcharts.min.js"></script>

 <script src="{{ asset('/') }}public/new_admin/assets/js/pages/profile.init.js"></script>
    <!-- form advanced init -->
    <script src="{{ asset('/') }}public/new_admin/assets/js/pages/form-advanced.init.js"></script>
<script src="{{ asset('/') }}public/new_admin/assets/js/pages/datatables.init.js"></script>
    <script src="{{ asset('/') }}public/new_admin/assets/js/app.js"></script>
    @yield('script')
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script> --}}





</body>
</html>





