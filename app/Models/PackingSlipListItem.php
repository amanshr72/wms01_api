<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingSlipListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'packing_slip_id',
        'item_code',
        'quantity',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
    ];

    public function packingSlip()
    {
        return $this->belongsTo(PackingSlip::class, 'packing_slip_id');
    }
}
