<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarFormRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::query()
            ->latest()
            ->paginate(10);

        return view('cars.index', [
            'cars' => $cars
        ]);
    }


    public function create()
    {
        $this->authorize('create', Car::class);

        return view('cars.form');
    }

    public function store(CarFormRequest $request)
    {
        $this->authorize('create', Car::class);

        $data = $request->validated();

        /** @var User $user */
        $user = auth()->user();

        /** @var Car $car */
        $car = $user->cars()
            ->create($data);

        $this->uploadImage($request, $car);

        return redirect()->route('cars.show', $car);
    }

    public function show(Car $car)
    {
        return view('cars.show', [
            'car' => $car
        ]);
    }

    public function edit(Car $car)
    {
        $this->authorize('update', $car);


        return view('cars.form', [
            'car' => $car
        ]);
    }


    public function update(CarFormRequest $request, Car $car)
    {
        $this->authorize('update', $car);
        $data = $request->validated();

        $car->update($data);
        $this->uploadImage($request, $car);
        return redirect()->route('cars.index');
    }


    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        $car->deleteImage();
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function download(Car $car){
        return Storage::download($car->image_path, $car->model);
    }

    protected function uploadImage(CarFormRequest $request, Car $car) {

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');

            $car->deleteImage();

            $car->update([
                'image_path' => $path
            ]);

        }

    }

}
