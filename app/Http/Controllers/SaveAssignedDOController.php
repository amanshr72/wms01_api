<?php

namespace App\Http\Controllers;

use App\Models\SaveAssignedDO;
use App\Models\SaveAssignedListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaveAssignedDOController extends Controller
{   
    protected $endpoint;
    protected $credentials;

    public function __construct()
    {
        $this->endpoint = 'http://demo.logicerp.com/api/SaveAssignedDO';
        $username = 'LAdmin';
        $password = '1';
        $this->credentials = base64_encode("$username:$password");
    }

    public function fetchDataAndPostToApi(){
        $orders = SaveAssignedDo::select('id', 'Doc_Code', 'Doc_Prefix', 'Doc_Number', 'DO_Branch_Code')->whereNull('Status')->get();
        
        foreach($orders as $order){
            $orderData = [];
            $listItems = $order->listItems()->select('DO_Txn_Code', 'AddlItemCode', 'LogicUser_Code', 'Packing_Box_No', 'Quantity', 'MRP', 'Lot_MRP')->get();

            foreach ($order->getAttributes() as $columnName => $columnValue) {
                $orderData[$columnName] = $columnValue;
                unset($orderData['id']);
            }

            $orderData['LstItems'] = $listItems;
            $jsonRequest = $orderData;

            $response = Http::withHeaders([
                'Content-Type' => 'application/json', 
                'Authorization' => 'Basic ' . $this->credentials,
            ])->post($this->endpoint, $jsonRequest);

            if($response['Status'] !== false && $response['LastSavedDocNo'] !== 0) {
                SaveAssignedListItem::where('save_assigned_id ', $order->id)->update([
                    'LastSavedDocNo' => $response['LastSavedDocNo'], 
                    'LastSavedCode' => $response['LastSavedCode'], 
                    'Order_No' => $response['Order_No'],
                    'Status' => "true", 
                    'Message' => $response['Message'], 
                ]);

                SaveAssignedDo::find($order->id)->update([
                    'LastSavedDocNo' => $response['LastSavedDocNo'], 
                    'LastSavedCode' => $response['LastSavedCode'], 
                    'Order_No' => $response['Order_No'],
                    'Status' => "true", 
                    'Message' => $response['Message'], 
                ]);
                $message[] = 'Data saved successfully to the API from the database.';
            }else{
                $message[] =  'Warning Message : ' . $response['Message'];;
            } 
        }

        return !empty($message)
        ? "<ul>" . implode('', array_map(fn($msg) => "<li>$msg</li>", $message)) . "</ul>"
        : 'Data saved successfully to the API from the database.';
    }
}
