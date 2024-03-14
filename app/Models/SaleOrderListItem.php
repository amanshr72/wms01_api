<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrderListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_order_id',
        'LogicUser_Code',
        'AddlItemCode',
        'Order_Qty',
        'Rate',
        'CD_P',
        'TD_P',
        'SPCD_P',
        'CD_Rs',
        'Scheme_Item',
        'Adjust_Item',
        'Tax_Amount',
        'Remarks',
        'User_Column_1',
        'User_Column_2',
        'User_Column_3',
        'User_Column_4',
        'User_Column_5',
        'Item_Order_ID',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
        'Order_No'
    ];

    public function saleOrder()
    {
        return $this->belongsTo(SaleOrder::class, 'sale_order_id');
    }
}
