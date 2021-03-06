<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use App\Services\CarServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarServiceImpl $carService)
    {
        $this->carService = $carService;
    }

    public function index(Request $request)
    {
        $cars = $this->carService->getAll();
        $brands = Brand::all();
        if ($request->ajax())
        {
            return view('admin.car.listContent', compact('cars'));
        } else {
            return view('admin.car.list', compact('cars', 'brands'));
        }
    }

    public function create()
    {
        $brands = Brand::all();
        $carModels = CarModel::all();
        return view('admin.car.create', compact('brands', 'carModels'));
    }

    public function store(CarRequest $request)
    {
        $car = new Car();
        $car->name = $request->name;
        $car->price =  $request->price;
        $car->brand_id =  $request->brand_id;
        $car->carmodel_id =  $request->car_model_id;
        $car->fuel =  $request->fuel;
        $car->gearbox =  $request->gearbox;
        $car->origin =  $request->origin;
        $car->color =  $request->color;
        $car->manufactured_date =  $request->manufactured_date;
        $car->engine_capacity =  $request->engine_capacity;
        $car->seat_number =  $request->seat_number;
        $car->door_number =  $request->door_number;
        $car->quantity =  $request->quantity;
        $car->onSale = $request->on_sale;
        $car->salePercent = $request->sale_percent;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $car->image = $path;
        }

        $car->description =  $request->description;
        $car->save();

        Session::flash('success', 'Th??m m???i th??nh c??ng');
        return redirect()->route('car.index');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        $car->view_count += 1;
        $car->save();
        $carModels = CarModel::first();
        return view('admin.car.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        $carModels = CarModel::all();
        return view('admin.car.edit', compact('car', 'brands', 'carModels'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->name = $request->input('name');
        $car->price = $request->input('price');
        $car->brand_id = $request->input('brand_id');
        $car->carmodel_id = $request->input('car_model_id');
        $car->fuel = $request->input('fuel');
        $car->gearbox = $request->input('gearbox');
        $car->origin = $request->input('origin');
        $car->color = $request->input('color');
        $car->manufactured_date = $request->input('manufactured_date');
        $car->engine_capacity = $request->input('engine_capacity');
        $car->seat_number = $request->input('seat_number');
        $car->door_number = $request->input('door_number');
        $car->quantity = $request->input('quantity');
        $car->onSale = $request->on_sale;
        $car->salePercent = $request->sale_percent;

        if ($request->hasFile('image')) {
            $currentImg = $car->image;
            if($currentImg)
            {
                Storage::delete('/public/'.$currentImg);
            }

            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $car->image = $path;
        }

        $car->description = $request->input('description');
        $car->save();

        Session::flash('success', 'S???a th??ng tin th??nh c??ng');
        return redirect()->route('car.index');
    }

    public function delete($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.car.delete', compact('car'));
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $image = $car->image;

        if($image)
        {
            Storage::delete('/public/'.$image);
        }

        $car->delete();

        Session::flash('success', 'X??a th??nh c??ng');
        return redirect()->route('car.index');
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
        $cars = Car::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        $brands = Brand::all();
        return view('admin.car.list', compact('cars', 'brands', 'keyword'));
    }
}
