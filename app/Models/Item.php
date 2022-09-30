<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'category', 'sku', 'description', 'photo', 'manuf_date', 'exp_date', 'user_id', 'created_at', 'updated_at'];
}
