@extends('layouts.app')
@section('title', "Коды номеров")
@section('content')
    <div class="page_wrapper">
            <h3><a href="/codes">Коды телефонных номеров</a> / По регионам / <a href="/operators">По операторам</a></h3>
            <form action="">
                <input id=preg_region_search oninput='pregRegionSearch()' type="text" name="region_name" placeholder="Начните вводить название региона">
            </form>
            <div class="regions_wrapper">
                @foreach ($regions as $region)
                        <a href="/regions/{{str_slug($region->region)}}">
                            <div class="region_container" title="{{$region->region}}">
                                <span class="code_title">{{\Illuminate\Support\Str::limit($region->region, 30, $end='...')}}</span>
                            </div>
                        </a>
                @endforeach
            </div>
    </div>

    <script>
        function pregRegionSearch(){
            let preg_input = $("#preg_region_search").val();

            $.ajax({
                url: '/search/region',
                method: 'get',            
                dataType: 'html',         
                data: {region_name: preg_input},    
                success: function(data){   
                    // alert(data);
                    let regions_wrapper = $(".regions_wrapper");
                    regions_wrapper.empty();

                    $.each( JSON.parse(data), function( key, value ) {
                        // let json = JSON.parse(value)
                        // alert(json['region'])
                        let region = value['region']
                        console.log(region)
                        console.log(value['translit_region'])
                        if(value['region'].length > 30) region = value['region'].substring(0,30)+"...";
                        regions_wrapper.append("<a href='/regions/" + value['translit_region'] + "'><div class='region_container' title='" + value['region'] + "'><span class='code_title'>" + region + "</span></div></a>")
                    })

                }
            });    
        }
        
    </script>
@stop
