<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index() {
        $pizzas = Pizza::all();
        return view('pizzas', compact('pizzas'));
    }

    public function create() {
        $pizzasArr = [
            [
               'name' => 'Мясная',
               'description' => 'Цыпленок, ветчина, пикантная пепперони, острая чоризо, моцарелла, фирменный томатный соус',
               'image' => '',
               'price' =>  333.75,
            ],
            [
                'name' => 'Сырный цыпленок',
                'description' => 'Цыпленок, моцарелла, сыры чеддер и пармезан, сырный соус, томаты, фирменный соус альфредо, чеснок',
                'image' => 'сырцыпленок.jpg',
                'price' => 222.95,
             ],
        ];

        dd('created');
    }

    public function update() {
        $pizza = Pizza::find(5);
        
        $pizza->update([
            'image' => 'https://dodopizza-a.akamaihd.net/static/Img/Products/18dbb12240b041a191c9dc73c9c1f4ef_366x366.webp',
            'price' =>  469.99,
        ]);
        dd('updated');
    }

    public function delete() {
        
        $pizza = Pizza::find(4);
        $pizza->delete();
        
        // $pizza = Pizza::withTrashed()->find(4);
        // $pizza->restore();
        dd('deleted');
    }
}
