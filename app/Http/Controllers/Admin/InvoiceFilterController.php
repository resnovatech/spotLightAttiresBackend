<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MainProduct;
use App\Models\Imageupload;
use App\Models\Category;
use App\Models\AttributeDetail;
use App\Models\Unit;
use App\Models\Brand;
use PDF;
use App\Models\ImageList;
use App\Models\FeatureProductImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\AssaignCategory;
use App\Models\AssaignSize;
use App\Models\SizeChart;
use App\Models\ProductColor;
use App\Models\ProductCategory;
use App\Models\ProductQuantity;
use App\Models\Client;
use App\Models\DelivaryAddress;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\ShippingAddress;
use App\Models\Payment;
class InvoiceFilterController extends Controller
{
    public function invoice_filter_from_list_ajax(Request $request){

        $order_id =  $request->order_id;
        $customer_name = $request->customer_name;
        $delivery_status= $request->delivery_status;
        $start = $request->start;
        $end = $request->end;
        $id_for_pass = $request->id_for_pass;
        $start_convert = date("Y-m-d", strtotime($request->start));
        $end_convert = date("Y-m-d", strtotime($request->end));

        //dd($end);

        if(empty($order_id) && empty($customer_name) && empty($delivery_status) && empty($start)){


            $end_convert = date("Y-m-d", strtotime($request->end));

///new code one
            if($id_for_pass == 1){

                $total_data =Invoice::whereDate('created_at',$end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::whereDate('created_at',$end_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::whereDate('created_at',$end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::whereDate('created_at',$end_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code one

        }elseif(empty($order_id) && empty($customer_name) && empty($delivery_status) && empty($end)){


            $start_convert = date("Y-m-d", strtotime($request->start));


            //new code two
            if($id_for_pass == 1){

                $total_data =Invoice::whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::whereDate('created_at',$start_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::whereDate('created_at',$start_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //new code two end
        }elseif(empty($order_id) && empty($customer_name) && empty($start) && empty($end)){




            //new code three
            if($id_for_pass == 1){

                $total_data =Invoice::where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('delivery_status',$delivery_status)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('delivery_status',$delivery_status)->latest()->skip($minus_one)->take(10)->get();
            }
            //new two code three end
        }elseif(empty($order_id) && empty($delivery_status) && empty($start) && empty($end)){

//new code four
if($id_for_pass == 1){

    $total_data =Invoice::where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
    $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
$total_serial_number = ceil($total_serial_number1);

}else{
$total_serial_number = $total_serial_number1;
}
    $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();
    $minus_one = 0;
}else{
    $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
    $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
$total_serial_number = ceil($total_serial_number1);

}else{
$total_serial_number = $total_serial_number1;
}
    $minus_one = ($id_for_pass - 1)*10;

    $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->latest()->skip($minus_one)->take(10)->get();
}
//new code four end


        }elseif(empty($customer_name) && empty($delivery_status) && empty($start) && empty($end)){


            //new code five
            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code five

        }elseif(empty($order_id) && empty($customer_name) && empty($delivery_status)){
            $start_convert = date("Y-m-d", strtotime($request->start));
            $end_convert = date("Y-m-d", strtotime($request->end));



            //new code six

            if($id_for_pass == 1){

                $total_data =Invoice::whereDate('s_pay_date', '>=', $start_convert)
                ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::whereDate('s_pay_date', '>=', $start_convert)
                ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::whereDate('s_pay_date', '>=', $start_convert)
                ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::whereDate('s_pay_date', '>=', $start_convert)
                ->whereDate('s_pay_date', '<=', $end_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code six


         }elseif(empty($order_id) && empty($customer_name) && empty($start)){
            $end_convert = date("Y-m-d", strtotime($request->end));

//new code seven
if($id_for_pass == 1){

    $total_data =Invoice::where('delivery_status',$delivery_status)
    ->whereDate('created_at',$end_convert)->latest()->count();
    $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
$total_serial_number = ceil($total_serial_number1);

}else{
$total_serial_number = $total_serial_number1;
}
    $product_list = Invoice::where('delivery_status',$delivery_status)
    ->whereDate('created_at',$end_convert)->latest()->limit(10)->get();
    $minus_one = 0;
}else{
    $total_data = Invoice::where('delivery_status',$delivery_status)
    ->whereDate('created_at',$end_convert)->latest()->count();
    $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
$total_serial_number = ceil($total_serial_number1);

}else{
$total_serial_number = $total_serial_number1;
}
    $minus_one = ($id_for_pass - 1)*10;

    $product_list = Invoice::where('delivery_status',$delivery_status)
    ->whereDate('created_at',$end_convert)->latest()->skip($minus_one)->take(10)->get();
}
//end new code seven



        }elseif(empty($order_id) && empty($delivery_status) && empty($start)){
            $end_convert = date("Y-m-d", strtotime($request->end));

//new code eight
if($id_for_pass == 1){

    $total_data =Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$end_convert)->latest()->count();
    $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
$total_serial_number = ceil($total_serial_number1);

}else{
$total_serial_number = $total_serial_number1;
}
    $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$end_convert)->latest()->limit(10)->get();
    $minus_one = 0;
}else{
    $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$end_convert)->latest()->count();
    $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
$total_serial_number = ceil($total_serial_number1);

}else{
$total_serial_number = $total_serial_number1;
}
    $minus_one = ($id_for_pass - 1)*10;

    $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$end_convert)->latest()->skip($minus_one)->take(10)->get();
}

//end new code eight


        }elseif(empty($customer_name) && empty($delivery_status) && empty($start)){
            $end_convert = date("Y-m-d", strtotime($request->end));

            //new code nine
            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)->latest()->skip($minus_one)->take(10)->get();
            }

