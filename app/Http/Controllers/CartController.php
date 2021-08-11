<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $car = Car::findOrFail($id);
        $price = $request->session()->get('price') ?? 0;
        if ($car->onSale)
        {
            $price += $car->price - ($car->price * $car->salePercent / 100);
        } else {
            $price += $car->price;
        }
        if (!$request->session()->has('cart'))
        {
            $request->session()->put('cart', []);
            $request->session()->put('cart_count', 0);
        }
        $in_cart_id = $request->session()->get('cart_count');
        $cars = $request->session()->get('cart');
        $cars[$in_cart_id] = $car;
        $cart_count = $request->session()->get('cart_count') + 1;
        $request->session()->put('price', $price);
        $request->session()->put('cart', $cars);
        $request->session()->put('cart_count', $cart_count);
        return [count($request->session()->get('cart')), $request->session()->get('price')];
    }

    public function index()
    {
        return view('frontend.cart');
    }

    public function remove(Request $request)
    {
        $id = $request->id;
        $cars = $request->session()->get('cart');
        $price = $request->session()->get('price');
        foreach($cars as $key => $car)
        {
            if ($key == $id)
            {
                if($car->onSale)
                {
                    $price -= ($car->price - ($car->price * $car->salePercent / 100));
                } else {
                    $price -= $car->price;
                }
                unset($cars[$key]);
            }
        }
        $request->session()->put('cart', $cars);
        $request->session()->put('price', $price);
        return view('frontend.cartContent');
    }
}
