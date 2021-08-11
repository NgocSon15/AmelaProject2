<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function addToCart($id)
    {
        $car = Car::findOrFail($id);
        if (!Session::has('cart'))
        {
            Session::put('cart', []);
        }

        Session::push('cart', $car);
        dd(Session::get('cart'));
        return count(Session::get('cart'));
    }

    public function index()
    {

    }


}
