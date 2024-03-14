<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDiscPointsStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'StatusCode',
        'SchemeCode',
        'SchemeName',
        'YearLimit',
        'MonthLimit',
        'BillLimit',
        'YearLimitUsed',
        'MonthLimitUsed',
        'YearBalance',
        'MonthBalance',
        'DiscP',
        'LstCompGroupDisc',
        'LastSavedCode',
        'Status',
        'Message',
    ];
}
