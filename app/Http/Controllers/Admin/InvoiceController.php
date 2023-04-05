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
use App\Models\Orderby;
use App\Models\Onlineexpense;
class InvoiceController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function create(){

        if (is_null($this->user) || !$this->user->can('invoice_add')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }

        $client_list_all = Client::latest()->get();

        $main_product_list_all = MainProduct::latest()->get();

        $order_by_list = Orderby::latest()->get();

        return view('backend.invoice.create',compact('order_by_list','client_list_all','main_product_list_all'));

    }

    public function index(){

        if (is_null($this->user) || !$this->user->can('invoice_view')) {
            //abort(403, 'Sorry !! You are Unauthorized to view Product List !');

             return redirect('/admin/logout_session');
        }


        $total_data = Invoice::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        $total_datar = DB::table('invoices')
->where('delivery_status','Ready To Ship')->latest()->count();

$total_datad = DB::table('invoices')
->where('delivery_status','Delivered')->latest()->count();

$total_datac = DB::table('invoices')
->where('delivery_status','Cancelled')->latest()->count();


$total_data_return = DB::table('invoicereturns')->latest()->count();
$total_data_exchanged = DB::table('exchanges')->latest()->count();
        $invoice_list = Invoice::latest()->limit(10)->get();
        // $invoice_list_ready_to_ship = Invoice::where('delivery_status','Ready To Ship')->latest()->get();
        // $invoice_list_read = Invoice::where('delivery_status','Ready To Ship')->latest()->get();
        return view('backend.invoice.index',compact('total_data_exchanged','total_data_return','total_datac','total_datad','total_datar','total_data','invoice_list','total_serial_number'));


    }

    public function invoice_for_product_price(Request $request){

        $main_product_price = MainProduct::where('id',$request->main_product_id)->value('selling_price');

        $data = $main_product_price;
    return response()->json($data);
    }


    public function invoice_for_product_price_discount(Request $request){

        $main_product_price = MainProduct::where('id',$request->main_product_id)->value('discount');

        $data = $main_product_price;
    return response()->json($data);
    }

    public function invoice_for_product_color(Request $request){
        $main_product_color = Imageupload::where('product_id',$request->main_product_id)->get();

        $data = view('backend.invoice.invoice_for_product_color',compact('main_product_color'))->render();
        return response()->json($data);


    }

    public function invoice_for_product_size(Request $request){

        $main_product_size = AssaignSize::where('product_name',$request->main_product_id)->get();

        $data = view('backend.invoice.invoice_for_product_size',compact('main_product_size'))->render();
        return response()->json($data);

    }


    public function invoice_for_product_price_from_color(Request $request){

        $main_product_price = ProductColor::where('product_name',$request->main_product_id)
        ->where('color',$request->main_product_color)
        ->where('size',$request->main_product_size)
        ->value('price');

        $data = $main_product_price;
    return response()->json($data);
    }


    public function invoice_for_product_price_discount_from_color(Request $request){

        $main_product_price = ProductColor::where('product_name',$request->main_product_id)
        ->where('color',$request->main_product_color)
        ->where('size',$request->main_product_size)
        ->value('discount');

        $data = $main_product_price;
    return response()->json($data);
    }

    public function store (Request $request){

        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));

        //dd($input);


    $database_save = new Invoice();
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
    $database_save->cod = $request->cash_on_delivery_id;
    $database_save->due = $request->total_final_due;
    $database_save->save();


    $invoice_id = $database_save->id;

    $form3= new Onlineexpense();
    $form3->invoice_id =  $invoice_id;
    $form3->per_name = $request->per_name;
    $form3->per_type = $request->per_type;
    $form3->per_amount = $request->order_by_amount;
    $form3->after_per_amount = $request->after_order_by_amount;
    $form3->save();


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
    $form2->grand_total = $request->total_grand_price_f;
    $form2->total_pay = $request->total_payble_price;
    $form2->cod = $request->cash_on_delivery_id;
    $form2->status = 1;
    $form2->due = $request->total_final_due;
    $form2->save();




    $condition_main_product_id = $input['main_product_id'];

        foreach($condition_main_product_id as $key => $condition_main_product_id){
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
       }

       return redirect('admin/invoice_list_view/'.$invoice_id)->with('success','Created Successfully');
    }


    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('invoice_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Invoice::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        return redirect('admin/invoice_list')->with('error','Deleted Successfully');
    }


    public function invoice_list_pagination_start(Request $request){

        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Invoice::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::latest()->limit(10)->get();
            $product_list_count = Invoice::latest()->limit(10)->count();
            $minus_one = 0;
        }else{
            $total_data = Invoice::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::latest()->skip($minus_one)->take(10)->get();
            $product_list_count = Invoice::latest()->skip($minus_one)->take(10)->count();
        }

        $data = view('backend.invoice.invoice_list_pagination_start',compact('product_list_count','total_data','minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);
    }



    public function invoice_list_pagination_start_search(Request $request){


        $search_value = $request->search_value;



        $total_data = Invoice::Where('client_slug','LIKE','%'.$search_value.'%')
        ->orWhere('order_id','LIKE','%'.$search_value.'%')
       ->orWhere('pay_date','LIKE','%'.$search_value.'%')
       ->orWhere('due_date','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Invoice::Where('client_slug','LIKE','%'.$search_value.'%')
                ->orWhere('order_id','LIKE','%'.$search_value.'%')
               ->orWhere('pay_date','LIKE','%'.$search_value.'%')
               ->orWhere('due_date','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.invoice.invoice_list_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function invoice_list_pagination_start_search_ajax(Request $request){


        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Invoice::Where('client_slug','LIKE','%'.$search_value.'%')
            ->orWhere('order_id','LIKE','%'.$search_value.'%')
           ->orWhere('pay_date','LIKE','%'.$search_value.'%')
           ->orWhere('due_date','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::Where('client_slug','LIKE','%'.$search_value.'%')
            ->orWhere('order_id','LIKE','%'.$search_value.'%')
           ->orWhere('pay_date','LIKE','%'.$search_value.'%')
           ->orWhere('due_date','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::Where('client_slug','LIKE','%'.$search_value.'%')
            ->orWhere('order_id','LIKE','%'.$search_value.'%')
           ->orWhere('pay_date','LIKE','%'.$search_value.'%')
           ->orWhere('due_date','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::Where('client_slug','LIKE','%'.$search_value.'%')
            ->orWhere('order_id','LIKE','%'.$search_value.'%')
           ->orWhere('pay_date','LIKE','%'.$search_value.'%')
           ->orWhere('due_date','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.invoice.invoice_list_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);
    }


    public function invoice_list_pagination_start_delete(Request $request){


        $update_data = Invoice::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Invoice::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Invoice::latest()->limit(10)->get();



$data = view('backend.invoice.invoice_list_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);

    }


    public function view($id){

        $invoice =  Invoice::where('id',$id)->first();
        $invoice_detail = InvoiceDetail::where('invoice_id',$id)->get();

        $payment_detail = Payment::where('client_slug',$invoice->client_slug)->where('invoice_id',$id)->get();

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
// dd($ship_address_detail);

        return view('backend.invoice.view',compact('client_addresss_detail','ship_address_detail','invoice','invoice_detail','payment_detail'));

    }


    public function edit($id){

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
        $order_by_list = Orderby::latest()->get();

        $order_by_list_first = Onlineexpense::where('invoice_id',$id)->first();

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



        return view('backend.invoice.edit',compact('order_by_list_first','order_by_list','delivery_address_detail','main_product_list_all','client_list_all','client_addresss_detail','ship_address_detail','invoice','invoice_detail','payment_detail'));

    }


    public function print($id){

        $invoice =  Invoice::where('id',$id)->first();
        $invoice_detail = InvoiceDetail::where('invoice_id',$id)->get();

        $payment_detail = Payment::where('client_slug',$invoice->client_slug)->where('invoice_id',$id)->get();

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

        $file_Name_Custome = 'Invoice_main';


    $pdf=PDF::loadView('backend.invoice.print',['payment_detail'=>$payment_detail,'invoice'=>$invoice,'ship_address_detail'=>$ship_address_detail,'invoice_detail'=>$invoice_detail,'client_addresss_detail'=>$client_addresss_detail],[],['format' => [75, 100]]);
return $pdf->stream($file_Name_Custome.''.'.pdf');

    }

    public function invoice_payment_store(Request $request){


        $new_pay = new Payment();
        $new_pay->invoice_id = $request->invoice_id;
        $new_pay->client_slug = $request->client_slug;
        $new_pay->order_id = $request->order_id;
        $new_pay->grand_total = $request->amount;
        $new_pay->due = $request->previous_due - $request->amount;
        $new_pay->pay_date = $request->pay_date;
        $new_pay->pay_method = $request->pay_method;
        $new_pay->note = $request->note;
        $new_pay->save();


        Invoice::where('id', $request->invoice_id)
       ->update([
           'due' => $request->previous_due - $request->amount,
           'total_pay' => $request->total_pay + $request->amount,
        ]);

    //     InvoiceDetail::where('invoice_id', $request->invoice_id)
    //    ->update([
    //        'due' => $request->previous_due - $request->amount
    //     ]);


        return redirect()->back()->with('success','Created Successfully');
    }



    public function update(Request $request){


        $input = $request->all();

        $s_pay_date = date("Y-m-d", strtotime($request->pay_date));
        $s_due_date = date("Y-m-d", strtotime($request->due_date));

        //dd($input);


    $database_save = Invoice::find($request->id);
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
    $database_save->cod = $request->cash_on_delivery_id;
    $database_save->due = $request->total_final_due;
    $database_save->save();


    $invoice_id = $database_save->id;
    ShippingAddress::where('invoice_id',$invoice_id)->delete();
    $form1= new ShippingAddress();
    $form1->invoice_id =  $invoice_id;
    $form1->client_slug = $request->client_slug;
    $form1->order_id = $request->order_id;
    $form1->name = $request->client_name;
    $form1->address = $request->client_address;
    $form1->save();

    Onlineexpense::where('invoice_id',$invoice_id)->delete();
    $form3= new Onlineexpense();
    $form3->invoice_id =  $invoice_id;
    $form3->per_type = $request->per_type;
    $form3->per_name = $request->per_name;
    $form3->per_amount = $request->order_by_amount;
    $form3->after_per_amount = $request->after_order_by_amount;
    $form3->save();

    Payment::where('invoice_id',$invoice_id)->where('status',1)->delete();
    $form2= new Payment();
    $form2->invoice_id =  $invoice_id;
    $form2->client_slug = $request->client_slug;
    $form2->order_id = $request->order_id;
    $form2->grand_total = $request->total_grand_price_f;
    $form2->total_pay = $request->total_payble_price;
    $form2->cod = $request->cash_on_delivery_id;
    $form2->due = $request->total_final_due;
    $form2->status = 1;
    $form2->save();




    $condition_main_product_id = $input['main_product_id'];
    InvoiceDetail::where('invoice_id',$invoice_id)->delete();
        foreach($condition_main_product_id as $key => $condition_main_product_id){
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

if(($input['main_product_id'][$key] == $input['p_p_id'][$key]) && ($input['p_quantity'][$key] == $input['d_quantity'][$key])){


}else{



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
}
            //end second table quantity update
       }

       return redirect('admin/invoice_list_view/'.$invoice_id)->with('success','Updated Successfully');


    }

    public function update_delivery_status(Request $request){


        $catch_previous_value1 = Invoice::where('id',$request->id)
                ->update([
                    'delivery_status' => $request->delivery_status
                 ]);


                 return redirect()->back()->with('info','delivery_status Updated Successfully');


    }


    public function invoice_list_pagination_start_readyToShip(Request $request){




            $id_for_pass = $request->id_for_pass;


            if($id_for_pass == 1){

                $total_data =Invoice::where('delivery_status','Ready To Ship')->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $product_list = Invoice::where('delivery_status','Ready To Ship')->latest()->limit(10)->get();
                $minus_one = 0;
            }else{
                $total_data = Invoice::where('delivery_status','Ready To Ship')->latest()->count();
                $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }
                $minus_one = ($id_for_pass - 1)*10;

                $product_list = Invoice::where('delivery_status','Ready To Ship')->latest()->skip($minus_one)->take(10)->get();
            }

            $data = view('backend.invoice.invoice_list_pagination_start_readyToShip',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                    return response()->json(['options'=>$data]);



    }


    public function invoice_list_pagination_start_delivered(Request $request){




        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Invoice::where('delivery_status','Delivered')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Invoice::where('delivery_status','Delivered')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Invoice::where('delivery_status','Delivered')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Invoice::where('delivery_status','Delivered')->latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.invoice.invoice_list_pagination_start_delivered',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);



}



public function invoice_list_pagination_start_cancelled(Request $request){




    $id_for_pass = $request->id_for_pass;


    if($id_for_pass == 1){

        $total_data =Invoice::where('delivery_status','Cancelled')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $product_list = Invoice::where('delivery_status','Cancelled')->latest()->limit(10)->get();
        $minus_one = 0;
    }else{
        $total_data = Invoice::where('delivery_status','Cancelled')->latest()->count();
        $total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}
        $minus_one = ($id_for_pass - 1)*10;

        $product_list = Invoice::where('delivery_status','Cancelled')->latest()->skip($minus_one)->take(10)->get();
    }

    $data = view('backend.invoice.invoice_list_pagination_start_cancelled',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
            return response()->json(['options'=>$data]);



}


public function invoice_filter_from_list(Request $request){

$order_id =  $request->order_id;
$customer_name = $request->customer_name;
$delivery_status= $request->delivery_status;
$start = $request->start;
$end = $request->end;

$start_convert = date("Y-m-d", strtotime($request->start));
$end_convert = date("Y-m-d", strtotime($request->end));

//dd($end);

if(empty($order_id) && empty($customer_name) && empty($delivery_status) && empty($start)){


    $end_convert = date("Y-m-d", strtotime($request->end));


    $total_data = Invoice::whereDate('created_at',$end_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::whereDate('created_at',$end_convert)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($customer_name) && empty($delivery_status) && empty($end)){


    $start_convert = date("Y-m-d", strtotime($request->start));


    $total_data = Invoice::whereDate('created_at',$start_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::whereDate('created_at',$start_convert)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($customer_name) && empty($start) && empty($end)){

    $total_data = Invoice::where('delivery_status',$delivery_status)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('delivery_status',$delivery_status)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($delivery_status) && empty($start) && empty($end)){


    $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();


}elseif(empty($customer_name) && empty($delivery_status) && empty($start) && empty($end)){

    $total_data = Invoice::where('order_id',$order_id)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)->latest()->limit(10)->get();


}elseif(empty($order_id) && empty($customer_name) && empty($delivery_status)){
    $start_convert = date("Y-m-d", strtotime($request->start));
    $end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::whereDate('s_pay_date', '>=', $start_convert)
    ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::whereDate('s_pay_date', '>=', $start_convert)
    ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();


 }elseif(empty($order_id) && empty($customer_name) && empty($start)){
    $end_convert = date("Y-m-d", strtotime($request->end));



    $total_data = Invoice::where('delivery_status',$delivery_status)->whereDate('created_at',$end_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('delivery_status',$delivery_status)->whereDate('created_at',$end_convert)->latest()->limit(10)->get();


}elseif(empty($order_id) && empty($delivery_status) && empty($start)){
    $end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->whereDate('created_at',$end_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->whereDate('created_at',$end_convert)->latest()->limit(10)->get();

}elseif(empty($customer_name) && empty($delivery_status) && empty($start)){
    $end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::where('order_id',$order_id)->whereDate('created_at',$end_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)->whereDate('created_at',$end_convert)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($customer_name) && empty($end)){
    $start_convert = date("Y-m-d", strtotime($request->start));

    $total_data = Invoice::where('delivery_status',$delivery_status)
    ->whereDate('created_at',$start_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('delivery_status',$delivery_status)
    ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($delivery_status) && empty($end)){
    $start_convert = date("Y-m-d", strtotime($request->start));


    $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$start_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();

}elseif(empty($customer_name) && empty($delivery_status) && empty($end)){

    $start_convert = date("Y-m-d", strtotime($request->start));

    $total_data = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$start_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();


}elseif(empty($start) && empty($end)){

    $total_data = Invoice::where('order_id',$order_id)
    ->where('delivery_status',$delivery_status)
    ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)
    ->where('delivery_status',$delivery_status)
    ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();

}elseif(empty($delivery_status) && empty($end)){
    $start_convert = date("Y-m-d", strtotime($request->start));

    $total_data = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$start_convert)
    ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$start_convert)
    ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();


}elseif(empty($customer_name) && empty($end)){
    $start_convert = date("Y-m-d", strtotime($request->start));

    $total_data = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$start_convert)
    ->where('delivery_status',$delivery_status)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$start_convert)
    ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();


}elseif(empty($order_id) && empty($end)){
    $start_convert = date("Y-m-d", strtotime($request->start));

    $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$start_convert)
    ->where('delivery_status',$delivery_status)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$start_convert)
    ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();


}elseif(empty($delivery_status) && empty($start)){
    $end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$end_convert)
    ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$end_convert)
    ->where('client_slug', 'LIKE', "%$customer_name%")->latest()->limit(10)->get();

}elseif(empty($customer_name) && empty($start)){
    $end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$end_convert)
    ->where('delivery_status',$delivery_status)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('order_id',$order_id)
    ->whereDate('created_at',$end_convert)
    ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($start)){
    $end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$end_convert)
    ->where('delivery_status',$delivery_status)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('created_at',$end_convert)
    ->where('delivery_status',$delivery_status)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($customer_name)){
     $start_convert = date("Y-m-d", strtotime($request->start));
     $end_convert = date("Y-m-d", strtotime($request->end));

     $total_data = Invoice::where('delivery_status',$delivery_status)
     ->whereDate('s_pay_date', '>=', $start_convert)
    ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('delivery_status',$delivery_status)
    ->whereDate('s_pay_date', '>=', $start_convert)
    ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();

}elseif(empty($order_id) && empty($delivery_status)){
     $start_convert = date("Y-m-d", strtotime($request->start));
     $end_convert = date("Y-m-d", strtotime($request->end));


     $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
     ->whereDate('s_pay_date', '>=', $start_convert)
    ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();

    $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }

    $invoice_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
    ->whereDate('s_pay_date', '>=', $start_convert)
    ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();

}elseif(empty($customer_name) && empty($delivery_status)){

   $start_convert = date("Y-m-d", strtotime($request->start));
   $end_convert = date("Y-m-d", strtotime($request->end));


   $total_data = Invoice::where('order_id',$order_id)
   ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();

  $total_serial_number1= $total_data/10;

  if (is_float($total_serial_number1)){
      $total_serial_number = ceil($total_serial_number1);

  }else{
      $total_serial_number = $total_serial_number1;
  }

  $invoice_list = Invoice::where('order_id',$order_id)
  ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();

}elseif(empty($order_id)){

   $start_convert = date("Y-m-d", strtotime($request->start));
   $end_convert = date("Y-m-d", strtotime($request->end));

   $total_data = Invoice::where('client_slug', 'LIKE', "%$customer_name%")
   ->where('delivery_status',$delivery_status)
   ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();

  $total_serial_number1= $total_data/10;

  if (is_float($total_serial_number1)){
      $total_serial_number = ceil($total_serial_number1);

  }else{
      $total_serial_number = $total_serial_number1;
  }

  $invoice_list = Invoice::where('client_slug', 'LIKE', "%$customer_name%")->
  where('delivery_status',$delivery_status)
  ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();


}elseif(empty($customer_name)){
   $start_convert = date("Y-m-d", strtotime($request->start));
   $end_convert = date("Y-m-d", strtotime($request->end));

   $total_data = Invoice::where('order_id',$order_id)
   ->where('delivery_status',$delivery_status)
   ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();

  $total_serial_number1= $total_data/10;

  if (is_float($total_serial_number1)){
      $total_serial_number = ceil($total_serial_number1);

  }else{
      $total_serial_number = $total_serial_number1;
  }

  $invoice_list = Invoice::where('order_id',$order_id)->
  where('delivery_status',$delivery_status)
  ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();


}elseif(empty($delivery_status)){
     $start_convert = date("Y-m-d", strtotime($request->start));
     $end_convert = date("Y-m-d", strtotime($request->end));

     $total_data = Invoice::where('order_id',$order_id)
   ->where('client_slug', 'LIKE', "%$customer_name%")
   ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->count();

  $total_serial_number1= $total_data/10;

  if (is_float($total_serial_number1)){
      $total_serial_number = ceil($total_serial_number1);

  }else{
      $total_serial_number = $total_serial_number1;
  }

  $invoice_list = Invoice::where('order_id',$order_id)->
  where('client_slug', 'LIKE', "%$customer_name%")
  ->whereDate('s_pay_date', '>=', $start_convert)
  ->whereDate('s_pay_date', '<=', $end_convert)->latest()->limit(10)->get();

}elseif(empty($start)){
    //$start_convert = date("Y-m-d", strtotime($request->start));
    $end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::where('order_id',$order_id)
    ->where('client_slug', 'LIKE', "%$customer_name%")
    ->where('delivery_status',$delivery_status)
    ->whereDate('created_at',$end_convert)->latest()->count();

   $total_serial_number1= $total_data/10;

   if (is_float($total_serial_number1)){
       $total_serial_number = ceil($total_serial_number1);

   }else{
       $total_serial_number = $total_serial_number1;
   }

   $invoice_list = Invoice::where('order_id',$order_id)->
   where('client_slug', 'LIKE', "%$customer_name%")
   ->where('delivery_status',$delivery_status)
   ->whereDate('created_at',$end_convert)->latest()->limit(10)->get();


}elseif(empty($end)){
    $start_convert = date("Y-m-d", strtotime($request->start));
    //$end_convert = date("Y-m-d", strtotime($request->end));

    $total_data = Invoice::where('order_id',$order_id)
    ->where('client_slug', 'LIKE', "%$customer_name%")
    ->where('delivery_status',$delivery_status)
    ->whereDate('created_at',$start_convert)->latest()->count();

   $total_serial_number1= $total_data/10;

   if (is_float($total_serial_number1)){
       $total_serial_number = ceil($total_serial_number1);

   }else{
       $total_serial_number = $total_serial_number1;
   }

   $invoice_list = Invoice::where('order_id',$order_id)->
   where('client_slug', 'LIKE', "%$customer_name%")
   ->where('delivery_status',$delivery_status)
   ->whereDate('created_at',$start_convert)->latest()->limit(10)->get();
}


return view('backend.invoice.invoice_filter_from_list',compact('end','start','delivery_status','customer_name','order_id','total_serial_number','invoice_list'));

}


}
