<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'listitems';

    protected $fillable = [
        'Party_User_code',
        'Party_Order_No',
        'Party_Order_Date',
        'Scheme_Item',
        'User_Column_5',
        'Item_Order_ID',
        'Rate',
        'Tax Amount',
        'AddlItemCode',
        'Order_Qty',
        'LogicUser_Code',
        'CD_Rs',
    ];
}
