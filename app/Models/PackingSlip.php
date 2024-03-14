<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_code',
        'party_order_no',
        'ps_prefix',
        'godown_name',
        'remarks',
        'box_no_prefix',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
    ];

    public function packingSlipListItems()
    {
        return $this->hasMany(PackingSlipListItem::class, 'packing_slip_id');
    }
}
