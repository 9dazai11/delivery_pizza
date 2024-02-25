<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'pizzas';
    protected $guarded = [];

    public function orders() {
        return $this->belongsToMany(Order::class, 'pizza_orders', 'pizza_id', 'order_id');
    }
}
