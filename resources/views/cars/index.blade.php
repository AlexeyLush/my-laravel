@extends('layouts.main')
{{--Вывод всех записей постов--}}

@section('content')
    <h1>Машины</h1>

    <p>
        <a href="{{ route('cars.create') }}">Добавить машину</a>
    </p>

    @if($cars->isEmpty())
        <p>
            Нет машин!
        </p>
    @else

        <ul>
            @foreach($cars as $car)
                <li>
                    <a href="{{ route('cars.show', $car)}}">
                        {{ $car->model  }}
                    </a>
                </li>
            @endforeach
        </ul>

    @endif

@endsection
