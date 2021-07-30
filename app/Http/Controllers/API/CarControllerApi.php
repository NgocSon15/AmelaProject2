<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CarServiceImpl;

class CarControllerApi extends Controller
{
    protected $carService;

    public function __construct(carServiceImpl $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->carService->getAll();

        return response()->json($cars, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCar = $this->carService->create($request->all());

        return response()->json($dataCar['cars'], $dataCar['statusCode']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataCar = $this->carService->findById($id);

        return response()->json($dataCar['cars'], $dataCar['statusCode']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataCar = $this->carService->update($request->all(), $id);

        return response()->json($dataCar['cars'], $dataCar['statusCode']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataCar = $this->carService->destroy($id);

        return response()->json($dataCar['message'], $dataCar['statusCode']);
    }
}
