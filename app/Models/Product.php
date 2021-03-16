<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuisine;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = ['productName','productDesc','productRating','productPrice','cuisineId','status'];

    public function cuisine_rel()
    {
        return $this->belongsTo(Cuisine::class, 'cuisineId', 'id');
    }
}
