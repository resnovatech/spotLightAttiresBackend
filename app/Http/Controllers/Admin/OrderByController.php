<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orderby;
class OrderByController extends Controller
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

        if (is_null($this->user) || !$this->user->can('order_by_view')) {
            return redirect('/admin/logout_session');
        }


        $total_data = Orderby::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        //$brand_list = Brand::latest()->limit(10)->get();

        $order_by_infromation = Orderby::latest()->limit(10)->get();

        return view('backend.order_by.index',compact('order_by_infromation','total_serial_number'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('order_by_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Orderby();
        $category_list->company_name = $request->company_name;
        $category_list->percentage_type	 = $request->percentage_type	;
        $category_list->per = $request->per;

        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('order_by_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Orderby::find($request->id);
        $category_list->company_name = $request->company_name;
        $category_list->percentage_type	 = $request->percentage_type	;
        $category_list->per = $request->per;

        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('order_by_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Orderby::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function order_by_pagination_start(Request $request){


        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Orderby::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Orderby::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Orderby::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Orderby::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.order_by.order_by_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);


    }


    public function order_by_pagination_start_delete(Request $request){

        $update_data = Orderby::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Orderby::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Orderby::latest()->limit(10)->get();



$data = view('backend.order_by.order_by_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);
    }



    public function order_by_pagination_start_search(Request $request){


        $search_value = $request->search_value;



        $total_data = Orderby::Where('company_name','LIKE','%'.$search_value.'%')
        ->orWhere('percentage_type','LIKE','%'.$search_value.'%')->orWhere('per','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Orderby::Where('company_name','LIKE','%'.$search_value.'%')
                ->orWhere('percentage_type','LIKE','%'.$search_value.'%')->orWhere('per','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.order_by.order_by_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function order_by_pagination_start_search_ajax(Request $request){


        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Orderby::Where('company_name','LIKE','%'.$search_value.'%')
            ->orWhere('percentage_type','LIKE','%'.$search_value.'%')->orWhere('per','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Orderby::Where('company_name','LIKE','%'.$search_value.'%')
            ->orWhere('percentage_type','LIKE','%'.$search_value.'%')->orWhere('per','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Orderby::Where('company_name','LIKE','%'.$search_value.'%')
            ->orWhere('percentage_type','LIKE','%'.$search_value.'%')->orWhere('per','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Orderby::Where('company_name','LIKE','%'.$search_value.'%')
            ->orWhere('percentage_type','LIKE','%'.$search_value.'%')->orWhere('per','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.order_by.order_by_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function catch_order_by_price(Request $request){

        $grand_total = $request->grand_total;
        $order_by = $request->order_by;

        $catch_per_type = Orderby::Where('company_name','=',$order_by)->value('percentage_type');
        $catch_per = Orderby::Where('company_name','=',$order_by)->value('per');
        if($catch_per_type == 'Percentage'){

            $per_cen_cal = ($grand_total*$catch_per)/100;

            $final_value = $grand_total - $per_cen_cal;


        }else{

            $final_value = $grand_total - $catch_per;

        }

        $data = view('backend.order_by.catch_order_by_price',compact('catch_per_type','final_value','catch_per','grand_total','order_by'))->render();
                return response()->json($data);

    }

}
