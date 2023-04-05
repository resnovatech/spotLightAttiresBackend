<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\Bannerfirst;
use App\Models\Bannersecond;
class BannerSecondController extends Controller
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

        $category_list = Category::select('cat_name')->distinct('cat_name')->get();


        $category_list_one = Bannersecond::limit('1')->get();
        $category_list_two = Bannersecond::skip('1')->take('1')->get();
        $category_list_three = Bannersecond::skip('2')->take('1')->get();

        $category_list_four = Bannersecond::skip('3')->take('1')->get();
        $category_list_five = Bannersecond::skip('4')->take('1')->get();
        $category_list_six = Bannersecond::skip('5')->take('1')->get();

        $category_list_seven = Bannersecond::skip('6')->take('1')->get();
$category_list_eight =  Bannersecond::skip('7')->take('1')->get();
        return view('backend.second_banner.index',compact('category_list_eight','category_list_seven','category_list_six','category_list_five','category_list_four','category_list','category_list_one','category_list_two','category_list_three'));
    }


    public function store(Request $request){

            $form= new Bannersecond();
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
            $form->position =  $request->position;
            $form->save();


        return redirect()->back()->with('success','Created Successfully');
    }


    public function update(Request $request){
        
       

        $form=Bannersecond::find($request->id);
        if($request->hasfile('cat_banner')){
        $file=$request->file('cat_banner');
        $name=$file->getClientOriginalName();
        $file->move('public/product_images/', $name);
        $form->image='public/product_images/'.$name;
        }
        $form->button_name =  $request->button_name;
        $form->first_title =  $request->t_one;
        $form->second_title	 =  $request->t_two;
        $form->position =  $request->position;
        $form->save();
        return redirect()->back()->with('info','Updated Successfully');

    }
}
