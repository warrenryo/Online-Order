<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\POSCart;
use App\Models\Categories;
use App\Models\POS\Orders;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\PointofSaleController;

class PointofSaleController extends Controller
{
    public function index(Request $request){
        $menu = Menu::when($request['filter_status'] !== null, function($q) use($request){
            $q->where('category', $request['filter_status']);
        })->get();
        $category = Categories::all();
        $carts = POSCart::all();

        $count_total = POSCart::sum('total_price');
        return view('pointOfSale.pointofsale', compact('menu', 'category', 'carts','count_total'));
    }

    public function addToCart(Request $request,$title, $price){
        $addCart = new POSCart;
        $image = Menu::where('title', $title)->first();
        try {
            $existing_item = POSCart::where('item_name', $title)->first();
            if($existing_item){
                
                $add = $existing_item->update([
                    'quantity' => $existing_item->quantity + 1
                ]);

                $new_qty = $existing_item->quantity;
                $price = $existing_item->price;
                if($add){
                    $existing_item->update([
                        'total_price' => $new_qty * $price
                    ]);
                }

                Alert::success('Item has been added to Orders');
                return redirect()->back();
            }else{
                $quantity = 1;
                $addCart->create([
                    'item_name' => $title,
                    'quantity' => $quantity,
                    'price' => $price,
                    'image' => $image->image,
                    'total_price' => $price 
                ]);
            }
       
            Alert::success('Item has been added to Orders');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function addQuantity($id){
        $cart = POSCart::find($id);

        if($cart){
            
            $cart_quantity = $cart->quantity;
            $increment = $cart->update([
                'quantity' => $cart_quantity + 1,
            ]);
            $price = $cart->price;
            $new_qty = $cart->quantity;
            if($increment){
                $cart->update([
                    'total_price' => $price * $new_qty
                ]);
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function decrementQuantity($id){
        $cart = POSCart::find($id);

        if($cart){
            $cart_quantity = $cart->quantity;
            $decrement = $cart->update([
                'quantity' => $cart_quantity - 1
            ]);

            $price = $cart->price;
            $total_price = $cart->total_price;
            $new_qty = $cart->quantity;
            if($decrement){
                $cart->update([
                    'total_price' =>  $total_price - $price 
                ]);
            }
            if($cart->quantity == 0){
                $cart->delete();
                return redirect()->back();
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }

        
    }

    public function deleteCart(){
        $cart = POSCart::all();

        if($cart) {
            $cart->each->delete();
            Alert::success('All orders has been remove');
            return redirect()->back();
        }
    }

    public function orders(Request $request, $total){
        $cart = POSCart::all();
        $order = new Orders;
        $discount = 0;
        $sales_tax = 0;
        $name = $request['name'];
        $status = 'Pending';
        $invoice_no = mt_rand(10000, 99999);
        if($this->invoiceNumber($invoice_no)){
            $invoice_no = mt_rand(10000, 99999);
        }
        try {
            if($total == 0){
                Alert::info('Place a menu first');
                return redirect()->back();
            }else{
                $created_order = $order->create([
                    'order_invoice' => $invoice_no,
                    'customer_name' => $name,
                    'discount' => $discount,
                    'sales_tax' => $sales_tax,
                    'total_price' => $total,
                    'status' => $status
                ]);
                
                if($created_order){
                    foreach($cart as $carts){
                        $created_order->cartItem()->create([
                            'order_id' => $created_order->id,
                            'item_name' => $carts->item_name,
                            'quantity' => $carts->quantity,
                            'price' => $carts->price,
                            'image' => $carts->image,
                            'total_price' => $carts->total_price
                        ]);
                    }
                    $cart->each->delete();
                    Alert::success('Success', 'the order has been placed');
                    return redirect()->back();
                }else{
                    Alert::error('Error', 'Something went wrong');
                    return redirect()->back();
                }
            }
            
           
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
        

    }

    public function invoiceNumber($invoice_no){
        return Orders::whereInvoiceNumber($invoice_no);
    }
}
