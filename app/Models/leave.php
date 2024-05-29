<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    use HasFactory;
    protected $primaryKey = 'leave_id';
    protected $fillable = [
        'empid',
        'reason',
        'leave_message',
        'document',
        'fromdate',
        'todate',
        'leave_days',
    ];
}
