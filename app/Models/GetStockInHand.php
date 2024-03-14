<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetStockInHand extends Model
{
    use HasFactory;

    protected $fillable = [
        'Branch_Code',
        'Branch_Name',
        'Godown_Name',
        'LogicUserCode',
        'AddlItemCode',
        'Item_Name',
        'Shade_Name',
        'Pack_Name',
        'Lot_Number',
        'Lot_Code',
        'Packing',
        'Stock_Qty',
        'Lot_Sale_Rate',
        'Lot_Basic_Rate',
        'Lot_MRP',
        'Lot_SPRate1',
        'Item_Sale_Rate',
        'Item_MRP',
        'Carton_Stock',
        'Godown_Code',
        'Item_Cf_1',
        'Item_Cf_2',
        'Item_Cf_3',
        'Lot_Pur_Date',
        'Lot_Expiry_Date',
        'Status',
        'Message',
        'LastGlobalModifyCode',
    ];
}
