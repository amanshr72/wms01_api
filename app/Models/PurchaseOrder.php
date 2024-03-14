<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'Vouch_Code',
        'Order_Prefix',
        'Order_Number',
        'Order_Date',
        'Party_Name',
        'Party_User_Code',
        'Agent_Name',
        'Branch_Name',
        'Branch_Short_Name',
        'Exchange_Rate',
        'Currency_Name',
        'Order_Amount',
        'Total_Tax',
        'Net_Order_Amount',
        'Supplier_Order_No',
        'Delivery_Date',
        'Quotation_No',
        'Transfer_Branch_Name',
        'Transfer_Branch_Code',
        'Quotation_Date',
        'Action_Code',
        'Remarks',
        'Tax_Region',
        'Delivery_Date',
        'Valid_Till_Date',
        'Delivery_Add_1',
        'Delivery_Add_2',
        'Delivery_Add_3',
        'Delivery_At',
        'Party_User_code',
        'Total_Other_Val_1',
        'Total_Other_Val_2',
        'Total_Other_Val_3',
        'Total_Other_Val_4',
        'Total_Other_Val_5',
        'Total_Other_Val_6',
        'Total_Other_Val_7',
        'Company_Name',
        'Transport_Name',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
        'Order_No',
        'LastGlobalModifyCode',
    ];
    
    public function purchaseOrderListItems(){
        return $this->hasMany(PurchaseOrderListItem::class, 'purchase_order_id', 'id');
    }
}
