@extends('layouts.lay')

@section('header')

@endsection

@section('style')
    <style>
       table{text-align: center;
       font-weight: bold;
       }
       input{text-align: center;
       font-weight: normal;}
    </style>
@endsection

@section('scripts')

@endsection

@section('content')
    <div class="container" style="margin-top: 50px;">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>


        <form action="{{ route('savenorm') }}" id="form" method="POST">
            {{ csrf_field() }}

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>№ п/п</td>
                        <td>Форма навчання Факультет</td>
                        <td>Норматив пост</td>
                        <td>Норматив пост</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Денна форма навчання</td>
                        <td>Заочна форма навчання</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($subjects as $key => $subject)
                    @if(!$subject->other)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$subject->subject}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($table[$key] as $norm)
                            <tr>
                                <td></td>
                                <td>{{$norm->name}}</td>
                                <td><input type="text" name="table[{{$norm->id}}][normD]" value="{{$norm->normD}}"></td>
                                <td><input type="text" name="table[{{$norm->id}}][normZ]" value="{{$norm->normZ}}"></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$subject->subject}}</td>
                            <td><input type="text" name="table[{{$table[$key][0]->id}}][normD]" value="{{$table[$key][0]->normD}}"></td>
                            <td><input type="text" name="table[{{$table[$key][0]->id}}][normZ]" value="{{$table[$key][0]->normZ}}"></td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary center-block" style=" border-bottom-width: 1px; margin-bottom: 10px;">Зберегти</button>
        </form>

        <hr>

    </div>
@endsection