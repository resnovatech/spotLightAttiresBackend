@php
     $usr = Auth::guard('admin')->user();
 @endphp
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboards</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Product Section</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-basket"></i>
                        <span key="t-projects">Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        {{-- <li class="{{ Route::is('sub_category_type')  ? 'active' : '' }}"><a href="{{ route('sub_category_type') }}"> <span>Test Form</span> </a></li> --}}

 @if ($usr->can('animation_category_add') || $usr->can('animation_category_view') || $usr->can('animation_category_delete') ||$usr->can('animation_category_update') )
                        <li class="{{ Route::is('animation_category')  ? 'active' : '' }}"><a href="{{ route('animation_category') }}"> <span>Animation Category</span> </a></li>
                   @endif

                        @if ($usr->can('category_add') || $usr->can('category_view') || $usr->can('category_delete') ||$usr->can('category_update') )
                        <li class="{{ Route::is('admin.product_category')  ? 'active' : '' }}"><a href="{{ route('admin.product_category') }}"> <span>Category</span> </a></li>
                   @endif

                   @if ($usr->can('child_category_add') || $usr->can('child_category_view') || $usr->can('child_category_delete') ||$usr->can('child_category_update') )
                        <li class="{{ Route::is('admin.child_category')  ? 'active' : '' }}"><a href="{{ route('admin.child_category') }}"> <span>SubCategories</span> </a></li>
                   @endif

                    @if ($usr->can('attribute_add') || $usr->can('attribute_view') || $usr->can('attribute_delete') ||$usr->can('attribute_update') )
                        <li class="{{ Route::is('admin.attribute')  ? 'active' : '' }}"><a href="{{ route('admin.attribute') }}"> <span>Attribute</span> </a></li>
                   @endif

                   @if ($usr->can('brand_add') || $usr->can('brand_view') || $usr->can('brand_delete') ||$usr->can('brand_update') )
                        <li class="{{ Route::is('admin.brand')  ? 'active' : '' }}"><a href="{{ route('admin.brand') }}"> <span>Brand</span> </a></li>
                   @endif


                   @if ($usr->can('unit_add') || $usr->can('unit_view') || $usr->can('unit_delete') ||$usr->can('unit_update') )
                        <li class="{{ Route::is('admin.unit')  ? 'active' : '' }}"><a href="{{ route('admin.unit') }}"> <span>Unit</span> </a></li>
                   @endif


                        @if ($usr->can('product_add'))
                        <li class="{{ Route::is('admin.product_list_add')  ? 'active' : '' }}"><a href="{{ route('admin.product_list_add') }}"> <span>Add Product</span> </a></li>
                   @endif
                 @if ($usr->can('product_view'))
                        <li class="{{ Route::is('admin.product_list')  ? 'active' : '' }}"><a href="{{ route('admin.product_list') }}"> <span>Manage Product</span> </a></li>
                 @endif

                 @if ($usr->can('media_center_list'))
                        <li class="{{ Route::is('media_center')  ? 'active' : '' }}"><a href="{{ route('media_center') }}">Media Center</a></li>
                        @endif
                    </ul>
                </li>

                <li class="menu-title" key="t-apps">Sell Section</li>



                @if ($usr->can('invoice_add') || $usr->can('invoice_view'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span ><span>Invoice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if ($usr->can('invoice_add'))
                        <li class="{{ Route::is('invoice_create')  ? 'active' : '' }}"><a href="{{ route('invoice_create') }}">Invoice</a></li>
                        @endif
                        @if ($usr->can('invoice_view'))
                        <li class="{{ Route::is('invoice_list')  ? 'active' : '' }}"><a href="{{ route('invoice_list') }}" >Invoice List</a></li>
                        @endif
                        @if ($usr->can('client_add') || $usr->can('client_view') || $usr->can('client_delete') || $usr->can('client_update'))
<li class="{{ Route::is('client_list') ? 'active' : '' }}">
    <a href="{{ route('client_list') }}" class="waves-effect">

        <span key="t-dashboard">Client</span>
    </a>
</li>
@endif
@if ($usr->can('order_by_add') || $usr->can('order_by_view') || $usr->can('order_by_delete') || $usr->can('order_by_update'))
<li class="{{ Route::is('order_by') ? 'active' : '' }}">
    <a href="{{ route('order_by') }}" class="waves-effect">

        <span key="t-dashboard">Order By</span>
    </a>
</li>
@endif
                    </ul>
                </li>
@endif

<li class="menu-title" key="t-apps">Website Section</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx bx-images"></i>
        <span ><span>Banner List</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">



        @if ($usr->can('banner_first_view') || $usr->can('banner_first_add') || $usr->can('banner_first_delete') || $usr->can('banner_first_update'))
        <li class="{{ Route::is('first_banner')  ? 'active' : '' }}">
            <a href="{{ route('first_banner') }}" ><span>Slider</span></a>
        </li>
        @endif


        @if ($usr->can('banner_second_view') || $usr->can('banner_second_add') || $usr->can('banner_second_delete') || $usr->can('banner_second_update'))
        <li class="{{ Route::is('second_banner')  ? 'active' : '' }}">
            <a href="{{ route('second_banner') }}" ><span>Banner Section</span></a>
        </li>
        @endif

        @if ($usr->can('category_banner_view'))
                        <li class="{{ Route::is('category_banner_list')  ? 'active' : '' }}">
                            <a href="{{ route('category_banner_list') }}" ><span>Category Banner</span></a>
                        </li>
                        @endif

    </ul>
</li>








                        @if ($usr->can('contact_add') || $usr->can('contact_view') || $usr->can('contact_delete') || $usr->can('contact_update'))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-chat"></i>
                                <span ><span>Contact Us</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">

                                <li class="{{ Route::is('contact_us')  ? 'active' : '' }}"><a href="{{ route('contact_us') }}">Contact Info</a></li>


                                <li class="{{ Route::is('ask_question')  ? 'active' : '' }}"><a href="{{ route('ask_question') }}" >Social Link List</a></li>
                                <li class="{{ Route::is('message_list')  ? 'active' : '' }}"><a href="{{ route('message_list') }}" >Message List</a></li>

                            </ul>
                        </li>
        @endif


        @if ($usr->can('blog_add') || $usr->can('blog_view') || $usr->can('blog_delete') || $usr->can('blog_update'))
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-file"></i>
                <span ><span>Blog</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">




                <li class="{{ Route::is('blog_category')  ? 'active' : '' }}"><a href="{{ route('blog_category') }}" >Blog Category</a></li>
                <li class="{{ Route::is('blog')  ? 'active' : '' }}"><a href="{{ route('blog') }}" >Blog</a></li>

            </ul>
        </li>
@endif
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx  bx-list-ul"></i>
        <span ><span>Other</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        @if ($usr->can('ship_price_view') || $usr->can('ship_price_add') || $usr->can('ship_price_delete') || $usr->can('ship_price_update'))
        <li class="{{ Route::is('shipping_price_list')  ? 'active' : '' }}">
            <a href="{{ route('shipping_price_list') }}" ><span>Shipping Price</span></a>
        </li>
        @endif

        @if ($usr->can('about_view') || $usr->can('about_add') || $usr->can('about_delete') || $usr->can('about_update'))
        <li class="{{ Route::is('about_us')  ? 'active' : '' }}">
            <a href="{{ route('about_us') }}" ><span>About Us</span></a>
        </li>
        @endif

        @if ($usr->can('review_view') || $usr->can('review_add') || $usr->can('review_delete') || $usr->can('review_update'))
        <li class="{{ Route::is('review_list')  ? 'active' : '' }}">
            <a href="{{ route('review_list') }}" ><span>Review</span></a>
        </li>
        @endif


    </ul>
</li>
@if ($usr->can('expense_view') || $usr->can('expense_add') || $usr->can('expense_delete') || $usr->can('expense_update'))
<li class="menu-title" key="t-apps">Expense/Income/Revenue Section</li>

    <li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx  bx-list-ul"></i>
        <span ><span>Expense</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        
          <li class="{{ Route::is('admin.expense_category')  ? 'active' : '' }}">
            <a href="{{ route('admin.expense_category') }}" ><span>Expense Category</span></a>
        </li>
       
        <li class="{{ Route::is('admin.expense')  ? 'active' : '' }}">
            <a href="{{ route('admin.expense') }}" ><span>Expense</span></a>
        </li>
       
    </ul>
</li>

  <li class="{{ Route::is('admin.income') ? 'active' : '' }}">
                    <a href="{{ route('admin.income') }}" class="waves-effect">
                        <i class="bx bx-money"></i>
                        <span key="t-dashboard">Income</span>
                    </a>
                </li>

  <li class="{{ Route::is('admin.revenue') ? 'active' : '' }}">
                    <a href="{{ route('admin.revenue') }}" class="waves-effect">
                        <i class="bx bx-money"></i>
                        <span key="t-dashboard">Revenue</span>
                    </a>
                </li>


                @endif
<li class="menu-title" key="t-apps">Redex Section</li>
@if ($usr->can('redex_api_view') || $usr->can('redex_api_add'))

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="bx  bx bx-task"></i>
        <span ><span>Parcel & Pick up Store</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">

        <li class="{{ Route::is('parcel_list_from_redex')  ? 'active' : '' }}">
            <a href="{{ route('parcel_list_from_redex') }}" ><span>Parcel List</span></a>
        </li>



        <li class="{{ Route::is('create_parcel_for_redex')  ? 'active' : '' }}">
            <a href="{{ route('create_parcel_for_redex') }}" ><span>Create Parcel</span></a>
        </li>



        <li class="{{ Route::is('pickup_store_information')  ? 'active' : '' }}">
            <a href="{{ route('pickup_store_information') }}" ><span>Pick-Up Store Information</span></a>
        </li>



    </ul>
</li>
@endif

                <li class="menu-title" key="t-apps">Settings</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-projects">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                        <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>System Information</span> </a></li>

            @endif

                        @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                        <li class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins') }}"><span>User</span> </a>
                        </li>

                   @endif


                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

            @endif
                   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                     <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                        </li>

                    @endif



                        {{-- <li><a href="projects-grid.html" key="t-p-grid">Projects Grid</a></li>
                        <li><a href="projects-list.html" key="t-p-list">Projects List</a></li>
                        <li><a href="projects-overview.html" key="t-p-overview">Project Overview</a></li>
                        <li><a href="projects-create.html" key="t-create-new">Create New</a></li> --}}
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
{{-- <div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.php" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="20">
                        </span>
        </a>

        <a href="index.php" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="20">
                        </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                @if ($usr->can('dashboard.view'))
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
@endif

@if ($usr->can('product_main'))
<li class="menu-title">PRODUCT SECTION</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uil-label"></i>
        <span>Product</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">

        @if ($usr->can('product_add'))
        <li class="{{ Route::is('admin.product_list_add')  ? 'active' : '' }}"><a href="{{ route('admin.product_list_add') }}"> <span>Add Product</span> </a></li>
@endif
@if ($usr->can('product_view'))
        <li class="{{ Route::is('admin.product_list')  ? 'active' : '' }}"><a href="{{ route('admin.product_list') }}"> <span>Manage Product</span> </a></li>
@endif



    </ul>
</li>

@endif

                <li class="menu-title">Setting</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-setting"></i>
                        <span>System Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                        <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>System Information</span> </a></li>

            @endif

                        @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                        <li class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins') }}"><span>User</span> </a>
                        </li>

                   @endif


                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

            @endif
                   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                     <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                        </li>

                    @endif



                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div> --}}







