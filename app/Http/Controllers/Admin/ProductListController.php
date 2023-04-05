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
class ProductListController extends Controller
{
  
  public function new_code_to_delete_all_data(Request $request){
  
   
    
     $update_data = MainProduct::whereIn('id',$request->get_final_value_delete)->delete();




        $total_data = MainProduct::where('action_button','deleted')->latest()->count();

        $total_serial_number1_delete= $total_data/10;

        if (is_float($total_serial_number1_delete)){
            $total_serial_number_delete = ceil($total_serial_number1_delete);

        }else{
            $total_serial_number_delete = $total_serial_number1_delete;
        }

         //dd($total_serial_number);

            $product_list_delete_new = MainProduct::where('action_button','deleted')->latest()->limit(10)->get();
$data = 1;

            $data = view('backend.product_list.product_list_all_deletelist_delete',compact('product_list_delete_new','total_serial_number_delete'))->render();
            return response()->json(['options'=>$data]);
  
  }
    public function product_list_all_active(Request $request){


        $update_data = MainProduct::where('action_button','submit')->whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Active']);




        $total_data = MainProduct::where('action_button','submit')->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = MainProduct::where('action_button','submit')->latest()->limit(10)->get();



     $data = view('backend.product_list.product_list_all_active',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);


    }

    public function product_list_all_inactive(Request $request){


        $update_data = MainProduct::where('action_button','submit')->whereIn('id',$request->numberOfSubChecked)->update(['status' => 'InActive']);




        $total_data = MainProduct::where('action_button','submit')->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = MainProduct::where('action_button','submit')->latest()->limit(10)->get();



     $data = view('backend.product_list.product_list_all_active',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);


    }


    public function product_list_all_delete(Request $request){


        $update_data = MainProduct::whereIn('id',$request->numberOfSubChecked)->update([
            'action_button' => 'deleted'
         ]);




        $total_data = MainProduct::where('action_button','submit')->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = MainProduct::where('action_button','submit')->latest()->limit(10)->get();



     $data = view('backend.product_list.product_list_all_active',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);


    }


    public function product_list_all_online(Request $request){

        $id_for_pass_online = $request->id_for_pass_online;

        if($id_for_pass_online == 1){

            $total_data = MainProduct::where('action_button','submit')->where('status','Active')->latest()->count();
            $total_serial_number1_online= $total_data/10;

    if (is_float($total_serial_number1_online)){
        $total_serial_number_online = ceil($total_serial_number1_online);

    }else{
        $total_serial_number_online = $total_serial_number1_online;
    }
            $product_list_online_new = MainProduct::where('action_button','submit')->where('status','Active')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = MainProduct::where('action_button','submit')->where('status','Active')->latest()->count();
            $total_serial_number1_online= $total_data/10;

    if (is_float($total_serial_number1_online)){
        $total_serial_number_online = ceil($total_serial_number1_online);

    }else{
        $total_serial_number_online = $total_serial_number1_online;
    }
            $minus_one = ($id_for_pass_online - 1)*10;

            $product_list_online_new = MainProduct::where('action_button','submit')->where('status','Active')->latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.product_list.product_list_all_online',compact('minus_one','product_list_online_new','total_serial_number_online','id_for_pass_online'))->render();
                return response()->json(['options'=>$data]);
      }



      public function product_list_all_active_online(Request $request){


        $update_data = MainProduct::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Active']);




        $total_data = MainProduct::where('action_button','submit')->where('status','Active')->latest()->count();

        $total_serial_number1_online= $total_data/10;

        if (is_float($total_serial_number1_online)){
            $total_serial_number_online = ceil($total_serial_number1_online);

        }else{
            $total_serial_number_online = $total_serial_number1_online;
        }

         //dd($total_serial_number);

            $product_list_online_new = MainProduct::where('action_button','submit')->where('status','Active')->latest()->limit(10)->get();

            $product_list_draft_new = MainProduct::where('action_button','draft')->latest()->limit(10)->get();

     $data = view('backend.product_list.product_list_all_active_online',compact('product_list_draft_new','product_list_online_new','total_serial_number_online'))->render();
     return response()->json(['options'=>$data]);


    }

    public function product_list_all_inactive_online(Request $request){


        $update_data = MainProduct::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'InActive']);




