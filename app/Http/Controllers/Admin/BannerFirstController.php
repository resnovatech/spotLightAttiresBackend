<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\Bannerfirst;
use App\Models\Animationcategory;
class BannerFirstController extends Controller
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

        if (is_null($this->user) || !$this->user->can('banner_first_view')) {
            return redirect('/admin/logout_session');
        }

        $category_list = Animationcategory::latest()->get();


        $category_list_one = Bannerfirst::latest()->get();
        $category_list_two = Bannerfirst::skip('1')->take('1')->get();
        $category_list_three = Bannerfirst::skip('2')->take('1')->get();
        return view('backend.first_banner.index',compact('category_list','category_list_one','category_list_two','category_list_three'));
    }


    public function store(Request $request){

            $form= new Bannerfirst();
            if($request->hasfile('cat_banner')){
            $file=$request->file('cat_banner');
            $name=$file->getClientOriginalName();
            $file->move('public/product_images/', $name);
            $form->image='public/product_images/'.$name;
            }
            $form->first_title =  $request->t_one;
            $form->button_link =  $request->cat_id;
            $form->button_name =  $request->button_name;
            $form->second_title	 =  $request->t_two;
            $form->third_title =  $request->t_three;
            $form->four_title =  $request->four_title;
            $form->save();


        return redirect()->back()->with('success','Created Successfully');
    }


    public function update(Request $request){

        $form=Bannerfirst::find($request->id);
        if($request->hasfile('cat_banner')){
        $file=$request->file('cat_banner');
        $name=$file->getClientOriginalName();
        $file->move('public/product_images/', $name);
        $form->image='public/product_images/'.$name;
        }
        $form->button_link =  $request->cat_id;
         $form->button_name =  $request->button_name;
        $form->first_title =  $request->t_one;
        $form->second_title	 =  $request->t_two;
        $form->third_title =  $request->t_three;
        $form->four_title =  $request->four_title;
        $form->save();
        return redirect()->back()->with('info','Updated Successfully');

    }


    public function delete($id)
    {

        $admins = Bannerfirst::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
