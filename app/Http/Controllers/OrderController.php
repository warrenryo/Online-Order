<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\POS\Orders;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::with('cartItem')->get();
        return view('management.order.index', compact('orders'));
    }

    
}
