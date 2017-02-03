@extends('layouts.lay')

@section('header')

@endsection

@section('style')

@endsection

@section('scripts')
    <script type="text/javascript" src="/js/jquery.timer.js"></script>
    <script>
        var count = $('span#second').html();
        var timer = $.timer(function() {
            if(count!=0) {
                $('span#second').html(count--);
            }
            else{
                window.location = "{{route('home')}}";
                timer.stop();
            }
        });
        timer.set({ time : 1000, autostart : true });
    </script>
@endsection

@section('content')
<div class="container">

    <h2 style="text-align: center; font-size: medium; font-family: verdana, geneva;"><strong>Зміни збережені. Ви перенавправитесь на головну сторінку через <span id="second">5</span> секунд.</strong></h2>
    <a href="{{route('home')}}">{{route('home')}}</a>

</div>
@endsection