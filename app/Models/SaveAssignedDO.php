<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveAssignedDO extends Model
{
    use HasFactory;

    protected $table = 'save_assigned_dos';

    protected $fillable = [
        'Doc_Code',
        'Doc_Prefix',
        'Doc_Number',
        'DO_Branch_Code',
        'Status',
        'Message',
        'LastSavedDocNo',
        'LastSavedCode',
    ];

    public function listItems(){
        return $this->hasMany(SaveAssignedListItem::class, 'save_assigned_id');
    }
}
