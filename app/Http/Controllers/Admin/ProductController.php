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
use App\Models\Animationcategory;
use App\Models\Animationsubcategory;
use App\Models\AssaignAnimationCat;
use App\Models\AssaignAnimationSubCat;
use DB;
class ProductController extends Controller
{

	public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


   public function get_sub_cat_new(Request $request){

        $data="";
         $sub_category_list = Category::where('cat_name',$request->cat_val)->whereNotNull('sub_cat')
        ->select('sub_cat')->distinct('sub_cat')->get();

        if(count($sub_category_list) > 0)
        {
                $data.='<option value="" >-- Please Select --</option>';
        foreach ($sub_category_list as $key => $product) {


        $data.='<option value="'.$product->sub_cat.'">'.$product->sub_cat.'</option>';
        }

           }else{
            $data.='<option value="" disabled="disabled">Not Available</option>';

        }

        return Response($data);

    }

    public function child_get_new(Request $request){


         $data="";
         $sub_category_list = Category::where('sub_cat',$request->cat_val)->whereNotNull('child_one')
        ->select('child_one')->distinct('child_one')->get();

        if(count($sub_category_list) > 0)
        {
                $data.='<option value="" >-- Please Select --</option>';
        foreach ($sub_category_list as $key => $product) {


        $data.='<option value="'.$product->child_one.'">'.$product->child_one.'</option>';
        }

           }else{
            $data.='<option value="" disabled="disabled">Not Available</option>';

        }

        return Response($data);

    }

    public function second_child_get_new(Request $request){


         $data="";
         $sub_category_list = Category::where('child_one',$request->cat_val)->whereNotNull('child_two')
        ->select('child_two')->distinct('child_two')->get();

        if(count($sub_category_list) > 0)
        {
                $data.='<option value="" >-- Please Select --</option>';
        foreach ($sub_category_list as $key => $product) {


        $data.='<option value="'.$product->child_two.'">'.$product->child_two.'</option>';
        }

           }else{
            $data.='<option value="" disabled="disabled">Not Available</option>';

        }

        return Response($data);



    }


    public function get_size_list_category(Request $request){


        $size_list_all = DB::table('main_size')->where('category_name',$request->category_name)->get();


        $data = view('backend.product.get_size_list_category',compact('size_list_all'))->render();
        return response()->json($data);



    }


