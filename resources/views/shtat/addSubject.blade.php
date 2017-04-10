@extends('layouts.layShtat')

@section('header')

@endsection

@section('style')
    <style>
        .asd{
            margin-top: 50px;
        }
    </style>
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
<div class="col-xs-7 col-xs-offset-2">
    <form class="asd" action="{{route('saveSubject')}}" method="POST">

        {{ csrf_field() }}
        <p>Введіть назву спеціальності:</p>
        <input class="form-control" type="text" name="subject">
        <p></p>
        <p>Введіть необхдні норми:</p>

        <table class="table">
            <tr>
                <td><p>бакалаври:</p></td>
                <td><input class="form-control "type="text" name="bNormD"></td>
                <td><input class="form-control"type="text" name="bNormZ"></td>
            </tr>
            <tr>
                <td><p>спеціалісти:</p></td>
                <td><input class="form-control"type="text" name="sNormD"></td>
                <td><input class="form-control"type="text" name="sNormZ"></td>
            </tr>
            <tr>
                <td><p>магістри V:</p></td>
                <td><input class="form-control"type="text" name="mNormD"></td>
                <td><input class="form-control"type="text" name="mNormZ"></td>
            </tr>
            <tr>
                <td><p>магістри VI:</p></td>
                <td><input class="form-control"type="text" name="mmNormD"></td>
                <td><input class="form-control"type="text" name="mmNormZ"></td>
            </tr>
        </table>
        <button type="submit"   class="btn btn-primary" style="float: right;">Додати</button>
    </form>
</div>
</div>
@endsection