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
class CientController extends Controller
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

        if (is_null($this->user) || !$this->user->can('client_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = Client::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        $client_list = Client::latest()->limit(10)->get();

        return view('backend.client.index',compact('client_list','total_serial_number'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('client_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Client();
        $category_list->name = $request->name;
        $category_list->slug = $request->slug;
        $category_list->phone = $request->phone;
        $category_list->email = $request->email;
        $category_list->address = $request->address;
        $category_list-> shipping_address = $request->shipping_address;
        $category_list->save();


        $input = $request->all();

        if (array_key_exists("title", $input)){
            $condition_main_title = $input['title'];

            foreach($condition_main_title as $key => $condition_main_title){
                $form= new DelivaryAddress();
                 $form->title=$input['title'][$key];
                $form->address =  $input['d_address'][$key];
                $form->client_slug =  $request->slug;
                $form->save();
           }

        }
        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('client_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }


        $input = $request->all();

        if (array_key_exists("title", $input)){

            $check_slug=Client::where('id',$request->id)->value('slug');
            $check_slug1=DelivaryAddress::where('client_slug',$check_slug)->value('title');


if(empty($check_slug1)){



}else{

    DelivaryAddress::where('client_slug',$check_slug)->delete();
}



            $condition_main_title = $input['title'];

            foreach($condition_main_title as $key => $condition_main_title){
                $form= new DelivaryAddress();
                 $form->title=$input['title'][$key];
                $form->address =  $input['d_address'][$key];
                $form->client_slug =  $request->slug;
                $form->save();
           }

        }



        $category_list = Client::find($request->id);
        $category_list->name = $request->name;
        $category_list->slug = $request->slug;
        $category_list->phone = $request->phone;
        $category_list->email = $request->email;
        $category_list->address = $request->address;
        $category_list-> shipping_address = $request->shipping_address;
        $category_list->save();









        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd($id);
        if (is_null($this->user) || !$this->user->can('client_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Client::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function client_list_pagination_start(Request $request){

        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Client::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Client::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Client::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Client::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.client.client_list_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);
    }



    public function client_list_pagination_start_delete(Request $request){


        $update_data = Client::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Client::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Client::latest()->limit(10)->get();



$data = view('backend.client.client_list_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);


    }


    public function client_list_pagination_start_search(Request $request){

        $search_value = $request->search_value;



        $total_data = Client::Where('name','LIKE','%'.$search_value.'%')
        ->orWhere('slug','LIKE','%'.$search_value.'%')
        ->orWhere('phone','LIKE','%'.$search_value.'%')
        ->orWhere('address','LIKE','%'.$search_value.'%')
       ->orWhere('email','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Client::Where('name','LIKE','%'.$search_value.'%')
                ->orWhere('slug','LIKE','%'.$search_value.'%')
                ->orWhere('phone','LIKE','%'.$search_value.'%')
                ->orWhere('address','LIKE','%'.$search_value.'%')
               ->orWhere('email','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.client.client_list_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);

    }


    public function client_list_pagination_start_search_ajax(Request $request){

        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Client::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
            ->orWhere('phone','LIKE','%'.$search_value.'%')
            ->orWhere('address','LIKE','%'.$search_value.'%')
           ->orWhere('email','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Client::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
            ->orWhere('phone','LIKE','%'.$search_value.'%')
            ->orWhere('address','LIKE','%'.$search_value.'%')
           ->orWhere('email','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Client::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
            ->orWhere('phone','LIKE','%'.$search_value.'%')
            ->orWhere('address','LIKE','%'.$search_value.'%')
           ->orWhere('email','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Client::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')
            ->orWhere('phone','LIKE','%'.$search_value.'%')
            ->orWhere('address','LIKE','%'.$search_value.'%')
           ->orWhere('email','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.client.client_list_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);

    }

    public function client_list_detail(Request $request){

        $main_value = $request->main_value;
        $ajax_client_list = Client::Where('slug',$main_value)->first();

        $data = view('backend.client.client_list_detail',compact('ajax_client_list'))->render();
                return response()->json(['options'=>$data]);
    }

    public function client_list_edit(Request $request){

        $main_value = $request->main_slug_edit;
        $ajax_client_list = Client::Where('slug',$main_value)->first();

        $data = view('backend.client.client_list_edit',compact('ajax_client_list'))->render();
                return response()->json(['options'=>$data]);
    }


    public function address_list_detail(Request $request){

        $main_value = $request->main_value;

        $ajax_client_list1 = DelivaryAddress::Where('client_slug',$main_value)->get();

        $data = view('backend.client.address_list_detail',compact('ajax_client_list1'))->render();
                return response()->json(['options'=>$data]);
    }

    public function saddress_list_detail(Request $request){

        $main_value = $request->main_value;
        $main_value1 = $request->main_value1;
        $ajax_client_list11 = DelivaryAddress::Where('title',$main_value)->Where('client_slug',$main_value1)->first();
        $ajax_client_list12 = Client::Where('slug',$main_value1)->first();
        $data = view('backend.client.saddress_list_detail',compact('main_value','ajax_client_list11','ajax_client_list12'))->render();
                return response()->json(['options'=>$data]);


    }

    public function client_list_view($id){

        $client_list_view = Client::Where('slug',$id)->first();
        $delivery_address_detail = DelivaryAddress::where('client_slug',$client_list_view->slug)->get();


        $total_order = Invoice::where('client_slug',$client_list_view->slug)->count();
        $total_order_pending = Invoice::where('client_slug',$client_list_view->slug)->
        where('delivery_status','Pending')->count();

        $total_order_money = Invoice::where('client_slug',$client_list_view->slug)->sum('grand_total');
        $invoice_detail = InvoiceDetail::where('client_slug',$client_list_view->slug)->latest()->get();
        // dd($delivery_address_detail);


        $january_order = Invoice::where('client_slug',$client_list_view->slug)
        ->whereMonth('created_at', '01')
         ->whereYear('created_at', date('Y'))->count();


         $feb_order = Invoice::where('client_slug',$client_list_view->slug)
        ->whereMonth('created_at', '02')
         ->whereYear('created_at', date('Y'))->count();


         $mar_order = Invoice::where('client_slug',$client_list_view->slug)
        ->whereMonth('created_at', '03')
         ->whereYear('created_at', date('Y'))->count();


         $apr_order = Invoice::where('client_slug',$client_list_view->slug)
        ->whereMonth('created_at', '04')
         ->whereYear('created_at', date('Y'))->count();

         $may_order = Invoice::where('client_slug',$client_list_view->slug)
         ->whereMonth('created_at', '05')
          ->whereYear('created_at', date('Y'))->count();
     $jun_order = Invoice::where('client_slug',$client_list_view->slug)
          ->whereMonth('created_at', '06')
           ->whereYear('created_at', date('Y'))->count();
    $jul_order = Invoice::where('client_slug',$client_list_view->slug)
           ->whereMonth('created_at', '07')
            ->whereYear('created_at', date('Y'))->count();
    $august_order = Invoice::where('client_slug',$client_list_view->slug)
            ->whereMonth('created_at', '08')
             ->whereYear('created_at', date('Y'))->count();
     $septem_order = Invoice::where('client_slug',$client_list_view->slug)
             ->whereMonth('created_at', '09')
              ->whereYear('created_at', date('Y'))->count();
    $oct_order = Invoice::where('client_slug',$client_list_view->slug)
              ->whereMonth('created_at', '10')
               ->whereYear('created_at', date('Y'))->count();

    $nov_order = Invoice::where('client_slug',$client_list_view->slug)
               ->whereMonth('created_at', '11')
                ->whereYear('created_at', date('Y'))->count();

    $dec_order = Invoice::where('client_slug',$client_list_view->slug)
                ->whereMonth('created_at', '12')
                 ->whereYear('created_at', date('Y'))->count();
//dd($septem_order);

     return view('backend.client.view',compact('dec_order','nov_order','oct_order','septem_order','august_order','jul_order','jun_order','may_order','apr_order','mar_order','feb_order','january_order','invoice_detail','total_order_money','total_order_pending','total_order','client_list_view','delivery_address_detail'));
    }


    public function search_order_year_calender_wise($client_slug, $year_slug){

        $year_value = $year_slug;
        $slug_value = $client_slug;

        //dd($slug_value.' '.$year_value);

        $client_list_view = Client::Where('slug',$slug_value)->first();
        $delivery_address_detail = DelivaryAddress::where('client_slug',$client_list_view->slug)->get();


        $total_order = Invoice::where('client_slug',$client_list_view->slug)->whereYear('created_at', $year_value)->count();
        $total_order_pending = Invoice::where('client_slug',$client_list_view->slug)->whereYear('created_at', $year_value)->
        where('delivery_status','Pending')->count();

        $total_order_money = Invoice::where('client_slug',$client_list_view->slug)->whereYear('created_at', $year_value)->sum('grand_total');
        $invoice_detail = InvoiceDetail::where('client_slug',$client_list_view->slug)->whereYear('created_at', $year_value)->latest()->get();
        // dd($delivery_address_detail);



        $january_order = Invoice::where('client_slug',$slug_value)
        ->whereMonth('created_at', '01')
         ->whereYear('created_at', $year_value)->count();


         $feb_order = Invoice::where('client_slug',$slug_value)
        ->whereMonth('created_at', '02')
         ->whereYear('created_at', $year_value)->count();


         $mar_order = Invoice::where('client_slug',$slug_value)
        ->whereMonth('created_at', '03')
        ->whereYear('created_at', $year_value)->count();


         $apr_order = Invoice::where('client_slug',$slug_value)
        ->whereMonth('created_at', '04')
         ->whereYear('created_at', $year_value)->count();

         $may_order = Invoice::where('client_slug',$slug_value)
         ->whereMonth('created_at', '05')
          ->whereYear('created_at', $year_value)->count();

     $jun_order = Invoice::where('client_slug',$slug_value)
          ->whereMonth('created_at', '06')
           ->whereYear('created_at', $year_value)->count();

    $jul_order = Invoice::where('client_slug',$slug_value)
           ->whereMonth('created_at', '07')
            ->whereYear('created_at', $year_value)->count();

    $august_order = Invoice::where('client_slug',$slug_value)
            ->whereMonth('created_at', '08')
             ->whereYear('created_at', $year_value)->count();

     $septem_order = Invoice::where('client_slug',$slug_value)
             ->whereMonth('created_at', '09')
              ->whereYear('created_at', $year_value)->count();

    $oct_order = Invoice::where('client_slug',$slug_value)
              ->whereMonth('created_at', '10')
               ->whereYear('created_at', $year_value)->count();

    $nov_order = Invoice::where('client_slug',$slug_value)
               ->whereMonth('created_at', '11')
                ->whereYear('created_at', $year_value)->count();

    $dec_order = Invoice::where('client_slug',$slug_value)
                ->whereMonth('created_at', '12')
                 ->whereYear('created_at', $year_value)->count();

                 return view('backend.client.search_order_year_calender_wise',compact('year_value','dec_order','nov_order','oct_order','septem_order','august_order','jul_order','jun_order','may_order','apr_order','mar_order','feb_order','january_order','invoice_detail','total_order_money','total_order_pending','total_order','client_list_view','delivery_address_detail'));

    }
}
