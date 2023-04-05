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
use PDF;
use DB;
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
use App\Models\Client;
use App\Models\DelivaryAddress;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\ShippingAddress;
use App\Models\Payment;
use App\Models\Exchangedetail;
use App\Models\Exchange;
class ExchangeController extends Controller
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

        if (is_null($this->user) || !$this->user->can('invoice_update')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $client_list_all = Client::latest()->get();

        $main_product_list_all = MainProduct::latest()->get();

        $invoice =  Invoice::where('id',$id)->first();
        $invoice_detail = InvoiceDetail::where('invoice_id',$id)->get();

        $payment_detail = Payment::where('client_slug',$invoice->client_slug)->where('invoice_id',$id)->get();

        // $ship_address_detail = ShippingAddress::where('invoice_id',$id)->first();


        if($invoice->order_status == 'Web'){
            $ship_address_detail = DelivaryAddress::where('user_id',$invoice->client_slug)->first();
        }else{
            $ship_address_detail = ShippingAddress::where('invoice_id',$id)->first();
        }

        //$client_addresss_detail = Client::where('slug',$invoice->client_slug)->first();


        if($invoice->order_status == 'Web'){
            $client_addresss_detail = Client::where('user_id',$invoice->client_slug)->first();
        }else{
           $client_addresss_detail = Client::where('slug',$invoice->client_slug)->first();
    }

    if($invoice->order_status == 'Web'){
        $delivery_address_detail = DelivaryAddress::where('user_id',$invoice->client_slug)->get();
    }else{
        $delivery_address_detail = DelivaryAddress::where('client_slug',$invoice->client_slug)->get();

}



        return view('backend.exchange.index',compact('delivery_address_detail','main_product_list_all','client_list_all','client_addresss_detail','ship_address_detail','invoice','invoice_detail','payment_detail'));

    }


    public function store (Request $request){

        $input = $request->all();
        $exchange_option_list = $input['exchange_option'];

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));

        $condition_main_product_id = $input['main_product_id'];
        $condition_main_product_id1 = $input['main_product_id'];

         $total_price = 0;
         $total_discount = 0;
         $discount_price = 0;

         $total_price_exchange = 0;
         $total_discount_exchange = 0;
         $discount_price_exchange = 0;


        foreach($condition_main_product_id as $key => $condition_main_product_id){

            if($input['exchange_option'][$key] == 1){
            $total_price1=$input['total_amount'][$key];
            $discount1=$input['unit_discount'][$key];
            $discount_price1=$input['after_discount'][$key];
            $total_price = $total_price+$total_price1;
            $total_discount = $total_discount+$discount1;
            $discount_price = $discount_price+$discount_price1;
            }elseif($input['exchange_option'][$key] == 'new'){

                $total_price12=$input['total_amount'][$key];
                $discount12=$input['unit_discount'][$key];
                $discount_price12=$input['after_discount'][$key];
                $total_price_exchange = $total_price_exchange+$total_price12;
                $total_discount_exchange = $total_discount_exchange+$discount12;
                $discount_price_exchange = $discount_price_exchange+$discount_price12;

            }
}

