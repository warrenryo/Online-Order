<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Menu;
use App\Models\POS\Orders;
use App\Models\Stock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Categories::count();
        $menu = Menu::count();
        $stock = Stock::count();
        $order = Orders::count();

        return view('dashboard', compact('categories', 'menu', 'stock', 'order'));
    }
}
