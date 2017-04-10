@extends('layouts.lay')

@section('header')

@endsection

@section('style')
    <style>
        select{
            width: 25%;

        }
        .checkbox{
            text-align: left;
        }
        .checkbox input[type=checkbox]{
            position: relative;
            margin-right: 8px;
             margin-left: 0px;
        }
        .warning{
            border: 2px dashed #337ab7 ;
            padding: 1%;
            margin-bottom: 2%;
        }
         h4{
            font-weight: bold;
        }
        .red{
            color: #337ab7;
        }
        .xxx{
            margin-top: 2%;
        }
        ul p{
            margin: 10px 0 0 -40px;
            font-style: italic;
        }
        form>p{
            font-size: 1.4em;
            text-align: center;
        }
        #ii{
            width: calc(100% - 211px);
        }
        input[type="submit"]{
            float: right;
        }
    </style>
@endsection

@section('scripts')

@endsection

@section('content')

<div class="container xxx" >

    <h3 class="red">Увага!</h3>
    <div class="warning">
        <h4>Довідка видається через п'ять робочих днів з дати написання заяви при наявності:</h4>
        <ul>
            <li>підписаного контракту, який повинен бути в особовій справі(для контрактників)</li>
            <li>відсутності заборгованості занавчання(для контрактників)</li>
            <li>залікової книжки із закритою сесією</li>
            <p>Для випускників минулих років:</p>
            <li>обхідний лист, закрита залікова книжка, студентський квиток</li>
            <li>відсутність заборгованості за навчання(для контрактників)</li>
            <li>довідка де працює на час потреби довідки про навчання</li>
        </ul>
    </div>
    <form action="{{route('send_spravka')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id_student" value="{{$id}}">
        <p style="margin-bottom: 20px">Прошу видати <select name="id_type">
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach

        </select> в ОНАЗ ім. О.С. Попова</p>
        <p style="float: left">Місце потреби довідки:</p>
        <textarea name="info" id="ii" placeholder="(організація/підприємство/установа з вказанням району/міста/населеного пункту)"></textarea>
        <p class="checkbox">Отримати довідку терміново: <input name="is_fast" type="checkbox"></p>
        <input type="submit" class="btn btn-primary" value="Відправити">
    </form>

</div>

@endsection