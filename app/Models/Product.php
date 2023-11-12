<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'price_per_unit',
        'selling_price',
        'category_id',
        'product_code',
        'picture',
    ];
    public function dailySales()
    {
        return $this->hasMany(DailySale::class);
    }
}
