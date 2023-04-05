<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
class CategoryController extends Controller
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

        if (is_null($this->user) || !$this->user->can('category_view')) {
            return redirect('/admin/logout_session');
        }

        $category_list = Category::latest()->get();

        return view('backend.category.index',compact('category_list'));
    }


    public function store(Request $request){
        if (is_null($this->user) || !$this->user->can('category_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }

        if($request->cat_type == 'Category'){

            $category_list = new Category();
            $category_list->cat_name = $request->cat_name;
            $category_list->status = $request->status;
            $category_list->save();


        }elseif($request->cat_type == 'SubCategory'){


            $category_list = new Category();
            $category_list->cat_name = $request->cat_name;
            $category_list->sub_cat = $request->sub_cat;
            $category_list->status = $request->status;

            $category_list->save();

        }elseif($request->cat_type == 'FirstChild'){

            $category_name = Category::where('sub_cat',$request->sub_cat)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $request->sub_cat;
            $category_list->child_one = $request->child_one;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->cat_type == 'SecondChild'){

            $subcategory_name = Category::where('child_one',$request->child_one)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $request->child_one;
            $category_list->child_two = $request->child_two;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->cat_type == 'ThirdChild'){

            $child_one_name = Category::where('child_two',$request->child_two)->value('child_one');
            $subcategory_name = Category::where('child_one',$child_one_name)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $child_one_name;
            $category_list->child_two = $request->child_two;
            $category_list->child_three = $request->child_three;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->cat_type == 'FourthChild'){
            $child_two_name = Category::where('child_three',$request->child_three)->value('child_two');
            $child_one_name = Category::where('child_two',$child_two_name)->value('child_one');
            $subcategory_name = Category::where('child_one',$child_one_name)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $child_one_name;
            $category_list->child_two = $child_two_name;
            $category_list->child_three = $request->child_three;
            $category_list->child_four = $request->child_four;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->cat_type == 'FifthChild'){
            $child_three_name = Category::where('child_four',$request->child_four)->value('child_three');
            $child_two_name = Category::where('child_three',$child_three_name)->value('child_two');
            $child_one_name = Category::where('child_two',$child_two_name)->value('child_one');
            $subcategory_name = Category::where('child_one',$child_one_name)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $child_one_name;
            $category_list->child_two = $child_two_name;
            $category_list->child_three = $child_three_name;
            $category_list->child_four = $request->child_four;
            $category_list->child_five = $request->child_five;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->cat_type == 'SixthChild'){
            $child_four_name = Category::where('child_five',$request->child_five)->value('child_four');
            $child_three_name = Category::where('child_four',$child_four_name)->value('child_three');
            $child_two_name = Category::where('child_three',$child_three_name)->value('child_two');
            $child_one_name = Category::where('child_two',$child_two_name)->value('child_one');
            $subcategory_name = Category::where('child_one',$child_one_name)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $child_one_name;
            $category_list->child_two = $child_two_name;
            $category_list->child_three = $child_three_name;
            $category_list->child_four = $child_four_name;
            $category_list->child_five = $request->child_five;
            $category_list->child_six = $request->child_six;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->cat_type == 'SeventhChild'){
            $child_five_name = Category::where('child_six',$request->child_six)->value('child_five');
            $child_four_name = Category::where('child_five',$child_five_name)->value('child_four');
            $child_three_name = Category::where('child_four',$child_four_name)->value('child_three');
            $child_two_name = Category::where('child_three',$child_three_name)->value('child_two');
            $child_one_name = Category::where('child_two',$child_two_name)->value('child_one');
            $subcategory_name = Category::where('child_one',$child_one_name)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $child_one_name;
            $category_list->child_two = $child_two_name;
            $category_list->child_three = $child_three_name;
            $category_list->child_four = $child_four_name;
            $category_list->child_five = $child_five_name;
            $category_list->child_six = $request->child_six;
            $category_list->child_seven = $request->child_seven;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->cat_type == 'EightChild'){

            $child_six_name = Category::where('child_seven',$request->child_seven)->value('child_six');
            $child_five_name = Category::where('child_six',$child_six_name)->value('child_five');
            $child_four_name = Category::where('child_five',$child_five_name)->value('child_four');
            $child_three_name = Category::where('child_four',$child_four_name)->value('child_three');
            $child_two_name = Category::where('child_three',$child_three_name)->value('child_two');
            $child_one_name = Category::where('child_two',$child_two_name)->value('child_one');
            $subcategory_name = Category::where('child_one',$child_one_name)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $child_one_name;
            $category_list->child_two = $child_two_name;
            $category_list->child_three = $child_three_name;
            $category_list->child_four = $child_four_name;
            $category_list->child_five = $child_five_name;
            $category_list->child_six = $child_six_name;
            $category_list->child_seven = $request->child_seven;
            $category_list->child_eight = $request->child_eight;
            $category_list->status = $request->status;
            $category_list->save();

        }





            return redirect()->back()->with('success','Created Successfully');

    }

    public function update(Request $request){
        if (is_null($this->user) || !$this->user->can('category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }
        $category_list = Category::find($request->id);
        $category_list->cat_name = $request->cat_name;
        $category_list->status = $request->status;
        $category_list->save();


        return redirect()->back()->with('info','Updated Successfully');

}

public function delete($id)
    {
        //dd(1);
        if (is_null($this->user) || !$this->user->can('category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Category::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }


    public function category_type(Request $request){

        $cat_type = $request->cat_type;


        $data = view('backend.category.category_type',compact('cat_type'))->render();

       return response()->json($data);


    }

    public function sub_category_type(Request $request){

        return view('backend.category.sub_category_type');
    }
}
