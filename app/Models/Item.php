<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'category', 'sku', 'description', 'photo', 'manuf_date', 'exp_date', 'buying_price', 'price','buying_price', 'unit', 'quantity', 'reorder', 'shop', 'user_id', 'created_at', 'updated_at'];
}
