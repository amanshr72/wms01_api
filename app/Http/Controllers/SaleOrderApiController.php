<?php

namespace App\Http\Controllers;

use App\Models\GetSaleOrder;
use App\Models\GetStockInHand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SaleOrder;
use App\Models\SaleOrderListItem;

class SaleOrderApiController extends Controller
{   
    protected $credentials;
    protected $saveSaleOrderEndPoint;
    protected $getSaleOrderEndPoint;
    protected $stockInHandEndPoint;

    public function __construct(){
        $this->saveSaleOrderEndPoint = 'http://demo.logicerp.com/api/SaveSaleOrder';
        $this->getSaleOrderEndPoint = 'http://demo.logicerp.com/api/GetSaleOrder';
        $this->stockInHandEndPoint = 'http://demo.logicerp.com/api/GetStockInHand';
        $username = 'LAdmin'; $password = '1';
        $this->credentials = base64_encode("$username:$password");
    }

    public function fetchDataFromApi(){
        
        $data =  '{
            "GlobalModifyCode": 5612,
            "Doc_Codes": "",
            "DateFrom": null,
            "DateTo": null,
            "Branch_Codes_From": ""
        }';

        $jsonRequest = json_decode($data, true); 
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Authorization' => 'Basic ' . $this->credentials,
        ])->post($this->getSaleOrderEndPoint, $jsonRequest);
        
        if(isset($response['GetData'])){
            foreach($response['GetData'] as $val){
                GetSaleOrder::create([
                    'Vouch_Code' => $val['Vouch_Code'],
                    'Order_Prefix' => $val['Order_Prefix'],
                    'Order_Number' => $val['Order_Number'],
                    'Order_No' => $val['Order_No'],
                    'Order_Date' => $val['Order_Date'],
                    'Valid_Date' => $val['Valid_Date'],
                    'Party_Name' => $val['Party_Name'],
                    'Party_User_Code' => $val['Party_User_Code'],
                    'Agent_Name' => $val['Agent_Name'],
                    'Branch_Code' => $val['Branch_Code'],
                    'Branch_Name' => $val['Branch_Name'],
                    'Branch_Short_Name' => $val['Branch_Short_Name'],
                    'Exchange_Rate' => $val['Exchange_Rate'],
                    'Currency_Name' => $val['Currency_Name'],
                    'Order_Amount' => $val['Order_Amount'],
                    'Net_Order_Amount' => $val['Net_Order_Amount'],
                    'Party_Order_No' => $val['Party_Order_No'],
                    'Action_Code' => $val['Action_Code'],
                    'ListItems' => json_encode($val['ListItems']),
                    'Status' => $response['Status'],
                    'Mesaage' => $response['Message'],
                    'LastGlobalModifyCode' => $response['LastGlobalModifyCode'],
                ]);
            }
        }
        return 'Data entry made'; // return $saleOrderData;
    }

    public function fetchDataAndPostToApi(){
        $jsonRequest = [
            "Branch_Codes" => 2,
            "LogicUserCode" => "8903247032716,8903247047413",
            "AddlItemCode" => "",
            "Godown_Name" => "",
            "RequestDate" => now()->format('Y-m-d')
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json', 
            'Authorization' => 'Basic ' . $this->credentials,
        ])->post($this->stockInHandEndPoint, $jsonRequest);

        foreach($response['GetData'] as $val){ 
            $val['Stock_Qty'];
        }
        return $response['GetData'];
        
        // $orders = SaleOrder::where('status', null)->get();
        // foreach($orders as $order){
            
        //     $orderData = [];
        //     $listItems = $order->saleOrderListItems()->get();
            
        //     foreach ($order->getAttributes() as $columnName => $columnValue) {
        //         $orderData[$columnName] = $columnValue;
        //     }
            
        //     $orderData['ListItems'] = $listItems;
        //     $jsonRequest = $orderData;
            
        //     $response = Http::withHeaders([
        //         'Content-Type' => 'application/json', 
        //         'Authorization' => 'Basic ' . $this->credentials,
        //     ])->post($this->saveSaleOrderEndPoint, $jsonRequest);

        //     if($response['Status'] !== false && !empty($response['LastSavedDocNo']) && !empty($response['Order_No'])) {
        //         SaleOrderListItem::where('sale_order_id', $order->id)->update([
        //             'LastSavedDocNo' => $response['LastSavedDocNo'], 
        //             'LastSavedCode' => $response['LastSavedCode'], 
        //             'Order_No' => $response['Order_No'],
        //             'Status' => "true", 
        //             'Message' => $response['Message'], 
        //         ]);

        //         SaleOrder::find($order->id)->update([
        //             'LastSavedDocNo' => $response['LastSavedDocNo'], 
        //             'LastSavedCode' => $response['LastSavedCode'], 
        //             'Order_No' => $response['Order_No'],
        //             'Status' => "true", 
        //             'Message' => $response['Message'], 
        //         ]);
        //     }else{
        //         $errMessage[] =  $response['Message'] . ' of <strong> Branch Code: ' . $order->Branch_Code . '</strong>';
        //     }    
        // }
        // return !empty($errMessage)
        // ? "<ul>" . implode('', array_map(fn($msg) => "<li>$msg</li>", $errMessage)) . "</ul>"
        // : 'Data posted successfully to the API from the database.';
        
    }
}
