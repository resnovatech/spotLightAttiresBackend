<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Parcel;

class RedexapiController extends Controller
{
    public function pickup_store_information(){

        $token ='Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI1OTc0MTYiLCJpYXQiOjE2NjkxODcwNzgsImlzcyI6ImxpcWlwVlJ6WEJnWkE3QXZqMmxKRWVsQ2MyTUtHUjJBIiwic2hvcF9pZCI6NTk3NDE2LCJ1c2VyX2lkIjo5Mjk4NjV9.CEBe6EsB1hHGfdyRxuNoRqrh7KlGjICbkMPtAcbBRCU';


        $response = Http::withHeaders([
            'API-ACCESS-TOKEN' => $token
        ])->get('https://openapi.redx.com.bd/v1.0.0-beta/pickup/stores')->json();

        $datas = $response;
       //dd($datas);

        //dd($response);

        return view('backend.datas.pickup_store_information',compact('datas'));

    }

    public function parcel_list_from_redex(){

        $token ='Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI1OTc0MTYiLCJpYXQiOjE2NjkxODcwNzgsImlzcyI6ImxpcWlwVlJ6WEJnWkE3QXZqMmxKRWVsQ2MyTUtHUjJBIiwic2hvcF9pZCI6NTk3NDE2LCJ1c2VyX2lkIjo5Mjk4NjV9.CEBe6EsB1hHGfdyRxuNoRqrh7KlGjICbkMPtAcbBRCU';


    //     $response = Http::withHeaders([
    //         'API-ACCESS-TOKEN' => $token
    //     ])->get('https://openapi.redx.com.bd/v1.0.0-beta/parcel')->json();

    //     $datas = $response;
    //    dd($datas);

        //dd($response);


        $parcel_list = Parcel::latest()->get();

        return view('backend.datas.parcel_list_from_redex',compact('parcel_list'));



    }


    public function create_parcel_for_redex(){

        $token ='Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI1OTc0MTYiLCJpYXQiOjE2NjkxODcwNzgsImlzcyI6ImxpcWlwVlJ6WEJnWkE3QXZqMmxKRWVsQ2MyTUtHUjJBIiwic2hvcF9pZCI6NTk3NDE2LCJ1c2VyX2lkIjo5Mjk4NjV9.CEBe6EsB1hHGfdyRxuNoRqrh7KlGjICbkMPtAcbBRCU';


              $response = Http::withHeaders([
            'API-ACCESS-TOKEN' => $token
         ])->get('https://openapi.redx.com.bd/v1.0.0-beta/areas')->json();

         $area_list = $response;

         //dd($area_list);


         $response_one = Http::withHeaders([
            'API-ACCESS-TOKEN' => $token
        ])->get('https://openapi.redx.com.bd/v1.0.0-beta/pickup/stores')->json();

        $store_information = $response_one;

        return view('backend.datas.create_parcel_for_redex',compact('area_list','store_information'));


    }


    public function store_parcel_for_redex(Request $request){


        $token ='Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI1OTc0MTYiLCJpYXQiOjE2NjkxODcwNzgsImlzcyI6ImxpcWlwVlJ6WEJnWkE3QXZqMmxKRWVsQ2MyTUtHUjJBIiwic2hvcF9pZCI6NTk3NDE2LCJ1c2VyX2lkIjo5Mjk4NjV9.CEBe6EsB1hHGfdyRxuNoRqrh7KlGjICbkMPtAcbBRCU';



        $response = Http::withHeaders([
            'API-ACCESS-TOKEN' => $token,
            'Content-Type' => 'application/json',
        ])->post('https://openapi.redx.com.bd/v1.0.0-beta/parcel', [
            'customer_name' =>$request->customer_name,
            'customer_phone' =>$request->customer_phone,
            'delivery_area' =>$request->delivery_area,
            'delivery_area_id' =>$request->delivery_area_id,
            'customer_address' =>$request->customer_address,
            'cash_collection_amount' =>$request->cash_collection_amount,
            'parcel_weight' =>$request->parcel_weight,
            'instruction' =>$request->instruction,
            'merchant_invoice_id' =>$request->merchant_invoice_id,
            'value' =>$request->value,

            'pickup_store_id' =>39336,


        ]);



        $save_data = new Parcel();
        $save_data->customer_name = $request->customer_name;
        $save_data->customer_phone = $request->customer_phone;
        $save_data->delivery_area = $request->delivery_area;
        $save_data->customer_address = $request->customer_address;
        $save_data->delivery_area_id = $request->delivery_area_id;
        $save_data->cash_collection_amount = $request->cash_collection_amount;
        $save_data->parcel_weight = $request->parcel_weight;
        $save_data->instruction = $request->instruction;
        $save_data->merchant_invoice_id = $request->merchant_invoice_id;
        $save_data->value = $request->value;
        $save_data->pickup_store_id = 39336;
        $save_data->save();

        return redirect()->back()->with('success','Created Successfully');



    }


    public function search_product_status(Request $request){

        //dd($request->all());

        $token ='Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI1OTc0MTYiLCJpYXQiOjE2NjkxODcwNzgsImlzcyI6ImxpcWlwVlJ6WEJnWkE3QXZqMmxKRWVsQ2MyTUtHUjJBIiwic2hvcF9pZCI6NTk3NDE2LCJ1c2VyX2lkIjo5Mjk4NjV9.CEBe6EsB1hHGfdyRxuNoRqrh7KlGjICbkMPtAcbBRCU';


        if($request->final_button == 'track'){

            $response = Http::withHeaders([
                'API-ACCESS-TOKEN' => $token
             ])->get('https://openapi.redx.com.bd/v1.0.0-beta/parcel/track/'.$request->parcel_id)->json();

             $track_info = $response;

           //  dd($track_info);

            return view('backend.datas.search_product_status',compact('track_info'));


        }else{
            $response = Http::withHeaders([
                'API-ACCESS-TOKEN' => $token
             ])->get('https://openapi.redx.com.bd/v1.0.0-beta/parcel/info/'.$request->parcel_id)->json();

             $parcel_detail = $response;

             $final_result = json_encode($parcel_detail, JSON_PRETTY_PRINT);

             $another_value = json_decode($final_result);


             //dd($another_value);

            return view('backend.datas.search_product_detail',compact('parcel_detail','final_result','another_value'));

        }



    }
}
