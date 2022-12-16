@extends('layouts.app')
@section('title', "Авторизация")
@section('content')
    <div class="page_wrapper_index">
        <div class="form_block">
            <h3>Регистрация</h3>
            <form action="/signup" id="signup_form" method="POST">
                @csrf
                <label for="name">Имя
                    <input type="text" name="name" id="name">
                </label>
                <label for="email">Эл. почта
                    <input type="email" name="email" id="email">
                </label>
                <label for="password">Пароль
                    <input type="password" name="password" id="password">
                </label>
                {{-- <label for="password">Подтверждение пароля
                    <input type="password" name="re_password" id="re_password">
                </label> --}}
                <input type="submit" value="Регистрация">
                <p>или <a href="/signin">войдите</a></p>
            </form>
        </div>
    </div>
@stop
