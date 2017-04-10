@extends('layouts.layShtat')

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

        <form action="{{isset($id) ? route('save',['id' => $id]) : route('save')}}" id="form" method="POST">
            {{ csrf_field() }}
            <table class="table table-bordered" id="firstTable">
               <thead>
                    <tr>
                        <td rowspan="2">№</td>
                        <td rowspan="2">Форма навчання</td>
                        <td colspan="2">Контингент</td>
                        <td></td>
                        <td colspan="2">Контингент</td>
                    </tr>
                    <tr>
                        <td>Б</td>
                        <td>К</td>
                        <td></td>
                        <td>Б</td>
                        <td>К</td>
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
                @forelse($table['subject'] as $keyS => $s)
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowQualification"></span></td>
                        <td>
                            <select name="subject[]">
                                <option value="">Виберіть предмет</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}" {{($subject->id == $s) ? 'selected' : ''}}>{{$subject->subject}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @forelse($table['table'][$s] as $keyQ => $row)
                        <tr>
                            <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                            <td>
                                <select name="table[{{$s}}][{{$keyQ}}][qualification]">
                                    <option {{($row['qualification'] == 'бакалаври') ? 'selected' : ''}}>бакалаври</option>
                                    <option {{($row['qualification'] == 'спеціалісти') ? 'selected' : ''}}>спеціалісти</option>
                                    <option {{($row['qualification'] == 'магістри V') ? 'selected' : ''}}>магістри V</option>
                                    <option {{($row['qualification'] == 'магістри VI') ? 'selected' : ''}}>магістри VI</option>
                                </select>
                            </td>
                            <td><input type="number" name="table[{{$s}}][{{$keyQ}}][freeD]" value="{{$row['freeD']}}"></td>
                            <td><input type="number" name="table[{{$s}}][{{$keyQ}}][payD]" value="{{$row['payD']}}"></td>
                            <td></td>
                            <td><input type="number" name="table[{{$s}}][{{$keyQ}}][freeZ]" value="{{$row['freeZ']}}"></td>
                            <td><input type="number" name="table[{{$s}}][{{$keyQ}}][payZ]" value="{{$row['payZ']}}"></td>
                        </tr>
                    @empty
                    @endforelse
                @empty
                @endforelse
                </tbody>

                <tbody id="inozem">
                @if(!empty($table['subjectInozem']))
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowImozem"></span></td>
                        <td>Іноземці</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @forelse($table['subjectInozem'] as $keyS => $s)
                        <tr class="subject">
                            <td><span class="glyphicon glyphicon-plus addRowQualification"></span></td>
                            <td>
                                <select name="subjectInozem[]">
                                    <option value="">Виберіть предмет</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}" {{($subject->id == $s) ? 'selected' : ''}}>{{$subject->subject}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @forelse($table['inozem'][$s] as $keyQ => $row)
                            <tr>
                                <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                                <td>
                                    <select name="inozem[{{$s}}][{{$keyQ}}][qualification]">
                                        <option {{($row['qualification'] == 'бакалаври') ? 'selected' : ''}}>бакалаври</option>
                                        <option {{($row['qualification'] == 'спеціалісти') ? 'selected' : ''}}>спеціалісти</option>
                                        <option {{($row['qualification'] == 'магістри V') ? 'selected' : ''}}>магістри V</option>
                                        <option {{($row['qualification'] == 'магістри VI') ? 'selected' : ''}}>магістри VI</option>
                                    </select>
                                </td>
                                <td><input type="number" name="inozem[{{$s}}][{{$keyQ}}][freeD]" value="{{$row['freeD']}}"></td>
                                <td><input type="number" name="inozem[{{$s}}][{{$keyQ}}][payD]" value="{{$row['payD']}}"></td>
                                <td></td>
                                <td><input type="number" name="inozem[{{$s}}][{{$keyQ}}][freeZ]" value="{{$row['freeZ']}}"></td>
                                <td><input type="number" name="inozem[{{$s}}][{{$keyQ}}][payZ]" value="{{$row['payZ']}}"></td>
                            </tr>
                        @empty
                        @endforelse
                    @empty
                    @endforelse
                @endif
                </tbody>
                <tbody id="asp">
                @if(!empty($table['tableAsp']))
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowAsp"></span></td>
                        <td>Аспірантура</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @forelse($table['tableAsp'] as $keyAsp => $s)
                        <tr>
                            <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                            <td>
                                <select name="other[other][{{$keyAsp}}][qualification]">
                                    <option value="">Виберіть науку</option>
                                    @foreach($aspirantura as $asp)
                                        <option value="{{$asp->id}}" {{($asp->subject==$s['qualification']) ? 'selected' : ''}}>{{$asp->subject}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="other[other][{{$keyAsp}}][freeD]" value="{{$s['freeD']}}"></td>
                            <td><input type="number" name="other[other][{{$keyAsp}}][payD]" value="{{$s['payD']}}"></td>
                            <td></td>
                            <td><input type="number" name="other[other][{{$keyAsp}}][freeZ]" value="{{$s['freeZ']}}"></td>
                            <td><input type="number" name="other[other][{{$keyAsp}}][payZ]" value="{{$s['payZ']}}"></td>
                        </tr>
                    @empty
                    @endforelse
                @endif
                </tbody>

                <tbody id="doc">
                @if(!empty($table['docRow']))

                <tr>
                    <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                    <td>
                        <input type="hidden" name="doctor[name]" value="doc">
                        Докторнатура

                    </td>
                    <td><input type="number" name="doctor[freeD]" value="{{$table['docRow']['freeD']}}"></td>
                    <td><input type="number" name="doctor[payD]" value="{{$table['docRow']['payD']}}"></td>
                    <td></td>
                    <td><input type="number" name="doctor[freeZ]" value="{{$table['docRow']['freeZ']}}"></td>
                    <td><input type="number" name="doctor[payZ]" value="{{$table['docRow']['payZ']}}"></td>
                </tr>
                @endif




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
        .hide, .hideSubject, .hideRowQualification, .addRowQualification .addRowImozemQualification{display: none;}
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