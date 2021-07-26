<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('car.list', compact('cars'));
    }

    public function create()
    {
        return view('car.create');
    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->car_name = $request->input('name');
        $car->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $car->image_url = $path;
        }

        $car->description = $request->input('description');
        $car->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('car.index');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('car.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('car.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->car_name = $request->input('name');
        $car->price = $request->input('price');

        if ($request->hasFile('image')) {
            $currentImg = $car->image_url;
            if($currentImg)
            {
                Storage::delete('/public/'.$currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $car->image_url = $path;
        }

        $car->description = $request->input('description');
        $car->save();

        Session::flash('success', 'Sửa thông tin thành công');
        return redirect()->route('car.index');
    }

    public function delete($id)
    {
        $car = Car::findOrFail($id);
        return view('car.delete', compact('car'));
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $image = $car->image_url;

        if($image)
        {
            Storage::delete('/public/'.$image);
        }

        $car->delete();

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('car.index');
    }
}
