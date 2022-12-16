@extends('layouts.app')
@section('title', "Информация о коде телефона {{$code}} — оператор, город, регион.")
@section('content')
    <div class="page_wrapper_full">
            <h1>Информация о коде {{$code}}</h1>
            <div class="codes_wrapper_detailed">
                {{ $code_data->links() }}
                @foreach ($code_data as $data)
                <div class="code_detailed_container">
                    <div>
                        <h3>c +7 {{$code}} {{$data->from}} по +7 {{$code}} {{$data->to}}</h3>
                    </div>
                    <h5 class="info_title">Количество номеров: <span>{{$data->count}}</span></h5>
                    <h5 class="info_title">Оператор: <a href="https://www.google.com/search?q={{$data->operator}}" target="_blank"><span>{{$data->operator}}</span><i class="fa-solid fa-square-up-right"></i></a></h5>
                    <h5 class="info_title">Город / Область: <span>{{$data->city}} {{$data->region}}</span></h5>
                </div>
                @endforeach
                {{ $code_data->links() }}
            </div>
    </div>
@stop
