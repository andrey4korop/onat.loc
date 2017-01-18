@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ route('table') }}">Расчет штата</a>
                    <p>ЗДЕСЬ БУДЕТ ТОЛЬКО ТЕКСТОВОЕ ПОЛЕ <br>
                        В ИНСТРУКЦИИ БУДЕТ ОБЪЯВСНЯТЬСЯ, КАК ПОЛЬЗОВАТЬСЯ ДАННОЙ СИСТЕМОЙ
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
