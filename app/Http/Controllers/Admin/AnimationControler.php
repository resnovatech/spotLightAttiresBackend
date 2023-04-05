<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Animationcategory;
use App\Models\Animationsubcategory;
use DateTime;
use DateTimezone;
use Illuminate\Support\Str;
class AnimationControler extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }



    public function animation_get_subcategory_category(Request $request){

        $get_all_slug = $request->get_all_slug;

        if(empty($get_all_slug)){
            $check_slug1=Animationsubcategory::whereIn('cat_name',[1])->get();

        }else{




        $check_slug1=Animationsubcategory::whereIn('cat_name',$get_all_slug)->get();
    }
        $data = view('backend.animation_category.animation_get_subcategory_category',compact('check_slug1'))->render();
                return response()->json(['options'=>$data]);


    }



    public function index(){

        if (is_null($this->user) || !$this->user->can('category_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = Animationcategory::latest()->count();

$total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}

        $category_list = Animationcategory::latest()->limit(10)->get();

        $sub_category_list = Animationsubcategory::latest()->get();

        return view('backend.animation_category.index',compact('sub_category_list','category_list','total_serial_number'));
    }



    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('animation_category_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Animationcategory();
        $category_list->name = $request->name;
        $category_list->slug = $request->slug;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        $input = $request->all();

        if (array_key_exists("title", $input)){
            $condition_main_title = $input['title'];

            foreach($condition_main_title as $key => $condition_main_title){
                $form= new Animationsubcategory();
                 $form->name=$input['title'][$key];
                $form->slug = Str::slug($form->name);
                $form->cat_name =  $request->slug;
                $form->save();
           }

        }
        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('animation_category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }


        $input = $request->all();

        if (array_key_exists("title", $input)){

            $check_slug=Animationcategory::where('id',$request->id)->value('slug');
            $check_slug1=Animationsubcategory::where('cat_name',$check_slug)->value('name');


if(empty($check_slug1)){



}else{

    Animationsubcategory::where('cat_name',$check_slug)->delete();
}



            $condition_main_title = $input['title'];

            foreach($condition_main_title as $key => $condition_main_title){
                $form= new Animationsubcategory();
                $form->name=$input['title'][$key];
                $form->slug = Str::slug($form->name);
                $form->cat_name =  $request->slug;
                $form->save();
           }

        }



        $category_list = Animationcategory::find($request->id);
        $category_list->name = $request->name;
        $category_list->slug = $request->slug;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();









        return redirect()->back()->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd($id);
        if (is_null($this->user) || !$this->user->can('animation_category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Animationcategory::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function animation_category_pagination_start(Request $request){

        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Animationcategory::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Animationcategory::latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Animationcategory::latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Animationcategory::latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.animation_category.animation_category_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);
    }


    public function animation_category_pagination_start_delete(Request $request){


        $update_data = Animationcategory::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Animationcategory::latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Animationcategory::latest()->limit(10)->get();



$data = view('backend.animation_category.animation_category_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);

    }


    public function animation_category_pagination_start_search(Request $request){

        $search_value = $request->search_value;



        $total_data = Animationcategory::Where('name','LIKE','%'.$search_value.'%')
        ->orWhere('slug','LIKE','%'.$search_value.'%')->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Animationcategory::Where('name','LIKE','%'.$search_value.'%')
                ->orWhere('slug','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.animation_category.animation_category_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }



    public function animation_category_pagination_start_search_ajax(Request $request){

        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Animationcategory::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Animationcategory::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Animationcategory::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Animationcategory::Where('name','LIKE','%'.$search_value.'%')
            ->orWhere('slug','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.animation_category.animation_category_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }
}
