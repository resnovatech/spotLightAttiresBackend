<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\DelivaryAddress;
use DB;
use App\Models\ShippingPrice;
class ShippingPriceController extends Controller
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

        if (is_null($this->user) || !$this->user->can('ship_price_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = ShippingPrice::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        $client_list = ShippingPrice::latest()->limit(10)->get();

        return view('backend.ship_price.index',compact('client_list','total_serial_number'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('ship_price_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new ShippingPrice();
        $category_list->title = $request->title;
        $category_list->price = $request->price;
        $category_list->save();



        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('ship_price_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }


        $category_list =ShippingPrice::find($request->id);
        $category_list->title = $request->title;
        $category_list->price = $request->price;
        $category_list->save();
        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd($id);
        if (is_null($this->user) || !$this->user->can('ship_price_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = ShippingPrice::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function shipping_price_list_pagination_start(Request $request){

        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =ShippingPrice::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = ShippingPrice::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = ShippingPrice::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = ShippingPrice::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.ship_price.shipping_price_list_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);
    }



    public function shipping_price_list_pagination_start_delete(Request $request){


        $update_data = ShippingPrice::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = ShippingPrice::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = ShippingPrice::latest()->limit(10)->get();



$data = view('backend.ship_price.shipping_price_list_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);


    }


    public function shipping_price_list_pagination_start_search(Request $request){

        $search_value = $request->search_value;



        $total_data = ShippingPrice::Where('title','LIKE','%'.$search_value.'%')
        ->orWhere('price','LIKE','%'.$search_value.'%')
        ->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = ShippingPrice::Where('title','LIKE','%'.$search_value.'%')
                ->orWhere('price','LIKE','%'.$search_value.'%')
                ->latest()->limit(10)->get();

                $data = view('backend.ship_price.shipping_price_list_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);

    }


    public function shipping_price_list_pagination_start_search_ajax(Request $request){

        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =ShippingPrice::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('price','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = ShippingPrice::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('price','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = ShippingPrice::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('price','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = ShippingPrice::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('price','LIKE','%'.$search_value.'%')
            >latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.ship_price.shipping_price_list_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);

    }

}
