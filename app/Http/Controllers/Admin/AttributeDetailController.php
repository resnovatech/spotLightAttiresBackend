<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\Attribute;
use App\Models\AttributeDetail;
class AttributeDetailController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index($id){

        if (is_null($this->user) || !$this->user->can('attribute_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = AttributeDetail::where('main_id_att',$id)->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        $attribute_list = AttributeDetail::where('main_id_att',$id)->latest()->limit(10)->get();

        return view('backend.attribute_detail.index',compact('id','attribute_list','total_serial_number'));
    }


    public function store(Request $request){

        if (is_null($this->user) || !$this->user->can('attribute_detail_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any attribute detail !');
        }

            $category_list = new AttributeDetail();
            $category_list->main_id_att	 = $request->main_id_att;
            $category_list->name_list = $request->name_list;
            $category_list->name_type = $request->name_type;
            $category_list->name_code = $request->name_code;
            $category_list->slug = $request->slug;
            $category_list->status = $request->status;
            $category_list->save();


            return redirect()->back()->with('success','Created Successfully');
    }


    public function update(Request $request){

        if (is_null($this->user) || !$this->user->can('attribute_detail_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any attribute detail !');
        }

            $category_list = AttributeDetail::find($request->id);
            //$category_list->main_id_att	 = $request->main_id_att;
            $category_list->name_list = $request->name_list;
            $category_list->name_type = $request->name_type;
            $category_list->name_code = $request->name_code;
            $category_list->slug = $request->slug;
            $category_list->status = $request->status;
            $category_list->save();


            return redirect()->back()->with('success','Updated Successfully');
    }


    public function delete($id)
{
    //dd(1);
    if (is_null($this->user) || !$this->user->can('attribute_detail_delete')) {
        abort(403, 'Sorry !! You are Unauthorized to delete any attribute detail!');
    }
    $admins = AttributeDetail::find($id);
    if (!is_null($admins)) {
        $admins->delete();
    }


    return back()->with('error','Deleted successfully!');
}


public function attribute_detail_pagi_ajax(Request $request){

    $id_for_pass = $request->id_for_pass;

    $pass_data_to_ajax = $request->pass_data_to_ajax;


    if($id_for_pass == 1){

        $total_data =AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->limit(10)->get();
        $minus_one = 0;
    }else{
        $total_data = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $minus_one = ($id_for_pass - 1)*10;

        $product_list = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->skip($minus_one)->take(10)->get();
    }

    $data = view('backend.attribute_detail.attribute_detail_pagi_ajax',compact('pass_data_to_ajax','minus_one','product_list','total_serial_number','id_for_pass'))->render();
            return response()->json(['options'=>$data]);
}


public function attri_detail_pagi_ajax_multiple_select(Request $request){
    $pass_data_to_ajax = $request->pass_data_to_ajax;
    $update_data = AttributeDetail::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Inactive']);




     $total_data = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->count();

     $total_serial_number1= $total_data/10;

     if (is_float($total_serial_number1)){
         $total_serial_number = ceil($total_serial_number1);

     }else{
         $total_serial_number = $total_serial_number1;
     }

      //dd($total_serial_number);

         $product_list = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->limit(10)->get();



  $data = view('backend.attribute_detail.attri_detail_pagi_ajax_multiple_delete',compact('pass_data_to_ajax','product_list','total_serial_number'))->render();
  return response()->json(['options'=>$data]);

}

public function attri_detail_pagi_ajax_multiple_select_active(Request $request){

    $pass_data_to_ajax = $request->pass_data_to_ajax;
    $update_data = AttributeDetail::whereIn('id',$request->numberOfSubChecked)->update(['status' => 'Active']);




     $total_data = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->count();

     $total_serial_number1= $total_data/10;

     if (is_float($total_serial_number1)){
         $total_serial_number = ceil($total_serial_number1);

     }else{
         $total_serial_number = $total_serial_number1;
     }

      //dd($total_serial_number);

         $product_list = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->limit(10)->get();



  $data = view('backend.attribute_detail.attri_detail_pagi_ajax_multiple_delete',compact('pass_data_to_ajax','product_list','total_serial_number'))->render();
  return response()->json(['options'=>$data]);


}

public function attri_detail_pagi_ajax_multiple_delete(Request $request){
    $pass_data_to_ajax = $request->pass_data_to_ajax;
 $update_data = AttributeDetail::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = AttributeDetail::where('main_id_att',$pass_data_to_ajax)->latest()->limit(10)->get();



$data = view('backend.attribute_detail.attri_detail_pagi_ajax_multiple_delete',compact('pass_data_to_ajax','product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);

}


public function attribute_detail_search_ajax(Request $request){

    $search_value = $request->search_value;
    $pass_data_to_ajax = $request->pass_data_to_ajax;


    $total_data = AttributeDetail::where('main_id_att','LIKE','%'.$search_value.'%')
    ->orWhere('name_list','LIKE','%'.$search_value.'%')
    ->orWhere('name_type','LIKE','%'.$search_value.'%')
    ->orWhere('name_code','LIKE','%'.$search_value.'%')
    ->orWhere('slug','LIKE','%'.$search_value.'%')

    ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

         //dd($total_serial_number);

            $product_list = AttributeDetail::where('main_id_att','LIKE','%'.$search_value.'%')
            ->orWhere('name_list','LIKE','%'.$search_value.'%')
            ->orWhere('name_type','LIKE','%'.$search_value.'%')
            ->orWhere('name_code','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')

            ->orWhere('status','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

            $data = view('backend.attribute_detail.attribute_detail_search_ajax',compact('search_value','pass_data_to_ajax','product_list','total_serial_number'))->render();
            return response()->json(['options'=>$data]);

}


public function attribute_detail_search_ajax_part2(Request $request){

    $search_value = $request->search_value;
    $pass_data_to_ajax = $request->pass_data_to_ajax;
    $id_for_pass = $request->id_for_pass;



    if($id_for_pass == 1){

        $total_data =AttributeDetail::where('main_id_att','LIKE','%'.$search_value.'%')
        ->orWhere('name_list','LIKE','%'.$search_value.'%')
        ->orWhere('name_type','LIKE','%'.$search_value.'%')
        ->orWhere('name_code','LIKE','%'.$search_value.'%')
        ->orWhere('slug','LIKE','%'.$search_value.'%')

        ->orWhere('status','LIKE','%'.$search_value.'%')->where('main_id_att',$pass_data_to_ajax)->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = AttributeDetail::where('main_id_att','LIKE','%'.$search_value.'%')
        ->orWhere('name_list','LIKE','%'.$search_value.'%')
        ->orWhere('name_type','LIKE','%'.$search_value.'%')
        ->orWhere('name_code','LIKE','%'.$search_value.'%')
        ->orWhere('slug','LIKE','%'.$search_value.'%')

        ->orWhere('status','LIKE','%'.$search_value.'%')->where('main_id_att',$pass_data_to_ajax)->latest()->limit(10)->get();
        $minus_one = 0;
    }else{
        $total_data = AttributeDetail::where('main_id_att','LIKE','%'.$search_value.'%')
        ->orWhere('name_list','LIKE','%'.$search_value.'%')
        ->orWhere('name_type','LIKE','%'.$search_value.'%')
        ->orWhere('name_code','LIKE','%'.$search_value.'%')
        ->orWhere('slug','LIKE','%'.$search_value.'%')

        ->orWhere('status','LIKE','%'.$search_value.'%')->where('main_id_att',$pass_data_to_ajax)->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $minus_one = ($id_for_pass - 1)*10;

        $product_list = AttributeDetail::where('main_id_att','LIKE','%'.$search_value.'%')
        ->orWhere('name_list','LIKE','%'.$search_value.'%')
        ->orWhere('name_type','LIKE','%'.$search_value.'%')
        ->orWhere('name_code','LIKE','%'.$search_value.'%')
        ->orWhere('slug','LIKE','%'.$search_value.'%')

        ->orWhere('status','LIKE','%'.$search_value.'%')->where('main_id_att',$pass_data_to_ajax)->latest()->skip($minus_one)->take(10)->get();
    }

    $data = view('backend.attribute_detail.attribute_detail_search_ajax_part2',compact('pass_data_to_ajax','minus_one','product_list','total_serial_number','id_for_pass'))->render();
            return response()->json(['options'=>$data]);

}



}
