<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Attribute;
use App\Models\AttributeDetail;
class AttributeController extends Controller
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

        if (is_null($this->user) || !$this->user->can('attribute_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = Attribute::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        $attribute_list = Attribute::latest()->limit(10)->get();

        return view('backend.attribute.index',compact('attribute_list','total_serial_number'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('attribute_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any attribute !');
        }

            $category_list = new Attribute();
            $category_list->a_type = $request->a_type;
            $category_list->a_name = $request->a_name;
            $category_list->a_slug = $request->a_slug;
            $category_list->status = $request->status;
            $category_list->save();


            return redirect()->back()->with('success','Created Successfully');
    }



    public function update(Request $request){

        if (is_null($this->user) || !$this->user->can('attribute_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any attribute !');
        }
        $category_list = Attribute::find($request->id);
        $category_list->a_type = $request->a_type;
        $category_list->a_name = $request->a_name;
        $category_list->a_slug = $request->a_slug;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');
}


public function delete($id)
{
    //dd(1);
    if (is_null($this->user) || !$this->user->can('attribute_delete')) {
        abort(403, 'Sorry !! You are Unauthorized to view any attribute !');
    }
    $admins = Attribute::find($id);
    if (!is_null($admins)) {
        $admins->delete();
    }


    return back()->with('error','Deleted successfully!');
}


public function attribute_pagi_ajax(Request $request){

    $id_for_pass = $request->id_for_pass;


    if($id_for_pass == 1){

        $total_data =Attribute::latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = Attribute::latest()->limit(10)->get();
        $minus_one = 0;
    }else{
        $total_data = Attribute::latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $minus_one = ($id_for_pass - 1)*10;

        $product_list = Attribute::latest()->skip($minus_one)->take(10)->get();
    }

    $data = view('backend.attribute.attribute_pagi_ajax',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
            return response()->json(['options'=>$data]);
}


public function attri_pagi_ajax_multiple_select(Request $request){

    $update_data = Attribute::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Inactive']);




     $total_data = Attribute::latest()->count();

     $total_serial_number1= $total_data/10;

     if (is_float($total_serial_number1)){
         $total_serial_number = ceil($total_serial_number1);

     }else{
         $total_serial_number = $total_serial_number1;
     }

      //dd($total_serial_number);

         $product_list = Attribute::latest()->limit(10)->get();



  $data = view('backend.attribute.attri_pagi_ajax_multiple_delete',compact('product_list','total_serial_number'))->render();
  return response()->json(['options'=>$data]);

}

public function attri_pagi_ajax_multiple_select_active(Request $request){
    $update_data = Attribute::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Active']);




    $total_data = Attribute::latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

     //dd($total_serial_number);

        $product_list = Attribute::latest()->limit(10)->get();



 $data = view('backend.attribute.attri_pagi_ajax_multiple_delete',compact('product_list','total_serial_number'))->render();
 return response()->json(['options'=>$data]);

}

public function attri_pagi_ajax_multiple_delete(Request $request){

 $update_data = Attribute::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Attribute::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Attribute::latest()->limit(10)->get();



$data = view('backend.attribute.attri_pagi_ajax_multiple_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);

}


public function edit(Request $request){

    $all_attribute = Attribute::where('id',$request->data_id)->first();
    $data = view('backend.attribute.edit',compact('all_attribute'))->render();
    return response()->json($data);

}


public function attribute_search_ajax(Request $request){

    $search_value = $request->search_value;



    $total_data = Attribute::where('a_type','LIKE','%'.$search_value.'%')
    ->orWhere('a_name','LIKE','%'.$search_value.'%')
    ->orWhere('a_slug','LIKE','%'.$search_value.'%')
   ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = Attribute::where('a_type','LIKE','%'.$search_value.'%')
            ->orWhere('a_name','LIKE','%'.$search_value.'%')
            ->orWhere('a_slug','LIKE','%'.$search_value.'%')
           ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

            $data = view('backend.attribute.attribute_search_ajax',compact('search_value','product_list','total_serial_number'))->render();
            return response()->json(['options'=>$data]);


}

public function attribute_search_ajax_part2(Request $request){


    $search_value = $request->search_value;

    $id_for_pass = $request->id_for_pass;



    if($id_for_pass == 1){

        $total_data =Attribute::where('a_type','LIKE','%'.$search_value.'%')
        ->orWhere('a_name','LIKE','%'.$search_value.'%')
        ->orWhere('a_slug','LIKE','%'.$search_value.'%')
       ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = Attribute::where('a_type','LIKE','%'.$search_value.'%')
        ->orWhere('a_name','LIKE','%'.$search_value.'%')
        ->orWhere('a_slug','LIKE','%'.$search_value.'%')
       ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
        $minus_one = 0;
    }else{
        $total_data = Attribute::where('a_type','LIKE','%'.$search_value.'%')
        ->orWhere('a_name','LIKE','%'.$search_value.'%')
        ->orWhere('a_slug','LIKE','%'.$search_value.'%')
       ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $minus_one = ($id_for_pass - 1)*10;

        $product_list = Attribute::where('a_type','LIKE','%'.$search_value.'%')
        ->orWhere('a_name','LIKE','%'.$search_value.'%')
        ->orWhere('a_slug','LIKE','%'.$search_value.'%')
       ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
    }
    $data = view('backend.attribute.attribute_search_ajax_part2',compact('search_value','product_list','total_serial_number'))->render();
            return response()->json(['options'=>$data]);
}
}
