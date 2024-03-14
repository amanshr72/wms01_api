<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetStockTransferIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'Vouch_Code',
        'Vouch_No',
        'Vouch_Date',
        'Account_Code',
        'Account_Name',
        'Agent_Name',
        'Quantity',
        'Gross_Amount',
        'Net_Amount',
        'Total_Tax',
        'Branch_Name',
        'Branch_Code',
        'Currency_Name',
        'Bill_No',
        'Bill_Date',
        'GRN_Prefix',
        'GRN_Number',
        'Tax_Region_Name',
        'Action_Code',
        'Doc_Type_Desc',
        'Doc_Type',
        'ListItems',
        'Status',
        'Message',
        'LastGlobalModifyCode',
    ];
}
