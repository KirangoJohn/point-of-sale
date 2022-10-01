<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 'sku', 'description','category', 'image', 'manuf_date', 'exp_date','selling_price', 'price', 'quantity','unit' ,'reorder'
    ];

    public function retail(){
        return $this->hasOne(Retail::class,'products_id');
    }

    public function wholeSale(){
        return $this->hasOne(Wholesale::class,'products_id');
    }
}
