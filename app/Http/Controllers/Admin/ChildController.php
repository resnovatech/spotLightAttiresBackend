<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\ProductCategory;
use DB;
class ChildController extends Controller
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

        if (is_null($this->user) || !$this->user->can('child_category_view')) {
            return redirect('/admin/logout_session');
        }

        $category_list = ProductCategory::latest()->get();
        $sub_category_list = Category::select('cat_name')->groupBy('cat_name')->get();
        $sub_category_list_table = Category::select('sub_cat')->groupBy('sub_cat')->limit(10)->get();

        $total_data = Category::select('sub_cat')->groupBy('sub_cat')->count('sub_cat');

       // dd(44);

$total_serial_number1= $total_data/10;

if (is_float($total_serial_number1)){
    $total_serial_number = ceil($total_serial_number1);

}else{
    $total_serial_number = $total_serial_number1;
}

        return view('backend.child_category.index',compact('category_list','sub_category_list','sub_category_list_table','total_serial_number'));
    }


    public function child__name_from_list(Request $request){

        $child_name = $request->child_name;
        $cat_type = $request->cat_type;

        if($request->cat_type == 'FirstChild'){

            $child_category_list = Category::where('sub_cat',$child_name)->value('cat_name');
            $data = $child_category_list.'->'.$child_name;
        }elseif($request->cat_type == 'SecondChild'){

            $child_sub_category_list = Category::where('child_one',$child_name)->value('sub_cat');
            $child_category_list = Category::where('sub_cat',$child_sub_category_list)->value('cat_name');

            $data = $child_category_list.'->'.$child_sub_category_list.'->'.$child_name;

        }elseif($request->cat_type == 'ThirdChild'){

            $child_one_category_list = Category::where('child_two',$child_name)->value('child_one');
            $child_sub_category_list = Category::where('child_one',$child_one_category_list)->value('sub_cat');
            $child_category_list = Category::where('sub_cat',$child_sub_category_list)->value('cat_name');

            $data = $child_category_list.'->'.$child_sub_category_list.'->'.$child_one_category_list.'->'.$child_name;



        }elseif($request->cat_type == 'FourthChild'){
            $child_two_category_list = Category::where('child_three',$child_name)->value('child_two');
            $child_one_category_list = Category::where('child_two',$child_two_category_list)->value('child_one');
            $child_sub_category_list = Category::where('child_one',$child_one_category_list)->value('sub_cat');
            $child_category_list = Category::where('sub_cat',$child_sub_category_list)->value('cat_name');

            $data = $child_category_list.'->'.$child_sub_category_list.'->'.$child_one_category_list.'->'.$child_two_category_list.'->'.$child_name;
        }elseif($request->cat_type == 'FifthChild'){

            $child_three_category_list = Category::where('child_four',$child_name)->value('child_three');
            $child_two_category_list = Category::where('child_three',$child_three_category_list)->value('child_two');
            $child_one_category_list = Category::where('child_two',$child_two_category_list)->value('child_one');
            $child_sub_category_list = Category::where('child_one',$child_one_category_list)->value('sub_cat');
            $child_category_list = Category::where('sub_cat',$child_sub_category_list)->value('cat_name');

            $data = $child_category_list.'->'.$child_sub_category_list.'->'.$child_one_category_list.'->'.$child_two_category_list.'->'.$child_three_category_list.'->'.$child_name;


        }elseif($request->cat_type == 'SixthChild'){
            $child_four_category_list = Category::where('child_five',$child_name)->value('child_four');
            $child_three_category_list = Category::where('child_four',$child_four_category_list)->value('child_three');
            $child_two_category_list = Category::where('child_three',$child_three_category_list)->value('child_two');
            $child_one_category_list = Category::where('child_two',$child_two_category_list)->value('child_one');
            $child_sub_category_list = Category::where('child_one',$child_one_category_list)->value('sub_cat');
            $child_category_list = Category::where('sub_cat',$child_sub_category_list)->value('cat_name');

            $data = $child_category_list.'->'.$child_sub_category_list.'->'.$child_one_category_list.'->'.$child_two_category_list.'->'.$child_three_category_list.'->'.$child_four_category_list.'->'.$child_name;


        }elseif($request->cat_type == 'SeventhChild'){

            $child_five_category_list = Category::where('child_six',$child_name)->value('child_five');
            $child_four_category_list = Category::where('child_five',$child_five_category_list)->value('child_four');
            $child_three_category_list = Category::where('child_four',$child_four_category_list)->value('child_three');
            $child_two_category_list = Category::where('child_three',$child_three_category_list)->value('child_two');
            $child_one_category_list = Category::where('child_two',$child_two_category_list)->value('child_one');
            $child_sub_category_list = Category::where('child_one',$child_one_category_list)->value('sub_cat');
            $child_category_list = Category::where('sub_cat',$child_sub_category_list)->value('cat_name');

            $data = $child_category_list.'->'.$child_sub_category_list.'->'.$child_one_category_list.'->'.$child_two_category_list.'->'.$child_three_category_list.'->'.$child_four_category_list.'->'.$child_five_category_list.'->'.$child_name;


        }elseif($request->cat_type == 'EightChild'){
            $child_six_category_list = Category::where('child_seven',$child_name)->value('child_six');
            $child_five_category_list = Category::where('child_six',$child_six_category_list)->value('child_five');
            $child_four_category_list = Category::where('child_five',$child_five_category_list)->value('child_four');
            $child_three_category_list = Category::where('child_four',$child_four_category_list)->value('child_three');
            $child_two_category_list = Category::where('child_three',$child_three_category_list)->value('child_two');
            $child_one_category_list = Category::where('child_two',$child_two_category_list)->value('child_one');
            $child_sub_category_list = Category::where('child_one',$child_one_category_list)->value('sub_cat');
            $child_category_list = Category::where('sub_cat',$child_sub_category_list)->value('cat_name');

            $data = $child_category_list.'->'.$child_sub_category_list.'->'.$child_one_category_list.'->'.$child_two_category_list.'->'.$child_three_category_list.'->'.$child_four_category_list.'->'.$child_five_category_list.'->'.$child_six_category_list.'->'.$child_name;
        }



        // $data = view('backend.child_category.child_name',compact('cat_type','child_name','child_category_list'))->render();

        return response()->json($data);

    }


    public function child_category_pagi_ajax(Request $request){

        $id_for_pass = $request->id_for_pass;


        if($id_for_pass == 1){

            $total_data =Category::select('sub_cat')->distinct('sub_cat')->latest()->count('sub_cat');
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $product_list = Category::select('sub_cat')->distinct('sub_cat')->latest()->limit(10)->get();
            $minus_one = 0;
        }else{
            $total_data = Category::select('sub_cat')->distinct('sub_cat')->latest()->count('sub_cat');
            $total_serial_number1= $total_data/10;

    if (is_float($total_serial_number1)){
        $total_serial_number = ceil($total_serial_number1);

    }else{
        $total_serial_number = $total_serial_number1;
    }
            $minus_one = ($id_for_pass - 1)*10;

            $product_list = Category::select('sub_cat')->distinct('sub_cat')->latest()->skip($minus_one)->take(10)->get();
        }

        $data = view('backend.child_category.child_category_pagi_ajax',compact('minus_one','product_list','total_serial_number','id_for_pass'))->render();
                return response()->json(['options'=>$data]);
    }


    public function delete(Request $request){

        if (is_null($this->user) || !$this->user->can('child_category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }
        $admins = Category::where('sub_cat',$request->delete_data)->delete();

        return back()->with('error','Deleted successfully!');

    }


    public function delete_tree(Request $request){


        if (is_null($this->user) || !$this->user->can('child_category_delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any data !');
        }


        if($request->delete_data_tree_type == 0){

            $admins = Category::where('sub_cat',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 1){

            $admins = Category::where('child_one',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 2){
            $admins = Category::where('child_two',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 3){
            $admins = Category::where('child_three',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 4){
            $admins = Category::where('child_four',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 5){
            $admins = Category::where('child_five',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 6){
            $admins = Category::where('child_six',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 7){
            $admins = Category::where('child_seven',$request->delete_data_tree)->delete();

        }elseif($request->delete_data_tree_type == 8){

            $admins = Category::where('child_eight',$request->delete_data_tree)->delete();

        }


        return back()->with('error','Deleted successfully!');

    }


    public function show_child_for_edit(Request $request){

        if (is_null($this->user) || !$this->user->can('child_category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = ProductCategory::latest()->get();
       $data_type =  $request->data_type;

        if($request->data_type == 0){

          $sub_child_name = $request->data_name;

          $category_name = Category::where('sub_cat',$request->data_name)->first();

        }elseif($request->data_type == 1){

            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_one',$request->data_name)->first();

        }elseif($request->data_type == 2){
            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_two',$request->data_name)->first();

        }elseif($request->data_type == 3){
            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_three',$request->data_name)->first();

        }elseif($request->data_type == 4){
            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_four',$request->data_name)->first();

        }elseif($request->data_type == 5){
            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_five',$request->data_name)->first();

        }elseif($request->data_type == 6){
            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_six',$request->data_name)->first();

        }elseif($request->data_type == 7){

            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_seven',$request->data_name)->first();
        }elseif($request->data_type == 8){

            $sub_child_name = $request->data_name;

            $category_name = Category::where('child_eight',$request->data_name)->first();

        }

        $data = view('backend.child_category.show_child_for_edit',compact('category_name','data_type','sub_child_name','category_list'))->render();
        return response()->json($data);
    }


    public function show_child_for_add(Request $request){


        if (is_null($this->user) || !$this->user->can('child_category_update')) {
            abort(403, 'Sorry !! You are Unauthorized to update any data !');
        }

        $category_list = ProductCategory::latest()->get();


        $data_type = $request->data_type;
        $data_name = $request->data_name;

        $data = view('backend.child_category.show_child_for_add',compact('category_list','data_type','data_name'))->render();
        return response()->json($data);



    }


    public function update(Request $request){


        if($request->data_type == 0){


        DB::table('categories') ->where('sub_cat',$request->old_data_for_update)
        ->update(['cat_name' =>$request->cat_name,'sub_cat'=>$request->sub_cat]);



        }elseif($request->data_type == 1){

            DB::table('categories') ->where('child_one',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,'sub_cat'=>$request->sub_cat,'child_one'=>$request->child_one]);

        }elseif($request->data_type == 2){

            DB::table('categories') ->where('child_two',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,
            'sub_cat'=>$request->sub_cat,
            'child_one'=>$request->child_one,
            'child_two'=>$request->child_two
        ]);


        }elseif($request->data_type == 3){


            DB::table('categories') ->where('child_three',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,
            'sub_cat'=>$request->sub_cat,
            'child_one'=>$request->child_one,
            'child_two'=>$request->child_two,
            'child_three'=>$request->child_three
        ]);


        }elseif($request->data_type == 4){

            DB::table('categories') ->where('child_four',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,
            'sub_cat'=>$request->sub_cat,
            'child_one'=>$request->child_one,
            'child_two'=>$request->child_two,
            'child_three'=>$request->child_three,
            'child_four'=>$request->child_four
        ]);


        }elseif($request->data_type == 5){

            DB::table('categories') ->where('child_five',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,
            'sub_cat'=>$request->sub_cat,
            'child_one'=>$request->child_one,
            'child_two'=>$request->child_two,
            'child_three'=>$request->child_three,
            'child_four'=>$request->child_four,
            'child_five'=>$request->child_five
        ]);


        }elseif($request->data_type == 6){

            DB::table('categories') ->where('child_six',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,
            'sub_cat'=>$request->sub_cat,
            'child_one'=>$request->child_one,
            'child_two'=>$request->child_two,
            'child_three'=>$request->child_three,
            'child_four'=>$request->child_four,
            'child_five'=>$request->child_five,
            'child_six'=>$request->child_six
        ]);


        }elseif($request->data_type == 7){

            DB::table('categories') ->where('child_seven',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,
            'sub_cat'=>$request->sub_cat,
            'child_one'=>$request->child_one,
            'child_two'=>$request->child_two,
            'child_three'=>$request->child_three,
            'child_four'=>$request->child_four,
            'child_five'=>$request->child_five,
            'child_six'=>$request->child_six,
            'child_seven'=>$request->child_seven
        ]);


        }elseif($request->data_type == 8){

            DB::table('categories') ->where('child_eight',$request->old_data_for_update)
            ->update(['cat_name' =>$request->cat_name,
            'sub_cat'=>$request->sub_cat,
            'child_one'=>$request->child_one,
            'child_two'=>$request->child_two,
            'child_three'=>$request->child_three,
            'child_four'=>$request->child_four,
            'child_five'=>$request->child_five,
            'child_six'=>$request->child_six,
            'child_seven'=>$request->child_seven,
            'child_eight'=>$request->child_eight
        ]);



        }


    }


    public function store(Request $request){


        if (is_null($this->user) || !$this->user->can('child_category_add')) {
            abort(403, 'Sorry !! You are Unauthorized to add any data !');
        }


        //dd($request->data_type);

        if($request->data_type == 00){


            $category_list = new Category();
            $category_list->cat_name = $request->cat_name;
            $category_list->sub_cat = $request->sub_cat;
            $category_list->status = $request->status;

            $category_list->save();

        }elseif($request->data_type == 10){

            $category_name = Category::where('sub_cat',$request->sub_cat)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $request->sub_cat;
            $category_list->child_one = $request->child_one;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->data_type == 1){

            $subcategory_name = Category::where('child_one',$request->child_one)->value('sub_cat');
            $category_name = Category::where('sub_cat',$subcategory_name)->value('cat_name');

            $category_list = new Category();
            $category_list->cat_name = $category_name;
            $category_list->sub_cat = $subcategory_name;
            $category_list->child_one = $request->child_one;
            $category_list->child_two = $request->child_two;
            $category_list->status = $request->status;
            $category_list->save();

        }elseif($request->data_type == 2){

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

        }elseif($request->data_type == 3){
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

        }elseif($request->data_type == 4){
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

        }elseif($request->data_type == 5){
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

        }elseif($request->data_type == 6){
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

        }elseif($request->data_type == 7){

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
}
