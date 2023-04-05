<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
class ExpenseCategoryController extends Controller
{
      public function index()
    {
        
        $users = ExpenseCategory::all();
        
        return view('backend.expense_category.index', compact('users'));
    }
    
    
     public function store(Request $request)
    {
       

        // Create New User
        $admins = new ExpenseCategory();
        $admins->name = $request->name;
      $admins->save();

      


        return redirect()->route('admin.expense_category')->with('success','Created successfully!');
    }
    
     public function update(Request $request)
    {
       

        // Create New User
        $admins =ExpenseCategory::find($request->id);
        $admins->name = $request->name;

      $admins->save();

      


        return redirect()->route('admin.expense_category')->with('success','Updated successfully!');
    }
    
     public function delete($id)
    {
        
        $admins = ExpenseCategory::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
