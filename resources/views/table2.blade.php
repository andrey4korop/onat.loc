@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <a href="{{ route('home') }}">Главная</a>
                        <table class="col-md-12">
                            <tr>
                                <td rowspan="2">№</td>
                                <td rowspan="2">форма навчання факультет</td>
                                <td colspan="2">контингент</td>
                                <td rowspan="2">норматив<span style="font-size: 1em;"></span></td>
                                <td colspan="2">кількість ставок</td>
                                <td class="small_colum"></td>
                                <td colspan="2">контингент</td>
                                <td rowspan="2">норматив<span style="font-size: 1em;"></span></td>
                                <td colspan="2">кількість ставок</td>
                                <td colspan="3">всього ставок пвп</td>
                            </tr>
                            <tr>
                                <td>б</td>
                                <td>к</td>
                                <td>б</td>
                                <td>к</td>
                                <td class="small_colum"></td>
                                <td>б</td>
                                <td>к</td>
                                <td>б</td>
                                <td>к</td>
                                <td>б</td>
                                <td>к</td>
                                <td>б+к</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td colspan="5">денна форма навчання</td>
                                <td class="small_colum"></td>
                                <td colspan="5">заочна форма навчання</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="bold_tr">
                                <td><input type="number" name="col"></td>
                                <td><input type="text" name="col" class="big_colum"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td class="small_colum"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="col"></td>
                                <td><input type="text" name="col" class="big_colum"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td class="small_colum"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                            </tr>
                            <tr>
                                <td><input type="number" name="col"></td>
                                <td><input type="text" name="col" class="big_colum"   ></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td class="small_colum"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                                <td><input type="number" name="col"></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
