@extends('layouts.app')
@section('title', "{{$region}}: информация о кодах телефона в регионе.")
@section('content')
    <div class="page_wrapper_full">
            <h1>{{$region_data[0]->region}}: информация о кодах телефонов в регионе.</h1>
            <div class="codes_wrapper_detailed">
                {{ $region_data->links() }}
                @foreach ($region_data as $data)
                <div class="code_detailed_container">
                    <div>
                        <h3>c +7 {{$data->code}} {{$data->from}} по +7 {{$data->code}} {{$data->to}}</h3>
                    </div>
                    <h5 class="info_title">Количество номеров: <span>{{$data->count}}</span></h5>
                    <h5 class="info_title">Оператор: <a href="https://www.google.com/search?q={{$data->operator}}" target="_blank"><span>{{$data->operator}}</span><i class="fa-solid fa-square-up-right"></i></a></h5>
                    <h5 class="info_title">Город / Область: <span>{{$data->city}} {{$data->region}}</span></h5>
                </div>
                @endforeach
                {{ $region_data->links() }}
            </div>
    </div>
@stop
