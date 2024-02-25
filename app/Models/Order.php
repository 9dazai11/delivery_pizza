<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function pizzas() {
        return $this->belongsToMany(Pizza::class, 'pizza_orders', 'order_id', 'pizza_id');
    
    }
}