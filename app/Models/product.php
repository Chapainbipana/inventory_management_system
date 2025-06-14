<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
     protected $table = 'product'; // Optional if the table name follows Laravel conventions

    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(product_category::class, 'category_id');
    }
    public function stock()
{
    return $this->hasOne(Stock::class);
}
}
