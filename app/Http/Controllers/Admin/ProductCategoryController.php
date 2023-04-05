<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;
use DateTime;
use DateTimezone;
class ProductCategoryController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(){

        if (is_null($this->user) || !$this->user->can('category_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = ProductCategory::latest()->count();

$total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}

        $category_list = ProductCategory::latest()->limit(10)->get();

        return view('backend.product_category.index',compact('category_list','total_serial_number'));
    }

    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('category_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }

        //bangladesh time

        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
//echo $dt->format('F j, Y, g:i a');

        date_default_timezone_set("Asia/Dhaka");
        $time_main =$dt->format('g:i a');

        //bangladesh time
//dd($time_main);

            $category_list = new ProductCategory();
            $category_list->cat_name = $request->cat_name;
            if ($request->hasfile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalName();
                $filename = $extension;
                $file->move('public/uploads/', $filename);
                $category_list->icon =  'public/uploads/'.$filename;

            }
            $category_list->status = 'Active';
            $category_list->created_time = $time_main;
            $category_list->save();

return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){

        if (is_null($this->user) || !$this->user->can('category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }



            $category_list = ProductCategory::find($request->id);
            $category_list->cat_name = $request->cat_name;
            if ($request->hasfile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalName();
                $filename = $extension;
                $file->move('public/uploads/', $filename);
                $category_list->icon =  'public/uploads/'.$filename;

            }
            $category_list->status = $request->status;

            $category_list->save();

            return redirect()->back()->with('info','Updated Successfully');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = ProductCategory::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function search(Request $request){

    }


    public function fetch_data_search_category(Request $request){

        $id_for_pass = $request->id_for_pass;

        if($id_for_pass == 1){

            $total_data = ProductCategory::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = ProductCategory::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = ProductCategory::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = ProductCategory::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.product_category.pagiresult',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);

    }



    public function search_on_category_name(Request $request){


     $category_name = $request->category_name;
     $category_status = $request->category_status;

     if($category_status == 0){

        $total_data = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->latest()->limit(10)->get();




     }elseif($category_name == 0){

        $total_data = ProductCategory::where('status',$category_status)->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = ProductCategory::where('status',$category_status)->latest()->limit(10)->get();

     }else{

        $total_data = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->where('status',$category_status)->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->where('status',$category_status)->latest()->limit(10)->get();

     }

     $data = view('backend.product_category.search_on_category_name',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);


    }


    public function search_on_category_status_name_pagination(Request $request){
        $category_name = $request->category_name;
        $category_status = $request->category_status;
        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            //for page one

            if($category_status == 0){

                $total_data = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->latest()->limit(10)->get();
        $minus_one = 0;

            }elseif($category_name == 0){

                $total_data = ProductCategory::where('status',$category_status)->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = ProductCategory::where('status',$category_status)->latest()->limit(10)->get();
        $minus_one = 0;

            }else{


                $total_data = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->where('status',$category_status)->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->where('status',$category_status)->latest()->limit(10)->get();
        $minus_one = 0;

            }

             //end for page one
        }else{
         //for other page
           if($category_status == 0){

            $total_data = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->latest()->skip($minus_one)->take(10)->get();

            }elseif($category_name == 0){

                $total_data = ProductCategory::where('status',$category_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = ProductCategory::where('status',$category_status)->latest()->skip($minus_one)->take(10)->get();

            }else{

                $total_data = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->where('status',$category_status)->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = ProductCategory::where('cat_name','LIKE','%'.$category_name.'%')->where('status',$category_status)->latest()->skip($minus_one)->take(10)->get();

            }

         //end for other page


        }

        $data = view('backend.product_category.search_on_category_status_name_pagination',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
            return response()->json(['options'=>$data]);

    }


    public function multiple_delete_category(Request $request){

           $update_data = ProductCategory::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Inactive']);




            $total_data = ProductCategory::latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = ProductCategory::latest()->limit(10)->get();



         $data = view('backend.product_category.search_on_category_name',compact('product_list','total_serial_number'))->render();
         return response()->json(['options'=>$data]);

    }

    public function multiple_select_active(Request $request){

        $update_data = ProductCategory::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Active']);




        $total_data = ProductCategory::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = ProductCategory::latest()->limit(10)->get();



     $data = view('backend.product_category.search_on_category_name',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);

    }

    public function multiple_delete_category_main(Request $request){

        $update_data = ProductCategory::whereIn('id',$request->numberOfSubChecked)->delete();




        $total_data = ProductCategory::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = ProductCategory::latest()->limit(10)->get();



     $data = view('backend.product_category.search_on_category_name',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);

    }
}
