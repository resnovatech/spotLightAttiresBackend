<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SystemInformationController;
use App\Http\Controllers\Backend\Auth\LoginController;
//use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductPrintController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\ImageuploadController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\AttributeDetailController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\ProductAddPageController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ProductSearchController;
use App\Http\Controllers\Admin\CientController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\InvoiceFilterController;
use App\Http\Controllers\Admin\CategoryBannerController;
use App\Http\Controllers\Admin\ShippingPriceController;
use App\Http\Controllers\Admin\ExchangeController;
use App\Http\Controllers\Admin\ReturnController;
use App\Http\Controllers\Admin\BannerFirstController;
use App\Http\Controllers\Admin\BannerSecondController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\OrderByController;
use App\Http\Controllers\Admin\AnimationControler;
use App\Http\Controllers\Admin\RedexapiController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExpenseCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.auth.login');
});

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    
     Route::get('income', [ExpenseController::class, 'income'])->name('admin.income');
      Route::get('revenue', [ExpenseController::class, 'revenue'])->name('admin.revenue');
    
    
    
     Route::get('expense_category', [ExpenseCategoryController::class, 'index'])->name('admin.expense_category');
    Route::get('expense_category/create', [ExpenseCategoryController::class, 'create'])->name('admin.expense_category.create');
    Route::post('expense_category/store', [ExpenseCategoryController::class, 'store'])->name('admin.expense_category.store');
    Route::get('expense_category/edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('admin.expense_category.edit');
    Route::post('expense_category/update', [ExpenseCategoryController::class, 'update'])->name('admin.expense_category.update');
    Route::delete('expense_category/delete/{id}', [ExpenseCategoryController::class, 'delete'])->name('admin.expense_category.delete');
    
    
     Route::get('expense', [ExpenseController::class, 'index'])->name('admin.expense');
    Route::get('expense/create', [ExpenseController::class, 'create'])->name('admin.expense.create');
    Route::post('expense/store', [ExpenseController::class, 'store'])->name('admin.expense.store');
    Route::get('expense/edit/{id}', [ExpenseController::class, 'edit'])->name('admin.expense.edit');
    Route::post('expense/update', [ExpenseController::class, 'update'])->name('admin.expense.update');
    Route::delete('expense/delete/{id}', [ExpenseController::class, 'delete'])->name('admin.expense.delete');
    
    

     Route::get('search_product_status', [RedexapiController::class, 'search_product_status'])->name('search_product_status');

    Route::get('search_product_info', [RedexapiController::class, 'search_product_info'])->name('search_product_info');
    //redex section
    Route::get('pickup_store_information', [RedexapiController::class, 'pickup_store_information'])->name('pickup_store_information');
    Route::get('parcel_list_from_redex', [RedexapiController::class, 'parcel_list_from_redex'])->name('parcel_list_from_redex');
    Route::get('create_parcel_for_redex', [RedexapiController::class, 'create_parcel_for_redex'])->name('create_parcel_for_redex');
    Route::post('store_parcel_for_redex', [RedexapiController::class, 'store_parcel_for_redex'])->name('store_parcel_for_redex');
    //end redex section

    //review

    Route::get('animation_get_subcategory_category', [AnimationControler::class, 'animation_get_subcategory_category'])->name('animation_get_subcategory_category');



    Route::get('animation_category', [AnimationControler::class, 'index'])->name('animation_category');
    Route::post('animation_category_store', [AnimationControler::class, 'store'])->name('animation_category_store');
    Route::post('animation_category_update', [AnimationControler::class, 'update'])->name('animation_category_update');
    Route::post('animation_category_delete/{id}', [AnimationControler::class, 'delete'])->name('animation_category_delete');
    Route::get('animation_category_pagination_start_delete', [AnimationControler::class, 'animation_category_pagination_start_delete'])->name('animation_category_pagination_start_delete');
    Route::get('animation_category_pagination_start', [AnimationControler::class, 'animation_category_pagination_start'])->name('animation_category_pagination_start');
    Route::get('animation_category_pagination_start_search', [AnimationControler::class, 'animation_category_pagination_start_search'])->name('animation_category_pagination_start_search');
    Route::get('animation_category_pagination_start_search_ajax', [AnimationControler::class, 'animation_category_pagination_start_search_ajax'])->name('animation_category_pagination_start_search_ajax');
    //end review


    //about us
    Route::get('about_us', [AboutController::class, 'index'])->name('about_us');
    Route::post('about_us_title_store', [AboutController::class, 'about_us_title_store'])->name('about_us_title_store');
    Route::post('about_us_title_update', [AboutController::class, 'about_us_title_update'])->name('about_us_title_update');

    Route::post('about_us_body_first_part_store', [AboutController::class, 'about_us_body_first_part_store'])->name('about_us_body_first_part_store');
    Route::post('about_us_body_first_part_update', [AboutController::class, 'about_us_body_first_part_update'])->name('about_us_body_first_part_update');


    Route::post('about_us_body_second_part_store', [AboutController::class, 'about_us_body_second_part_store'])->name('about_us_body_second_part_store');
    Route::post('about_us_body_second_part_update', [AboutController::class, 'about_us_body_second_part_update'])->name('about_us_body_second_part_update');
    //end about us

    ///order By
    Route::get('catch_order_by_price', [OrderByController::class, 'catch_order_by_price'])->name('catch_order_by_price');

    Route::get('order_by', [OrderByController::class, 'index'])->name('order_by');
    Route::post('order_by_store', [OrderByController::class, 'store'])->name('order_by_store');
    Route::post('order_by_update', [OrderByController::class, 'update'])->name('order_by_update');
    Route::post('order_by_delete/{id}', [OrderByController::class, 'delete'])->name('order_by_delete');
    Route::get('order_by_pagination_start_delete', [OrderByController::class, 'order_by_pagination_start_delete'])->name('review_list_pagination_start_delete');
    Route::get('order_by_pagination_start', [OrderByController::class, 'order_by_pagination_start'])->name('review_list_pagination_start');
    Route::get('order_by_pagination_start_search', [OrderByController::class, 'order_by_pagination_start_search'])->name('review_list_pagination_start_search');
    Route::get('order_by_pagination_start_search_ajax', [OrderByController::class, 'order_by_pagination_start_search_ajax'])->name('review_list_pagination_start_search_ajax');

    ///end order by

    //review

    Route::get('review_list', [ReviewController::class, 'index'])->name('review_list');
    Route::post('review_list_store', [ReviewController::class, 'store'])->name('review_list_store');
    Route::post('review_list_update', [ReviewController::class, 'update'])->name('review_list_update');
    Route::post('review_list_delete/{id}', [ReviewController::class, 'delete'])->name('review_list_delete');
    Route::get('review_list_pagination_start_delete', [ReviewController::class, 'review_list_pagination_start_delete'])->name('review_list_pagination_start_delete');
    Route::get('review_list_pagination_start', [ReviewController::class, 'review_list_pagination_start'])->name('review_list_pagination_start');
    Route::get('review_list_pagination_start_search', [ReviewController::class, 'review_list_pagination_start_search'])->name('review_list_pagination_start_search');
    Route::get('review_list_pagination_start_search_ajax', [ReviewController::class, 'review_list_pagination_start_search_ajax'])->name('review_list_pagination_start_search_ajax');
    //end review

    //contact
    Route::get('contact_us', [ContactController::class, 'index'])->name('contact_us');
    Route::post('contact_us_store', [ContactController::class, 'store'])->name('contact_us_store');
    Route::post('contact_us_update', [ContactController::class, 'update'])->name('contact_us_update');
    Route::post('contact_us_delete/{id}', [ContactController::class, 'delete'])->name('contact_us_delete');
    Route::get('contact_us_pagination_start_delete', [ContactController::class, 'contact_us_pagination_start_delete'])->name('contact_us_pagination_start_delete');
    Route::get('contact_us_pagination_start', [ContactController::class, 'contact_us_pagination_start'])->name('contact_us_pagination_start');
    Route::get('contact_us_pagination_start_search', [ContactController::class, 'contact_us_pagination_start_search'])->name('contact_us_pagination_start_search');
    Route::get('contact_us_pagination_start_search_ajax', [ContactController::class, 'contact_us_pagination_start_search_ajax'])->name('contact_us_pagination_start_search_ajax');
    //end contact

    //message
    Route::get('message_list', [ContactController::class, 'message_list_index'])->name('message_list');

    Route::post('message_list_delete/{id}', [ContactController::class, 'message_list_delete'])->name('message_list_delete');
    Route::get('message_list_pagination_start_delete', [ContactController::class, 'message_list_pagination_start_delete'])->name('message_list_pagination_start_delete');
    Route::get('message_list_pagination_start', [ContactController::class, 'message_list_pagination_start'])->name('message_list_pagination_start');
    Route::get('message_list_pagination_start_search', [ContactController::class, 'message_list_pagination_start_search'])->name('message_list_pagination_start_search');
    Route::get('message_list_pagination_start_search_ajax', [ContactController::class, 'message_list_pagination_start_search_ajax'])->name('message_list_pagination_start_search_ajax');
    //end message

    //frequently ask question

    Route::get('ask_question', [QuestionController::class, 'index'])->name('ask_question');
    Route::post('ask_question_store', [QuestionController::class, 'store'])->name('ask_question_store');
    Route::post('ask_question_update', [QuestionController::class, 'update'])->name('ask_question_update');
    Route::post('ask_question_delete/{id}', [QuestionController::class, 'delete'])->name('ask_question_delete');
    Route::get('ask_question_pagination_start_delete', [QuestionController::class, 'ask_question_pagination_start_delete'])->name('ask_question_pagination_start_delete');
    Route::get('ask_question_pagination_start', [QuestionController::class, 'ask_question_pagination_start'])->name('ask_question_pagination_start');
    Route::get('ask_question_pagination_start_search', [QuestionController::class, 'ask_question_pagination_start_search'])->name('ask_question_pagination_start_search');
    Route::get('ask_question_pagination_start_search_ajax', [QuestionController::class, 'ask_question_pagination_start_search_ajax'])->name('ask_question_pagination_start_search_ajax');

    // end frequently ask question


    ///blog category
    Route::get('blog_category', [BlogCategoryController::class, 'index'])->name('blog_category');
    Route::post('blog_category_store', [BlogCategoryController::class, 'store'])->name('blog_category_store');
    Route::post('blog_category_update', [BlogCategoryController::class, 'update'])->name('blog_category_update');
    Route::post('blog_category_delete/{id}', [BlogCategoryController::class, 'delete'])->name('blog_category_delete');
    Route::get('blog_category_pagination_start_delete', [BlogCategoryController::class, 'blog_category_pagination_start_delete'])->name('blog_category_pagination_start_delete');
    Route::get('blog_category_pagination_start', [BlogCategoryController::class, 'blog_category_pagination_start'])->name('blog_category_pagination_start');
    Route::get('blog_category_pagination_start_search', [BlogCategoryController::class, 'blog_category_pagination_start_search'])->name('blog_category_pagination_start_search');
    Route::get('blog_category_pagination_start_search_ajax', [BlogCategoryController::class, 'blog_category_pagination_start_search_ajax'])->name('blog_category_pagination_start_search_ajax');

    ///end blog category

    //blog
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::get('blog', [BlogController::class, 'index'])->name('blog');
    Route::post('blog_store', [BlogController::class, 'store'])->name('blog_store');
    Route::post('blog_update', [BlogController::class, 'update'])->name('blog_update');
    Route::post('blog_delete/{id}', [BlogController::class, 'delete'])->name('blog_delete');
    Route::get('blog_pagination_start_delete', [BlogController::class, 'blog_pagination_start_delete'])->name('blog_pagination_start_delete');
    Route::get('blog_pagination_start', [BlogController::class, 'blog_pagination_start'])->name('blog_pagination_start');
    Route::get('blog_pagination_start_search', [BlogController::class, 'blog_pagination_start_search'])->name('blog_pagination_start_search');
    Route::get('blog_pagination_start_search_ajax', [BlogController::class, 'blog_pagination_start_search_ajax'])->name('blog_pagination_start_search_ajax');
    //end blog


    //banner first

    Route::get('first_banner', [BannerFirstController::class, 'index'])->name('first_banner');
    Route::post('first_banner_store', [BannerFirstController::class, 'store'])->name('first_banner_store');
    Route::post('first_banner_update', [BannerFirstController::class, 'update'])->name('first_banner_update');
    Route::post('first_banner_delete/{id}', [BannerFirstController::class, 'delete'])->name('first_banner_delete');
    Route::get('first_banner_pagination_start_delete', [BannerFirstController::class, 'first_banner_pagination_start_delete'])->name('first_banner_pagination_start_delete');
    Route::get('first_banner_pagination_start', [BannerFirstController::class, 'first_banner_pagination_start'])->name('first_banner_pagination_start');
    Route::get('first_banner_pagination_start_search', [BannerFirstController::class, 'first_banner_pagination_start_search'])->name('first_banner_pagination_start_search');
    Route::get('first_banner_pagination_start_search_ajax', [BannerFirstController::class, 'first_banner_pagination_start_search_ajax'])->name('first_banner_pagination_start_search_ajax');

//end banner first

    //banner second

    Route::get('second_banner', [BannerSecondController::class, 'index'])->name('second_banner');
    Route::post('second_banner_store', [BannerSecondController::class, 'store'])->name('second_banner_store');
    Route::post('second_banner_update', [BannerSecondController::class, 'update'])->name('second_banner_update');
    Route::post('second_banner_delete/{id}', [BannerSecondController::class, 'delete'])->name('second_banner_delete');
    Route::get('second_banner_pagination_start_delete', [BannerSecondController::class, 'second_banner_pagination_start_delete'])->name('second_banner_pagination_start_delete');
    Route::get('second_banner_pagination_start', [BannerSecondController::class, 'second_banner_pagination_start'])->name('second_banner_pagination_start');
    Route::get('second_banner_pagination_start_search', [BannerSecondController::class, 'second_banner_pagination_start_search'])->name('second_banner_pagination_start_search');
    Route::get('second_banner_pagination_start_search_ajax', [BannerSecondController::class, 'second_banner_pagination_start_search_ajax'])->name('second_banner_pagination_start_search_ajax');

    //end banner second


    //exchange list
    Route::get('exchange_list_view/{id}', [ExchangeController::class, 'view'])->name('exchange_list_view');
    Route::get('exchange_list_edit/{id}', [ExchangeController::class, 'edit'])->name('exchange_list_edit');
    Route::get('exchange_list_print/{id}', [ExchangeController::class, 'print'])->name('exchange_list_print');

    Route::get('exchange_list/{id}', [ExchangeController::class, 'index'])->name('exchange_list');
    Route::post('exchange_list_store', [ExchangeController::class, 'store'])->name('exchange_list_store');
    Route::post('exchange_list_update', [ExchangeController::class, 'update'])->name('exchange_list_update');
    Route::post('exchange_list_delete/{id}', [ExchangeController::class, 'delete'])->name('exchange_list_delete');
    Route::get('exchange_list_pagination_start_delete', [ExchangeController::class, 'exchange_list_pagination_start_delete'])->name('exchange_list_pagination_start_delete');
    Route::get('exchange_list_pagination_start', [ExchangeController::class, 'exchange_list_pagination_start'])->name('exchange_list_pagination_start');
    Route::get('exchange_list_pagination_start_search', [ExchangeController::class, 'exchange_list_pagination_start_search'])->name('exchange_list_pagination_start_search');
    Route::get('exchange_list_pagination_start_search_ajax', [ExchangeController::class, 'exchange_list_pagination_start_search_ajax'])->name('exchange_list_pagination_start_search_ajax');

    //exchange list

    //return  list

    Route::get('invoice_return_view/{id}', [ReturnController::class, 'view'])->name('invoice_return_view');
    Route::get('invoice_return_edit/{id}', [ReturnController::class, 'edit'])->name('invoice_return_edit');
    Route::get('invoice_return_print/{id}', [ReturnController::class, 'print'])->name('invoice_return_print');

    Route::get('invoice_return/{id}', [ReturnController::class, 'index'])->name('invoice_return');
    Route::post('invoice_return_store', [ReturnController::class, 'store'])->name('invoice_return_store');
    Route::post('invoice_return_update', [ReturnController::class, 'update'])->name('invoice_return_update');
    Route::post('invoice_return_delete/{id}', [ReturnController::class, 'delete'])->name('invoice_return_delete');
    Route::get('invoice_return_pagination_start_delete', [ReturnController::class, 'invoice_return_pagination_start_delete'])->name('invoice_return_pagination_start_delete');
    Route::get('invoice_return_pagination_start', [ReturnController::class, 'invoice_return_pagination_start'])->name('invoice_return_pagination_start');
    Route::get('invoice_return_pagination_start_search', [ReturnController::class, 'invoice_return_pagination_start_search'])->name('invoice_return_pagination_start_search');
    Route::get('invoice_return_pagination_start_search_ajax', [ReturnController::class, 'invoice_return_pagination_start_search_ajax'])->name('invoice_return_pagination_start_search_ajax');

    //return list




    //shipping price


    Route::get('shipping_price_list', [ShippingPriceController::class, 'index'])->name('shipping_price_list');
    Route::post('shipping_price_list_store', [ShippingPriceController::class, 'store'])->name('shipping_price_list_store');
    Route::post('shipping_price_list_update', [ShippingPriceController::class, 'update'])->name('shipping_price_list_update');
    Route::post('shipping_price_list_delete/{id}', [ShippingPriceController::class, 'delete'])->name('shipping_price_list_delete');
    Route::get('shipping_price_list_pagination_start_delete', [ShippingPriceController::class, 'shipping_price_list_pagination_start_delete'])->name('shipping_price_list_pagination_start_delete');
    Route::get('shipping_price_list_pagination_start', [ShippingPriceController::class, 'shipping_price_list_pagination_start'])->name('shipping_price_list_pagination_start');
    Route::get('shipping_price_list_pagination_start_search', [ShippingPriceController::class, 'shipping_price_list_pagination_start_search'])->name('shipping_price_list_pagination_start_search');
    Route::get('shipping_price_list_pagination_start_search_ajax', [ShippingPriceController::class, 'shipping_price_list_pagination_start_search_ajax'])->name('shipping_price_list_pagination_start_search_ajax');
    //end shipping price

    //media center

    Route::get('media_center', [MediaController::class, 'media_center'])->name('media_center');



    //client route
    Route::get('client_list_view/{id}', [CientController::class, 'client_list_view'])->name('client_list_view');
    Route::get('client_list_edit', [CientController::class, 'client_list_edit'])->name('client_list_edit');
    Route::get('client_list_detail', [CientController::class, 'client_list_detail'])->name('client_list_detail');
    Route::get('address_list_detail', [CientController::class, 'address_list_detail'])->name('address_list_detail');


    Route::get('saddress_list_detail', [CientController::class, 'saddress_list_detail'])->name('saddress_list_detail');
    Route::get('search_order_year_calender_wise/{client_slug}/{year_slug}', [CientController::class, 'search_order_year_calender_wise'])->name('search_order_year_calender_wise');


    Route::get('client_list', [CientController::class, 'index'])->name('client_list');
    Route::post('client_list_store', [CientController::class, 'store'])->name('client_list_store');
    Route::post('client_list_update', [CientController::class, 'update'])->name('client_list_update');
    Route::post('client_list_delete/{id}', [CientController::class, 'delete'])->name('client_list_delete');
    Route::get('client_list_pagination_start_delete', [CientController::class, 'client_list_pagination_start_delete'])->name('client_list_pagination_start_delete');
    Route::get('client_list_pagination_start', [CientController::class, 'client_list_pagination_start'])->name('client_list_pagination_start');
    Route::get('client_list_pagination_start_search', [CientController::class, 'client_list_pagination_start_search'])->name('client_list_pagination_start_search');
    Route::get('client_list_pagination_start_search_ajax', [CientController::class, 'client_list_pagination_start_search_ajax'])->name('client_list_pagination_start_search_ajax');
    //client route end


    //invoice route list

    Route::post('update_delivery_status', [InvoiceController::class, 'update_delivery_status'])->name('update_delivery_status');

    Route::get('invoice_for_product_size', [InvoiceController::class, 'invoice_for_product_size'])->name('invoice_for_product_size');
    Route::get('invoice_for_product_color', [InvoiceController::class, 'invoice_for_product_color'])->name('invoice_for_product_color');
    Route::get('invoice_for_product_price', [InvoiceController::class, 'invoice_for_product_price'])->name('invoice_for_product_price');
    Route::get('invoice_for_product_price_discount', [InvoiceController::class, 'invoice_for_product_price_discount'])->name('invoice_for_product_price_discount');


    Route::get('invoice_for_product_price_from_color', [InvoiceController::class, 'invoice_for_product_price_from_color'])->name('invoice_for_product_price_from_color');
    Route::get('invoice_for_product_price_discount_from_color', [InvoiceController::class, 'invoice_for_product_price_discount_from_color'])->name('invoice_for_product_price_discount_from_color');




    Route::post('invoice_payment_store', [InvoiceController::class, 'invoice_payment_store'])->name('invoice_payment_store');

     Route::get('invoice_data_discount', [InvoiceController::class, 'invoice_data_discount'])->name('invoice_data_discount');

    Route::get('invoice_create', [InvoiceController::class, 'create'])->name('invoice_create');
    Route::get('invoice_list', [InvoiceController::class, 'index'])->name('invoice_list');
    Route::get('invoice_list_edit/{id}', [InvoiceController::class, 'edit'])->name('invoice_list_edit');
    Route::get('invoice_list_view/{id}', [InvoiceController::class, 'view'])->name('invoice_list_view');

    Route::get('invoice_list_print/{id}', [InvoiceController::class, 'print'])->name('invoice_list_print');


    Route::post('invoice_list_store', [InvoiceController::class, 'store'])->name('invoice_list_store');
    Route::post('invoice_list_update', [InvoiceController::class, 'update'])->name('invoice_list_update');
    Route::post('invoice_list_delete/{id}', [InvoiceController::class, 'delete'])->name('invoice_list_delete');
    Route::get('invoice_list_pagination_start_delete', [InvoiceController::class, 'invoice_list_pagination_start_delete'])->name('invoice_list_pagination_start_delete');
    Route::get('invoice_list_pagination_start', [InvoiceController::class, 'invoice_list_pagination_start'])->name('invoice_list_pagination_start');
    Route::get('invoice_list_pagination_start_search', [InvoiceController::class, 'invoice_list_pagination_start_search'])->name('invoice_list_pagination_start_search');
    Route::get('invoice_list_pagination_start_search_ajax', [InvoiceController::class, 'invoice_list_pagination_start_search_ajax'])->name('invoice_list_pagination_start_search_ajax');



    Route::get('invoice_list_pagination_start_readyToShip', [InvoiceController::class, 'invoice_list_pagination_start_readyToShip'])->name('invoice_list_pagination_start_readyToShip');
    Route::get('invoice_list_pagination_start_delivered', [InvoiceController::class, 'invoice_list_pagination_start_delivered'])->name('invoice_list_pagination_start_delivered');
    Route::get('invoice_list_pagination_start_cancelled', [InvoiceController::class, 'invoice_list_pagination_start_cancelled'])->name('invoice_list_pagination_start_cancelled');



    Route::get('invoice_filter_from_list', [InvoiceController::class, 'invoice_filter_from_list'])->name('invoice_filter_from_list');
    Route::get('invoice_filter_from_list_ajax', [InvoiceFilterController::class, 'invoice_filter_from_list_ajax'])->name('invoice_filter_from_list_ajax');


    Route::get('category_banner_list', [CategoryBannerController::class, 'category_banner_list'])->name('category_banner_list');
    Route::post('category_banner_update', [CategoryBannerController::class, 'category_banner_update'])->name('category_banner_update');
    Route::post('category_banner_store', [CategoryBannerController::class, 'category_banner_store'])->name('category_banner_store');
    //end invoice route list


    ///product list route



    Route::get('ajax_search_for_all_product', [ProductSearchController::class, 'ajax_search_for_all_product'])->name('ajax_search_for_all_product');
    Route::get('ajax_search_for_online_product', [ProductSearchController::class, 'ajax_search_for_online_product'])->name('ajax_search_for_online_product');


    Route::get('product_list_all_active', [ProductListController::class, 'product_list_all_active'])->name('product_list_all_active');
    Route::get('product_list_all_inactive', [ProductListController::class, 'product_list_all_inactive'])->name('product_list_all_inactive');
    Route::get('product_list_all_delete', [ProductListController::class, 'product_list_all_delete'])->name('product_list_all_delete');
    Route::get('product_list_all_online', [ProductListController::class, 'product_list_all_online'])->name('product_list_all_online');

    Route::get('product_list_all_active_online', [ProductListController::class, 'product_list_all_active_online'])->name('product_list_all_active_online');
    Route::get('product_list_all_inactive_online', [ProductListController::class, 'product_list_all_inactive_online'])->name('product_list_all_inactive_online');
    Route::get('product_list_all_delete_online', [ProductListController::class, 'product_list_all_delete_online'])->name('product_list_all_delete_online');


  Route::get('new_code_to_delete_all_data', [ProductListController::class, 'new_code_to_delete_all_data'])->name('new_code_to_delete_all_data');


    Route::get('product_list_all_deletelist', [ProductListController::class, 'product_list_all_deletelist'])->name('product_list_all_deletelist');
    Route::get('product_list_restore_from_deletelist/{id}', [ProductListController::class, 'product_list_restore_from_deletelist'])->name('product_list_restore_from_deletelist');
    Route::get('product_list_all_deletelist_delete', [ProductListController::class, 'product_list_all_deletelist'])->name('product_list_all_deletelist_delete');
    Route::post('product_list_single_deletelist_delete/{id}', [ProductListController::class, 'product_list_single_deletelist_delete'])->name('product_list_single_deletelist_delete');



    Route::get('product_list_all_draft', [ProductListController::class, 'product_list_all_draft'])->name('product_list_all_draft');
    Route::get('product_list_all_delete_draft', [ProductListController::class, 'product_list_all_delete_draft'])->name('product_list_all_delete_draft');
    Route::get('product_list_all_outOfStock', [ProductListController::class, 'product_list_all_outOfStock'])->name('product_list_all_outOfStock');

    Route::get('show_product_price_list', [ProductListController::class, 'show_product_price_list'])->name('show_product_price_list');
    Route::post('update_product_price_list', [ProductListController::class, 'update_product_price_list'])->name('update_product_price_list');
    Route::get('show_product_quantity_list', [ProductListController::class, 'show_product_quantity_list'])->name('show_product_quantity_list');
    Route::post('update_product_quantity_list', [ProductListController::class, 'update_product_quantity_list'])->name('update_product_quantity_list');



    Route::get('search_from_all_product', [ProductListController::class, 'search_from_all_product'])->name('search_from_all_product');
    Route::get('search_from_online_product', [ProductListController::class, 'search_from_online_product'])->name('search_from_online_product');
    ///end product list route


    ///product add page attribute route

    Route::get('product/pass_data_create_color', [ProductAddPageController::class, 'pass_data_create_color'])->name('pass_data_create_color');
    Route::get('product/child_color_select', [ProductAddPageController::class, 'child_color_select'])->name('child_color_select');


    Route::get('product/pass_data_create_color1', [ProductAddPageController::class, 'pass_data_create_color1'])->name('pass_data_create_color1');
    Route::get('product/child_color_select1', [ProductAddPageController::class, 'child_color_select1'])->name('child_color_select1');

    Route::get('product/multiple_size_pass_via_ajax', [ProductAddPageController::class, 'multiple_size_pass_via_ajax'])->name('multiple_size_pass_via_ajax');

    Route::get('multiple_size_post_via_ajax', [ProductAddPageController::class, 'multiple_size_post_via_ajax'])->name('multiple_size_post_via_ajax');




    Route::get('product/add_product_category_search', [ProductAddPageController::class, 'add_product_category_search'])->name('add_product_category_search');
    Route::get('product/add_product_subcategory_search', [ProductAddPageController::class, 'add_product_subcategory_search'])->name('add_product_subcategory_search');
    Route::get('product/add_product_childone_search', [ProductAddPageController::class, 'add_product_childone_search'])->name('add_product_childone_search');
    Route::get('product/add_product_childtwo_search', [ProductAddPageController::class, 'add_product_childtwo_search'])->name('add_product_childtwo_search');
    Route::get('product/add_product_childthree_search', [ProductAddPageController::class, 'add_product_childthree_search'])->name('add_product_childthree_search');
    Route::get('product/add_product_childfour_search', [ProductAddPageController::class, 'add_product_childfour_search'])->name('add_product_childfour_search');
    Route::get('product/add_product_childfive_search', [ProductAddPageController::class, 'add_product_childfive_search'])->name('add_product_childfive_search');
    Route::get('product/add_product_childsix_search', [ProductAddPageController::class, 'add_product_childsix_search'])->name('add_product_childsix_search');
    Route::get('product/add_product_childseven_search', [ProductAddPageController::class, 'add_product_childseven_search'])->name('add_product_childseven_search');
    Route::get('product/add_product_childeight_search', [ProductAddPageController::class, 'add_product_childeight_search'])->name('add_product_childeight_search');



    Route::get('product/from_category_to_subcategory', [ProductAddPageController::class, 'from_category_to_subcategory'])->name('from_category_to_subcategory');
    Route::get('product/from_subcategory_to_first_child', [ProductAddPageController::class, 'from_subcategory_to_first_child'])->name('from_subcategory_to_first_child');
    Route::get('product/from_first_child_to_second_child', [ProductAddPageController::class, 'from_first_child_to_second_child'])->name('from_first_child_to_second_child');
    Route::get('product/from_second_child_to_third_child', [ProductAddPageController::class, 'from_second_child_to_third_child'])->name('from_second_child_to_third_child');
    Route::get('product/from_third_child_to_fourth_child', [ProductAddPageController::class, 'from_third_child_to_fourth_child'])->name('from_third_child_to_fourth_child');

    Route::get('product/from_fourth_child_to_fifth_child', [ProductAddPageController::class, 'from_fourth_child_to_fifth_child'])->name('from_fourth_child_to_fifth_child');
    Route::get('product/from_fifth_child_to_sixth_child', [ProductAddPageController::class, 'from_fifth_child_to_sixth_child'])->name('from_fifth_child_to_sixth_child');
    Route::get('product/from_sixth_child_to_seven_child', [ProductAddPageController::class, 'from_sixth_child_to_seven_child'])->name('from_sixth_child_to_seven_child');
    Route::get('product/from_seven_child_to_eight_child', [ProductAddPageController::class, 'from_seven_child_to_eight_child'])->name('from_seven_child_to_eight_child');


    Route::get('product/slection_list_from_cat_to_eight_child', [ProductAddPageController::class, 'slection_list_from_cat_to_eight_child'])->name('slection_list_from_cat_to_eight_child');
    ///product add page attribute route


    Route::get('database_image_store', [ImageuploadController::class, 'database_image_store'])->name('database_image_store');
    Route::get('database_image_delete', [ImageuploadController::class, 'database_image_delete'])->name('database_image_delete');

    Route::get('pdatabase_image_store', [ImageuploadController::class, 'pdatabase_image_store'])->name('pdatabase_image_store');
    Route::get('pdatabase_image_delete', [ImageuploadController::class, 'pdatabase_image_delete'])->name('pdatabase_image_delete');


    Route::get('cdatabase_image_store', [ImageuploadController::class, 'cdatabase_image_store'])->name('cdatabase_image_store');
    Route::get('cdatabase_image_delete', [ImageuploadController::class, 'cdatabase_image_delete'])->name('cdatabase_image_delete');

    Route::post('image_store', [ImageuploadController::class, 'image_store'])->name('image_store');
    Route::get('image_delete', [ImageuploadController::class, 'image_delete'])->name('image_delete');

    Route::get('main_search_button_product', [ProductController::class,'main_search_button_product'])->name('main_search_button_product');
    Route::get('pagination/fetch_data_search', [ProductController::class,'fetch_data_search'])->name('pagination_fetch_data_search');


    Route::get('print_pdf_for_all_product', [ProductPrintController::class,'print_pdf_for_all_product'])->name('print_pdf_for_all_product');
    Route::get('print_csv_for_all_product', [ProductPrintController::class,'print_csv_for_all_product'])->name('print_csv_for_all_product');
    Route::get('print_excel_for_all_product', [ProductPrintController::class,'print_excel_for_all_product'])->name('print_excel_for_all_product');



    Route::get('pagination/fetch_data', [ProductController::class,'fetch_data'])->name('pagination_fetch_data');
    Route::get('product/add', [ProductController::class, 'create'])->name('admin.product_list_add');


    Route::get('product_list', [ProductController::class, 'index'])->name('admin.product_list');
    Route::get('get_sub_cat_new', [ProductController::class, 'get_sub_cat_new'])->name('get_sub_cat_new');
    Route::get('child_get_new', [ProductController::class, 'child_get_new'])->name('child_get_new');
    Route::get('second_child_get_new', [ProductController::class, 'second_child_get_new'])->name('second_child_get_new');
    Route::get('third_child_get_new', [ProductController::class, 'third_child_get_new'])->name('third_child_get_new');


    Route::get('get_size_list_category', [ProductController::class, 'get_size_list_category'])->name('get_size_list_category');



    Route::post('product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::post('product/update', [ProductController::class, 'update'])->name('admin.product.update');
    Route::post('product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');


    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('product/draft/{id}', [ProductController::class, 'draft'])->name('admin.product.draft');

    //sub_category

    Route::get('sub_category_type', [CategoryController::class, 'sub_category_type'])->name('sub_category_type');

    Route::get('category_type', [CategoryController::class, 'category_type'])->name('category_type');
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('category/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    //sub_category


    //category
    //ajax code route
    Route::get('pagination/multiple_select_active', [ProductCategoryController::class,'multiple_select_active'])->name('multiple_select_active');
    Route::get('pagination/multiple_delete_category', [ProductCategoryController::class,'multiple_delete_category'])->name('multiple_delete_category');
    Route::get('pagination/multiple_delete_category_main', [ProductCategoryController::class,'multiple_delete_category_main'])->name('multiple_delete_category_main');

    Route::get('pagination/fetch_data_search_category', [ProductCategoryController::class,'fetch_data_search_category'])->name('pagination_fetch_data_search_category');
    Route::get('pagination/search_on_category_name', [ProductCategoryController::class,'search_on_category_name'])->name('search_on_category_name');
    Route::get('pagination/search_on_category_status', [ProductCategoryController::class,'search_on_category_status'])->name('search_on_category_status');
    Route::get('pagination/search_on_category_status_name_pagination', [ProductCategoryController::class,'search_on_category_status_name_pagination'])->name('search_on_category_status_name_pagination');
   //ajax code route

    Route::get('product_category', [ProductCategoryController ::class, 'index'])->name('admin.product_category');
    Route::get('product_category/search', [ProductCategoryController ::class, 'search'])->name('admin.product_category.search');
    Route::get('product_category/create', [ProductCategoryController ::class, 'create'])->name('admin.product_category.create');
    Route::post('product_category/store', [ProductCategoryController ::class, 'store'])->name('admin.product_category.store');
    Route::get('product_category/edit/{id}', [ProductCategoryController ::class, 'edit'])->name('admin.product_category.edit');
    Route::post('product_category/update', [ProductCategoryController ::class, 'update'])->name('admin.product_category.update');
    Route::delete('product_category/delete/{id}', [ProductCategoryController ::class, 'delete'])->name('admin.product_category.delete');
    //category
Route::get('delete_all_data_from_media', [MediaController::class, 'delete_all_data_from_media'])->name('delete_all_data_from_media');

    // new sub category
    //ajax route
    Route::get('show_child_for_edit', [ChildController ::class, 'show_child_for_edit'])->name('show_child_for_edit');
    Route::get('show_child_for_add', [ChildController ::class, 'show_child_for_add'])->name('show_child_for_add');
    Route::get('child__name_from_list', [ChildController ::class, 'child__name_from_list'])->name('child__name_from_list');
    Route::get('child_category_pagi_ajax', [ChildController ::class, 'child_category_pagi_ajax'])->name('child_category_pagi_ajax');
    //ajax route
    Route::get('child_category', [ChildController ::class, 'index'])->name('admin.child_category');
    Route::get('child_category/search', [ChildController ::class, 'search'])->name('admin.child_category.search');
    Route::get('child_category/create', [ChildController ::class, 'create'])->name('admin.child_category.create');
    Route::post('child_category/store', [ChildController ::class, 'store'])->name('admin.child_category.store');
    Route::get('child_category/edit/{id}', [ChildController ::class, 'edit'])->name('admin.child_category.edit');
    Route::post('child_category/update', [ChildController ::class, 'update'])->name('admin.child_category.update');
    Route::get('child_category/delete', [ChildController ::class, 'delete'])->name('admin.child_category.delete');
    Route::get('child_category/delete_tree', [ChildController ::class, 'delete_tree'])->name('admin.child_category_tree.delete');
    //new sub category

    //new attribute
    //ajax
    Route::get('attribute_pagi_ajax', [AttributeController ::class, 'attribute_pagi_ajax'])->name('attribute_pagi_ajax');
    Route::get('attri_pagi_ajax_multiple_delete', [AttributeController ::class, 'attri_pagi_ajax_multiple_delete'])->name('attri_pagi_ajax_multiple_delete');
    Route::get('attri_pagi_ajax_multiple_select', [AttributeController ::class, 'attri_pagi_ajax_multiple_select'])->name('attri_pagi_ajax_multiple_select');
    Route::get('attri_pagi_ajax_multiple_select_active', [AttributeController ::class, 'attri_pagi_ajax_multiple_select_active'])->name('attri_pagi_ajax_multiple_select_active');

    Route::get('attribute_search_ajax', [AttributeController ::class, 'attribute_search_ajax'])->name('attribute_search_ajax');
    Route::get('attribute_search_ajax_part2', [AttributeController ::class, 'attribute_search_ajax_part2'])->name('attribute_search_ajax_part2');
    //ajax
    Route::get('attribute', [AttributeController ::class, 'index'])->name('admin.attribute');
    Route::get('attribute/search', [AttributeController ::class, 'search'])->name('admin.attribute.search');
    Route::get('attribute/create', [AttributeController ::class, 'create'])->name('admin.attribute.create');
    Route::post('attribute/store', [AttributeController ::class, 'store'])->name('admin.attribute.store');
    Route::get('attribute/edit', [AttributeController ::class, 'edit'])->name('admin.attribute.edit');
    Route::post('attribute/update', [AttributeController ::class, 'update'])->name('admin.attribute.update');
    Route::delete('attribute/delete/{id}', [AttributeController ::class, 'delete'])->name('admin.attribute.delete');
    //end attribute

    //attribute detail

    //ajax
    Route::get('attribute_detail_pagi_ajax', [AttributeDetailController ::class, 'attribute_detail_pagi_ajax'])->name('attribute_detail_pagi_ajax');
    Route::get('attri_detail_pagi_ajax_multiple_delete', [AttributeDetailController ::class, 'attri_detail_pagi_ajax_multiple_delete'])->name('attri_detail_pagi_ajax_multiple_delete');
    Route::get('attri_detail_pagi_ajax_multiple_select', [AttributeDetailController ::class, 'attri_detail_pagi_ajax_multiple_select'])->name('attri_detail_pagi_ajax_multiple_select');
    Route::get('attri_detail_pagi_ajax_multiple_select_active', [AttributeDetailController ::class, 'attri_detail_pagi_ajax_multiple_select_active'])->name('attri_detail_pagi_ajax_multiple_select_active');

    Route::get('attribute_detail_search_ajax', [AttributeDetailController ::class, 'attribute_detail_search_ajax'])->name('attribute_detail_search_ajax');
    Route::get('attribute_detail_search_ajax_part2', [AttributeDetailController ::class, 'attribute_detail_search_ajax_part2'])->name('attribute_detail_search_ajax_part2');
    //ajax


    Route::get('attribute_detail/{id}', [AttributeDetailController ::class, 'index'])->name('admin.attribute_detail');
    Route::get('attribute_detail/search', [AttributeDetailController ::class, 'search'])->name('admin.attribute_detail.search');
    Route::get('attribute_detail/create', [AttributeDetailController ::class, 'create'])->name('admin.attribute_detail.create');
    Route::post('attribute_detail/store', [AttributeDetailController ::class, 'store'])->name('admin.attribute_detail.store');
    Route::get('attribute_detail/edit/', [AttributeDetailController ::class, 'edit'])->name('admin.attribute_detail.edit');
    Route::post('attribute_detail/update', [AttributeDetailController ::class, 'update'])->name('admin.attribute_detail.update');
    Route::delete('attribute_detail/delete/{id}', [AttributeDetailController ::class, 'delete'])->name('admin.attribute_detail.delete');
    //attribute detail list


    //new brand
    //ajax
    Route::get('brand_pagi_ajax', [BrandController ::class, 'brand_pagi_ajax'])->name('brand_pagi_ajax');
    Route::get('brand_ajax_multiple_delete', [BrandController ::class, 'brand_ajax_multiple_delete'])->name('brand_ajax_multiple_delete');
    Route::get('brand_ajax_multiple_select', [BrandController ::class, 'brand_ajax_multiple_select'])->name('brand_ajax_multiple_select');
    Route::get('brand_ajax_multiple_select_active', [BrandController ::class, 'brand_ajax_multiple_select_active'])->name('brand_ajax_multiple_select_active');

    Route::get('brand_search_ajax', [BrandController ::class, 'brand_search_ajax'])->name('brand_search_ajax');
    Route::get('brand_search_ajax_part2', [BrandController ::class, 'brand_search_ajax_part2'])->name('brand_search_ajax_part2');
    //ajax
    Route::get('brand', [BrandController ::class, 'index'])->name('admin.brand');
    Route::get('brand/search', [BrandController ::class, 'search'])->name('admin.brand.search');
    Route::get('brand/create', [BrandController ::class, 'create'])->name('admin.brand.create');
    Route::post('brand/store', [BrandController ::class, 'store'])->name('admin.brand.store');
    Route::get('brand/edit', [BrandController ::class, 'edit'])->name('admin.brand.edit');
    Route::post('brand/update', [BrandController ::class, 'update'])->name('admin.brand.update');
    Route::delete('brand/delete/{id}', [BrandController ::class, 'delete'])->name('admin.brand.delete');
    //end brand


     //new unit
    //ajax
    Route::get('unit_pagi_ajax', [UnitController ::class, 'unit_pagi_ajax'])->name('unit_pagi_ajax');
    Route::get('unit_ajax_multiple_delete', [UnitController ::class, 'unit_ajax_multiple_delete'])->name('unit_ajax_multiple_delete');
    Route::get('unit_ajax_multiple_select', [UnitController ::class, 'unit_ajax_multiple_select'])->name('unit_ajax_multiple_select');
    Route::get('unit_ajax_multiple_select_active', [UnitController ::class, 'unit_ajax_multiple_select_active'])->name('unit_ajax_multiple_select_active');

    Route::get('unit_search_ajax', [UnitController ::class, 'unit_search_ajax'])->name('unit_search_ajax');
    Route::get('unit_search_ajax_part2', [UnitController ::class, 'unit_search_ajax_part2'])->name('unit_search_ajax_part2');
    //ajax
    Route::get('unit', [UnitController ::class, 'index'])->name('admin.unit');
    Route::get('unit/search', [UnitController ::class, 'search'])->name('admin.unit.search');
    Route::get('unit/create', [UnitController ::class, 'create'])->name('admin.unit.create');
    Route::post('unit/store', [UnitController ::class, 'store'])->name('admin.unit.store');
    Route::get('unit/edit', [UnitController ::class, 'edit'])->name('admin.unit.edit');
    Route::post('unit/update', [UnitController ::class, 'update'])->name('admin.unit.update');
    Route::delete('unit/delete/{id}', [UnitController ::class, 'delete'])->name('admin.unit.delete');
    //end unit


    Route::get('system_information', [SystemInformationController::class, 'index'])->name('admin.system_information');
    Route::post('system_information/store', [SystemInformationController::class, 'store'])->name('admin.system_information.store');
    Route::post('system_information/update', [SystemInformationController::class, 'update'])->name('admin.system_information.update');
    Route::post('system_information/delete/{id}', [SystemInformationController::class, 'delete'])->name('admin.system_information.delete');

    Route::get('roles', [RolesController::class, 'index'])->name('admin.roles');
    Route::get('roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::post('roles/update', [RolesController::class, 'update'])->name('admin.roles.update');

    Route::delete('roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');


    Route::get('users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');


    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::get('permission/view/{gname}', [PermissionController::class, 'view'])->name('admin.permission.view');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('admin.permission.update');

    Route::delete('permission/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');




    Route::get('admins', [AdminsController::class, 'index'])->name('admin.admins');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('admin.admins.create');
    Route::post('admins/store', [AdminsController::class, 'store'])->name('admin.admins.store');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('admin.admins.edit');
    Route::post('admins/update', [AdminsController::class, 'update'])->name('admin.admins.update');
    Route::delete('admins/delete/{id}', [AdminsController::class, 'delete'])->name('admin.admins.delete');


    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::post('password/update',[ProfileController::class, 'updatePassword'])->name('admin.password.update');



    Route::get('settings',[ProfileController::class, 'setting'])->name('admin.settings');
    Route::get('view_profile',[ProfileController::class, 'profile_view'])->name('admin.profile_view');







    // Login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');



    Route::get('/logout_session',[SessionController::class,'logout_session'])->name('admin.logout_session');
    Route::get('/lock_screen/{email}',[SessionController::class,'lock_screen'])->name('admin.lock_screen');
    Route::post('/login_from_session',[SessionController::class,'login_from_session'])->name('admin.login_from_session');
    // Forget Password Routes



});
Route::get('/1recovery_password',[SessionController::class,'recovery_password'])->name('admin.recovery_password');

 Route::get('/1check_mail_from_list',[ForgetPasswordController::class,'check_mail_from_list'])->name('check_mail_from_list');
    Route::post('/1send_mail_get_from_list',[ForgetPasswordController::class,'send_mail_get_from_list'])->name('send_mail_get_from_list');
    Route::get('/password_reset_page/',[ForgetPasswordController::class,'password_reset_page'])->name('password_reset_page');
    Route::get('/1successfully_mail_send/{id}',[ForgetPasswordController::class,'successfully_mail_send'])->name('successfully_mail_send');

    Route::post('/1password_change_confirmed',[ForgetPasswordController::class,'password_change_confirmed'])->name('password_change_confirmed');

    Route::get('/1password/reset',[ForgetPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
