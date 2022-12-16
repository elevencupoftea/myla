<!DOCTYPE html>
<html lang="ru">

<head>
    @include('includes.head')
</head>

<body>
    <div id="wrpapper">
        <header>
            @include('includes.header')
        </header>
        <main>
            <ul class="errors_message">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <ul class="success_message">
                @if(session('msg'))
                    <li>{{ session('msg') }}</li>
                @endif
            </ul>
            @yield('content')
        </main>
        <footer>
            @include('includes.footer')
        </footer>
    </div>
</body>

</html>
