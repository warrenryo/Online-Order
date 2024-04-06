<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSCart extends Model
{
    use HasFactory;
    protected $table = 'hrms_r2_pos_cart';
    protected $fillable = [
        'item_name',
        'quantity',
        'price',
        'image',
        'total_price'
    ];
}
