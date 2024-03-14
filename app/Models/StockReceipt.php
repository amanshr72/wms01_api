<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_masters_id',
        'item_code',
        'item_name',
        'vendor_name',
        'location',
        'refrence_doc_no',
        'refrence_date',
        'user_prefix',
        'item_desc',
        'branch_code',
        'doc_prefix',
        'issued_to',
        'godown_name',
        'received_from',
        'status',
        'message'
    ];
}
