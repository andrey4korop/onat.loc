@extends('layouts.lay')

@section('header')

@endsection

@section('style')
    <style>
td, th{
text-align: center;
}
    </style>
@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container"  style="margin-top: 30px">
    <h2>Таблиця запитів від студентів на отримання справок</h2>
    <table  class="table table-bordered">
        <tr>
            <td>№</td>
            <th>ПІП</th>
            <th>Тип справки</th>
            <th>Вид</th>
            <th>Статус</th>
        </tr>
        @forelse($spravki as $spravka)
            <tr>
                <td><a href="{{route('spravka',['id' => $spravka->id])}}">Запит {{$spravka->id}}</a></td>
                <td>{{$spravka->student->name}}</td>
                <td>{{$spravka->type->type}}</td>
                <td>{{$spravka->is_fast ? 'Терміново' : 'Не терміново'}}</td>
                <td>{{$spravka->status}}</td>
            </tr>
        @empty

        @endforelse

    </table>
    </div>
@endsection