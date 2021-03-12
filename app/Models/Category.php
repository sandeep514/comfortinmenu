<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $type = ['veg' = 1 , 'nonveg' => 2];
    public $table = 'category';
    public $fillable = [ 'type' , 'name'  , 'status'];
}