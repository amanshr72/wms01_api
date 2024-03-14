<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_order_id',
        'Txn_Code',
        'Logic_UserCode',
        'Lot_Number',
        'CF_Qty',
        'Total_Qty',
        'Rate',
        'Pending_Qty',
        'PO_MRP',
        'AddlItemCode',
        'Order_Qty',
        'SPCD_P',
        'Tax_Amount',
        'Remarks',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
        'Order_No',
        'LastGlobalModifyCode',
    ];

    public function orders(){
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }
}
