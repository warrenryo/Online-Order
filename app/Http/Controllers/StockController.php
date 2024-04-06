<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StockController extends Controller
{
    public function index()
    {
        $stock = Stock::all();
        return view('management.stock.index', compact('stock'));
    }

    public function createStock(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'amount' => 'required|numeric',
            'quantity' => 'required|numeric',
            'purchases' => 'required|numeric'
        ]);

        try {
            $stock = new Stock;

            $stock->create([
                'item' => $request->input('title'),
                'amount' => $request->input('amount'),
                'quantity' => $request->input('quantity'),
                'purchases' => $request->input('purchases'),
            ]);
    
            if($stock){
                Alert::success('Success!', 'Stock added successfully');
                return redirect()->back();
            }else{
                Alert::error('Error!', 'Stock added successfully');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Alert::error('Error' , $th->getMessage());
            return redirect()->back();
        }
       

       
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::where('item', $id)->first();
    
        $update_stock = $stock->update([
            'item' => $request->input('item'),
            'amount' => $request->input('amount'),
            'quantity' => $request->input('quantity'),
            'purchases' => $request->input('purchases')
        ]);
    
        Alert::success('Success', 'Stock ' . $stock->item . ' has been updated');
        return redirect()->back();
    }
    
    public function delete($id)
    {
        $stock = Stock::where('id', $id)->firstOrFail();
        $stock->delete();

        Alert::success('Success!', 'Stock ' . $stock->item . ' has been deleted');
        return redirect()->back();
    }
}
