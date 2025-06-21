<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    protected $fillable = [
        'product_id', 'quantity', 'unit_price',
        'discount_percent', 'tax_percent', 'subtotal', 'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
