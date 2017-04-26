@extends('layouts.layZurnal')

@section('content')

    <div class="container xxx" >
        <h4>Журнал відвідувань студентів</h4>
        <form action="">

            {{ csrf_field() }}
            <p style="margin-bottom: 20px">Група:
                <select name="id">
                    <option value="" disabled selected>Вибрати групу:</option>
                    @forelse($groups as $group)
                        <option value="{{$group->id}}">{{$group->group_name}}</option>
                    @empty
                    @endforelse
                </select> </p>


            <table>

            </table>
<div style="margin-top: 1%;
    right: 2%;
    position: fixed;">

    <input type="button" id="save" class="btn btn-primary" onclick="button();" value="Зберегти">
    <input type="hidden" id="hid" name="date" value="">
    <button id="prev" class="btn btn-primary" name="date" value="{{Carbon\Carbon::now()->addWeeks(-1)->toDateString()}}" onclick="mmm(0); return false"><</button>
    <button id="next" class="btn btn-primary" name="date" value="{{Carbon\Carbon::now()->addWeeks(1)->toDateString()}}" onclick="mmm(1); return false">></button>
</div>

        </form>
    </div>
    <div class="hide">
        <select name="" class="sel">
        @foreach($poseyshaemost_name as $name)
                <option value="{{$name->id}}">{{$name->name}}</option>
        @endforeach
        </select>
    </div>


@endsection


@section('header')
    <button type="button" class="btn-hor btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">&#9776; Архів</button>
    <button type="button" class="btn-hor btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;" onclick="postToUrl('{{ route('pdfZurnal')  }}', {'_token':'{{ csrf_token() }}', 'id':'1'}, 'POST')">Зберегти в форматі PDF</button>
@endsection

@section('scripts')
    <script src="/js/moment-with-locales.js"></script>
    <script>

