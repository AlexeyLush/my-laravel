<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarFormRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::all();

        return view('cars.index', [
            'cars' => $cars
        ]);
    }


    public function create()
    {
        return view('cars.form');
    }

    public function store(CarFormRequest $request)
    {
        Car::query()
            ->create($request->validated());
        return redirect()->route('cars.index');
    }

    public function show(Car $car)
    {
        return view('cars.show', [
            'car' => $car
        ]);
    }

    public function edit(Car $car)
    {
        return view('cars.form', [
            'car' => $car
        ]);
    }


    public function update(CarFormRequest $request, Car $car)
    {
        $car->update($request->validated());
        return redirect()->route('cars.index');
    }


    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
