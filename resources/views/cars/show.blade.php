
@extends('layouts.main')

@section('content')



    @if($car->image_path)
        <div>
            <img style="max-width: 100%" src="{{ Storage::url($car->image_path) }}" alt="{{ $car->title }}">
        </div>
    @endif

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

        @can('update', $car)
        <a href="{{ route('cars.edit', $car) }}">Редактировать</a>
        @endcan

        @can('delete', $car)
        <a href="{{ route('cars.destroy', $car) }}"
           onclick="event.preventDefault(); document.getElementById('delete-form').submit()">
            Удалить
        </a>
        <form id="delete-form" action="{{ route('cars.destroy', $car) }}" method="post">
            @csrf @method('delete')
        </form>
            @endcan

    </div>


    <a href="{{ route('download', $car) }}">
        Скачать
    </a>


    <p>{{ $car->content }}</p>

@endsection
