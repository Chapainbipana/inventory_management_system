<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class product_category extends Model
{
    use HasFactory;
    protected $table ='product_category';
    protected $fillable = ['name', 'image'];

     public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
    
}
