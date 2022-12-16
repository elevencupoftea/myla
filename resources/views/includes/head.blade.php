@php
    $title = "New Site";
    $description = "New Site Description";
    $url = "http://localhost/"
@endphp

<meta charset="UTF-8">
<title>{{$title}} @yield('title')</title>
<meta name="description" content="{{$title}} {{$description}} @yield('title')"/>
<meta property="og:title" content="{{$title}}">
<meta property="og:site_name" content="{{$title}} - {{$description}} @yield('title')">
<meta property="og:url" content="{{$url}}">
<meta property="og:description" content="{{$description}}  @yield('title')">
<meta property="og:type" content="website">

<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">
<link rel="manifest" href="/favicon/site.webmanifest">


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="msapplication-TileColor" content="#000000">
<link href={{asset("css/app.css?v=")}}<?=genCustomId(4)?> rel="stylesheet" type="text/css" media="screen">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://kit.fontawesome.com/cd5dbf98a9.js" crossorigin="anonymous"></script>

{{-- Google Analytics --}}
