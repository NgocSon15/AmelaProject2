<?php

namespace App\Services\Impl;

use App\Repositories\CarRepositoryImpl;
use App\Services\CarServiceImpl;

class CarService implements CarServiceImpl
{
    protected $carRepository;

    public function __construct(CarRepositoryImpl $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getAll()
    {
        return $this->carRepository->getAll();
    }

    public function findById($id)
    {
        $car = $this->carRepository->findById($id);

        $statusCode = 200;

        if(!$car)
        {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'cars' => $car
        ];
    }

    public function create($request)
    {
        $car = $this->carRepository->create($request);

        $statusCode = 201;
        if (!$car) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'cars' => $car
        ];
    }

    public function update($request, $id)
    {
        $oldcar = $this->carRepository->findById($id);

        if (!$oldcar) {
            $newcar = null;
            $statusCode = 404;
        } else {
            $newcar = $this->carRepository->update($request, $oldcar);
            $statusCode = 200;
        }

        return [
            'statusCode' => $statusCode,
            'cars' => $newcar
        ];
    }

    public function destroy($id)
    {
        $car = $this->carRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($car) {
            $this->carRepository->destroy($car);
            $statusCode = 200;
            $message = "Delete success!";
        }

        return [
            'statusCode' => $statusCode,
            'message' => $message
        ];
    }
}
