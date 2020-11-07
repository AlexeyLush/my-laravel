<?php
$car = $car ?? null;
?>
@extends('layouts.main')

@section('content')
    <h1>{{ $car ? 'Редактировать машину' : 'Новый ' }}</h1>


    <form enctype="multipart/form-data" action="{{ $car ? route('cars.update', $car) : route('cars.store') }}" method="post">
        @csrf
        @if($car) @method('put') @endif

        <div>
            <label for="image">Изображение</label>
        </div>

        <div>
            <input type="file" name="image" id="image" accept="image/*" />
        </div>

        <div>
            <label for="model">Модель</label>
        </div>
        <div>
            <input value="{{ old('model', $car->model ?? null) }}"
                   type="text"
                   id="model"
                   name="model"
                   placeholder="Введите модель машины">
        </div>

        <div>
            <label for="color">Цвет</label>
        </div>
        <div>
            <input name="color" id="color" placeholder="Введите цвет"
            value="{{ old('color', $car->color ?? null) }}">
        </div>


        <div>
            <label for="year">Год</label>
        </div>
        <div>
            <input name="year" id="year" placeholder="Год" type="number"
            value="{{ old('year', $car->year ?? null) }}">
        </div>


        <div>
            <label for="engine">Двигатель</label>
        </div>
        <div>
            <input name="engine" id="engine" placeholder="Двигатель"
            value="{{ old('engine', $car->engine ?? null) }}">
        </div>

        <button>Сохранить</button>

    </form>

@endsection
