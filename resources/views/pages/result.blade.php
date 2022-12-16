@extends('layouts.app')
@section('title', $phone->full_number)
@section('content')
    <div class="page_wrapper_full">
        @isset($phone)
            <h1>Информация о телефоне +7{{$phone->code}}{{$phone->number}}</h1>
            <div class="badges">
                @if ($phone->rating < 3)
                    <h3 class="score">Рейтинг: <span class="bad">{{$phone->rating}}</span></h3>
                @elseif ($phone->rating >= 3 and $phone->rating < 4)
                    <h3 class="score">Рейтинг: <span class="warn">{{$phone->rating}}</span></h3>
                @else
                    <h3 class="score">Рейтинг: <span class="good">{{$phone->rating}}</span></h3>
                @endif
                
                <h3 class="score">Количество голосов: <span class="neutral">{{$phone->votes}}</span></h3>
                <h3 class="score">Количество просмотров: <span class="neutral">{{$phone->visits}}</span></h3>
            </div>

            {{-- Spam types --}}
            @isset($phone->signal[0])
                <ul class="spam_types">
                    @foreach($phone->signal as $signal)
                        <li>{{$signal->type->name}}</li>
                    @endforeach
                </ul>
            @endisset
            
            {{-- Number info --}}
            @if($phone->code_data)
                <h4 class="info_title">Оператор</h4>
                <p class="info_detail">{{$phone->code_data->operator}}</p>
                <h4 class="info_title">Код оператора</h4>
                <p class="info_detail">{{$phone->code_data->code}}</p>
                <h4 class="info_title">Диапазон номеров</h4>
                <p class="info_detail">{{$phone->code_data->from}}-{{$phone->code_data->to}} ({{$phone->code_data->to-$phone->code_data->from}})</p>
                <h4 class="info_title">Регион</h4>
                <p class="info_detail">{{$phone->code_data->region}}</p>
                @isset($phone->code_data->city)
                    <h4 class="info_title">Город</h4>
                    <li>{{$phone->code_data->city}}</li>
                @endisset
            @else
                <h4 class="info_title">Оператор</h4>
                <p class="info_detail">Неизветсно</p>
                <h4 class="info_title">Код оператора</h4>
                <p class="info_detail">Неизветсно</p>
                <h4 class="info_title">Диапазон номеров</h4>
                <p class="info_detail">Неизветсно</p>
                <h4 class="info_title">Регион</h4>
                <p class="info_detail">Неизветсно</p>
            @endif
            <div class="comments_block">
                @auth
                    <h3>Оставить комментарий</h3>
                    <form action="/comment" id="comment_form" method="POST">
                        @csrf
                        <label for="name">Имя
                            <span class="username">{{auth()->user()->name}}</span>
                            <input type="hidden" name="name" value="{{auth()->user()->name}}">
                            {{-- <input type="text" name="name" id="name" value="" placeholder=""> --}}
                        </label>
                        <label for="spam_type">
                            Тип звонка
                            <select name="spam_type" id="spam_type">
                                <option value="0">Выберите тип</option>
                                @foreach ($spam_types as $spam_type)
                                    <option value="{{$spam_type->id}}">{{$spam_type->name}}</option>    
                                @endforeach
                            </select>
                        </label>
                        <label>
                            Оценка
                            <div class="rating_block">
                                <label class="radio">
                                    <input name="rating" type="radio" value="1">
                                    <span>1</span>
                                </label>
                                <label class="radio">
                                    <input name="rating" type="radio" value="2">
                                    <span>2</span>
                                </label>
                                <label class="radio">
                                    <input name="rating" type="radio" value="3">
                                    <span>3</span>
                                </label>
                                <label class="radio">
                                    <input name="rating" type="radio" value="4">
                                    <span>4</span>
                                </label>
                                <label class="radio">
                                    <input name="rating" type="radio" value="5">
                                    <span>5</span>
                                </label>
                            </div>
                        </label>
                        <label for="message">
                            <textarea name="message" id="message"></textarea>
                        </label>
                        <input type="hidden" name="phone_id" value="{{$phone->id}}">
                        <input type="submit" value="Отправить">
                    </form>
                @endauth
                @guest
                    <p>Чтобы оставить комментарий <a href="/signin">войдите</a> или <a href="/signup">зарегистрируйтесь</a></p>
                    {{-- <p>Войти с помощью
                        <span>Google</span>
                        <span>Github</span>
                        <span>Vk</span>
                    </p> --}}
                @endguest
            </div>
            
            @if($phone->comments->count() > 0)
                <h3>Комментарии</h3>
                <div class="comments_container">
                        @foreach ($phone->comments as $comment)
                            <div class="comment_wrapper">
                                {{-- TODO: add vote_id to comments table --}}
                                <div class="flex margin_bottom">
                                <div class="user_avatar small" title="{{$comment->user->name}}">{{\Illuminate\Support\Str::upper(\Illuminate\Support\Str::limit($comment->user->name, 1, $end=''))}}</div>
                                <h4>{{$comment->user->name}}</h4>
                                </div>
                                <p class="message">{{$comment->message}}</p>
                            </div>
                        @endforeach
                </div>
            @else
                <h3>Нет комментариев</h3>    
            @endif
        @endisset
        
    </div>
@stop
