<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MainProduct;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Expense;
class DashboardController extends Controller
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
if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            // abort(403, 'Sorry !! You are Unauthorized to view dashboard !');

            return redirect('/admin/logout_session');
        }

        $product_list = MainProduct::count();
        $client_list = Client::count();
        $order_list = Invoice::count();
        
        $total_expense = Expense::sum('expense_amount');
$total_income = Invoice::sum('grand_total');
    	return view('backend.index',compact('product_list','client_list','order_list','total_expense','total_income'));
    }
}
