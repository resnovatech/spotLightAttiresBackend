<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\MainProduct;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use App\Models\InvoiceDetail;
class ExpenseController extends Controller
{
    
       public function revenue()
    {
        
        $users = Expense::all();
        $users1 = ExpenseCategory::all();
        $buying_price_list = MainProduct::all();
        
        $total_expense = Expense::sum('expense_amount');
        
        $total_cloth_expense = MainProduct::sum('buying_price');
        
        
        $total_expense_last_day = Expense::where('created_at','>=',Carbon::now()->subdays(1))->sum('expense_amount');
        
        $total_cloth_expense_last_day = MainProduct::where('created_at','>=',Carbon::now()->subdays(1))->sum('buying_price');
        
        
        $total_expense_last_seven_day = Expense::where('created_at','>=',Carbon::now()->subdays(7))->sum('expense_amount');
        
        $total_cloth_expense_last_seven_day = MainProduct::where('created_at','>=',Carbon::now()->subdays(7))->sum('buying_price');
        
        
        
         $total_expense_last_thirty_day = Expense::where('created_at','>=',Carbon::now()->subdays(30))->sum('expense_amount');
        
        $total_cloth_expense_last_thirty_day = MainProduct::where('created_at','>=',Carbon::now()->subdays(30))->sum('buying_price');
        
        
         $invoice_detial_list = InvoiceDetail::latest()->get();
        $invoice_detial_list_last_day = InvoiceDetail::where('created_at','>=',Carbon::now()->subdays(1))->latest()->get();
        $invoice_detial_list_last_seven_day = InvoiceDetail::where('created_at','>=',Carbon::now()->subdays(7))->latest()->get();
        $invoice_detial_list_last_thirty_day = InvoiceDetail::where('created_at','>=',Carbon::now()->subdays(30))->latest()->get();
        
        $total_income = 0 ;
        $total_income_last_day = 0 ;
        $total_income_last_seven_day = 0 ;
        $total_income_last_thirty_day = 0 ;
        
        foreach($invoice_detial_list as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income = $total_income + $final_result;
            
        }
        
         foreach($invoice_detial_list_last_day as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result1 = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income_last_day = $total_income_last_day + $final_result1;
            
        }
        
        
         foreach($invoice_detial_list_last_seven_day as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result2 = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income_last_seven_day = $total_income_last_seven_day + $final_result2;
            
        }
        
         foreach($invoice_detial_list_last_thirty_day as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result3 = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income_last_thirty_day = $total_income_last_thirty_day + $final_result3;
            
        }
        
        
        return view('backend.expense.revenue', compact('invoice_detial_list','total_income','total_income_last_day','total_income_last_seven_day','total_income_last_thirty_day','total_cloth_expense_last_thirty_day','total_expense_last_thirty_day','total_cloth_expense_last_seven_day','total_expense_last_seven_day','total_cloth_expense_last_day','total_expense_last_day','users','users1','buying_price_list','total_expense','total_cloth_expense'));
    }
    
    
      public function index()
    {
        
        $users = Expense::all();
        $users1 = ExpenseCategory::all();
        $buying_price_list = MainProduct::all();
        
        $total_expense = Expense::sum('expense_amount');
        
        $total_cloth_expense = MainProduct::sum('buying_price');
        
        
        $total_expense_last_day = Expense::where('created_at','>=',Carbon::now()->subdays(1))->sum('expense_amount');
        
        $total_cloth_expense_last_day = MainProduct::where('created_at','>=',Carbon::now()->subdays(1))->sum('buying_price');
        
        
        $total_expense_last_seven_day = Expense::where('created_at','>=',Carbon::now()->subdays(7))->sum('expense_amount');
        
        $total_cloth_expense_last_seven_day = MainProduct::where('created_at','>=',Carbon::now()->subdays(7))->sum('buying_price');
        
        
        
         $total_expense_last_thirty_day = Expense::where('created_at','>=',Carbon::now()->subdays(30))->sum('expense_amount');
        
        $total_cloth_expense_last_thirty_day = MainProduct::where('created_at','>=',Carbon::now()->subdays(30))->sum('buying_price');
        
        
        return view('backend.expense.index', compact('total_cloth_expense_last_thirty_day','total_expense_last_thirty_day','total_cloth_expense_last_seven_day','total_expense_last_seven_day','total_cloth_expense_last_day','total_expense_last_day','users','users1','buying_price_list','total_expense','total_cloth_expense'));
    }
    
    public function income(){
        
        $invoice_detial_list = InvoiceDetail::latest()->get();
        $invoice_detial_list_last_day = InvoiceDetail::where('created_at','>=',Carbon::now()->subdays(1))->latest()->get();
        $invoice_detial_list_last_seven_day = InvoiceDetail::where('created_at','>=',Carbon::now()->subdays(7))->latest()->get();
        $invoice_detial_list_last_thirty_day = InvoiceDetail::where('created_at','>=',Carbon::now()->subdays(30))->latest()->get();
        
        $total_income = 0 ;
        $total_income_last_day = 0 ;
        $total_income_last_seven_day = 0 ;
        $total_income_last_thirty_day = 0 ;
        
        foreach($invoice_detial_list as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income = $total_income + $final_result;
            
        }
        
         foreach($invoice_detial_list_last_day as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result1 = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income_last_day = $total_income_last_day + $final_result1;
            
        }
        
        
         foreach($invoice_detial_list_last_seven_day as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result2 = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income_last_seven_day = $total_income_last_seven_day + $final_result2;
            
        }
        
         foreach($invoice_detial_list_last_thirty_day as $all_invoice_detial_list){
            
            $buying_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('buying_price');
            $selling_price = MainProduct::where('id',$all_invoice_detial_list->product_id)->value('selling_price');
            
            $final_result3 = ($all_invoice_detial_list->qty*$all_invoice_detial_list->price) - (($buying_price*$all_invoice_detial_list->qty)+$all_invoice_detial_list->discount);
            
            $total_income_last_thirty_day = $total_income_last_thirty_day + $final_result3;
            
        }
        
    return view('backend.expense.income', compact('invoice_detial_list','total_income','total_income_last_day','total_income_last_seven_day','total_income_last_thirty_day'));
        
    }
    
    
     public function store(Request $request)
    {
       

        // Create New User
        $admins = new Expense();
        $admins->expense_type = $request->expense_type;
     $admins->expense_amount = $request->expense_amount;
     $admins->expense_category = $request->expense_category;
      $admins->save();

      


        return redirect()->route('admin.expense')->with('success','Created successfully!');
    }
    
     public function update(Request $request)
    {
       

        // Create New User
        $admins =Expense::find($request->id);
          $admins->expense_category = $request->expense_category;
        $admins->expense_type = $request->expense_type;
     $admins->expense_amount = $request->expense_amount;
      $admins->save();

      


        return redirect()->route('admin.expense')->with('success','Updated successfully!');
    }
    
     public function delete($id)
    {
        
        $admins = Expense::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
