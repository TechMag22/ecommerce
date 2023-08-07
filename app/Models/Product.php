<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'description',
        'image',
        'stock'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function getProducts($filter = array()) {
        $query = Product::query()
        ->select('*');
        if (isset($filter['cat'])) {
            $query->where('category_id', $filter['cat']);
        }
        if (isset($filter['min_price'])) {
            $query->where('price', '>=', $filter['min_price']);
        }
        if (isset($filter['max_price'])) {
            $query->where('price', '<=', $filter['max_price']);
        }
        return $query->get();
    }
}
