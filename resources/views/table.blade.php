@extends('layouts.lay')

@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                </h1>

                <button type="button" id="addSubject" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати спеціальність</button>
                <button type="button" id="addInozem" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати іноземців</button>
                <button type="button" id="addAspirantura" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати аспірантуру</button>
                <button type="button" id="addDoctor" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати докторнатуру</button>
            </div>
        </div>

        @include('vendor.tableHide')

        <form action="{{ route('save') }}" id="form" method="POST">
            {{ csrf_field() }}
            <table class="table table-bordered" id="firstTable">
               <thead>
                    <tr>
                        <td rowspan="2">№</td>
                        <td rowspan="2">Форма навчання Факультет</td>
                        <td colspan="2">Контингент</td>
                        <td></td>
                        <td colspan="2">Контингент</td>
                    </tr>
                    <tr>
                        <td>Б</td>
                        <td>К</td>
                        <td></td>
                        <td>Б</td>
                        <td>Д</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="2">Денна форма навчання</td>
                        <td></td>
                        <td colspan="2">Заочна форма навчання</td>
                    </tr>
                </thead>
                <tbody id="sub">

                </tbody>
                <tbody id="inozem">

                </tbody>
                <tbody id="asp">

                </tbody>
                <tbody id="doc">

                </tbody>
            </table>
            <button id="save" type="button" class="btn btn-primary" style=" border-bottom-width: 1px;  margin-bottom: 10px;">Розрахувати</button>
        </form>

        <hr>

        <div id="result"></div>

    </div>
@endsection

@section('header')

@endsection

@section('scripts')

@include('vendor.tableJS')

@endsection

@section('style')
    <style>
        .hide, .hideSubject, .hideRowQualification, .addRowQualification, .addRowImozemQualification{display: none;}
        table{
            text-align: center;
            font-weight: bold;
       }
       input{
           text-align: center;
            font-weight: normal;
       }
    </style>
@endsection