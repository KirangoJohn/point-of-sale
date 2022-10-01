<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'products_id', 'quantity', 'selling_price','buying_price', 'unit'
    ];
}
