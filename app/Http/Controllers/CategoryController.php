<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;
class CategoryController extends Controller
{
    public function index()
    {
    	return view('category.index');
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
        foreach($request->categorytype as $k => $v){
            Category::create(['type' => $v, 'name' => $request->categoryname]);
        }
        Session::flash("success" , 'Category Added successfully');

        return back();
    	dd($request->all());
    }
}