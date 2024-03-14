<?php

namespace App\Http\Controllers;

use App\Models\GetStockInHand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockInHandApiContoller extends Controller
{
    public function fetchDataFromApi(){
        $data = '{
            "Branch_Codes": 2,
            "LogicUserCode": "8903247032716,8903247035045,8903247047413",
            "AddlItemCode": "",
            "Godown_Name": "",
            "RequestDate": ""
        }';

        $jsonRequest = json_decode($data, true);
        
        $endpoint = 'http://demo.logicerp.com/api/GetStockInHand';
        $username = 'LAdmin'; $password = '1';
        $credentials = base64_encode("$username:$password");

        $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Authorization' => 'Basic ' . $credentials,
        ])->post($endpoint, $jsonRequest);

        if(!empty($response['GetData']) && $response['Status'] == true){
            foreach($response['GetData'] as $val){
                $row = GetStockInHand::create($val);
            }
            return 'Data uploaded successfuly';
        }else{
            return 'No Data Found';
        }

    }

    public function fetchDeltaStockDataFromApi(){
        $data = '{
            "StockType": "DELTA",
            "Branch_Codes": 2,
            "LogicUserCode": "",
            "AddlItemCode": "",
            "Godown_Name": "",
            "RequestDate": "2022-10-03 17:16"
        }';

        $jsonRequest = json_decode($data, true);
        
        $endpoint = 'http://demo.logicerp.com/api/GetStockInHand';
        $username = 'LAdmin'; $password = '1';
        $credentials = base64_encode("$username:$password");

        $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Authorization' => 'Basic ' . $credentials,
        ])->post($endpoint, $jsonRequest);

        if(!empty($response['GetData']) && $response['Status'] == true){
            foreach($response['GetData'] as $val){
                $row = GetStockInHand::create($val);
            }
            return 'Data uploaded successfuly';
        }else{
            return 'No Data Found';
        }

    }

}
