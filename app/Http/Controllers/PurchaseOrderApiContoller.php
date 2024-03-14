<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PurchaseOrderApiContoller extends Controller
{   
    protected $credentials;
    protected $savePoEndPoint;
    protected $getPoEndPoint;

    public function __construct(){
        $this->savePoEndPoint = 'http://demo.logicerp.com/api/SavePurchaseOrder';
        $this->getPoEndPoint = 'http://demo.logicerp.com/api/GetPurchaseOrder';
        $username = 'LAdmin'; $password = '1';
        $this->credentials = base64_encode("$username:$password");
    }

    public function getDataFromApi()
    {
        $jsonRequest = [
            "GlobalModifyCode" => 0,
            "Doc_Codes" => " 1",
            "DateFrom" =>  null,
            "DateTo" =>  null,
            "Branch_Codes_From" => 2
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $this->credentials,
        ])->post($this->getPoEndPoint, $jsonRequest);
        
        if (!empty($response['GetData']) && $response['Status'] == true) {    
            foreach ($response['GetData'] as $item) {
                $item['Status'] = true; $item['Message'] = $response['Message']; $item['LastGlobalModifyCode'] = $response['LastGlobalModifyCode'];
                $purchaseOrder = PurchaseOrder::create($item);

                foreach($item['LstItems'] as $listItem){
                    $listItem = array_merge($listItem, [
                        'delivery_order_id' => $purchaseOrder->id,
                        'Status' => true,
                        'Message' => $response['Message'],
                        'LastSavedDocNo' => $response['LastSavedDocNo'],
                        'Order_No' => $response['Order_No'],
                        'LastSavedCode' => $response['LastSavedCode']
                    ]);
                    PurchaseOrderListItem::create($listItem);
                }

            }
            return 'Data uploaded successfuly';
        } else {
            return 'No Data Found To Insert';
        }
    }

    public function fetchDataAndPostToApi()
    {
        $columns = ['id', 'Branch_Short_Name', 'Branch_Code', 'Order_Prefix', 'Order_Date', 'Remarks', 'Tax_Region', 'Delivery_Date', 'Valid_Till_Date', 'Delivery_Add_1', 'Delivery_Add_2', 'Delivery_Add_3', 'Delivery_At', 'Party_User_code', 'Total_Other_Val_1', 'Total_Other_Val_2', 'Total_Other_Val_3', 'Total_Other_Val_4', 'Total_Other_Val_5', 'Total_Other_Val_6', 'Total_Other_Val_7', 'Agent_Name', 'Company_Name', 'Transport_Name'];
        $listItemColumn = ['Logic_UserCode', 'AddlItemCode', 'Order_Qty', 'Rate', 'SPCD_P', 'Tax_Amount', 'Remarks'];
        $orders = PurchaseOrder::select($columns)->whereNull('Status')->get();

        if($orders->count() > 0){
            foreach($orders as $order){
                $orderData = [];
                $listItems = $order->purchaseOrderListItems()->select($listItemColumn)->get();
    
                foreach ($order->getAttributes() as $columnName => $columnValue) {
                    $orderData[$columnName] = $columnValue;
                    unset($orderData['id']);
                }
    
                $listItems = $listItems->map(function ($item) {
                    $item['LogicUser_Code'] = $item['Logic_UserCode']; 
                    unset($item['Logic_UserCode']); 
                    return $item;
                });
                
                $orderData['ListItems'] = $listItems;
                $jsonRequest = $orderData;
                
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json', 
                    'Authorization' => 'Basic ' . $this->credentials,
                ])->post($this->savePoEndPoint, $jsonRequest);
    
                if($response['Status'] !== false && !empty($response['LastSavedDocNo']) && !empty($response['LastSavedCode'])) {
                    PurchaseOrderListItem::where('purchase_order_id', $order->id)->update([
                        'LastSavedDocNo' => $response['LastSavedDocNo'], 
                        'LastSavedCode' => $response['LastSavedCode'], 
                        'Order_No' => $response['Order_No'],
                        'Status' => true, 
                        'Message' => $response['Message'], 
                    ]);
    
                    PurchaseOrder::find($order->id)->update([
                        'LastSavedDocNo' => $response['LastSavedDocNo'], 
                        'LastSavedCode' => $response['LastSavedCode'], 
                        'Order_No' => $response['Order_No'],
                        'Status' => true, 
                        'Message' => $response['Message'], 
                    ]);
                    $message[] = 'Data saved successfully to the API from the database of <strong> Branch Code: ' . $order->Branch_Code . '</strong>';
                }else{
                    $message[] =  $response['Message'] . ' of <strong> Branch Code: ' . $order->Branch_Code . '</strong>';
                }    
            }
            return !empty($message)
            ? "<ul>" . implode('', array_map(fn($msg) => "<li>$msg</li>", $message)) . "</ul>"
            : 'Data posted successfully to the API from the database.';
        }
        return 'No Purchase Order Left to Push';
    }
}
