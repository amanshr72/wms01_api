<?php

namespace App\Http\Controllers;

use App\Models\GetPurchaseVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PurchaseVoucherApiContoller extends Controller
{
    public function fetchDataFromApi(){
        $data = '{
            "GlobalModifyCode": 0,
            "Doc_Codes": " 1",
            "DateFrom":  null,
            "DateTo":  null,
            "Branch_Codes_From": 2
           }';

        $jsonRequest = json_decode($data, true);

        $endpoint = 'http://demo.logicerp.com/api/GetPurchaseVoucher';
        $username = 'LAdmin';
        $password = '1';
        $credentials = base64_encode("$username:$password");

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $credentials,
        ])->post($endpoint, $jsonRequest);

        if (!empty($response['GetData']) && $response['Status'] == true) {
            foreach ($response['GetData'] as $val) {

                if (is_array($val['ListItems'])) {
                    $val['ListItems'] = json_encode($val['ListItems']);
                }

                $row = GetPurchaseVoucher::create($val);
            }
            return 'Data uploaded successfuly';
        } else {
            return 'No Data Found';
        }
    }
}
