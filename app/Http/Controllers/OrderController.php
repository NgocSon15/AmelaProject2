<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cars = $request->session()->pull('cart');
        $price = $request->session()->pull('price');


        $order = new Order();
        $order->orderDate = date('y-m-d');
        $order->totalPrice = $price;
        $order->user_id = $request->session()->get('user')->id;

        $order->save();

        foreach ($cars as $car)
        {
            $order->cars()->attach($car->id);
            $car->quantity--;
        }

        $request->session()->flash('Đặt hàng thành công');

        return redirect()->route('home');
    }

    public function index(Request $request)
    {
        $orders = Order::paginate(5);

        if ($request->ajax())
        {
            return view('admin.order.listContent', compact('orders'));
        } else {
            return view('admin.order.list', compact('orders'));
        }
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $cars = $order->cars()->paginate(5);

        return view('admin.order.show', compact('order', 'cars'));
    }
}
