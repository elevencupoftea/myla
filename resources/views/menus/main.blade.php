@guest
    <ul class="nav_menu">
        <li><a href="/" class="nav_link"></i>Главная</a></li>
        <li><a href="/signin" class="nav_link"></i>Вход</a></li>
    </ul>
@endguest
@auth
    <ul class="nav_menu">
        <li><a href="/" class="nav_link"></i>Главная</a></li>
        <li><a href="/signout" class="nav_link"></i>Выход</a></li>
    </ul>
    <div class="user_avatar" title="{{auth()->user()->name}}">{{\Illuminate\Support\Str::upper(\Illuminate\Support\Str::limit(auth()->user()->name, 1, $end=''))}}</div>
@endauth
