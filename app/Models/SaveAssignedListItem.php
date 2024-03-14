<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveAssignedListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'save_assigned_id',
        'DO_Txn_Code',
        'AddlItemCode',
        'LogicUser_Code',
        'Packing_Box_No',
        'Quantity',
        'MRP',
        'Lot_MRP',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
    ];

    public function saveAssignedDO(){
        return $this->belongsTo(SaveAssignedDO::class, 'save_assigned_id');
    }
}
