<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class WarehouseApiController extends Controller
{
  public function saleorder(){ return SaleOrder::all(); }

  public function listitems(){ return ListItem::all(); }

  public function fetchAndPostDataToApi(){
    $queryResult = ListItem::join('saleorder', 'saleorder.Party_Order_No', '=', 'listitems.Party_Order_No')->get();

    if($queryResult->isNotEmpty()){
      $nestedArray = [];

      foreach($queryResult as $row){
        $orderNo = $row['Party_Order_No'];

        if(!isset($nestedArray[$orderNo])){
          $nestedArray[$orderNo] = $row->toArray();
          $nestedArray[$orderNo]['listItems'] = [];
        }

        $nestedArray[$orderNo]['listItems'][] = [
          "Scheme_Item" => $row->Scheme_Item,
          "User_Column_5" => $row->User_Column_5,
          "Item_Order_ID" => $row->Item_Order_ID,
          "Rate" => $row->Rate,
          "Tax Amount" => $row->{'Tax Amount'},
          "AddlItemCode" => $row->AddlItemCode,
          "Order_Qty" => $row->Order_Qty,
          "LogicUser_Code" => $row->LogicUser_Code,
          "CD_Rs" => $row->CD_Rs,
        ];

        $jsonResponse = $nestedArray[$orderNo]; // Already in JSON Format

        /* Post Data With Demo API */
        try {
          $postEndpoint = 'http://demo.logicerp.com/api/SaveSaleOrder';
          $username = 'LAdmin';
          $password = '1';
          $credentials = base64_encode("$username:$password");

          $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $credentials,
          ])->post($postEndpoint, $jsonResponse);

          /* update response in db */
          if($response->status() == 200 &&  $response['Status'] == true){
            ListItem::where('Party_User_code', $jsonResponse['Party_User_code'])->where('Party_Order_No', $jsonResponse['Party_Order_No'])
              ->update([
                'LastSavedDocNo' => $response['LastSavedDocNo'],
                'LastSavedCode' => $response['LastSavedCode'],
                'Order_No' => $response['Order_No'],
                'PrintFile' => $response['PrintFile'],
                'Status' => $response['Status'],
                'Message' => $response['Message'],
              ]);
          }
          return $response->json();
        }catch(RequestException $e){
          return 'HTTP request failed: ' . $e->response->status();
        }
      }
    }else{
      return 'Err fetching data';
    }
  }

  public function fetchAndPostDataToLiveApi()
  {
    $jsonDataLive = '{
      "RCU_State": "Madhya Pradesh",
      "RCU_Mem_Prefix": "ECM",
      "Discount Amount": null,
      "RCU_PinCode": "452010",
      "Shipping_State": "Madhya Pradesh",
      "RCU_Mobile_No": "9999999999",
      "RCU_First_Name": "Arpit",
      "Billing_MobileNo": "9999999999",
      "RCU_Last_Name": "Chouksey",
      "Party_Order_No": "test1",
      "Shipping_Address1": "Ahd-28 Sukhliya near bapat hospital ",
      "Billing_Country": "IN",
      "Shipping_FirstName": "Arpit",
      "Shipping_Address2": "Sukhliya",
      "Party_Order_Date": "09-11-2022",
      "RCU_Mem_Number": "",
      "Billing_LastName": "Chouksey",
      "Billing_PinCode": "452010",
      "Shipping_EmailID": null,
      "Branch_Code": "1030",
      "Billing_FirstName": "Arpit",
      "Shipping_PinCode": "452010",
      "ListItems": [
        {
          "Scheme_Item": 0,
          "User_Column_5": "MARK38227",
          "Item_Order_ID": "9128936034",
          "Rate": 1099,
          "Tax Amount": null,
          "AddlItemCode": "",
          "Order_Qty": 1,
          "LogicUser_Code": "WW10000089",
          "CD_Rs": 0
        },
        {
          "Scheme_Item": 0,
          "User_Column_5": "MARK38227",
          "Item_Order_ID": "9128936035",
          "Rate": 1099,
          "Tax Amount": null,
          "AddlItemCode": "",
          "Order_Qty": 1,
          "LogicUser_Code": "WW10000089",
          "CD_Rs": 0
        }
      ],
      "RCU_Country": "IN",
      "Order_Prefix": "SOEC",
      "Payment_Method": "COD",
      "Shipping_ContactPerson": "Arpit Chouksey ",
      "Order_Date": "09-11-2022",
      "RCU_City": "Indore",
      "Shipping_LastName": "Chouksey ",
      "Shipping_Country": "IN",
      "Shipping_City": "Indore",
      "Shipping_MobileNo": "9999999999",
      "Billing_City": "Indore",
      "Billing_ContactPerson": "Arpit Chouksey ",
      "Tax_Region": "IGST(INCL)",
      "Billing_Address2": "Sukhliya",
      "Billing_State": "Madhya Pradesh",
      "Billing_Address1": "Ahd-28 Sukhliya near bapat hospital ",
      "Party_User_code": "UC08",
      "Billing_EmailID": null
    }';
    $jsonResponseLive = json_decode($jsonDataLive, true);

    /* Post Data With Live API */
    try {
      $postEndpoint = 'http://m99.logicerpcloud.com/api/SaveSaleOrder';
      $username = 'S99api';
      $password = 'S99@1234';
      $credentials = base64_encode("$username:$password");

      $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic ' . $credentials,
      ])->post($postEndpoint, $jsonResponseLive);

      /* update response in db */
      if ($response->status() == 200 &&  $response['Status'] == true) {
        ListItem::where('Party_User_code', $jsonResponseLive['Party_User_code'])->where('Party_Order_No', $jsonResponseLive['Party_Order_No'])
          ->update([
            'LastSavedDocNo' => $response['LastSavedDocNo'],
            'LastSavedCode' => $response['LastSavedCode'],
            'Order_No' => $response['Order_No'],
            'PrintFile' => $response['PrintFile'],
            'Status' => $response['Status'],
            'Message' => $response['Message'],
          ]);
      }
      return $response->json();
    } catch (RequestException $e) {
      return 'HTTP request failed: ' . $e->response->status();
    }
  }
}
