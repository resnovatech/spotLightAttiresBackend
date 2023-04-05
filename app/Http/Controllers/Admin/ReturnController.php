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
use App\Models\Invoicereturn;
use App\Models\Invoicereturndetail;
class ReturnController extends Controller
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

        if (is_null($this->user) || !$this->user->can('invoice_return_view')) {
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



        return view('backend.invoice_return.index',compact('delivery_address_detail','main_product_list_all','client_list_all','client_addresss_detail','ship_address_detail','invoice','invoice_detail','payment_detail'));

    }


    public function store (Request $request){

        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));

        //dd($input);


    $database_save = new Invoicereturn();
    $database_save->previous_invoice_id = $request->id;
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
    $database_save->total_pay = $request->total_payble_price;
    $database_save->cod = 0;
    $database_save->due = $request->total_final_due;
    $database_save->save();


    $invoice_id = $database_save->id;


    $condition_main_product_id = $input['main_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Invoicereturndetail();
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

       return redirect('admin/invoice_return_view/'.$invoice_id)->with('success','Created Successfully');
    }




    public function view($id){

        $invoice =  Invoicereturn::where('id',$id)->first();
        $invoice_detail = Invoicereturndetail::where('invoice_id',$id)->get();



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


        return view('backend.invoice_return.view',compact('client_addresss_detail','ship_address_detail','invoice','invoice_detail'));

    }



    public function edit($id){

        if (is_null($this->user) || !$this->user->can('invoice_return_update')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $client_list_all = Client::latest()->get();

        $main_product_list_all = MainProduct::latest()->get();

        $invoice =  Invoicereturn::where('id',$id)->first();
        $invoice_detail = Invoicereturndetail::where('invoice_id',$id)->get();



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



        return view('backend.invoice_return.edit1',compact('delivery_address_detail','main_product_list_all','client_list_all','client_addresss_detail','ship_address_detail','invoice','invoice_detail'));

    }


    public function print($id){

        $invoice =  Invoicereturn::where('id',$id)->first();
        $invoice_detail = Invoicereturndetail::where('invoice_id',$id)->get();



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

        $file_Name_Custome = 'invoice_product_return';

//dd($file_Name_Custome );
    $pdf=PDF::loadView('backend.invoice_return.edit',['invoice'=>$invoice,'ship_address_detail'=>$ship_address_detail,'invoice_detail'=>$invoice_detail,'client_addresss_detail'=>$client_addresss_detail],[],['format' => [75, 100]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');

    }


    public function update(Request $request){


        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));

       // dd($input);


    $database_save = Invoicereturn::find($request->id);
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
    $database_save->total_pay = $request->total_payble_price;
    $database_save->cod = 0;
    $database_save->due = $request->total_final_due;
    $database_save->save();

    $invoice_id = $database_save->id;
    $condition_main_product_id = $input['main_product_id'];
    Invoicereturndetail::where('invoice_id',$invoice_id)->delete();
        foreach($condition_main_product_id as $key => $condition_main_product_id){
            $form= new Invoicereturndetail();
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

       return redirect('admin/invoice_return_view/'.$invoice_id)->with('success','Updated Successfully');


    }



    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('invoice_return_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Invoicereturn::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        return redirect('admin/invoice_list')->with('error','Deleted Successfully');
    }


    public function invoice_return_pagination_start(Request $request){




        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Invoicereturn::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoicereturn::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoicereturn::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoicereturn::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.invoice.invoicereturn_list_pagination',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);



}



public function invoice_return_pagination_start_delete(Request $request){


    $update_data = Invoicereturn::whereIn('id',$request->numberOfSubChecked)->delete();




$total_datart = Invoicereturn::latest()->count();

$total_serial_number1= $total_datart/10;

if (is_float($total_serial_number1)){
 $total_serial_numberrt = ceil($total_serial_number1);

}else{
 $total_serial_numberrt = $total_serial_number1;
}

//dd($total_serial_number);

 $product_list = Invoicereturn::latest()->limit(10)->get();



$data = view('backend.invoice.invoice_return_pagination_start_delete',compact('product_list','total_serial_numberrt'))->render();
return response()->json(['options'=>$data]);

}
}
