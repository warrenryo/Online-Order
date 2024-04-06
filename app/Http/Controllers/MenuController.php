<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    public function index(){
        $category = Categories::all();
        $menu = Menu::all();
        return view('management.menu.index', compact('category', 'menu'));
    }

    public function createMenu(Request $request){

        $menu = new Menu;

        $menu->title = $request['title'];
        $menu->category = $request['category'];
        $menu->slug = Str::slug($request['title']);
        $menu->description = $request['description'];
        $menu->price = $request['price'];

        if($request->hasFile('image')){
            $file = $request->file('image');

            $originalFileName = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $fileName = $originalFileName;
            $file->move('images/menus/', $fileName);

            $menu->image = "images/menus/$fileName";
        }

        $menu->save();

        Alert::success('Success', 'Menu added successfully');
        return redirect()->back();
        

        
    }

    public function update(Request $request, $id){
        $menu_id = Menu::find($id);

        $menu_id->title = $request['title'];
        $menu_id->category = $request['category'];
        $menu_id->slug = Str::slug($request['title']);
        $menu_id->description = $request['description'];
        $menu_id->price = $request['price'];

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $menu_id->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('images/menus/', $fileName);

            $menu_id->image = "images/menus/$fileName";
        }

        $menu_id->update();

        Alert::success('Success', 'Menu has been updated successfully');
        return redirect()->back();
    }

    public function delete($id){
        $menu = Menu::find($id);

      

        $path = $menu->image;

        if(File::exists($path)){
            File::delete($path);
        }

        $menu->delete();
        Alert::success('Success', 'Menu has been deleted successfully');
        return redirect()->back();
    }

    // Method to handle adding items to cart
    public function addToCart(Request $request)
    {
        // Retrieve selected product IDs from the request
        $productIds = $request->input('title_id');

        // Retrieve products from database based on the selected IDs
        $cartProducts = Menu::whereIn('id', $productIds)->get();

        // You can now handle adding products to the cart, such as storing them in session, database, etc.

        // Redirect back to the previous page or wherever you want
        return redirect()->back()->with('success', 'Order added to cart successfully.');
    }

   
}
