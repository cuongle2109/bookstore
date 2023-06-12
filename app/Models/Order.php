<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'address',
        'phone',
        'status',
        'payment_type_id'
    ];

    public function PaymentType() {
        return $this->belongsTo(PaymentType::class,'payment_type_id');
    }
}
