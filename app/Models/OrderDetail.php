<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'quantity',
        'order_id',
        'product_id'
    ];

    public function Product() {
        return $this->belongsTo(Product::class,'product_id');
    }
}
