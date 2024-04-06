<?php

namespace App\Models\POS;

use App\Models\POS\OrderItemsLists;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'hrms_r2_pos_orders';
    protected $fillable = [
        'order_invoice',
        'customer_name',
        'discount',
        'sales_tax',
        'total_price',
        'status'
    ];

    public function cartItem(){
        return $this->hasMany(OrderItemsLists::class, 'order_id', 'id');
    }
}
