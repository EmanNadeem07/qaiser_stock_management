<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySale extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'date',
        'quantity',
        'product_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
