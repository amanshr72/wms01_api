<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoData extends Model
{
    use HasFactory;

    protected $table = 'po_data';

    protected $fillable = [
        'id',
        'groupid',
        'po_prefix',
        'po_number',
        'product_name',
        'category',
        'vendor_company',
        'Item_Code',
        'Qty',
        'Price',
        'User_Price',
        'Discount',
        'Tax',
        'SubTotal',
        'Ftotal',
        'UOM',
        'U_Desc',
        'checker_price',
        'approver_price',
        'notes',
        'created_on',
        'created_by',
        'po_type',
        'status',
        'approvedBy',
        'approvedOn',
        'unapprovedBy',
        'unapprovedOn',
        'ReleasedBy',
        'ReleasedOn',
        'cancelledBy',
        'cancelledOn',
        'checkedby',
        'checkedon',
        'Location',
        'Address_as',
        'Delivery_Address',
        'mk_price_datetime',
        'mk_price_updated_by',
        'ck_price_datetime',
        'ck_price_updated_by',
        'app_price_datetime',
        'app_price_updated_by',
        'comment',
        'advance',
        'payment_type',
        'in_days',
        'on_the_basic_of',
    ];    
}
