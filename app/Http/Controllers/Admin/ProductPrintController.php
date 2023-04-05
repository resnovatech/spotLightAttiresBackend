<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use PDF;
use App\Exports\ProductsExport;

use Maatwebsite\Excel\Facades\Excel;
class ProductPrintController extends Controller
{
    ///all print code

  public function print_pdf_for_all_product(){
    $product_list = Product::latest()->get();
    $file_Name_Custome = 'Product_list';


    $pdf=PDF::loadView('backend.product.print_pdf_for_all_product',['product_list'=>$product_list],[],['format' => 'A4']);
return $pdf->stream($file_Name_Custome.''.'.pdf');

}


public function print_excel_for_all_product(){

    return Excel::download(new ProductsExport, 'product_list.xlsx');


}


public function print_csv_for_all_product(){

    return Excel::download(new ProductsExport, 'product_list.csv');
}
}
