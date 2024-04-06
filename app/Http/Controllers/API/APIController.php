<?php

namespace App\Http\Controllers\API;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function menu(){
        $menu = Menu::all();

        return response()->json($menu);
    }
}
