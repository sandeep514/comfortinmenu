<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cuisine;
use Session;

class ProductController extends Controller
{
    public function getCategoryByType($type)
    {
        return Category::where('type', $type)->get();
    }
    public function getCuisineByType($catId)
    {
        return Cuisine::where('catId', $catId)->get();
    }



    public function index()
    {
        $products = Product::with('cuisine_rel', 'cuisine_rel.getBelongedCategory')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('cuisine.create');
    }

    public function save(Request $request)
    {
        // dd($request->productdesc);
        // $request->validate([
        //     'category' => 'required|numeric|min:0|not_in:0',
        //     'cuisinename' => 'required'
        // ]);
        // dd($request->category);
        Product::create(
            [
            'productName' => $request->productname,
            'productDesc' => $request->productdesc,
            'productRating' => $request->productRating,
            'productPrice' =>$request->productPrice,
            'cuisineId' => $request->cuisine,
            'status' => 1
            ]
        );
        Session::flash("success", 'Cuisine Added successfully');

        return back();
    }

    public function delete($id)
    {
        $cuisine = Product::where('id', $id)->delete();
        Session::flash('success', 'Cuisine deleted succssfully');
        return back();
    }

    public function changeStatus($id)
    {
        $getCat = Product::where('id', $id)->first();
        if ($getCat != null) {
            if ($getCat->status == 1) {
                Product::where('id', $id)->update(['status' => 0]);
            } else {
                Product::where('id', $id)->update(['status' => 1]);
            }
        }
        Session::flash('success', 'Status updated successfully');
        return back();
    }
}
