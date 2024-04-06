<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){

        $category = Categories::all();
        return view('management.categories.index', compact('category'));
    }

    public function create(Request $request){

        $this->validate($request, [
            'title' => 'required|min:3'
        ]);

        $category = new Categories;

        $category->create([
            'title' => $request['title'],
            'slug' => Str::slug($request['title'])
        ]);

        Alert::success('Success!', 'Category added successfully');
        return redirect()->back();
    }

    public function update(Request $request, $slug){
        $category = Categories::where('slug', $slug)->first();
        
        $update_category = $category->update([
            'title' => $request['title']
        ]);

        Alert::success('Success', 'Category '.$category->title.' has been updated');
        return redirect()->back();
    }

    public function delete($slug){
        $category = Categories::where('slug', $slug)->first();

        $category->delete();

        Alert::success('Success!', 'Category '.$category->title.' has been deleted');
        return redirect()->back();
    }
}
