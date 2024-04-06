<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemsLists extends Model
{
    use HasFactory;

    protected $table = 'hrms_r2_pos_menu_order';
    protected $fillable = [
        'order_id',
        'item_name',
        'quantity',
        'price',
        'image',
        'total_price'
    ];
}
