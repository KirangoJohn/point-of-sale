<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
     'product_name', 'orders_id'
    ];

    public function product(){
        return $this->hasOne(Product::class,'sku','sku');
    }
}
