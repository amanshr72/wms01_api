<?php

namespace App\Http\Controllers;

use App\Models\GetDeliveryOrder;
use App\Models\GetDeliveryOrderlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeliveryOrderApiContoller extends Controller
{
    public function fetchDataFromApi(){
        $jsonRequest = [
            "DateFrom" => "2023-07-07",
            "DateTo" => "2023-07-07",
            "Branch_Codes_From" => ""
        ];
        
        $endpoint = 'http://demo.logicerp.com/api/GetDeliveryOrder';
        $username = 'LAdmin'; $password = '1';
        $credentials = base64_encode("$username:$password");

        $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Authorization' => 'Basic ' . $credentials,
        ])->post($endpoint, $jsonRequest);

        if(!empty($response['GetData']) && $response['Status'] == true){
            foreach($response['GetData'] as $item){
                $item['Status'] = true; $item['Message'] = $response['Message']; $item['LastGlobalModifyCode'] = $response['LastGlobalModifyCode'];
                $deliverOrder = GetDeliveryOrder::create($item);
                
                foreach($item['LstItems'] as $listItem){
                    $listItem['delivery_order_id'] = $deliverOrder->id;
                    $listItem['SO_No'] = $deliverOrder->SO_No;
                    $listItem['SO_Date'] = $deliverOrder->SO_Date;
                    $listItem['Status'] = true; $listItem['Message'] = $response['Message']; $listItem['LastGlobalModifyCode'] = $response['LastGlobalModifyCode'];
                    GetDeliveryOrderlistItem::create($listItem);
                }
            }
            return 'Data uploaded successfuly';
        }else{
            return 'No Data Found';
        }

    }
}
