@extends('layouts.layShtat')

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

    <h2 style="text-align: center; font-size: medium; font-family: verdana, geneva;"><strong>Зміни збережені. Очікуйте <span id="second">5</span></strong></h2>


</div>
@endsection