        $total_data = MainProduct::where('action_button','submit')->where('status','Active')->latest()->count();

        $total_serial_number1_online= $total_data/10;

        if (is_float($total_serial_number1_online)){
            $total_serial_number_online = ceil($total_serial_number1_online);

        }else{
            $total_serial_number_online = $total_serial_number1_online;
        }

         //dd($total_serial_number);

            $product_list_online_new = MainProduct::where('action_button','submit')->where('status','Active')->latest()->limit(10)->get();



     $data = view('backend.product_list.product_list_all_active_online',compact('product_list_online_new','total_serial_number_online'))->render();
     return response()->json(['options'=>$data]);


    }


    public function product_list_all_delete_online(Request $request){


        $update_data = MainProduct::whereIn('id',$request->numberOfSubChecked)->update([
            'action_button' => 'deleted'
         ]);;




        $total_data = MainProduct::where('action_button','submit')->where('status','Active')->latest()->count();

        $total_serial_number1_online= $total_data/10;

        if (is_float($total_serial_number1_online)){
            $total_serial_number_online = ceil($total_serial_number1_online);

        }else{
            $total_serial_number_online = $total_serial_number1_online;
        }

         //dd($total_serial_number);

            $product_list_online_new = MainProduct::where('action_button','submit')->where('status','Active')->latest()->limit(10)->get();



     $data = view('backend.product_list.product_list_all_active_online',compact('product_list_online_new','total_serial_number_online'))->render();
     return response()->json(['options'=>$data]);


    }



    public function product_list_all_draft(Request $request){

        $id_for_pass_draft = $request->id_for_pass_draft;

        if($id_for_pass_draft == 1){

            $total_data = MainProduct::where('action_button','draft')->latest()->count();
            $total_serial_number1_draft= $total_data/10;

    if (is_float($total_serial_number1_draft)){
        $total_serial_number_draft = ceil($total_serial_number1_draft);

    }else{
        $total_serial_number_draft = $total_serial_number1_draft;
    }
            $product_list_draft_new = MainProduct::where('action_button','draft')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = MainProduct::where('action_button','draft')->latest()->count();
            $total_serial_number1_draft= $total_data/10;

    if (is_float($total_serial_number1_draft)){
        $total_serial_number_draft = ceil($total_serial_number1_draft);

    }else{
        $total_serial_number_draft = $total_serial_number1_draft;
    }
            $minus_one = ($id_for_pass_draft - 1)*10;

            $product_list_draft_new = MainProduct::where('action_button','draft')->latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.product_list.product_list_all_draft',compact('minus_one','product_list_draft_new','total_serial_number_draft','id_for_pass_draft'))->render();
                return response()->json(['options'=>$data]);
      }




      public function product_list_all_delete_draft(Request $request){


        $update_data = MainProduct::whereIn('id',$request->numberOfSubChecked)->update([
            'action_button' => 'deleted'
         ]);;




        $total_data = MainProduct::where('action_button','draft')->latest()->count();

        $total_serial_number1_draft= $total_data/10;

        if (is_float($total_serial_number1_draft)){
            $total_serial_number_draft = ceil($total_serial_number1_draft);

        }else{
            $total_serial_number_draft = $total_serial_number1_draft;
        }

         //dd($total_serial_number);

            $product_list_draft_new = MainProduct::where('action_button','draft')->latest()->limit(10)->get();



     $data = view('backend.product_list.product_list_all_active_draft',compact('product_list_draft_new','total_serial_number_draft'))->render();
     return response()->json(['options'=>$data]);


    }


    public function product_list_all_outOfStock(Request $request){


        $id_for_pass_outOfStock = $request->id_for_pass_outOfStock;

        if($id_for_pass_outOfStock == 1){

            $total_data = ProductQuantity::where('quantity',0)->latest()->count();
            $total_serial_number1_outOfStock= $total_data/10;

    if (is_float($total_serial_number1_outOfStock)){
        $total_serial_number_outOfStock = ceil($total_serial_number1_outOfStock);

    }else{
        $total_serial_number_outOfStock = $total_serial_number1_outOfStock;
    }
            $product_list_outOfStock_new = ProductQuantity::where('quantity',0)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = ProductQuantity::where('quantity',0)->latest()->count();
            $total_serial_number1_outOfStock= $total_data/10;

    if (is_float($total_serial_number1_outOfStock)){
        $total_serial_number_outOfStock = ceil($total_serial_number1_outOfStock);

    }else{
        $total_serial_number_outOfStock = $total_serial_number1_outOfStock;
    }
            $minus_one = ($id_for_pass_outOfStock - 1)*10;

            $product_list_outOfStock_new = ProductQuantity::where('quantity',0)->latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.product_list.product_list_all_outOfStock',compact('minus_one','product_list_outOfStock_new','total_serial_number_outOfStock','id_for_pass_outOfStock'))->render();
                return response()->json(['options'=>$data]);



    }



    public function product_list_all_deletelist(Request $request){

        $id_for_pass_delete = $request->id_for_pass_delete;

        if($id_for_pass_delete == 1){

            $total_data = MainProduct::where('action_button','deleted')->latest()->count();
            $total_serial_number1_delete= $total_data/10;

    if (is_float($total_serial_number1_delete)){
        $total_serial_number_delete = ceil($total_serial_number1_delete);

    }else{
        $total_serial_number_delete = $total_serial_number1_delete;
    }
            $product_list_delete_new = MainProduct::where('action_button','deleted')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = MainProduct::where('action_button','deleted')->latest()->count();
            $total_serial_number1_delete= $total_data/10;

    if (is_float($total_serial_number1_delete)){
        $total_serial_number_delete = ceil($total_serial_number1_delete);

    }else{
        $total_serial_number_delete = $total_serial_number1_delete;
    }
            $minus_one = ($id_for_pass_delete - 1)*10;

            $product_list_delete_new = MainProduct::where('action_button','deleted')->latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.product_list.product_list_all_deletelist',compact('minus_one','product_list_delete_new','total_serial_number_delete','id_for_pass_delete'))->render();
                return response()->json(['options'=>$data]);
      }



      public function product_list_all_deletelist_delete(Request $request){

        

        $update_data = MainProduct::whereIn('id',$request->get_final_value_delete)->delete();




        $total_data = MainProduct::where('action_button','deleted')->latest()->count();

        $total_serial_number1_delete= $total_data/10;

        if (is_float($total_serial_number1_delete)){
            $total_serial_number_delete = ceil($total_serial_number1_delete);

        }else{
            $total_serial_number_delete = $total_serial_number1_delete;
        }

         //dd($total_serial_number);

            $product_list_delete_new = MainProduct::where('action_button','deleted')->latest()->limit(10)->get();


            $data = view('backend.product_list.product_list_all_deletelist_delete',compact('product_list_delete_new','total_serial_number_delete'))->render();
            return response()->json(['options'=>$data]);
      }


      public function product_list_single_deletelist_delete(Request $request){

        MainProduct::where('id', $request->id)
        ->delete();


   return redirect()->back()->with('error','Moved Successfully');

      }


      public function product_list_restore_from_deletelist($id){


        $update_data = MainProduct::where('id',$id)->update([
            'action_button' => 'submit'
         ]);

         return redirect()->back()->with('success','Updated Successfully');

      }


      public function show_product_price_list(Request $request){

        $product_id_for_price_update = $request->product_id_for_price_update;

        $update_data_price = MainProduct::where('id',$product_id_for_price_update)->value('selling_price');

        $ajax_price_list = ProductColor::where('product_name',$product_id_for_price_update)->latest()->get();

        $data = view('backend.product_list.show_product_price_list',compact('ajax_price_list','product_id_for_price_update','update_data_price'))->render();
            return response()->json(['options'=>$data]);

      }

      public function show_product_quantity_list(Request $request){

        $product_id_for_quantity_update = $request->product_id_for_quantity_update;

        $update_data_quantity = MainProduct::where('id',$product_id_for_quantity_update)->value('selling_price');

        $ajax_quantity_list = ProductColor::where('product_name',$product_id_for_quantity_update)->latest()->get();

        $data = view('backend.product_list.show_product_quantity_list',compact('ajax_quantity_list','product_id_for_quantity_update','update_data_quantity'))->render();
            return response()->json(['options'=>$data]);

      }

      public function update_product_price_list(Request $request){


        $update_data = MainProduct::where('id',$request->product_id)->update([
            'selling_price' => $request->common_price
         ]);

         $input = $request->all();

         $all_product_id = $input['id'];

         foreach($all_product_id as $key => $all_product_id){




             $update_data = ProductColor::where('id',$input['id'][$key])->update([
                'color' =>$input['color'][$key],
                'size' => $input['size'][$key],
                'price' => $input['price'][$key]
             ]);
        }


        return redirect()->back()->with('success','Updated Successfully');
      }




      public function update_product_quantity_list(Request $request){


        // $update_data = MainProduct::where('id',$request->product_id)->update([
        //     'selling_price' => $request->common_price
        //  ]);

         $input = $request->all();

         $all_product_id = $input['id'];

         $total_quantity_product = 0;

         foreach($all_product_id as $key => $all_product_id){




             $update_data = ProductColor::where('id',$input['id'][$key])->update([
                'color' =>$input['color'][$key],
                'size' => $input['size'][$key],
                'quantity' => $input['quantity'][$key]
             ]);

             $total_quantity_product += $input['quantity'][$key];
        }


        $update_data = ProductQuantity::where('product_name',$request->product_id)->update([
                'quantity' => $total_quantity_product
             ]);


        return redirect()->back()->with('success','Updated Successfully');
      }


      public function search_from_all_product(Request $request){


        $product_sku = $request->product_sku;
        $product_name = $request->product_name;
        $brand_name = $request->product_name;
        $product_category = $request->product_category;


        if(!empty($product_sku) && !empty($product_name) && !empty($brand_name) &&  !empty($product_category)){





       $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();




        }elseif(!empty($product_sku) && !empty($product_name) && !empty($brand_name)){

            $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list= MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_name) && !empty($brand_name) &&  !empty($product_category)){

            $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
            ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list=MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
->orWhere('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($brand_name) &&  !empty($product_category)){
            $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
            ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list=MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($product_name) &&  !empty($product_category)){

            $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list=MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($product_name)){

            $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list=MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($brand_name)){


            $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
        ->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($product_category)){


            $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_name) && !empty($brand_name)){


            $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
             ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
->orWhere('brand','LIKE','%'.$brand_name.'%')
->latest()->limit(10)->get();


        }elseif(!empty($product_name) && !empty($product_category)){

            $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
            ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

     $total_serial_number1_all= $total_data/10;

     if (is_float($total_serial_number1_all)){
         $total_serial_number_all = ceil($total_serial_number1_all);

     }else{
         $total_serial_number_all = $total_serial_number1_all;
     }

     $all_product_search_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')
     ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();

        }elseif(!empty($brand_name) && !empty($product_category)){


            $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();



        }elseif(!empty($brand_name)){


            $total_data = MainProduct::Where('brand','LIKE','%'.$brand_name.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list = MainProduct::orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->limit(10)->get();



        }elseif(!empty($product_category)){

            $total_data = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

     $total_serial_number1_all= $total_data/10;

     if (is_float($total_serial_number1_all)){
         $total_serial_number_all = ceil($total_serial_number1_all);

     }else{
         $total_serial_number_all = $total_serial_number1_all;
     }

     $all_product_search_list = MainProduct::Where('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();

        }elseif(!empty($product_name)){

            $total_data = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->count();

     $total_serial_number1_all= $total_data/10;

     if (is_float($total_serial_number1_all)){
         $total_serial_number_all = ceil($total_serial_number1_all);

     }else{
         $total_serial_number_all = $total_serial_number1_all;
     }

     $all_product_search_list = MainProduct::Where('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();

        }elseif(!empty($product_sku)){


            $total_data = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->count();

$total_serial_number1_all= $total_data/10;

if (is_float($total_serial_number1_all)){
    $total_serial_number_all = ceil($total_serial_number1_all);

}else{
    $total_serial_number_all = $total_serial_number1_all;
}

$all_product_search_list = MainProduct::where('sku_product','LIKE','%'.$product_sku.'%')->latest()->limit(10)->get();



        }




        $data = view('backend.product_list.search_from_all_product',compact('all_product_search_list','total_serial_number_all'))->render();
        return response()->json(['options'=>$data]);


      }



      public function search_from_online_product(Request $request){



        $product_sku = $request->product_sku;
        $product_name = $request->product_name;
        $brand_name = $request->product_name;
        $product_category = $request->product_category;


        if(!empty($product_sku) && !empty($product_name) && !empty($brand_name) &&  !empty($product_category)){





       $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();




        }elseif(!empty($product_sku) && !empty($product_name) && !empty($brand_name)){

            $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list= MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_name) && !empty($brand_name) &&  !empty($product_category)){

            $total_data = MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%')
            ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list=MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%')
->orWhere('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($brand_name) &&  !empty($product_category)){
            $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
            ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list=MainProduct::where('status','Active')
->where('sku_product','LIKE','%'.$product_sku.'%')->orWhere('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($product_name) &&  !empty($product_category)){

            $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list=MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($product_name)){

            $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list=MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($brand_name)){


            $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
        ->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')->orWhere('brand','LIKE','%'.$brand_name.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_sku) && !empty($product_category)){


            $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();


        }elseif(!empty($product_name) && !empty($brand_name)){


            $total_data = MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
       ->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list = MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%') ->orWhere('brand','LIKE','%'.$brand_name.'%')
->latest()->limit(10)->get();


        }elseif(!empty($product_name) && !empty($product_category)){

            $total_data = MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%')
            ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

     $total_serial_number1_online= $total_data/10;

     if (is_float($total_serial_number1_online)){
         $total_serial_number_online = ceil($total_serial_number1_online);

     }else{
         $total_serial_number_online = $total_serial_number1_online;
     }

     $all_product_search_list = MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%')
     ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();

        }elseif(!empty($brand_name) && !empty($product_category)){


            $total_data = MainProduct::where('status','Active')->Where('brand','LIKE','%'.$brand_name.'%')
       ->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list = MainProduct::where('status','Active')->Where('brand','LIKE','%'.$brand_name.'%')
->orWhere('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();



        }elseif(!empty($brand_name)){


            $total_data = MainProduct::where('status','Active')->Where('brand','LIKE','%'.$brand_name.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list = MainProduct::where('status','Active')->Where('brand','LIKE','%'.$brand_name.'%')->latest()->limit(10)->get();



        }elseif(!empty($product_category)){

            $total_data = MainProduct::where('status','Active')->Where('cat_name','LIKE','%'.$product_category.'%')->latest()->count();

     $total_serial_number1_online= $total_data/10;

     if (is_float($total_serial_number1_online)){
         $total_serial_number_online = ceil($total_serial_number1_online);

     }else{
         $total_serial_number_online = $total_serial_number1_online;
     }

     $all_product_search_list = MainProduct::where('status','Active')->Where('cat_name','LIKE','%'.$product_category.'%')->latest()->limit(10)->get();

        }elseif(!empty($product_name)){

            $total_data = MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%')->latest()->count();

     $total_serial_number1_online= $total_data/10;

     if (is_float($total_serial_number1_online)){
         $total_serial_number_online = ceil($total_serial_number1_online);

     }else{
         $total_serial_number_online = $total_serial_number1_online;
     }

     $all_product_search_list = MainProduct::where('status','Active')->Where('product_name','LIKE','%'.$product_name.'%')->latest()->limit(10)->get();

        }elseif(!empty($product_sku)){


            $total_data = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')->latest()->count();

$total_serial_number1_online= $total_data/10;

if (is_float($total_serial_number1_online)){
    $total_serial_number_online = ceil($total_serial_number1_online);

}else{
    $total_serial_number_online = $total_serial_number1_online;
}

$all_product_search_list = MainProduct::where('status','Active')->where('sku_product','LIKE','%'.$product_sku.'%')->latest()->limit(10)->get();



        }

        $data = view('backend.product_list.search_from_online_product',compact('all_product_search_list','total_serial_number_online'))->render();
        return response()->json(['options'=>$data]);

    }
}
