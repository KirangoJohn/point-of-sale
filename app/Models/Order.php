<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['product_name'];

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class,'orders_id','id');
    }
}
