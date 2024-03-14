<?php

namespace App\Http\Controllers;

use App\Models\ItemMaster;
use App\Models\PoProductMst;
use App\Models\PoVendorMst;
use App\Models\StockReceipt;
use App\Models\StockReceiptListItem;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockReceiptApiController extends Controller
{
    public function showForm()
    {   
        $items = ItemMaster::select('item_code', 'item_name', 'category')->distinct('item_code', 'item_name')->get();
        $vendors = PoVendorMst::get();
        $batches = ['R456', 'U8569', 'A7858'];
        $mfgDates = ['21/02/2023', '21/02/2022', '21/02/2021'];
        $prices = ['2400', '5600', '7858'];
        $tax = ['10%', '12%', '18%'];

        return view('stock-receipt-form', compact('items', 'vendors', 'batches', 'mfgDates', 'prices', 'tax'));
    }

    public function getProductDetailFromItemCode($itemCode)
    {
        $itemDetails = PoProductMst::where('item_code', $itemCode)
            ->join('po_vendor_mst', 'po_product_mst.supplier_short', '=', 'po_vendor_mst.vendorCode')
            ->select(
                'po_product_mst.unit_type',
                'po_product_mst.uom_desc',
                'po_product_mst.category',
                'po_product_mst.item_code',
                'po_product_mst.item_name',
                'po_product_mst.gst_category',
                'po_product_mst.sale_rate',
                'po_vendor_mst.CompanyName'
            )
            ->first();

        return response()->json($itemDetails);
    }

    public function store(Request $request)
    {   
        try{
            $listItemsArray = json_decode($request->input('listItems'), true);
    
            foreach ($listItemsArray as $item){
                $itemCode[] = $item['itemCodeVal'];
            }
        
            $selectedColumns = ['itemCodeVal', 'lotNo', 'quantityVal', 'priceVal', 'finalAmount', 'mfgDateVal', 'expiryDate'];
            $filterlListItemApiData = array_map(function ($item) use ($selectedColumns) {
                $selectedItem = array_intersect_key($item, array_flip($selectedColumns));
                $renamedItem = array_combine(['ItemCode', 'LotNo', 'Quantity', 'Rate', 'Mrp', 'Manufacturing_Date', 'Expiry_Date'], $selectedItem);
                return $renamedItem;
            }, $listItemsArray);
            
            $stockReceipt = StockReceipt::create([
                'item_code' => json_encode($itemCode),
                'vendor_name' => $request->vendor_name,
                'location' => $request->location,
                'refrence_document_no' => $request->refrence_document_no,
                'refrence_date' => $request->refrence_date,
                'user_prefix' => $request->user_prefix,
                'branch_code' => 2,
                'doc_prefix' => 'IS',
                'issued_to' => 'DAMAGE',
                'godown_name' => '',
                'received_from' => '',
            ]);
            
            if (count($listItemsArray) > 0) {
                foreach ($listItemsArray as $item) {
                    StockReceiptListItem::create([
                        'item_masters_id' => ItemMaster::select('id', 'item_code')->where('item_code', $item['itemCodeVal'])->value('id'),
                        'stock_receipts_id' => $stockReceipt->id,
                        'item_name' => $item['itemNameVal'],
                        'vendor_name' => $item['vendorName'],
                        'item_code' => $item['itemCodeVal'],
                        'lot_no' => null,
                        'quantity' => $item['quantityVal'],
                        'price' => $item['priceVal'],
                        'tax_amount' => $item['taxAmount'],
                        'gross_amount' => $item['grossAmount'],
                        'final_amount' => $item['finalAmount'],
                        'manufacturing_date' => isset($item['mfgDateVal']) && ($date = \DateTime::createFromFormat('d/m/Y', $item['mfgDateVal'])) ? $date->format('Y-m-d') : null,
                        'expiry_date' => null,
                        'available_stock' => $item['availableStockVal'],
                        'batch_number' => $item['batcheNoVal'],
                        'tax' => $item['taxVal'],
                    ]);
                }
            }

            // Post Data To API 
            $data = json_encode(["Branch_Code" => 2, "Doc_Prefix" => "IS", "IssueTo" => "DAMAGE", "GodownName" => "", "ReceivedFrom" => "", "ListItems" => $filterlListItemApiData]);
            $jsonRequestData = json_decode($data, true);
            
            $endpoint = 'http://demo.logicerp.com/api/SaveIssueStock';
            $username = 'LAdmin'; $password = '1';
            $credentials = base64_encode("$username:$password");

            $response = Http::withHeaders([
                'Content-Type' => 'application/json', 
                'Authorization' => 'Basic ' . $credentials,
            ])->post($endpoint, $jsonRequestData);
            
            if($response['Status'] == "true"){
                StockReceiptListItem::where('stock_receipts_id', $stockReceipt->id)->update([
                    'Status' => 'true', 
                    'Message' => $response['Message'],
                    'LastSavedDocNo' => $response['LastSavedDocNo'], 
                    'LastSavedCode' => $response['LastSavedCode']
                ]);
            }else{
                return redirect()->route('stock.form')->with('danger', 'Whoops! '.$response['Message'].', But Data has been uploaded successfully');
            }
            
            return redirect()->route('stock.form')->with('success', 'Data uploaded in DB & API successfully');
        }catch(Exception $e){
            return redirect()->route('stock.form')->with('danger', 'An error occurred: ' . $e->getMessage());
        }
    }
}
