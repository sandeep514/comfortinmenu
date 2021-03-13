<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuisine;
use Session;

class CuisineController extends Controller
{
    public function index()
    {
        $cuisine = Cuisine::with('getBelongedCategory')->get();
    	return view('cuisine.index' , compact('cuisine'));
    }
    public function create()
    {

    	return view('cuisine.create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required|numeric|min:0|not_in:0',
            'cuisinename' => 'required'
        ]);
		Cuisine::create([ 'catId' => $request->category, 'name' => $request->cuisinename ,'status' => 1]);
        Session::flash("success" , 'Cuisine Added successfully');

        return back();
    }
    public function delete($id)
    {
        $cuisine = Cuisine::where('id' , $id)->delete();
        Session::flash('success' , 'Cuisine deleted succssfully');
        return back();
    }
    public function changeStatus($id)
    {
        $getCat = Cuisine::where('id' , $id)->first();
        if( $getCat != null ){
            if( $getCat->status == 1 ){
                Cuisine::where('id' , $id)->update(['status' => 0]);
            }else{
                Cuisine::where('id' , $id)->update(['status' => 1]);
            }
        }
        Session::flash('success' , 'Status updated successfully');
        return back();
    }
}
