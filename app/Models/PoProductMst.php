<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoProductMst extends Model
{
    use HasFactory;

    protected $table = 'po_product_mst';
    
    protected $fillable = [
        'iem_id',
        'user_id',
        'group_id',
        'sr',
        'item_code',
        'item_code_pre',
        'item_name',
        'item_desc',
        'uom_desc',
        'moq',
        'size',
        'shade_name',
        'shade_code',
        'supplier_name',
        'supplier_short',
        'department',
        'category',
        'sub_category',
        'sub_category_1',
        'material',
        'brand',
        'gst_category',
        'active_inactive',
        'basic_rate',
        'per_rate',
        'sale_rate',
        'mrp',
        'hsn_code',
        'status',
        'unit_type',
        'rate_region',
        'uploaded_on',
        'checked_on',
        'approved_on',
        'updated_on',
        'updatedBy',
        'i_status',
    ];
}
