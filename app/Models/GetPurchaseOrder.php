<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetPurchaseOrder extends Model
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
        'ListItems',
        'Status',
        'Message',
        'LastGlobalModifyCode',
    ];
}
