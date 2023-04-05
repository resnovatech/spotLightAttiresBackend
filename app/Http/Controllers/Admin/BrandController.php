<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Brand;
class BrandController extends Controller
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

        if (is_null($this->user) || !$this->user->can('brand_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = Brand::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        $brand_list = Brand::latest()->limit(10)->get();

        return view('backend.brand.index',compact('brand_list','total_serial_number'));
    }

    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('brand_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Brand();
        $category_list->name = $request->name;
        $category_list->slug = $request->slug;
        $category_list->status = $request->status;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('brand_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Brand::find($request->id);
        $category_list->name = $request->name;
        $category_list->slug = $request->slug;
        $category_list->status = $request->status;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('brand_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Brand::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function brand_pagi_ajax(Request $request){

        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Brand::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Brand::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Brand::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Brand::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.brand.brand_pagi_ajax',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);
    }


    public function brand_search_ajax(Request $request){


        $search_value = $request->search_value;



        $total_data = Brand::Where('name','LIKE','%'.$search_value.'%')
        ->orWhere('slug','LIKE','%'.$search_value.'%')
       ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Brand::Where('name','LIKE','%'.$search_value.'%')
                ->orWhere('slug','LIKE','%'.$search_value.'%')
               ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.brand.brand_search_ajax',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }

    public function brand_search_ajax_part2(Request $request){


        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Brand::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
           ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Brand::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
           ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Brand::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
           ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Brand::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
           ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.brand.brand_search_ajax_part2',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function brand_ajax_multiple_delete(Request $request){


        $update_data = Brand::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Brand::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Brand::latest()->limit(10)->get();



$data = view('backend.brand.brand_ajax_multiple_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);


    }


    public function brand_ajax_multiple_select(Request $request){

        $update_data = Brand::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Inactive']);




        $total_data = Brand::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = Brand::latest()->limit(10)->get();



     $data = view('backend.brand.brand_ajax_multiple_delete',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);


    }

    public function brand_ajax_multiple_select_active(Request $request){


        $update_data = Brand::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Active']);




        $total_data = Brand::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = Brand::latest()->limit(10)->get();



     $data = view('backend.brand.brand_ajax_multiple_delete',compact('product_list','total_serial_number'))->render();
     return response()->json(['options'=>$data]);


    }
}
