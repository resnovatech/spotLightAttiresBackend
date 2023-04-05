<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aboutustitle;
use App\Models\Aboutusbodyfirst;
use App\Models\Aboutusbodysecond;
class AboutController extends Controller
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

        if (is_null($this->user) || !$this->user->can('about_view')) {
            return redirect('/admin/logout_session');
        }




        $about_us_title = Aboutustitle::latest()->get();
        $aboutus_body_first_list = Aboutusbodyfirst::latest()->get();
        $aboutus_body_second_list = Aboutusbodysecond::latest()->get();
        return view('backend.about.index',compact('about_us_title','aboutus_body_first_list','aboutus_body_second_list'));
    }


    public function about_us_title_store(Request $request){

        $form= new Aboutustitle();
        $form->title_one =  $request->title_one;
        $form->title_two =  $request->title_two;
        $form->save();


    return redirect()->back()->with('success','Created Successfully');
}


public function about_us_title_update(Request $request){

    $form=Aboutustitle::find($request->id);
    $form->title_one =  $request->title_one;
    $form->title_two =  $request->title_two;
    $form->save();
    return redirect()->back()->with('info','Updated Successfully');

}


public function about_us_body_first_part_store(Request $request){

    $form= new Aboutusbodyfirst();
    if($request->hasfile('cat_banner')){
        $file=$request->file('cat_banner');
        $name=$file->getClientOriginalName();
        $file->move('public/product_images/', $name);
        $form->image='public/product_images/'.$name;
        }
    $form->main_title =  $request->main_title;
    $form->title_one =  $request->title_one;
    $form->title_one_des =  $request->title_one_des;
    $form->title_two =  $request->title_two;
    $form->title_two_des =  $request->title_two_des;
    $form->title_three =  $request->title_three;
    $form->title_three_des =  $request->title_three_des;
    $form->save();


return redirect()->back()->with('success','Created Successfully');
}


public function about_us_body_first_part_update(Request $request){

$form=Aboutusbodyfirst::find($request->id);
if($request->hasfile('cat_banner')){
    $file=$request->file('cat_banner');
    $name=$file->getClientOriginalName();
    $file->move('public/product_images/', $name);
    $form->image='public/product_images/'.$name;
    }
$form->main_title =  $request->main_title;
$form->title_one =  $request->title_one;
$form->title_one_des =  $request->title_one_des;
$form->title_two =  $request->title_two;
$form->title_two_des =  $request->title_two_des;
$form->title_three =  $request->title_three;
$form->title_three_des =  $request->title_three_des;
$form->save();
return redirect()->back()->with('info','Updated Successfully');

}


public function about_us_body_second_part_store(Request $request){

    $form= new Aboutusbodysecond();
    if($request->hasfile('cat_banner')){
        $file=$request->file('cat_banner');
        $name=$file->getClientOriginalName();
        $file->move('public/product_images/', $name);
        $form->image='public/product_images/'.$name;
        }
    $form->des =  $request->des;
    $form->title =  $request->title;

    $form->save();


return redirect()->back()->with('success','Created Successfully');
}


public function about_us_body_second_part_update(Request $request){

$form=Aboutusbodysecond::find($request->id);
if($request->hasfile('cat_banner')){
    $file=$request->file('cat_banner');
    $name=$file->getClientOriginalName();
    $file->move('public/product_images/', $name);
    $form->image='public/product_images/'.$name;
    }
    $form->des =  $request->des;
    $form->title =  $request->title;
$form->save();
return redirect()->back()->with('info','Updated Successfully');

}
}
