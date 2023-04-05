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
class ProductSearchController extends Controller
{
    public function ajax_search_for_all_product(Request $request){

        $id_for_pass_all = $request->id_for_pass_all;

        $product_sku = $request->product_sku;
        $product_name = $request->product_name;
        $brand_name = $request->product_name;
        $product_category = $request->product_category;


        if(!empty($product_sku) && !empty($product_name) && !empty($brand_name) &&  !empty($product_category)){

        if($id_for_pass_all == 1){

                $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                $total_serial_number1_all= $total_data/10;

        if (is_float($total_serial_number1_all)){
            $total_serial_number_all = ceil($total_serial_number1_all);

        }else{
            $total_serial_number_all = $total_serial_number1_all;
        }
                $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                $total_serial_number1_all= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number_all = ceil($total_serial_number1_all);

        }else{
            $total_serial_number_all = $total_serial_number1_all;
        }
                $minus_one = ($id_for_pass_all - 1)*10;

                $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
            }






             }elseif(!empty($product_sku) && !empty($product_name) && !empty($brand_name)){


                if($id_for_pass_all == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->skip($minus_one)->take(10)->get();
                }




             }elseif(!empty($product_name) && !empty($brand_name) &&  !empty($product_category)){



                if($id_for_pass_all == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }






             }elseif(!empty($product_sku) && !empty($brand_name) &&  !empty($product_category)){

                if($id_for_pass_all == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                     ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }



             }elseif(!empty($product_sku) && !empty($product_name) &&  !empty($product_category)){

                if($id_for_pass_all == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_sku) && !empty($product_name)){



                if($id_for_pass_all == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->skip($minus_one)->take(10)->get();
                }




             }elseif(!empty($product_sku) && !empty($brand_name)){


                if($id_for_pass_all == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_sku) && !empty($product_category)){



                if($id_for_pass_all == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }

             }elseif(!empty($product_name) && !empty($brand_name)){


                if($id_for_pass_all == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                 ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                 ->latest()->skip($minus_one)->take(10)->get();
                }




             }elseif(!empty($product_name) && !empty($product_category)){

                if($id_for_pass_all == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')

                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')

                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')

                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($brand_name) && !empty($product_category)){


                if($id_for_pass_all == 1){

                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }



             }elseif(!empty($brand_name)){

                if($id_for_pass_all == 1){

                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
               ->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                 ->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_category)){

                if($id_for_pass_all == 1){

                    $total_data = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }

             }elseif(!empty($product_name)){

                if($id_for_pass_all == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_sku)){


                if($id_for_pass_all == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1_all)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->count();
                    $total_serial_number1_all= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_all = ceil($total_serial_number1_all);

            }else{
                $total_serial_number_all = $total_serial_number1_all;
            }
                    $minus_one = ($id_for_pass_all - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }

             $data = view('backend.product_list.ajax_search_for_all_product',compact('minus_one','product_list','total_serial_number_all','id_for_pass_all'))->render();
            return response()->json(['options'=>$data]);


    }



    public function ajax_search_for_online_product(Request $request){

        $id_for_pass_online = $request->id_for_pass_online;

        $product_sku = $request->product_sku;
        $product_name = $request->product_name;
        $brand_name = $request->product_name;
        $product_category = $request->product_category;


        if(!empty($product_sku) && !empty($product_name) && !empty($brand_name) &&  !empty($product_category)){

        if($id_for_pass_online == 1){

                $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                $total_serial_number1_online= $total_data/10;

        if (is_float($total_serial_number1_online)){
            $total_serial_number_online = ceil($total_serial_number1_online);

        }else{
            $total_serial_number_online = $total_serial_number1_online;
        }
                $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                $total_serial_number1_online= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number_online = ceil($total_serial_number1_online);

        }else{
            $total_serial_number_online = $total_serial_number1_online;
        }
                $minus_one = ($id_for_pass_online - 1)*10;

                $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
            }






             }elseif(!empty($product_sku) && !empty($product_name) && !empty($brand_name)){


                if($id_for_pass_online == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->skip($minus_one)->take(10)->get();
                }




             }elseif(!empty($product_name) && !empty($brand_name) &&  !empty($product_category)){



                if($id_for_pass_online == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }






             }elseif(!empty($product_sku) && !empty($brand_name) &&  !empty($product_category)){

                if($id_for_pass_online == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                     ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }



             }elseif(!empty($product_sku) && !empty($product_name) &&  !empty($product_category)){

                if($id_for_pass_online == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_sku) && !empty($product_name)){



                if($id_for_pass_online == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->skip($minus_one)->take(10)->get();
                }




             }elseif(!empty($product_sku) && !empty($brand_name)){


                if($id_for_pass_online == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_sku) && !empty($product_category)){



                if($id_for_pass_online == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }

             }elseif(!empty($product_name) && !empty($brand_name)){


                if($id_for_pass_online == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                 ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
                 ->latest()->skip($minus_one)->take(10)->get();
                }




             }elseif(!empty($product_name) && !empty($product_category)){

                if($id_for_pass_online == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')

                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')

                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')

                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($brand_name) && !empty($product_category)){


                if($id_for_pass_online == 1){

                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }



             }elseif(!empty($brand_name)){

                if($id_for_pass_online == 1){

                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                    ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                   ->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
               ->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
                 ->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_category)){

                if($id_for_pass_online == 1){

                    $total_data = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->skip($minus_one)->take(10)->get();
                }

             }elseif(!empty($product_name)){

                if($id_for_pass_online == 1){

                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }elseif(!empty($product_sku)){


                if($id_for_pass_online == 1){

                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1_online)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->limit(10)->get();
                    $minus_one = 0;
                }else{
                    $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->count();
                    $total_serial_number1_online= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number_online = ceil($total_serial_number1_online);

            }else{
                $total_serial_number_online = $total_serial_number1_online;
            }
                    $minus_one = ($id_for_pass_online - 1)*10;

                    $product_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->skip($minus_one)->take(10)->get();
                }


             }

             $data = view('backend.product_list.ajax_search_for_online_product',compact('minus_one','product_list','total_serial_number_online','id_for_pass_online'))->render();
            return response()->json(['options'=>$data]);


    }
}
