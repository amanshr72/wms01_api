<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDiscPointsStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeDiscPointsStatusApiContoller extends Controller
{
    public function fetchDataFromApi(){
        $data = '{
            "RCU_MobileNo":"9814855048",
            "Ext_APP_Code":"KILLER"
        }';

        $jsonRequest = json_decode($data, true);
        
        $endpoint = 'http://demo.logicerp.com/api/EmployeeDiscPointsStatus';
        $username = 'LAdmin'; $password = '1';
        $credentials = base64_encode("$username:$password");

        $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Authorization' => 'Basic ' . $credentials,
        ])->post($endpoint, $jsonRequest);

        if(!empty($response['Result']) && $response['Status'] == true){
            foreach($response['Result'] as $val){

                if (is_array($val['LstCompGroupDisc'])) {
                    $val['LstCompGroupDisc'] = json_encode($val['LstCompGroupDisc']);
                }

                $row = EmployeeDiscPointsStatus::create($val);
            }
            return 'Data uploaded successfuly';
        }else{
            return 'No Data Found';
        }

    }
}
