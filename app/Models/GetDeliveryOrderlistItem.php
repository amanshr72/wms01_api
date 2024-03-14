<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetDeliveryOrderlistItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_order_id',
        'SO_No',
        'SO_Date',
        'ItemDetCode',
        'DO_Txn_Code',
        'AddlItemCode',
        'LogicUser_Code',
        'Packing_Box_No',
        'Quantity',
        'Packing',
        'Packing_CF1',
        'Packing_CF1_Desc',
        'MRP',
        'Lot_MRP',
        'BinCode',
        'LastGlobalModifyCode',
        'Status',
        'Message',
    ];
}
