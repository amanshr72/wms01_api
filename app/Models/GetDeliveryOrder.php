<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetDeliveryOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'Doc_Type',
        'Doc_Code',
        'Doc_Prefix',
        'Doc_Number',
        'DO_Date',
        'DO_Branch_Code',
        'PartyUserCode',
        'SO_Head_Code',
        'SO_No',
        'SO_Date',
        'Customer_Name',
        'SO_Delivery_Date',
        'Action_Code',
        'Logic_User_Name',
        'CurrencyName',
        'ExchangeRate',
        'PickListDocCode',
        'LastGlobalModifyCode',
        'Status',
        'Message',
    ];

    public function deliverorderListItems(){
        return $this->hasMany(GetDeliveryOrder::class, 'delivery_order_id');
    }
}
