<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Messagesection;
class ContactController extends Controller
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


        $total_data = Contact::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        //$brand_list = Brand::latest()->limit(10)->get();

        $contact_us_infromation = Contact::latest()->limit(10)->get();

        return view('backend.contact.index',compact('contact_us_infromation','total_serial_number'));
    }


    public function message_list_index(){

        if (is_null($this->user) || !$this->user->can('contact_view')) {
            return redirect('/admin/logout_session');
        }


        $total_data = Messagesection::latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        //$brand_list = Brand::latest()->limit(10)->get();

        $contact_us_infromation = Messagesection::latest()->limit(10)->get();

        return view('backend.message_list.index',compact('contact_us_infromation','total_serial_number'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('contact_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Contact();
        $category_list->title = $request->title;
        $category_list->icon = $request->icon;
        $category_list->des = $request->des;

        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('contact_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Contact::find($request->id);
        $category_list->title = $request->title;
        $category_list->icon = $request->icon;
        $category_list->des = $request->des;

        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('contact_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Contact::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

    public function contact_us_pagination_start(Request $request){


        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Contact::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Contact::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Contact::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Contact::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.contact.contact_us_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);


    }


    public function message_list_pagination_start(Request $request){


        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Messagesection::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Messagesection::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Messagesection::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Messagesection::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.message_list.contact_us_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);


    }


    public function contact_us_pagination_start_delete(Request $request){

        $update_data = Contact::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Contact::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Contact::latest()->limit(10)->get();



$data = view('backend.contact.contact_us_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);
    }


    public function message_list_pagination_start_delete(Request $request){

        $update_data = Messagesection::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Messagesection::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Messagesection::latest()->limit(10)->get();



$data = view('backend.message_list.contact_us_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);
    }


    public function contact_us_pagination_start_search(Request $request){


        $search_value = $request->search_value;



        $total_data = Contact::Where('title','LIKE','%'.$search_value.'%')
        ->orWhere('des','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Contact::Where('title','LIKE','%'.$search_value.'%')
                ->orWhere('des','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.contact.contact_us_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function message_list_pagination_start_search(Request $request){


        $search_value = $request->search_value;



        $total_data = Messagesection::Where('question','LIKE','%'.$search_value.'%')
        ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Messagesection::Where('question','LIKE','%'.$search_value.'%')
                ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.message_list.contact_us_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function contact_us_pagination_start_search_ajax(Request $request){


        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Contact::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('des','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Contact::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('des','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Contact::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('des','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Contact::Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('des','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.contact.contact_us_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }



    public function message_list_pagination_start_search_ajax(Request $request){


        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Messagesection::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Messagesection::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Messagesection::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Messagesection::Where('question','LIKE','%'.$search_value.'%')
            ->orWhere('ans','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.message_list.contact_us_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }
}
