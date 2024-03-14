<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetSaleOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'Vouch_Code',
        'Order_Prefix',
        'Order_Number',
        'Order_No',
        'Order_Date',
        'Valid_Date',
        'Party_Name',
        'Party_User_Code',
        'Agent_Name',
        'Branch_Code',
        'Branch_Name',
        'Branch_Short_Name',
        'Exchange_Rate',
        'Currency_Name',
        'Order_Amount',
        'Net_Order_Amount',
        'Party_Order_No',
        'Action_Code',
        'ListItems',
        'Status',
        'Message',
        'LastGlobalModifyCode',
    ];
}
