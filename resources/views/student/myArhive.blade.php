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

    <div class="container" >
        <h2>Архів</h2>

        <table  class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Тип справки</th>
                <th>Вид</th>
                <th>Статус</th>
            </tr>
            @forelse($spravki as $spravka)
                <tr>
                    <td><a href="{{route('spravka',['id' => $spravka->id])}}">Запит {{$spravka->id}}</a></td>

                    <td>{{$spravka->type->type}}</td>
                    <td>{{$spravka->is_fast ? 'Терміново' : 'Не терміново'}}</td>
                    <td>{{$spravka->status}}</td>
                </tr>
            @empty

            @endforelse

        </table>
    </div>

@endsection