var b='';

    function generatorSelects(arr, subject, num , data) {
        var select='';
        select += '<select name="ff['+data+'][subject'+num+']">';
        select += '<option disabled selected> - </option>';
        arr.forEach(function (predmet) {
            select +=  '<option '+ (predmet.predmet_name == subject ? 'selected' : '') +'>'+predmet.predmet_name +'</option>'
        });
        select += '</select>';
        return select;
    }

    function generatorSelectsPrepod(arr, prepod, num , data) {
        var select='';
        select += '<select name="ff['+data+'][prepod'+num+']">';
        select += '<option disabled selected> - </option>';
        arr.forEach(function (prep) {
            select +=  '<option '+ (prep.name == prepod ? 'selected' : '') +'>'+prep.name +'</option>'
        });
        select += '</select>';
        return select;
    }

    $('body').on('change', '#dd', function () {

        mmm(2);
        if($('#dd').val() == '') {
            $('#prev').val(moment().add(-7, 'd').format('YYYY-MM-DD'));
            $('#next').val(moment().add(7, 'd').format('YYYY-MM-DD'));
        }
        else{
            $('#prev').val(moment($('#dd').val(), "YYYY-MM-DD").add(-7, 'd').format('YYYY-MM-DD'));
            $('#next').val(moment($('#dd').val(), "YYYY-MM-DD").add(7, 'd').format('YYYY-MM-DD'));
        }

    })

        $('body').on('change', 'select[name="id"]', function () {
            $.ajax({
                type: 'POST',
                url: "{{route('getGroupForZurnal')}}",
                data: $('form').serialize(),
                success: function (data) {
                    b = data;
                    var table = '<table><thead><tr><th rowspan="2">№</th><th rowspan="2">ПІП</th>';

                    var obj = $.parseJSON(data);
                    var i = 0;
                    var dayy = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'];


                    for (var p in obj.dayss) {
                        if (obj.dayss.hasOwnProperty(p)) {
                            table += '<th colspan="4">' + dayy[i++] + ', ' + obj.dayss[p].data + '</th>';
                        }
                    }

                    table += '</tr><tr>';
                    i = 1;

                    for (var p in obj.dayss) {
                        if (obj.dayss.hasOwnProperty(p)) {
                            table += '<th>' +   generatorSelects(obj.predmet, obj.dayss[p].subject1, 1, obj.dayss[p].data)
                                + '</th><th>' + generatorSelects(obj.predmet, obj.dayss[p].subject2, 2, obj.dayss[p].data)
                                + '</th><th>' + generatorSelects(obj.predmet, obj.dayss[p].subject3, 3, obj.dayss[p].data)
                                + '</th><th>' + generatorSelects(obj.predmet, obj.dayss[p].subject4, 4, obj.dayss[p].data)
                                + '</th>';
                        }
                    }

                    table += '</tr><tr><th></th><th></th>';

                    for (var p in obj.dayss) {
                        if (obj.dayss.hasOwnProperty(p)) {
                            table += '<th>' + generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod1, 1, obj.dayss[p].data)
                                + '</th><th>' + generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod2, 2, obj.dayss[p].data)
                                + '</th><th>' + generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod3, 3, obj.dayss[p].data)
                                + '</th><th>' + generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod4, 4, obj.dayss[p].data)
                                + '</th>';
                        }
                    }


                    table += '</tr>';


                    table += '<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></th>';


                    table += '</tr><tbody>';
                    obj.students.forEach(function (student) {
                        table += '<tr><td>' + i++ + '</td><td>' + student.FIO + '</td>';
                        for (var p in student.poseysaemostss) {
                            if (student.poseysaemostss.hasOwnProperty(p)) {
                                table += '<td>' + $('.hide').clone().children().attr("name", "st[" + student.id + "][" + student.poseysaemostss[p].data + "]" + "[status1]").children(":nth-child(" + student.poseysaemostss[p].status1 + ")").attr("selected", "selected").parent().parent().html() +
                                    '</td><td>' + $('.hide').clone().children().attr("name", "st[" + student.id + "][" + student.poseysaemostss[p].data + "]" + "[status2]").children(":nth-child(" + student.poseysaemostss[p].status2 + ")").attr("selected", "selected").parent().parent().html() +
                                    '</td><td>' + $('.hide').clone().children().attr("name", "st[" + student.id + "][" + student.poseysaemostss[p].data + "]" + "[status3]").children(":nth-child(" + student.poseysaemostss[p].status3 + ")").attr("selected", "selected").parent().parent().html() +
                                    '</td><td>' + $('.hide').clone().children().attr("name", "st[" + student.id + "][" + student.poseysaemostss[p].data + "]" + "[status4]").children(":nth-child(" + student.poseysaemostss[p].status4 + ")").attr("selected", "selected").parent().parent().html() +
                                    '</td>';
                            }
                        }


                        table += '</tr>'
                    });
                    table += '</tbody></table>';
                    $('table').html(table);


                    $('#prev').val(moment().add(-7, 'd').format('YYYY-MM-DD'));
                    $('#next').val(moment().add(7, 'd').format('YYYY-MM-DD'));
                }

            });
        });


    function mmm(k){
        if(k==1) {
            $('#hid').val($('#next').val());
        }
        else {
            if (k == 0) {
                $('#hid').val($('#prev').val());
            }
            else {
                if ($('#dd').val() == '') {
                    $('#hid').val(moment().format('YYYY-MM-DD'));
                }
                else {
                    $('#hid').val($('#dd').val());
                }
            }
        }
        $.ajax({
            type: 'POST',
            url: "{{route('getGroupForZurnal')}}",
            data: $('form').serialize(),
            success: function(data) {
                b = data;
                var table = '<table><thead><tr><th rowspan="2">№</th><th rowspan="2">ПІП</th>';

                var obj = $.parseJSON(data);
                var i=0;
                var dayy  = ['ПН','ВТ','СР','ЧТ','ПТ','СБ'];


                for (var p in obj.dayss) {
                    if( obj.dayss.hasOwnProperty(p) ) {
                        table+='<th colspan="4">'+ dayy[i++] +', '+ obj.dayss[p].data+'</th>';
                    }
                }

                table+='</tr><tr>';
                i=1;

                for (var p in obj.dayss) {
                    if( obj.dayss.hasOwnProperty(p) ) {
                        table+='<th>'+      generatorSelects(obj.predmet, obj.dayss[p].subject1, 1, obj.dayss[p].data )
                            +'</th><th>'+   generatorSelects(obj.predmet, obj.dayss[p].subject2, 2, obj.dayss[p].data )
                            +'</th><th>'+   generatorSelects(obj.predmet, obj.dayss[p].subject3, 3, obj.dayss[p].data )
                            +'</th><th>'+   generatorSelects(obj.predmet, obj.dayss[p].subject4, 4, obj.dayss[p].data )
                            +'</th>';
                    }
                }

                table+='</tr><tr><th></th><th></th>';

                for (var p in obj.dayss) {
                    if( obj.dayss.hasOwnProperty(p) ) {
                        table+='<th>'+      generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod1, 1, obj.dayss[p].data )
                            +'</th><th>'+   generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod2, 2, obj.dayss[p].data )
                            +'</th><th>'+   generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod3, 3, obj.dayss[p].data )
                            +'</th><th>'+   generatorSelectsPrepod(obj.prepods, obj.dayss[p].prepod4, 4, obj.dayss[p].data )
                            +'</th>';
                    }
                }



                table+='</tr>';


                table+='<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>';


                table+='</tr><tbody>';
                obj.students.forEach(function (student) {
                    table+='<tr><td>'+ i++ +'</td><td>'+ student.FIO +'</td>';
                    for (var p in student.poseysaemostss) {
                        if( student.poseysaemostss.hasOwnProperty(p) ) {
                            table+='<td>'   +$('.hide').clone().children().attr("name", "st["+student.id+"]["+student.poseysaemostss[p].data+"]"+"[status1]").children(":nth-child("+ student.poseysaemostss[p].status1  +")").attr("selected", "selected").parent().parent().html()+
                                '</td><td>' +$('.hide').clone().children().attr("name", "st["+student.id+"]["+student.poseysaemostss[p].data+"]"+"[status2]").children(":nth-child("+ student.poseysaemostss[p].status2  +")").attr("selected", "selected").parent().parent().html()+
                                '</td><td>' +$('.hide').clone().children().attr("name", "st["+student.id+"]["+student.poseysaemostss[p].data+"]"+"[status3]").children(":nth-child("+ student.poseysaemostss[p].status3  +")").attr("selected", "selected").parent().parent().html()+
                                '</td><td>' +$('.hide').clone().children().attr("name", "st["+student.id+"]["+student.poseysaemostss[p].data+"]"+"[status4]").children(":nth-child("+ student.poseysaemostss[p].status4  +")").attr("selected", "selected").parent().parent().html()+
                                '</td>';
                        }
                    }



                    table+= '</tr>'
                });
                table+='</tbody></table>'
                $('table').html(table);

                if(k==1) {
                    $('#prev').val(moment($('#prev').val(), "YYYY-MM-DD").add(7, 'd').format('YYYY-MM-DD'));
                    $('#next').val(moment($('#next').val(), "YYYY-MM-DD").add(7, 'd').format('YYYY-MM-DD'));
                }
                else{
                    if(k==0){
                    $('#prev').val(moment($('#prev').val(), "YYYY-MM-DD").add(-7, 'd').format('YYYY-MM-DD'));
                    $('#next').val(moment($('#next').val(), "YYYY-MM-DD").add(-7, 'd').format('YYYY-MM-DD'));
                    }
                    else {
                        if($('#dd').val() == '') {
                            $('#prev').val(moment().add(-7, 'd').format('YYYY-MM-DD'));
                            $('#next').val(moment().add(7, 'd').format('YYYY-MM-DD'));
                        }
                        else{
                            $('#prev').val(moment($('#dd').val(), "YYYY-MM-DD").add(-7, 'd').format('YYYY-MM-DD'));
                            $('#next').val(moment($('#dd').val(), "YYYY-MM-DD").add(7, 'd').format('YYYY-MM-DD'));
                        }
                    }
                }

            }




        });
        $('#hid').val('');
    return false;
    }





function button() {
    $.ajax({
        type: 'POST',
        url: "{{route('saveZurnal')}}",
        data: $('form').serialize(),
        success: function (data) {

        }
    });
    return false;
}

    </script>

@endsection

@section('style')
    <style>
        .hide, .hideSubject, .hideRowQualification, .addRowQualification, .addRowImozemQualification{display: none;}
        table{
            text-align: center;
            /*font-weight: bold;*/
            margin: 0 auto;
        }
        td,th{
            border: 1px solid #ddd;
            padding: 4px;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 12px;
            text-align: center;
        }
        th{
            background: lightgrey;
        }
        input{
            text-align: center;
            font-weight: normal;
        }
        td.button #buttonAdd{
            opacity: 0.5;
        }
        .add_group{
            display: none;
            margin: 1% auto;
            text-align: center;
        }
        select[ name="id"]{
            width: 15%;

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
            text-align: center;
        }
        .red{
            color: #337ab7;
        }
        .xxx{
            margin-top: 2%;
            width: 100%;
        }
        ul p{
            margin: 10px 0 0 -40px;
            font-style: italic;
        }
        form>p{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
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