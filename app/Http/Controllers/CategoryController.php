<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
        
    	dd($request->all());
    }
}