//dd($total_price);
        //get all the price from new product

    $database_save = new Invoice();
    //$database_save->previous_invoice_id = $request->id;
    $database_save->client_slug = $request->client_slug;
    $database_save->order_id = $request->order_id;
    $database_save->payment_term = $request->payment_term;
    $database_save->pay_date = $request->pay_date;
    $database_save->due_date = $request->due_date;
    $database_save->s_pay_date = $s_pay_date;
    $database_save->s_due_date = $s_due_date;
    $database_save->warehouse = $request->ware_house;
    $database_save->order_from = $request->order_from;
    $database_save->total_net_price = $total_price_exchange;
    $database_save->total_discount = $total_discount_exchange;
    $database_save->total_vat_tax = $request->total_vat_tax;
    $database_save->delivery_charge = $request->total_d_charge;
    $database_save->grand_total = ($total_price_exchange +$request->total_vat_tax + $request->total_d_charge )- $total_discount_exchange;
    $database_save->total_pay = $database_save->grand_total;
    $database_save->cod = 0;
    $database_save->due = 0;
    $database_save->save();


    $invoice_id = $database_save->id;


    $form1= new ShippingAddress();
    $form1->invoice_id =  $invoice_id;
    $form1->client_slug = $request->client_slug;
    $form1->order_id = $request->order_id;
    $form1->name = $request->client_name;
    $form1->address = $request->client_address;

    $form1->save();

    $form2= new Payment();
    $form2->invoice_id =  $invoice_id;
    $form2->client_slug = $request->client_slug;
    $form2->order_id = $request->order_id;
    $form2->grand_total = $database_save->grand_total;
    $form2->total_pay = $database_save->grand_total;
    $form2->cod = 0;
    $form2->status = 1;
    $form2->due = 0;
    $form2->save();

        //end get all the price for new product


        //get all the price for exchange product


        $database_savee = new Exchange();
    $database_savee->previous_invoice_id = $request->id;
    $database_savee->client_slug = $request->client_slug;
    $database_savee->order_id = $request->order_id;
    $database_savee->payment_term = $request->payment_term;
    $database_savee->pay_date = $request->pay_date;
    $database_savee->due_date = $request->due_date;
    $database_savee->s_pay_date = $s_pay_date;
    $database_savee->s_due_date = $s_due_date;
    $database_savee->warehouse = $request->ware_house;
    $database_savee->order_from = $request->order_from;
    $database_savee->total_net_price = $total_price;
    $database_savee->total_discount = $total_discount;
    $database_savee->total_vat_tax = $request->total_vat_tax;
    $database_savee->delivery_charge = $request->total_d_charge;
    $database_savee->grand_total = ($total_price +$request->total_vat_tax + $request->total_d_charge )- $total_discount;
    $database_savee->total_pay = $database_save->grand_total;
    $database_savee->cod = 0;
    $database_savee->due = 0;
    $database_savee->save();


    $exchange_id = $database_savee->id;

        //get all the price for exchange product


        foreach($condition_main_product_id1 as $key => $condition_main_product_id1){

            if($input['exchange_option'][$key] == 'new'){

                $form= new InvoiceDetail();
                $form->product_id=$input['main_product_id'][$key];
            $form->size=$input['main_product_size'][$key];
            $form->color=$input['main_product_color'][$key];
            $form->qty=$input['p_quantity'][$key];
            $form->price=$input['unit_price'][$key];
            $form->total_price=$input['total_amount'][$key];
            $form->discount=$input['unit_discount'][$key];
            $form->discount_price=$input['after_discount'][$key];
            $form->invoice_id =  $invoice_id;
            $form->client_slug = $request->client_slug;
            $form->order_id =  $request->order_id;
            $form->save();


             //first table quantity update



    $catch_previous_value = ProductQuantity::where('product_name',$input['main_product_id'][$key])
    ->value('quantity');
$get_result = $catch_previous_value - $input['p_quantity'][$key];

$catch_previous_value1 = ProductQuantity::where('product_name',$input['main_product_id'][$key])
->update([
'quantity' => $get_result
]);
//end first table quantity ypdate

//second table quantity update

$catch_previous_value11 = ProductColor::where('product_name',$input['main_product_id'][$key])
->where('size',$input['main_product_size'][$key])
->where('color',$input['main_product_color'][$key])
->value('quantity');
$get_result11 = $catch_previous_value11 - $input['p_quantity'][$key];

$catch_previous_value12 = ProductColor::where('product_name',$input['main_product_id'][$key])
->where('size',$input['main_product_size'][$key])
->where('color',$input['main_product_color'][$key])
->update([
'quantity' => $get_result11
]);
//end second table quantity update


            }elseif($input['exchange_option'][$key] == 1){
                $form= new Exchangedetail();
                $form->product_id=$input['main_product_id'][$key];
                $form->size=$input['main_product_size'][$key];
                $form->color=$input['main_product_color'][$key];
                $form->qty=$input['p_quantity'][$key];
                $form->price=$input['unit_price'][$key];
                $form->total_price=$input['total_amount'][$key];
                $form->discount=$input['unit_discount'][$key];
                $form->discount_price=$input['after_discount'][$key];
                $form->invoice_id =  $exchange_id;
                $form->client_slug = $request->client_slug;
                $form->order_id =  $request->order_id;
                $form->save();



                 //first table quantity update



    $catch_previous_value = ProductQuantity::where('product_name',$input['main_product_id'][$key])
    ->value('quantity');
$get_result = $catch_previous_value + $input['p_quantity'][$key];

$catch_previous_value1 = ProductQuantity::where('product_name',$input['main_product_id'][$key])
->update([
'quantity' => $get_result
]);
//end first table quantity ypdate

//second table quantity update

$catch_previous_value11 = ProductColor::where('product_name',$input['main_product_id'][$key])
->where('size',$input['main_product_size'][$key])
->where('color',$input['main_product_color'][$key])
->value('quantity');
$get_result11 = $catch_previous_value11 + $input['p_quantity'][$key];

$catch_previous_value12 = ProductColor::where('product_name',$input['main_product_id'][$key])
->where('size',$input['main_product_size'][$key])
->where('color',$input['main_product_color'][$key])
->update([
'quantity' => $get_result11
]);
//end second table quantity update

            }



        }
        // $secondaryArray = array();
        // $secondaryArray1 = array();

