<?php
    $car = $car ?? null;
?>

@extends('layouts.main')

@section('content')
    <h1>{{ $car->model }}</h1>
    <div class="">
        <span>Цвет: {{ $car->color }}</span>
    </div>

    <div class="">
        <span>Год: {{ $car->year }}</span>
    </div>

    <div class="">
        <span>Двигатель: {{ $car->engine }}</span>
    </div>



    <div>

        <a href="{{ route('cars.edit', $car) }}">Редактировать</a>


        <a href="{{ route('cars.destroy', $car) }}"
           onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
            Удалить
        </a>
        <form id="delete-form" action="{{ route('cars.destroy', $car) }}" method="post">
            @csrf @method('delete')
        </form>


    </div>

    <p>{{ $car->content }}</p>

@endsection
