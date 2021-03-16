<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class Cuisine extends Model
{
    use HasFactory;
    protected $table = 'cuisine';
    protected $fillable = ['catId','name','status'];


    public function getBelongedCategory()
    {
    	return $this->belongsTo(Category::class ,'catId' , 'id' );
    }
    public function getBelongedProduct()
    {
    	return $this->hasMany(Product::class ,'cuisineId' , 'id' );
    }
}
