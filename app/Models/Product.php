<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'photo',
        'price',
        'quantity',
        'author',
        'publisher',
        'discount',
        'isTrending',
        'description',
        'category_id'
    ];

    public function Category() {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function OrderDetail() {
        return $this->hasMany(OrderDetail::class);
    }

    public static function getAllProduct($params)
    {
        $product = self::query();

        if (isset($params['author'])) {
            $product = $product->where('author', 'like', "%{$params['author']}%");
        }

        return $product->get();
    }


}
