<div class="logo_container">
    @if(file_exists("images/logo.png"))
        <img onclick="document.location='/';return false;" img src={{asset("images/logo.png")}}>
    @endif
    <h2><a href="/">New Site</a></h2>
</div>
<nav class="nav_class">
    @if (Request::is("/"))
        @include('menus.main')
    @else
        {{--    Alt. menu layout    --}}
        @include('menus.main')
    @endif
    <div id="menu_button">
        <i class="fa-solid fa-bars"></i>
    </div>
</nav>
{{-- <div id="menu_button" class="menu_button"><i class="fas fa-bars"></i></div> --}}
<script>
    $(document).ready(()=> {
        $("#menu_button").on('click', () => {
            $(".nav_menu").toggleClass('menu_show')
        })
    })
</script>
