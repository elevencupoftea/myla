@extends('layouts.app')
@section('title', "Коды номеров")
@section('content')
    <div class="page_wrapper">
            <h3><a href="/codes">Коды телефонных номеров</a> / <a href="/regions">По регионам</a> / По операторам</h3>
            <form action="">
                <input id=preg_region_search oninput='pregOperatorSearch()' type="text" name="region_name" placeholder="Начните вводить название оператора">
            </form>
            <div class="regions_wrapper">
                @foreach ($operators as $operator)
                        <a href="/operators/{{str_slug($operator->translit_operator)}}">
                            <div class="region_container" title="{{$operator->operator}}">
                                <span class="code_title">{{\Illuminate\Support\Str::limit($operator->operator, 30, $end='...')}}</span>
                            </div>
                        </a>
                @endforeach
            </div>
    </div>

    <script>
        function pregOperatorSearch(){
            let preg_input = $("#preg_region_search").val();

            $.ajax({
                url: '/search/operator',
                method: 'get',            
                dataType: 'html',         
                data: {operator_name: preg_input},    
                success: function(data){   
                    // alert(data);
                    let regions_wrapper = $(".regions_wrapper");
                    regions_wrapper.empty();

                    $.each( JSON.parse(data), function( key, value ) {
                        // let json = JSON.parse(value)
                        // alert(json['region'])
                        let operator = value['operator']
                        console.log(operator)
                        console.log(value['translit_operator'])
                        if(value['operator'].length > 30) operator = value['operator'].substring(0,30)+"...";
                        regions_wrapper.append("<a href='/operators/" + value['translit_operator'] + "'><div class='region_container' title='" + value['operator'] + "'><span class='code_title'>" + operator + "</span></div></a>")
                    })

                }
            });    
        }
        
    </script>
@stop
