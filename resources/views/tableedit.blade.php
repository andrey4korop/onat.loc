@extends('layouts.lay')

@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                </h1>

                <button type="button" id="addSubject" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати спеціальність</button>
                <button type="button" id="addAspirantura" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати аспірантуру</button>
                <button type="button" id="addDoctor" class="btn btn-primary" style=" border-bottom-width: 1px;   margin-bottom: 10px;">Додати докторнатуру</button>
            </div>
        </div>

        <div class="hide">
            <table>
                <tbody class="hideSubject">
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowQualification"></span></td>
                        <td>
                            <select name="subject[]">
                                <option value="">Виберіть спеціальність</option>

                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject}}</option>
                                @endforeach
                            </select>

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody class="hideAsp">
                    <tr class="subject">
                        <td><span class="glyphicon glyphicon-plus addRowAsp"></span></td>
                        <td>

                            Аспірантура

                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <tbody id="hideRowDoctor">
                    <tr>
                        <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                        <td>
                            <input type="hidden" name="doctor[name]" value="doc">
                            Докторнатура

                        </td>
                        <td><input type="number" name="doctor[freeD]"></td>
                        <td><input type="number" name="doctor[payD]"></td>
                        <td></td>
                        <td><input type="number" name="doctor[freeZ]"></td>
                        <td><input type="number" name="doctor[payZ]"></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <tbody class="hideRowQualification">
                    <tr>
                        <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                        <td>
                            <select name="table[0][row_][qualification]">
                                <option>бакалаври</option>
                                <option>спеціалісти</option>
                                <option>магістри V</option>
                                <option>магістри VI</option>
                            </select>
                        </td>
                        <td><input type="number" name="table[0][row_][freeD]"></td>
                        <td><input type="number" name="table[0][row_][payD]"></td>
                        <td></td>
                        <td><input type="number" name="table[0][row_][freeZ]"></td>
                        <td><input type="number" name="table[0][row_][payZ]"></td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody class="hideOther">
                <tr>
                    <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
                    <td>
                        <select name="other[0][row_][qualification]">
                            <option value="">Виберіть науку</option>
                            @foreach($aspirantura as $asp)
                                <option value="{{$asp->id}}">{{$asp->subject}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="other[0][row_][freeD]"></td>
                    <td><input type="number" name="other[0][row_][payD]"></td>
                    <td></td>
                    <td><input type="number" name="other[0][row_][freeZ]"></td>
                    <td><input type="number" name="other[0][row_][payZ]"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <form action="{{isset($id) ? route('save',['id' => $id]) : route('save')}}" id="form" method="POST">
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
    <script>


        $('body').on('click', '#save', function () {
            var error = false;
            $('#firstTable #sub tr.subject').each(function () {
                if($('#firstTable #sub [name*="['+$(this).find('select').val()+']"]').length==0 || $(this).find('select').val()==''){
                    error = true;
                }
            })
            if($('#firstTable #asp tr.subject').length > 0 ) {
                if($('#firstTable #asp select').length = 0){
                    error = true;
                }
                $('#firstTable #asp select').each(function () {
                    if ($(this).val() == '') {
                        error = true;
                    }
                })
            }
            if(error){
                alert('У вас є не заповнені поля, заповніть будь ласка, або видаліть їх.')
            }
            else{
                $('#form').submit();
            }
        });


        $('body').on('click', '.addRowAsp', function () {
            var t = $(this).parents('tr');
            if(t.nextUntil('tr.subject').length) {
                t.nextUntil('tr.subject').last().after($('.hideOther').children().clone())
            }else if(t.nextAll().length){
                t.nextAll().last().after($('.hideOther').children().clone())
            }else{
                t.after($('.hideOther').children().clone())
            }

            $('#firstTable [name*=0]').attr('name', function(){
                return $(this).attr('name')
                        .replace('0','other')
                        .replace('row_', 'row_'+$('#firstTable [name*=row_]').parents('tr:not(.subject)').length)
            })

        });

        $('body').on('click', '.addRowQualification', function () {
            var t = $(this).parents('tr');
            if(t.nextUntil('tr.subject').length) {
                t.nextUntil('tr.subject').last().after($('.hideRowQualification').children().clone())
            }else if(t.nextAll().length){
                t.nextAll().last().after($('.hideRowQualification').children().clone())
            }else{
                t.after($('.hideRowQualification').children().clone())
            }

            $('#firstTable [name*=0]').attr('name', function(){
                return $(this).attr('name')
                        .replace('0',$(this).parents('tr').prevAll('tr.subject').first().find('select').val())
                        .replace('row_', 'row_'+$('#firstTable [name*=row_]').parents('tr:not(.subject)').length)
            })

        });

        $('body').on('click', '#addDoctor', function () {
            if(!$('#doc').children().length) {
                $('#doc').append($('#hideRowDoctor').children().clone());
            }
        });

        $('body').on('click', '#addAspirantura', function () {
            if(!$('#asp').children().length) {
                $('#asp').append($('.hideAsp').children().clone());
            }
        });

        $('body').on('click', '#addSubject', function () {
            if(!$('#sub  tr:last').hasClass('subject')) {
                $('#sub').append($('.hideSubject').children().clone());
            }
        });

        $('body').on('click', '.removeRowQualification', function () {
            $(this).parents('tr').remove();
        });

        $('body').on('change', '.subject', function () {
            var t = $(this);
            t.find('.addRowQualification').show();
            t.find("select [value='']").remove();
            if(t.nextUntil('tr.subject').length) {
                console.log(this);
                t.nextUntil('tr.subject').find('[name]').each(function () {
                    var atr = $(this).attr('name');
                    if(atr.indexOf(']')>6) {
                        console.log(this);
                        $(this).attr('name', atr.replace(atr.substring(6, atr.indexOf(']')), t.find('select').val()));
                    }
                })
            }else if(t.nextAll().length){
                t.nextAll().last().after($('.hideRowQualification').children().clone())
            }
        });
    </script>
@endsection

@section('style')
    <style>
        .hide, .hideSubject, .hideRowQualification, .addRowQualification{display: none;}
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