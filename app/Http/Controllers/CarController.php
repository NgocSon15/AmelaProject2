<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckLogin;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckLogin::class);
    }

    public function home()
    {
        $cars = Car::paginate(8);
        $brands = Brand::all();
        return view('admin.home');
    }

    public function index()
    {
        $cars = Car::paginate(5);
        $brands = Brand::all();

        return view('admin.car.list', compact('cars', 'brands'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.car.create', compact('brands'));
    }

    public function store(CarRequest $request)
    {
        $car = new Car();
        $car->car_name = $request->input('name');
        $car->price = $request->input('price');
        $car->brand_id = $request->input('brand_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $car->image_url = $path;
        } else {
            $car->image_url = "";
        }

        $car->description = $request->input('description');
        $car->save();

        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('admin.car.index');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.car.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        return view('admin,car.edit', compact('car', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->car_name = $request->input('name');
        $car->price = $request->input('price');
        $car->brand_id = $request->input('brand_id');

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
        return redirect()->route('admin.car.index');
    }

    public function delete($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.car.delete', compact('car'));
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
        return redirect()->route('admin.car.index');
    }

    public function filterByBrand(Request $request){
        $idBrand = $request->input('brand_id');

        $brandFilter = Brand::findOrFail($idBrand);

        $cars = Car::where('brand_id', $brandFilter->id)->paginate(5);
        $totalCarFilter = count($cars);
        $brands = Brand::all();

        return view('admin.car.list', compact('cars', 'brands', 'totalCarFilter', 'brandFilter'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('admin.car.index');
        }
        $cars = Car::where('car_name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $brands = Brand::all();
        return view('admin.car.list', compact('cars', 'brands', 'keyword'));
    }

}
