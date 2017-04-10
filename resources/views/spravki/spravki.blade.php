@extends('layouts.lay')

@section('header')

@endsection

@section('style')
    <style>
        #setStatus{
            width: 100%;
        }
        span{
            font-weight: bold;
        }
        .right {
            float: right;
        }
    </style>
@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container"  style="margin-top: 30px">


            <p><span>ПІП:</span> {{$spravka->student->name}}</p>
            <p><span>Тип справки:</span> {{$spravka->type->type}}</p>
            <p><span>Вид:</span> {{$spravka->is_fast ? 'Терміново' : 'Не терміново'}}</p>
        <p><span>Пояснення для студента:</span></p>
        <form action="{{route('setStatus', $spravka)}}" method="POST">
            {{ csrf_field() }}


            <textarea name="status" id="setStatus"  rows="5" placeholder="Введіть пояснення:"></textarea>
            <input type="submit" class="right btn btn-primary">
            <input name="time" type="datetime-local" class="right" style="margin-right: 10px;     margin-top: 5px;">

        </form>
    </div>
@endsection