<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::get();
        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'categorytype' => 'required|array',
            'categoryname' => 'required'
        ]);
        foreach ($request->categorytype as $k => $v) {
            Category::create(['type' => $v, 'name' => $request->categoryname]);
        }
        Session::flash("success", 'Category Added successfully');

        return back();
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->delete();
        Session::flash('success', 'Category deleted succssfully');
        return back();
    }
    
    public function changeStatus($id)
    {
        $getCat = Category::where('id', $id)->first();
        if ($getCat != null) {
            if ($getCat->status == 1) {
                Category::where('id', $id)->update(['status' => 0]);
            } else {
                Category::where('id', $id)->update(['status' => 1]);
            }
        }
        Session::flash('success', 'Status updated successfully');
        return back();
    }
}
