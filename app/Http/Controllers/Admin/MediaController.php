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
class MediaController extends Controller
{
    public function media_center(){

        $feature_image_list = FeatureProductImage::latest()->get();
        $main_image_list = ImageList::latest()->get();

        return view('backend.media_center.list',compact('feature_image_list','main_image_list'));


    }
  
   public function delete_all_data_from_media(Request $request){

        $delete_data_info = $request->numberOfSubChecked;

        $delete_data_info12 = $request->numberOfSubChecked12;

        //dd($delete_data_info12);

        if(empty($delete_data_info)){

        }else{
            $feature_image_list = FeatureProductImage::whereIn('id',$delete_data_info)->delete();

        }


        if(empty($delete_data_info12)){

        }else{
            $feature_image_list = ImageList::whereIn('id',$delete_data_info12)->delete();

        }

        return 1;


    }
}
