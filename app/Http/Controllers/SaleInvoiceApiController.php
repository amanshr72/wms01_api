<?php

namespace App\Http\Controllers;

use App\Models\GetSaleInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaleInvoiceApiController extends Controller
{
    public function fetchDataFromApi(){
        $data = '{
         "GlobalModifyCode": 0,
         "Doc_Codes": "",
         "DateFrom":  null,
         "DateTo":  null,
         "Branch_Codes_From": ""
        }';

        $jsonRequest = json_decode($data, true);
        
        $endpoint = 'http://demo.logicerp.com/api/GetSaleInvoice';
        $username = 'LAdmin'; $password = '1';
        $credentials = base64_encode("$username:$password");

        $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Authorization' => 'Basic ' . $credentials,
        ])->post($endpoint, $jsonRequest);

        if(!empty($response['GetData']) && $response['Status'] == true){
            foreach($response['GetData'] as $val){
                
                if (is_array($val['LstItems']) && is_array($val['ListCreditCard'])) {
                    $val['LstItems'] = json_encode($val['LstItems']);
                    $val['ListCreditCard'] = json_encode($val['ListCreditCard']);
                }

                $row = GetSaleInvoice::create($val);
            }
            return 'Data uploaded successfuly';
        }else{
            return 'No Data Found';
        }

    }
}
