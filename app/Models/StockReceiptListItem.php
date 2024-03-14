<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReceiptListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_masters_id',
        'stock_receipts_id',
        'item_code',
        'vendor_name',
        'item_name',
        'available_stock',
        'batch_number',
        'branch_code',
        'tax',
        'tax_amount',
        'gross_amount',
        'final_amount',
        'lot_no',
        'quantity',
        'rate',
        'price',
        'manufacturing_date',
        'expiry_date',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
    ];
}
