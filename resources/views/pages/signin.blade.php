@extends('layouts.app')
@section('title', "Авторизация")
@section('content')
    <div class="page_wrapper_index">
        <div class="form_block">
            <h3>Авторизация</h3>
            <form action="/signin" id="signin_form" method="POST">
                @csrf
                <label for="email">Эл. почта
                    <input type="email" name="email" id="email">
                </label>
                <label for="password">Пароль
                    <input type="password" name="password" id="password">
                </label>
                <label class="checkbox">
                    <input type="checkbox" name="remember_me">
                    <span>Запомнить меня</span>
                </label>
                <input type="submit" value="Войти">
                <div class="oauth_block">
                    <h5>Авторизуйтесь с помощью</h5>
                    <ul class="oauth_list">
                        <li><a href="/signin/github"><i class="fa-brands fa-github"></i></a></li>
                        <li><a href="/signin/vk"><i class="fa-brands fa-vk"></i></a></li>
                        <li><a href="/signin/google"><i class="fa-brands fa-google"></i></a></li>
                        {{-- <li>2</li>
                        <li>3</li> --}}
                    </ul>
                </div>
                <p>или <a href="/signup">зарегистрируйтесь</a></p>
            </form>
        </div>
    </div>
@stop