// foreach ($condition_main_product_id as $key => $value) {
//     if (strpos($value, "new") !== false) {
//         $secondaryArray[] = $value;
//         unset($condition_main_product_id[$key]);
//     }elseif(strpos($value, "1") !== false){
//         $secondaryArray1[] = $value;
//         unset($condition_main_product_id[$key]);
//     }
// }

return redirect('admin/invoice_list_view/'.$invoice_id)->with('success','Created Successfully');

    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('exchnage_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Exchange::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        return redirect('admin/invoice_list')->with('error','Deleted Successfully');
    }


    public function edit($id){

        if (is_null($this->user) || !$this->user->can('exchnage_update')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $client_list_all = Client::latest()->get();

        $main_product_list_all = MainProduct::latest()->get();

        $invoice =  Exchange::where('id',$id)->first();
        $invoice_detail = Exchangedetail::where('invoice_id',$id)->get();



        // $ship_address_detail = ShippingAddress::where('invoice_id',$id)->first();


        if($invoice->order_status == 'Web'){
            $ship_address_detail = DelivaryAddress::where('user_id',$invoice->client_slug)->first();
        }else{
            $ship_address_detail = ShippingAddress::where('invoice_id',$id)->first();
        }

        //$client_addresss_detail = Client::where('slug',$invoice->client_slug)->first();


        if($invoice->order_status == 'Web'){
            $client_addresss_detail = Client::where('user_id',$invoice->client_slug)->first();
        }else{
           $client_addresss_detail = Client::where('slug',$invoice->client_slug)->first();
    }

    if($invoice->order_status == 'Web'){
        $delivery_address_detail = DelivaryAddress::where('user_id',$invoice->client_slug)->get();
    }else{
        $delivery_address_detail = DelivaryAddress::where('client_slug',$invoice->client_slug)->get();

}



        return view('backend.exchange.edit',compact('delivery_address_detail','main_product_list_all','client_list_all','client_addresss_detail','ship_address_detail','invoice','invoice_detail'));

    }



    public function update(Request $request){


        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));

       // dd($input);


    $database_save = Exchange::find($request->id);
    $database_save->client_slug = $request->client_slug;
    $database_save->order_id = $request->order_id;
    $database_save->payment_term = $request->payment_term;
    $database_save->pay_date = $request->pay_date;
    $database_save->due_date = $request->due_date;
    $database_save->s_pay_date = $s_pay_date;
    $database_save->s_due_date = $s_due_date;
    $database_save->warehouse = $request->ware_house;
    $database_save->order_from = $request->order_from;
    $database_save->total_net_price = $request->total_net_price_f;
    $database_save->total_discount = $request->total_net_discountprice_f;
    $database_save->total_vat_tax = $request->total_vat_tax;
    $database_save->delivery_charge = $request->total_d_charge;
    $database_save->grand_total = $request->total_grand_price_f;
    $database_save->total_pay = $database_save->grand_total;
    $database_save->cod = 0;
    $database_save->due = 0;
    $database_save->save();

    $invoice_id = $database_save->id;
    $condition_main_product_id = $input['main_product_id'];
    Exchangedetail::where('invoice_id',$invoice_id)->delete();
        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Exchangedetail();
            $form->product_id=$input['main_product_id'][$key];
            $form->size=$input['main_product_size'][$key];
            $form->color=$input['main_product_color'][$key];
            $form->qty=$input['p_quantity'][$key];
            $form->price=$input['unit_price'][$key];
            $form->total_price=$input['total_amount'][$key];
            $form->discount=$input['unit_discount'][$key];
            $form->discount_price=$input['after_discount'][$key];
            $form->invoice_id =  $invoice_id;
            $form->client_slug = $request->client_slug;
            $form->order_id =  $request->order_id;
            $form->save();

            //first table quantity update

