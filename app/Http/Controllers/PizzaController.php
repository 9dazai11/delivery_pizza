<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index() {
        // $pizzas = Pizza::all();
        // return view('pizzas', compact('pizzas'));
        return Pizza::all();
    }
}