            //end new code nine
        }elseif(empty($order_id) && empty($customer_name) && empty($end)){
            $start_convert = date("Y-m-d", strtotime($request->start));

            //start new code ten
            if($id_for_pass == 1){

                $total_data =Invoice::where('delivery_status',$delivery_status)
                ->whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('delivery_status',$delivery_status)
                ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('delivery_status',$delivery_status)
                ->whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('delivery_status',$delivery_status)
                ->whereDate('created_at',$start_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code ten

        }elseif(empty($order_id) && empty($delivery_status) && empty($end)){
            $start_convert = date("Y-m-d", strtotime($request->start));


            // new code 11
            if($id_for_pass == 1){

                $total_data =Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code 11

        }elseif(empty($customer_name) && empty($delivery_status) && empty($end)){

            $start_convert = date("Y-m-d", strtotime($request->start));

            //new code 12
            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code 12


        }elseif(empty($start) && empty($end)){


            //new code 13
            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)
                ->where('delivery_status',$delivery_status)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)
                ->where('delivery_status',$delivery_status)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)
                ->where('delivery_status',$delivery_status)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)
                ->where('delivery_status',$delivery_status)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->skip($minus_one)->take(10)->get();
            }
            // end new code 13

        }elseif(empty($delivery_status) && empty($end)){
            $start_convert = date("Y-m-d", strtotime($request->start));

            //new code 14
            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->skip($minus_one)->take(10)->get();
            }
            // end new code 14


        }elseif(empty($customer_name) && empty($end)){
            $start_convert = date("Y-m-d", strtotime($request->start));

            //new code 15


            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->skip($minus_one)->take(10)->get();
            }

            //end new code 15


        }elseif(empty($order_id) && empty($end)){
            $start_convert = date("Y-m-d", strtotime($request->start));

            //new code 16
            if($id_for_pass == 1){

                $total_data =Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$start_convert)
                ->where('delivery_status',$delivery_status)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code 16


        }elseif(empty($delivery_status) && empty($start)){
            $end_convert = date("Y-m-d", strtotime($request->end));


            //new code 17

            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code 17

        }elseif(empty($customer_name) && empty($start)){
            $end_convert = date("Y-m-d", strtotime($request->end));


            /// new code 18
            if($id_for_pass == 1){

                $total_data =Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('order_id',$order_id)
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->skip($minus_one)->take(10)->get();
            }

            ///end new code 18

        }elseif(empty($order_id) && empty($start)){
            $end_convert = date("Y-m-d", strtotime($request->end));


            ///new code 19

            if($id_for_pass == 1){

                $total_data =Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('created_at',$end_convert)
                ->where('delivery_status',$delivery_status)->latest()->skip($minus_one)->take(10)->get();
            }
            // end new code 19

        }elseif(empty($order_id) && empty($customer_name)){
             $start_convert = date("Y-m-d", strtotime($request->start));
             $end_convert = date("Y-m-d", strtotime($request->end));

            //new code 20
            if($id_for_pass == 1){

                $total_data =Invoice::where('delivery_status',$delivery_status)
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('delivery_status',$delivery_status)
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('delivery_status',$delivery_status)
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('delivery_status',$delivery_status)
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code 20

        }elseif(empty($order_id) && empty($delivery_status)){
             $start_convert = date("Y-m-d", strtotime($request->start));
             $end_convert = date("Y-m-d", strtotime($request->end));


            //new code 21
            if($id_for_pass == 1){

                $total_data =Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
                ->whereDate('s_pay_date', '>=', $start_convert)
               ->whereDate('s_pay_date', '<=', $end_convert)->latest()->skip($minus_one)->take(10)->get();
            }
            //end new code 21

        }elseif(empty($customer_name) && empty($delivery_status)){

           $start_convert = date("Y-m-d", strtotime($request->start));
           $end_convert = date("Y-m-d", strtotime($request->end));

 //new code 22

          if($id_for_pass == 1){

            $total_data =Invoice::where('order_id',$order_id)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::where('order_id',$order_id)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::where('order_id',$order_id)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::where('order_id',$order_id)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->skip($minus_one)->take(10)->get();
        }
          //end new code 22

        }elseif(empty($order_id)){

           $start_convert = date("Y-m-d", strtotime($request->start));
           $end_convert = date("Y-m-d", strtotime($request->end));


          //new code 23
          if($id_for_pass == 1){

            $total_data =Invoice::where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->skip($minus_one)->take(10)->get();
        }
          //end new code 23


        }elseif(empty($customer_name)){
           $start_convert = date("Y-m-d", strtotime($request->start));
           $end_convert = date("Y-m-d", strtotime($request->end));


          //new code 24
          if($id_for_pass == 1){

            $total_data =Invoice::where('order_id',$order_id)
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::where('order_id',$order_id)
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::where('order_id',$order_id)
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::where('order_id',$order_id)
            ->where('delivery_status',$delivery_status)
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->skip($minus_one)->take(10)->get();
        }
          //end code 24


        }elseif(empty($delivery_status)){
             $start_convert = date("Y-m-d", strtotime($request->start));
             $end_convert = date("Y-m-d", strtotime($request->end));

          //new code 25
          if($id_for_pass == 1){

            $total_data =Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->whereDate('s_pay_date', '>=', $start_convert)
           ->whereDate('s_pay_date', '<=', $end_convert)->latest()->skip($minus_one)->take(10)->get();
        }
          //end new code 25

        }elseif(empty($start)){
            //$start_convert = date("Y-m-d", strtotime($request->start));
            $end_convert = date("Y-m-d", strtotime($request->end));
           ///new code 26
           if($id_for_pass == 1){

            $total_data =Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$end_convert)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$end_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::where('order_id',$order_id)
            ->where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$end_convert)->latest()->skip($minus_one)->take(10)->get();
        }

           ///end new code 26


        }elseif(empty($end)){
            $start_convert = date("Y-m-d", strtotime($request->start));


           //new code 27
           if($id_for_pass == 1){

            $total_data =Invoice::where('order_id',$order_id)->
            where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$start_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::where('order_id',$order_id)->
            where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::where('order_id',$order_id)->
            where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$start_convert)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::where('order_id',$order_id)->
            where('client_slug', 'LIKE', "%$customer_name%")
            ->where('delivery_status',$delivery_status)
            ->whereDate('created_at',$start_convert)->latest()->skip($minus_one)->take(10)->get();
        }

           //new code 27
        }





        $data = view('backend.invoice.invoice_filter_from_list_ajax',compact('id_for_pass','minus_one','end','start','delivery_status','customer_name','order_id','total_serial_number','invoice_list'))->render();
                return response()->json(['options'=>$data]);
        }
}