if(($input['main_product_id'][$key] == $input['p_p_id'][$key]) && ($input['p_quantity'][$key] == $input['d_quantity'][$key])){


}else{



    $catch_previous_value = ProductQuantity::where('product_name',$input['main_product_id'][$key])
                                       ->value('quantity');
                $get_result = $catch_previous_value + $input['p_quantity'][$key];

                $catch_previous_value1 = ProductQuantity::where('product_name',$input['main_product_id'][$key])
                ->update([
                    'quantity' => $get_result
                 ]);
            //end first table quantity ypdate

            //second table quantity update

            $catch_previous_value11 = ProductColor::where('product_name',$input['main_product_id'][$key])
            ->where('size',$input['main_product_size'][$key])
            ->where('color',$input['main_product_color'][$key])
            ->value('quantity');
$get_result11 = $catch_previous_value11 + $input['p_quantity'][$key];

$catch_previous_value12 = ProductColor::where('product_name',$input['main_product_id'][$key])
->where('size',$input['main_product_size'][$key])
            ->where('color',$input['main_product_color'][$key])
->update([
'quantity' => $get_result11
]);
}
            //end second table quantity update
       }

       return redirect('admin/exchange_list_view/'.$invoice_id)->with('success','Updated Successfully');


    }



    public function view($id){

        $invoice =  Exchange::where('id',$id)->first();
        $invoice_detail = Exchangedetail::where('invoice_id',$id)->get();



        if($invoice->order_status == 'Web'){
            $ship_address_detail = DelivaryAddress::where('user_id',$invoice->client_slug)->first();
        }else{
            $ship_address_detail = ShippingAddress::where('invoice_id',$id)->first();
        }


        if($invoice->order_status == 'Web'){
            $client_addresss_detail = Client::where('user_id',$invoice->client_slug)->first();
        }else{
        $client_addresss_detail = Client::where('slug',$invoice->client_slug)->first();
    }


        return view('backend.exchange.view',compact('client_addresss_detail','ship_address_detail','invoice','invoice_detail'));

    }


    public function print($id){

        $invoice =  Exchange::where('id',$id)->first();
        $invoice_detail = Exchangedetail::where('invoice_id',$id)->get();



        if($invoice->order_status == 'Web'){
            $ship_address_detail = DelivaryAddress::where('user_id',$invoice->client_slug)->first();
        }else{
            $ship_address_detail = ShippingAddress::where('invoice_id',$id)->first();
        }


        if($invoice->order_status == 'Web'){
            $client_addresss_detail = Client::where('user_id',$invoice->client_slug)->first();
        }else{
        $client_addresss_detail = Client::where('slug',$invoice->client_slug)->first();
    }


        //return view('backend.invoice.print',compact('client_addresss_detail','ship_address_detail','invoice','invoice_detail','payment_detail'));

        $file_Name_Custome = 'exchange_product';

//dd($file_Name_Custome );
    $pdf=PDF::loadView('backend.exchange.print',['invoice'=>$invoice,'ship_address_detail'=>$ship_address_detail,'invoice_detail'=>$invoice_detail,'client_addresss_detail'=>$client_addresss_detail],[],['format' => [75, 100]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');

    }

    public function exchange_list_pagination_start(Request $request){




        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Exchange::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Exchange::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Exchange::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Exchange::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.invoice.exchange_list_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);



}



public function exchange_list_pagination_start_delete(Request $request){


    $update_data = Exchange::whereIn('id',$request->numberOfSubChecked)->delete();




$total_dataex = Exchange::latest()->count();

$total_serial_number1= $total_dataex/10;

if (is_float($total_serial_number1)){
 $total_serial_numberex = ceil($total_serial_number1);

}else{
 $total_serial_numberex = $total_serial_number1;
}

//dd($total_serial_number);

 $product_list = Exchange::latest()->limit(10)->get();



$data = view('backend.invoice.exchange_list_pagination_start_delete',compact('product_list','total_serial_numberex'))->render();
return response()->json(['options'=>$data]);

}
}
