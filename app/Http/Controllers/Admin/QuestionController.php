<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Askquestion;
class QuestionController extends Controller
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

        if (is_null($this->user) || !$this->user->can('contact_view')) {
            return redirect('/admin/logout_session');
        }


        $total_data = Askquestion::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        //$brand_list = Brand::latest()->limit(10)->get();

        $askquestion_us_infromation = Askquestion::latest()->limit(10)->get();

        return view('backend.askquestion.index',compact('askquestion_us_infromation','total_serial_number'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('contact_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Askquestion();
        $category_list->question = $request->question;
        $category_list->ans = $request->ans;
       $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('contact_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Askquestion::find($request->id);
        $category_list->question = $request->question;
        $category_list->ans = $request->ans;
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('contact_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Askquestion::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function ask_question_pagination_start(Request $request){


        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Askquestion::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Askquestion::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Askquestion::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Askquestion::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.askquestion.ask_question_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);


    }


    public function ask_question_pagination_start_delete(Request $request){

        $update_data = Askquestion::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Askquestion::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Askquestion::latest()->limit(10)->get();



$data = view('backend.askquestion.ask_question_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);
    }


    public function ask_question_pagination_start_search(Request $request){


        $search_value = $request->search_value;



        $total_data = Askquestion::Where('question','LIKE','%'.$search_value.'%')
        ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Askquestion::Where('question','LIKE','%'.$search_value.'%')
                ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.askquestion.ask_question_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function ask_question_pagination_start_search_ajax(Request $request){


        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Askquestion::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Askquestion::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Askquestion::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Askquestion::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.askquestion.ask_question_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }
}
