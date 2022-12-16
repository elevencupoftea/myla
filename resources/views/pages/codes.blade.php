@extends('layouts.app')
@section('title', "Коды номеров")
@section('content')
    <div class="page_wrapper">
            <h3>Коды телефонных номеров / <a href="/regions">По регионам</a> / <a href="/operators">По операторам</a></h3>
            <div class="codes_wrapper">
                @foreach ($codes as $code)
                        <a href="/codes/{{$code->code}}">
                            <div class="code_container">
                                <span class="code_title">{{$code->code}}</span>
                            </div>
                        </a>
                @endforeach
            </div>
    </div>
@stop