    public function create(){

        if (is_null($this->user) || !$this->user->can('product_add')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $image_list = ImageList::select('filename')->groupBy('filename')->get();
        $image_list_f = FeatureProductImage::select('filename')->groupBy('filename')->get();
        $category_list = Category::select('cat_name')->groupBy('cat_name')->get();
        $unit_list_detail = Unit::latest()->get();
        $brand_list_detail = Brand::latest()->get();
        $attribute_list_color = AttributeDetail::where('main_id_att','color')->latest()->get();
        $attribute_list_size = AttributeDetail::where('main_id_att','size')->latest()->get();

        $animation_category_list = Animationcategory::latest()->get();

        $animation_sub_category_list = Animationsubcategory::latest()->get();



       $size_list_all = DB::table('main_size')->select('category_name')->distinct('category_name')->get();



        return view('backend.product.create',compact('size_list_all','animation_sub_category_list','animation_category_list','image_list_f','brand_list_detail','unit_list_detail','attribute_list_size','attribute_list_color','image_list','category_list'));

    }


    public function edit($id){

        if (is_null($this->user) || !$this->user->can('product_update')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $main_product_list = MainProduct::where('id',$id)->latest()->first();

        $assaign_cat_list1 = AssaignCategory::where('product_name',$main_product_list->slug)->get();



        $new_ass_cat = $assaign_cat_list1->implode("cat_name",",");

        $convert_new_ass_cat  = explode(",",$new_ass_cat);


        //dd($convert_new_ass_cat);


$convert_in_string_cat_list = $assaign_cat_list1->implode("cat_name", ">");
        //$convert_in_string_cat_list = implode(">",$assaign_cat_list);

        //dd($convert_name_title);
        $assaign_size_list = AssaignSize::where('product_name',$main_product_list->id)->latest()->get();
        $convert_in_string_size_list1 = $assaign_size_list->implode("size_name",",");

        $convert_in_string_size_list = explode(",",$convert_in_string_size_list1);

        //dd($convert_in_string_size_list);

        $assaign_size_chart_list = SizeChart::where('product_name',$main_product_list->id)->latest()->get();


        $assaign_product_color = ProductColor::where('product_name',$main_product_list->id)->latest()->get();

        $assaign_feature_image_list = FeatureProductImage::where('product_name',$main_product_list->id)->latest()->get();

        $assaign_color_list = Imageupload::where('product_id',$main_product_list->id)->latest()->get();

        $assaign_color_image_list = ImageList::where('product_id',$main_product_list->id)->latest()->get();


        $image_list = ImageList::select('filename')->distinct('filename')->get();
        $image_list_f = FeatureProductImage::select('filename')->distinct('filename')->get();
        $category_list = Category::select('cat_name')->distinct('cat_name')->get();
        $unit_list_detail = Unit::latest()->get();
        $brand_list_detail = Brand::latest()->get();
        $attribute_list_color = AttributeDetail::where('main_id_att','color')->latest()->get();
        $attribute_list_size = AttributeDetail::where('main_id_att','size')->latest()->get();

        $animation_category_list = AssaignAnimationCat::where('product_id',$id)->latest()->get();

        $convert_name_title = $animation_category_list->implode("name", " ");
        $separated_data_title = explode(" ", $convert_name_title);

        $final_cat_list  = Animationcategory::whereNotIn('slug',$separated_data_title)->latest()->get();




        $animation_sub_category_list = AssaignAnimationSubCat::where('product_id',$id)->latest()->get();

$size_list_all = DB::table('main_size')->select('category_name')->distinct('category_name')->get();
$sub_category_list = Category::whereNotNull('sub_cat')
        ->select('sub_cat')->distinct('sub_cat')->get();

          $child_one_list = Category::whereNotNull('child_one')
        ->select('child_one')->distinct('child_one')->get();

        $child_two_list = Category::whereNotNull('child_two')
        ->select('child_two')->distinct('child_two')->get();
        return view('backend.product_list.edit',compact('convert_new_ass_cat','child_two_list','child_one_list','sub_category_list','size_list_all','final_cat_list','animation_sub_category_list','animation_category_list','assaign_color_list','assaign_color_image_list','assaign_feature_image_list','assaign_product_color','assaign_size_chart_list','convert_in_string_size_list','assaign_size_list','convert_in_string_cat_list','main_product_list','image_list_f','brand_list_detail','unit_list_detail','attribute_list_size','attribute_list_color','image_list','category_list'));

    }


    public function draft($id){

        if (is_null($this->user) || !$this->user->can('product_update')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $main_product_list = MainProduct::where('id',$id)->latest()->first();

        $assaign_cat_list1 = AssaignCategory::where('product_name',$main_product_list->product_name)->get();

$convert_in_string_cat_list = $assaign_cat_list1->implode("cat_name", ">");
        //$convert_in_string_cat_list = implode(">",$assaign_cat_list);

        //dd($convert_name_title);
        $assaign_size_list = AssaignSize::where('product_name',$main_product_list->id)->latest()->get();
        $convert_in_string_size_list1 = $assaign_size_list->implode("size_name",",");

        $convert_in_string_size_list = explode(",",$convert_in_string_size_list1);

        //dd($convert_in_string_size_list);

        $assaign_size_chart_list = SizeChart::where('product_name',$main_product_list->id)->latest()->get();


        $assaign_product_color = ProductColor::where('product_name',$main_product_list->id)->latest()->get();

        $assaign_feature_image_list = FeatureProductImage::where('product_name',$main_product_list->id)->latest()->get();

        $assaign_color_list = Imageupload::where('product_id',$main_product_list->id)->latest()->get();

        $assaign_color_image_list = ImageList::where('product_id',$main_product_list->id)->latest()->get();


        $image_list = ImageList::select('filename')->distinct('filename')->get();
        $image_list_f = FeatureProductImage::select('filename')->distinct('filename')->get();
        $category_list = Category::select('cat_name')->distinct('cat_name')->get();
        $unit_list_detail = Unit::latest()->get();
        $brand_list_detail = Brand::latest()->get();
        $attribute_list_color = AttributeDetail::where('main_id_att','color')->latest()->get();
        $attribute_list_size = AttributeDetail::where('main_id_att','size')->latest()->get();

        $animation_category_list = AssaignAnimationCat::where('product_id',$id)->latest()->get();

        $animation_sub_category_list = AssaignAnimationSubCat::where('product_id',$id)->latest()->get();

        $convert_name_title = $animation_category_list->implode("name", " ");
        $separated_data_title = explode(" ", $convert_name_title);

        $final_cat_list  = Animationcategory::whereNotIn('slug',$separated_data_title)->latest()->get();
$size_list_all = DB::table('main_size')->select('category_name')->distinct()->get();

        return view('backend.product_list.draft_form',compact('size_list_all','final_cat_list','animation_sub_category_list','animation_category_list','assaign_color_list','assaign_color_image_list','assaign_feature_image_list','assaign_product_color','assaign_size_chart_list','convert_in_string_size_list','assaign_size_list','convert_in_string_cat_list','main_product_list','image_list_f','brand_list_detail','unit_list_detail','attribute_list_size','attribute_list_color','image_list','category_list'));
    }



  public function index(Request $request){


    if (is_null($this->user) || !$this->user->can('product_view')) {
        //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

         return redirect('/admin/logout_session');
    }

    $category_list = ProductCategory::select('cat_name')->distinct('cat_name')->get();

$total_data = MainProduct::where('action_button','submit')->latest()->count();

$total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}

 //dd($total_serial_number);

    $product_list = MainProduct::where('action_button','submit')->latest()->limit(10)->get();

    $online_product_list = MainProduct::where('action_button','submit')
    ->where('status','Active')->latest()->limit(10)->get();

    $draft_product_list = MainProduct::where('action_button','draft')->latest()->limit(10)->get();
    $delete_product_list = MainProduct::where('action_button','deleted')->latest()->limit(10)->get();
    $outOfStock_product_list =ProductQuantity::where('quantity',0)->latest()->limit(10)->get();
    $brand_list_detail = Brand::latest()->get();
    return view('backend.product_list.index',compact('brand_list_detail','delete_product_list','outOfStock_product_list','draft_product_list','online_product_list','category_list','product_list','total_serial_number'));
  }


  public function main_search_button_product(Request $request){

         $search = $request->search;


         $total_data = Product::where('product_name','LIKE','%'.$request->search.'%')->latest()->count();

$total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}

 //dd($total_serial_number);

    $product_list = Product::where('product_name','LIKE','%'.$request->search.'%')->latest()->limit(10)->get();

    $data = view('backend.product.main_search_button_product',compact('product_list','total_serial_number','search'))->render();
    return response()->json(['options'=>$data]);
  }



  public function fetch_data(Request $request){

    $id_for_pass = $request->id_for_pass;

    if($id_for_pass == 1){

        $total_data = MainProduct::where('action_button','submit')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = MainProduct::where('action_button','submit')->latest()->limit(10)->get();
        $minus_one = 0;
    }else{
        $total_data = MainProduct::where('action_button','submit')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $minus_one = ($id_for_pass - 1)*10;

        $product_list = MainProduct::where('action_button','submit')->latest()->skip($minus_one)->take(10)->get();
    }

    $data = view('backend.product.pagiresult',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
            return response()->json(['options'=>$data]);
  }


  public function fetch_data_search(Request $request){

    $id_for_pass = $request->id_for_pass;
    $first_search_result = $request->first_search_result;

    if($id_for_pass == 1){

        $total_data = Product::where('product_name','LIKE','%'.$first_search_result.'%')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = Product::where('product_name','LIKE','%'.$first_search_result.'%')->latest()->limit(10)->get();
        $minus_one = 0;
    }else{
        $total_data = Product::where('product_name','LIKE','%'.$first_search_result.'%')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $minus_one = ($id_for_pass - 1)*10;

        $product_list = Product::where('product_name','LIKE','%'.$first_search_result.'%')->latest()->skip($minus_one)->take(10)->get();
    }

    $data = view('backend.product.fetch_data_search',compact('first_search_result','minus_one','product_list','total_serial_number','id_for_pass'))->render();
            return response()->json(['options'=>$data]);

  }



  public function store(Request $request){

     // dd(22);

    $input = $request->all();
    // $category_list = $request->cat_name;

    // $after_string_replace = str_replace(">", ",", $category_list);

    // $str_arr_category = explode (",", $after_string_replace);
$new_cat_list = $input['cat_name'];
if (array_key_exists("normal_cat", $input)){

$new_cat_dec = $input['normal_cat'];
}

$new_count = count($new_cat_list);
$new_cat_string = implode(">",$new_cat_list);

$if_get_last_data = substr($new_cat_string, -1);

if($if_get_last_data == '>'){


    $cat_name = substr($new_cat_string, 0, -1);


}else{
    $cat_name = $new_cat_string;

}



//dd($cat_name);
    //main database table

    $database_save = new MainProduct();
    $database_save->cat_name = $cat_name;
    $database_save->product_name = $request->product_name;
    $database_save->sku_product = $request->sku_product;
    $database_save->slug = Str::slug($request->product_name, "_");
    $database_save->bangla_product_name = $request->bangla_product_name;
    $database_save->video_link = $request->video_link;
    $database_save->brand = $request->brand;
    $database_save->unit = $request->unit;
    $database_save->material = $request->material;
    $database_save->alert_quantity = $request->alert_quantity;
    $database_save->manufacture = $request->manufacture;
    $database_save->size_list_chart= $request->size_list_chart;


    $database_save->manufacture_part_number = $request->manufacture_part_number;
    $database_save->condition = $request->condition;
    $database_save->seo_keyword = $request->seo_keyword;
    $database_save->model_number = $request->model_number;

    $database_save->catalog_number = $request->catalog_number;
    $database_save->buying_price = $request->buying_price;
    $database_save->selling_price = $request->selling_price;
    $database_save->wholesale_price = $request->wholesale_price;
    $database_save->discount = $request->discount_main;
    //dd($request->discount_main);
    $database_save->action_button = $request->action_button;
    $database_save->product_detail = $request->product_detail;

    if ($request->hasfile('front_image')) {
        $file = $request->file('front_image');
        $extension = $file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $database_save->front_image =  'public/uploads/'.$filename;

    }

    if ($request->hasfile('back_image')) {
        $file = $request->file('back_image');
        $extension = $file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $database_save->back_image =  'public/uploads/'.$filename;

    }

    $database_save->save();

    $product_id = $database_save->id;
    $product_slug = $database_save->slug;
    //main database table end







    //assaign category

    $category_name_for_product_table = 0 ;

    foreach($new_cat_list as $key => $new_cat_list){
        $form= new AssaignCategory();
        $form->cat_name=$input['cat_name'][$key];
        $form->product_name =  $product_slug;
        $form->save();




   }

   if (array_key_exists("normal_cat", $input)){

   foreach($new_cat_dec as $key => $new_cat_dec){
    $form= new AssaignCategory();
    $form->cat_name=$input['normal_cat'][$key];
    $form->product_name =  $product_slug;
    $form->save();


}
   }
   ///again update product table




   //again update product table


    //end assaign category

 //animation_sub_cat

    if (array_key_exists("animation_sub_cat", $input)){

        $condition_main_animation_sub_cat = $input['animation_sub_cat'];

        foreach($condition_main_animation_sub_cat as $key => $all_condition_main_animation_sub_cat){
            $form212= new AssaignAnimationSubCat();
            $form212->name=$input['animation_sub_cat'][$key];

            $form212->product_id =  $product_id;
            $form212->save();
       }


    }
    //end_animation_sub_cat

    //animation_cat
    if (array_key_exists("animation_cat", $input)){

        $condition_main_animation_cat= $input['animation_cat'];

        foreach($condition_main_animation_cat as $key => $all_condition_main_animation_cat){
            $form21= new AssaignAnimationCat();
            $form21->name=$input['animation_cat'][$key];

            $form21->product_id =  $product_id;
            $form21->save();
       }


    }

    //animation cat end




//start feature image from device
    if (array_key_exists("files_main", $input)){
        $condition_main_image = $input['files_main'];

        foreach($condition_main_image as $key => $all_condition_main_image){
            $form= new FeatureProductImage();
            $file=$input['files_main'][$key];
            $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
            $file->move('public/product_images/', $name);
            $form->filename='public/product_images/'.$name;
            $form->product_name =  $product_id;
            $form->save();
       }




    }

    //end  feature image from device
//start feature image from database
    if (array_key_exists("database_imaged", $input)){

        $condition_database_image = $input['database_imaged'];

        foreach($condition_database_image as $key => $all_condition_database_image){
            $form= new FeatureProductImage();
             $form->filename=$input['database_imaged'][$key];
            $form->product_name =  $product_id;
            $form->save();
       }

    }
    //end feature image from database

    //color code with image from device


    if (array_key_exists("maincolor", $input)){

        $condition_main_color = $input['maincolor'];

 if (($key = array_search('Select Color', $condition_main_color)) !== false) {
            unset($condition_main_color[$key]);
        }


        foreach($condition_main_color as $key=>$all_condition_main_color){




            $form= new Imageupload();
            $form->color_id=$input['maincolor'][$key];
            $form->product_id =  $product_id;
            $form->save();


            if (array_key_exists("pfiles".$key, $input)){
            $color_image_main = $input["pfiles".$key];

            foreach($color_image_main as $key_image=>$all_color_image_main){


                $form1= new ImageList();
            $file=$input["pfiles".$key][$key_image];
            $name=time().mt_rand(100000000, 999999999).'.'.$file->getClientOriginalExtension();
            $file->move('public/product_images/', $name);
            $form1->filename='public/product_images/'.$name;
            $form1->product_id =  $product_id;
            $form1->color_id=$input['maincolor'][$key];
            $form1->save();

            }

             }

             //start color_code with  image from database


if (array_key_exists("pdatabase_imaged_string".$key, $input)){

    $condition_color_database_image = $input['pdatabase_imaged_string'.$key];

    foreach($condition_color_database_image as $key_image_database=>$all_condition_color_database_image){

            $form2= new ImageList();
            $form2->filename=$input["pdatabase_imaged_string".$key][$key_image_database];
            $form2->product_id =  $product_id;
            $form2->color_id=$input['maincolor'][$key];
            $form2->save();

    }

}


//end color_code with image from database


    }

    }
//end color code with image from device











    if (array_key_exists("size_list", $input)){

        $condition_main_size_list = $input['size_list'];


        foreach($condition_main_size_list as $key => $condition_main_size_list){
            $form= new AssaignSize();
            $form->size_name=$input['size_list'][$key];
            $form->product_name =  $product_id;
            $form->save();
       }

    }

    if (array_key_exists("size", $input)){

        $condition_table_sizechart_list = $input['size'];

if (array_key_exists("shoulder", $input) && array_key_exists("chest", $input)){



        foreach($condition_table_sizechart_list as $key => $condition_table_sizechart_list){
            $form= new SizeChart();
            $form->size_name=$input['size'][$key];
            $form->lenght=$input['length'][$key];
            $form->width=$input['width'][$key];
            $form->shoulder=$input['shoulder'][$key];
            $form->chest=$input['chest'][$key];
            $form->product_name =  $product_id;
            $form->save();
       }

}else{

 foreach($condition_table_sizechart_list as $key => $condition_table_sizechart_list){
            $form= new SizeChart();
            $form->size_name=$input['size'][$key];
            $form->lenght=$input['length'][$key];
            $form->width=$input['width'][$key];
                    $form->product_name =  $product_id;
            $form->save();
       }


}

    }

    if (array_key_exists("in_size", $input)){

        $condition_table_size_list = $input['in_size'];

        $total_quantity_product = 0 ;


        foreach($condition_table_size_list as $key => $condition_table_size_list){
            $form= new ProductColor();
        
            $form->product_name =  $product_id;
            $form->color=$input['in_color'][$key];
            $form->size=$input['in_size'][$key];
            $form->price=$input['in_price'][$key];
            $form->quantity=$input['quantity'][$key];
            $form->seller_sku=$input['sku'][$key];
            $form->discount=$input['discount'][$key];
            $form->free_item = $input['free_item'][$key];
            $form->save();

            $total_quantity_product += $form->quantity;
       }

       $form_q= new ProductQuantity();
       $form_q->product_name =  $product_id;
       $form_q->quantity =  $total_quantity_product;
       $form_q->save();

    }



if($request->action_button == 'draft'){
    return redirect()->back()->with('success','Drafted Successfully');

}else{
    return redirect()->back()->with('success','Created Successfully');
}






  }

  public function delete(Request $request){

    MainProduct::where('id', $request->id)
       ->update([
           'action_button' => 'deleted'
        ]);


  return redirect()->back()->with('error','Moved Successfully');

}


public function update(Request $request){


    $input = $request->all();
    
    //dd($input);

    $new_cat_list = $input['cat_name'];
    
    if (array_key_exists("normal_cat", $input)){

$new_cat_dec = $input['normal_cat'];
}


$new_count = count($new_cat_list);
$new_cat_string = implode(">",$new_cat_list);

$if_get_last_data = substr($new_cat_string, -1);

if($if_get_last_data == '>'){


    $cat_name = substr($new_cat_string, 0, -1);


}else{
    $cat_name = $new_cat_string;

}



//dd($cat_name);
    // $category_list = $request->cat_name;

    // $after_string_replace = str_replace(">", ",", $category_list);

    // $str_arr_category = explode (",", $after_string_replace);
//dd($str_arr_category);
    //main database table

    $database_save = MainProduct::find($request->id);
    $database_save->product_name = $request->product_name;
    $database_save->cat_name = $cat_name;
    $database_save->sku_product = $request->sku_product;
    $database_save->slug = Str::slug($request->product_name, "_");
    $database_save->bangla_product_name = $request->bangla_product_name;
    $database_save->video_link = $request->video_link;
    $database_save->brand = $request->brand;
    $database_save->unit = $request->unit;
    $database_save->material = $request->material;
    $database_save->alert_quantity = $request->alert_quantity;
    $database_save->manufacture = $request->manufacture;
 $database_save->size_list_chart= $request->size_list_chart;

    $database_save->manufacture_part_number = $request->manufacture_part_number;
    $database_save->condition = $request->condition;
    $database_save->seo_keyword = $request->seo_keyword;
    $database_save->model_number = $request->model_number;

    $database_save->catalog_number = $request->catalog_number;
    $database_save->buying_price = $request->buying_price;
    $database_save->selling_price = $request->selling_price;
    $database_save->wholesale_price = $request->wholesale_price;
    $database_save->discount = $request->discount_main;
    //dd($request->discount_main);
    $database_save->action_button = $request->action_button;
    $database_save->product_detail = $request->product_detail;
    if ($request->hasfile('front_image')) {
        $file = $request->file('front_image');
        $extension = $file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $database_save->front_image =  'public/uploads/'.$filename;

    }

    if ($request->hasfile('back_image')) {
        $file = $request->file('back_image');
        $extension = $file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $database_save->back_image =  'public/uploads/'.$filename;

    }
    $database_save->save();

    $product_id = $database_save->id;
    $product_slug = $database_save->slug;
    //main database table end







    //assaign category

    $category_name_for_product_table = 0 ;

    //delete category
    $c_d = AssaignCategory::where('product_name',$product_slug)->delete();
    //delete category

    foreach($new_cat_list as $key => $new_cat_list){
        $form= new AssaignCategory();
        $form->cat_name=$input['cat_name'][$key];
        $form->product_name =  $product_slug;
        $form->save();




   }

   if (array_key_exists("normal_cat", $input)){

   foreach($new_cat_dec as $key => $new_cat_dec){
    $form= new AssaignCategory();
    $form->cat_name=$input['normal_cat'][$key];
    $form->product_name =  $product_slug;
    $form->save();

}
   }
   ///again update product table




   //again update product table


    //end assaign category


    //animation_sub_cat

if (array_key_exists("animation_sub_cat", $input)){

    $condition_main_animation_sub_cat = $input['animation_sub_cat'];
    $f_d = AssaignAnimationSubCat::where('product_id',$product_id)->delete();
    foreach($condition_main_animation_sub_cat as $key => $all_condition_main_animation_sub_cat){
        $form212= new AssaignAnimationSubCat();
        $form212->name=$input['animation_sub_cat'][$key];

        $form212->product_id =  $product_id;
        $form212->save();
   }


}
//end_animation_sub_cat

//animation_cat
if (array_key_exists("animation_cat", $input)){

    $condition_main_animation_cat= $input['animation_cat'];
    $f_d = AssaignAnimationCat::where('product_id',$product_id)->delete();
    foreach($condition_main_animation_cat as $key => $all_condition_main_animation_cat){
        $form21= new AssaignAnimationCat();
        $form21->name=$input['animation_cat'][$key];

        $form21->product_id =  $product_id;
        $form21->save();
   }


}

//animation cat end

if (array_key_exists("previous_m_imagem", $input)){

//previous feature image delete

$previous_feature_image = $input['previous_m_imagem'];

// dd($previous_feature_image);

$f_d = FeatureProductImage::where('product_name',$product_id)->delete();



foreach($previous_feature_image as $key => $previous_feature_image){
    $form= new FeatureProductImage();

    $form->filename=$input['previous_m_imagem'][$key];
    $form->product_name =  $product_id;
    $form->save();
}
//end previous feature image delete
}else{
    $f_d = FeatureProductImage::where('product_name',$product_id)->delete();
    
}

//start feature image from device
    if (array_key_exists("files_main", $input)){
        $condition_main_image = $input['files_main'];

        foreach($condition_main_image as $key => $all_condition_main_image){
            $form= new FeatureProductImage();
            $file=$input['files_main'][$key];
            $name=time().mt_rand(1000000000, 9999999999).'.'.$file->getClientOriginalExtension();
            $file->move('public/product_images/', $name);
            $form->filename='public/product_images/'.$name;
            $form->product_name =  $product_id;
            $form->save();
       }




    }

    //end  feature image from device
//start feature image from database
    if (array_key_exists("database_imaged", $input)){

        $condition_database_image = $input['database_imaged'];

        foreach($condition_database_image as $key => $all_condition_database_image){
            $form= new FeatureProductImage();
             $form->filename=$input['database_imaged'][$key];
            $form->product_name =  $product_id;
            $form->save();
       }

    }
    //end feature image from database

    //color code with image from device


    if (array_key_exists("maincolor", $input)){

        $condition_main_color = $input['maincolor'];

 if (($key = array_search('Select Color', $condition_main_color)) !== false) {
            unset($condition_main_color[$key]);
        }

        $f_d = Imageupload::where('product_id',$product_id)->delete();


        foreach($condition_main_color as $key=>$all_condition_main_color){




            $form= new Imageupload();
            $form->color_id=$input['maincolor'][$key];
            $form->product_id =  $product_id;
            $form->save();


            if (array_key_exists("pfiles".$key, $input)){
            $color_image_main = $input["pfiles".$key];

            $f_d = ImageList::where('product_id',$product_id)->delete();

            foreach($color_image_main as $key_image=>$all_color_image_main){


                $form1= new ImageList();
            $file=$input["pfiles".$key][$key_image];
            $name=time().mt_rand(100000000, 999999999).'.'.$file->getClientOriginalExtension();
            $file->move('public/product_images/', $name);
            $form1->filename='public/product_images/'.$name;
            $form1->product_id =  $product_id;
            $form1->color_id=$input['maincolor'][$key];
            $form1->save();

            }

             }

             //start color_code with  image from database


if (array_key_exists("pdatabase_imaged_string".$key, $input)){

    $condition_color_database_image = $input['pdatabase_imaged_string'.$key];

    foreach($condition_color_database_image as $key_image_database=>$all_condition_color_database_image){

            $form2= new ImageList();
            $form2->filename=$input["pdatabase_imaged_string".$key][$key_image_database];
            $form2->product_id =  $product_id;
            $form2->color_id=$input['maincolor'][$key];
            $form2->save();

    }

}
if (array_key_exists("previous_c_imagec".$key, $input)){

$previous_child_color_image = $input['previous_c_imagec'.$key];

foreach($previous_child_color_image as $key_image_database=>$previous_child_color_image){

    $form23= new ImageList();
    $form23->filename=$input["previous_c_imagec".$key][$key_image_database];
    $form23->product_id =  $product_id;
    $form23->color_id=$input['maincolor'][$key];
    $form23->save();

}
}


//end color_code with image from database


    }

    }
//end color code with image from device











    if (array_key_exists("size_list", $input)){

        $condition_main_size_list = $input['size_list'];

        $f_d = AssaignSize::where('product_name',$product_id)->delete();
        foreach($condition_main_size_list as $key => $condition_main_size_list){
            $form= new AssaignSize();
            $form->size_name=$input['size_list'][$key];
            $form->product_name =  $product_id;
            $form->save();
       }

    }

    if (array_key_exists("size", $input)){

        $condition_table_sizechart_list = $input['size'];
        $f_d = SizeChart::where('product_name',$product_id)->delete();

      

if (array_key_exists("shoulder", $input) && array_key_exists("chest", $input)){



        foreach($condition_table_sizechart_list as $key => $condition_table_sizechart_list){
            $form= new SizeChart();
            $form->size_name=$input['size'][$key];
            $form->lenght=$input['length'][$key];
            $form->width=$input['width'][$key];
            $form->shoulder=$input['shoulder'][$key];
            $form->chest=$input['chest'][$key];
            $form->product_name =  $product_id;
            $form->save();
       }

}else{

 foreach($condition_table_sizechart_list as $key => $condition_table_sizechart_list){
            $form= new SizeChart();
            $form->size_name=$input['size'][$key];
            $form->lenght=$input['length'][$key];
            $form->width=$input['width'][$key];
                    $form->product_name =  $product_id;
            $form->save();
       }


}




    }

    if (array_key_exists("in_size", $input)){

        $condition_table_size_list = $input['in_size'];

        $total_quantity_product = 0 ;

        $f_d = ProductColor::where('product_name',$product_id)->delete();
        foreach($condition_table_size_list as $key => $condition_table_size_list){
            $form= new ProductColor();
        
            $form->product_name =  $product_id;
            $form->color=$input['in_color'][$key];
            $form->size=$input['in_size'][$key];
            $form->price=$input['in_price'][$key];
            $form->quantity=$input['quantity'][$key];
            $form->seller_sku=$input['sku'][$key];
            $form->discount=$input['discount'][$key];
            $form->free_item = $input['free_item'][$key];
            $form->save();

            $total_quantity_product += $form->quantity;
       }

       $f_d = ProductQuantity::where('product_name',$product_id)->delete();

       $form_q= new ProductQuantity();
       $form_q->product_name =  $product_id;
       $form_q->quantity =  $total_quantity_product;
       $form_q->save();

    }



if($request->action_button == 'draft'){
    return redirect()->back()->with('success','Drafted Successfully');

}else{
    return redirect()->back()->with('success','Updated Successfully');
}



}
}
