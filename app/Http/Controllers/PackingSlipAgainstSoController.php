<?php

namespace App\Http\Controllers;

use App\Models\PackingSlip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PackingSlipAgainstSoController extends Controller
{
    public function fetchAndPushDataToAPI(Request $request)
    {
        $packingSlips = PackingSlip::select(
            'id', 'branch_code', 'party_order_no', 'ps_prefix', 'godown_name', 'remarks', 'box_no_prefix',
        )->where('Status', null)->get();
        
        $endpoint = "http://demo.logicerp.com/api/PackingSlipAgainstSO";
        $username = 'LAdmin';
        $password = '1';
        $credentials = base64_encode("$username:$password");
        
        if($packingSlips){
            foreach ($packingSlips as $slip) {
                $filteredListItem = $slip->packingSlipListItems()->get()->map(function ($item) {
                    return [
                        'ItemCode' => $item->item_code,
                        'Quantity' => (float) $item->quantity,
                        'ListBoxs' => json_decode($item->list_boxs, true),
                    ];
                });
                
                $jsonRequest = [
                    "BranchCode" => $slip->branch_code,
                    "PartyOrderNo" => $slip->party_order_no,
                    "PS_Prefix" => $slip->ps_prefix,
                    "GodownName" => $slip->godown_name,
                    "Remarks" => $slip->remarks,
                    "Box_No_Prefix" => $slip->box_no_prefix,
                    "ListItems" => $filteredListItem->toArray(),
                ];
                
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Basic ' . $credentials,
                ])->post($endpoint, $jsonRequest);
                
                $errMsg[] =  ($response['Status'] !== false) ? 'Data posted successfully to the API from the database.' : $response['Message'];
            }
            return $errMsg;
        }

        return 'No Packaging Slip Left to Push';
    }
}
