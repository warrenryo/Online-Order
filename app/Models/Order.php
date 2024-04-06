<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'hrms_r2_order';
    protected $fillable = [
    'order',
    'date',
    'customer',
    'total_amount',
    'total_received',
    'change',
    'payment_type',
    'payment_method'
    ];
}
