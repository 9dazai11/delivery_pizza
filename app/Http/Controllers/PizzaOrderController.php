<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaOrderController extends Controller
{
    public function index() {
        return view('pizzaOrders');
    }
}
