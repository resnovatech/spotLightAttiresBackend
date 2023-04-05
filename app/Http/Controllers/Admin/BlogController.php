<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogcategory;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
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

        if (is_null($this->user) || !$this->user->can('blog_view')) {
            return redirect('/admin/logout_session');
        }

        $total_data = Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->count();

        $total_serial_number1= $total_data/10;

        if (is_float($total_serial_number1)){
            $total_serial_number = ceil($total_serial_number1);

        }else{
            $total_serial_number = $total_serial_number1;
        }

        $product_list = Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->limit(10)->get();

        $category_list = Blogcategory::latest()->get();

        return view('backend.blog.index',compact('category_list','product_list','total_serial_number'));
    }


    public function create(){

        if (is_null($this->user) || !$this->user->can('blog_add')) {
            return redirect('/admin/logout_session');
        }



        $category_list = Blogcategory::latest()->get();

        return view('backend.blog.create',compact('category_list'));
    }


    public function edit($id){

        if (is_null($this->user) || !$this->user->can('blog_update')) {
            return redirect('/admin/logout_session');
        }



        $product_list = Blog::where('id',$id)->first();

        $category_list = Blogcategory::latest()->get();

        return view('backend.blog.edit',compact('category_list','product_list'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('blog_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }
// dd(11);

        $category_list = new Blog();
        $category_list->title = $request->title;
        $category_list->cat_name = $request->cat_name;
        $category_list->des = $request->des;
        $category_list->date = date('d.m.Y');
        $category_list->written_by = Auth::guard('admin')->user()->name;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
        $category_list->save();


        return redirect()->back()->with('success','Created Successfully');

    }


    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('blog_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = Blog::find($request->id);
        $category_list->title = $request->title;
        $category_list->cat_name = $request->cat_name;
        $category_list->des = $request->des;
        $category_list->date = date('d.m.Y');
        $category_list->written_by = Auth::guard('admin')->user()->name;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $category_list->image =  'public/uploads/'.$filename;

        }
       $category_list->save();


        return redirect()->route('blog')->with('info','Updated Successfully');

    }

    public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('blog_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Blog::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }



    public function blog_pagination_start(Request $request){


        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.blog.blog_pagination_start',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);


    }


    public function blog_pagination_start_delete(Request $request){

        $update_data = Blog::whereIn('id',$request->numberOfSubChecked)->delete();




 $total_data = Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->count();

 $total_serial_number1= $total_data/10;

 if (is_float($total_serial_number1)){
     $total_serial_number = ceil($total_serial_number1);

 }else{
     $total_serial_number = $total_serial_number1;
 }

  //dd($total_serial_number);

     $product_list = Blog::where('written_by',Auth::guard('admin')->user()->name)->latest()->limit(10)->get();



$data = view('backend.blog.blog_pagination_start_delete',compact('product_list','total_serial_number'))->render();
return response()->json(['options'=>$data]);
    }


    public function blog_pagination_start_search(Request $request){


        $search_value = $request->search_value;



        $total_data = Blog::where('written_by',Auth::guard('admin')->user()->name)->Where('title','LIKE','%'.$search_value.'%')
        ->orWhere('cat_name','LIKE','%'.$search_value.'%')->orWhere('des','LIKE','%'.$search_value.'%')
        ->latest()->count();

            $total_serial_number1= $total_data/10;

            if (is_float($total_serial_number1)){
                $total_serial_number = ceil($total_serial_number1);

            }else{
                $total_serial_number = $total_serial_number1;
            }

             //dd($total_serial_number);

                $product_list = Blog::where('written_by',Auth::guard('admin')->user()->name)->Where('title','LIKE','%'.$search_value.'%')
                ->orWhere('cat_name','LIKE','%'.$search_value.'%')->orWhere('des','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();

                $data = view('backend.blog.blog_pagination_start_search',compact('search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }


    public function blog_pagination_start_search_ajax(Request $request){


        $search_value = $request->search_value;

        $id_for_pass = $request->id_for_pass;



        if($id_for_pass == 1){

            $total_data =Blog::where('written_by',Auth::guard('admin')->user()->name)->Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('cat_name','LIKE','%'.$search_value.'%')->orWhere('des','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Blog::where('written_by',Auth::guard('admin')->user()->name)->Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('cat_name','LIKE','%'.$search_value.'%')->orWhere('des','LIKE','%'.$search_value.'%')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Blog::where('written_by',Auth::guard('admin')->user()->name)->Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('cat_name','LIKE','%'.$search_value.'%')->orWhere('des','LIKE','%'.$search_value.'%')->latest()->count();
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Blog::where('written_by',Auth::guard('admin')->user()->name)->Where('title','LIKE','%'.$search_value.'%')
            ->orWhere('cat_name','LIKE','%'.$search_value.'%')->orWhere('des','LIKE','%'.$search_value.'%')->latest()->skip($minus_one)->take(10)->get();
        }
        $data = view('backend.blog.blog_pagination_start_search_ajax',compact('id_for_pass','minus_one','search_value','product_list','total_serial_number'))->render();
                return response()->json(['options'=>$data]);


    }
}
