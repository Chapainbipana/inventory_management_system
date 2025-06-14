<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class price extends Model
{
    use HasFactory;
    protected $table = 'price'; // Optional if the table name follows Laravel conventions

    protected $fillable = [
        'id',
        'amount',
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
