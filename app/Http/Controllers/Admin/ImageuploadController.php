<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Imageupload;
use Illuminate\Support\Facades\Auth;
class ImageuploadController extends Controller
{
    public function image_store(Request $request)
    {
        $input = $request->all();
        $condition = $input['files'];

        foreach($condition as $key => $condition){
            $form= new Imageupload();
            $file=$input['files'][$key];
            $name=$file->getClientOriginalName();
            $file->move('public/product_images/', $name);
            $form->filename='public/product_images/'.$name;
            //$form->product_id =  $request->product_id;
            $form->save();
       }

       return redirect()->back()->with('success','Successully added');
    }

    // public function image_delete(Request $request)
    // {
    //     $filename = $request->get('filename');
    //     Imageupload::where('filename', $filename)->delete();
    //     $path = public_path() . '/product_images/' . $filename;
    //     if (file_exists($path)) {
    //         unlink($path);
    //     }
    //     return $filename;
    // }


    public function database_image_store(Request $request){



       $main_data = $request->database_image_upload;

if(empty($main_data)){

    $data='';

    return response()->json($data);

}else{
$data = view('backend.product.database_image_store',compact('main_data'))->render();

       return response()->json($data);
    }
    }


    public function pdatabase_image_store(Request $request){



        $main_data = $request->pdatabase_image_upload;

 if(empty($main_data)){

     $data='';

     return response()->json($data);

 }else{
 $data = view('backend.product.pdatabase_image_store',compact('main_data'))->render();

        return response()->json($data);
     }
     }


     public function cdatabase_image_store(Request $request){


$main_data_id1 = $request->main_data_id1;
        $main_data = $request->cdatabase_image_upload;

 if(empty($main_data)){

     $data='';

     return response()->json($data);

 }else{
 $data = view('backend.product.cdatabase_image_store',compact('main_data','main_data_id1'))->render();

        return response()->json($data);
     }
     }
}
