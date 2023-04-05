<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\CategoryBanner;
class CategoryBannerController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function category_banner_list(){

        if (is_null($this->user) || !$this->user->can('category_banner_view')) {
            return redirect('/admin/logout_session');
        }

        $category_list = Category::select('cat_name')->distinct('cat_name')->get();


        $category_list_one = CategoryBanner::limit('1')->get();
        $category_list_two = CategoryBanner::skip('1')->take('1')->get();
        $category_list_three = CategoryBanner::skip('2')->take('1')->get();
        $category_list_four = CategoryBanner::skip('3')->take('1')->get();
        $category_list_five = CategoryBanner::skip('4')->take('1')->get();
        return view('backend.category_banner.index',compact('category_list','category_list_one','category_list_two','category_list_three','category_list_four','category_list_five'));
    }


    public function category_banner_store(Request $request){

            $form= new CategoryBanner();
            if($request->hasfile('cat_banner')){
            $file=$request->file('cat_banner');
            $name=$file->getClientOriginalName();
            $file->move('public/product_images/', $name);
            $form->image='public/product_images/'.$name;
            }
            $form->cat_id =  $request->cat_id;
            $form->t_one =  $request->t_one;
            $form->t_two =  $request->t_two;
            $form->t_three =  $request->t_three;
            $form->save();


        return redirect()->back()->with('success','Created Successfully');
    }


    public function category_banner_update(Request $request){

        $form=CategoryBanner::find($request->id);
        if($request->hasfile('cat_banner')){
        $file=$request->file('cat_banner');
        $name=$file->getClientOriginalName();
        $file->move('public/product_images/', $name);
        $form->image='public/product_images/'.$name;
        }
        $form->cat_id =  $request->cat_id;
        $form->t_one =  $request->t_one;
        $form->t_two =  $request->t_two;
        $form->t_three =  $request->t_three;
        $form->save();
        return redirect()->back()->with('info','Updated Successfully');

    }
}
