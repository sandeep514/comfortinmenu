<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $cattype = [1 => 'veg' , 2 => 'nonveg' ];
    public $table = 'category';
    public $fillable = [ 'type' , 'name'  , 'status'];


    public static function getType($selectedtype)
    {
    	return self::$cattype[$selectedtype];
    }
    public static function getActiveCategory()
    {
    	return Self::where('status' , 1)->pluck('name' , 'id')->prepend('Please select category');
    }
}