@extends('layouts.lay')

@section('content')

    <div class="container xxx" >
        <h4>Cтворення групи і формування списку студентів</h4>
<form action="">
    <div class="add_group">
<span>Назва групи:</span>
        <input type="text" id="nameGroup" name="nameGroup">
        <input type="button" class="btn btn-primary" value="Зберегти" onclick="addGroup()">
    </div>

    {{ csrf_field() }}
    <p style="margin-bottom: 20px">Додати/переглянути студентів до групи
        <select name="id">
            <option value="" disabled selected>Вибрати групу:</option>
        @forelse($groups as $group)
            <option value="{{$group->id}}">{{$group->group_name}}</option>
        @empty
        @endforelse
    </select> </p>


    <table>

    </table>
</form>
    </div>


@endsection


@section('header')
    <input type="button" value="Створити групу" class="addGroupToggle btn btn-primary" onclick="toggle()">
    <input type="button" value="Редагувати групу" class="btn btn-primary" onclick="toggle()">
@endsection

@section('scripts')
<script>

    
    function toggle() {
        $('.addGroupToggle').toggle();
        $('.add_group').toggle();
    }
    function addGroup() {
        if($('input#nameGroup')[0].value != ''){
            $.ajax({
                type: 'POST',
                url: "{{route('newGroup')}}",
                data: $('form').serialize(),
                success: function(data) {

                    var select = '<select name="id">';
                    var obj = $.parseJSON(data);
                    v = $.parseJSON(data);
                    console.log(obj);
                    obj.forEach(function(group){
                        select+=' <option value="'+group.id+'">'+group.group_name+'</option>';
                    })


                    select+='</select>';
                    $('select').html(select);
                    $('input#nameGroup')[0].value = '';
                    toggle();
                },
                error:  function(xhr, str){

                }
            });
        }
    }
    var b ="";
    $('body').on('change', 'select', function () {
        var button = '<input type="button" id="buttonAdd" class="btn btn-primary" style="margin: 1%;" value="Додати нового студента">';
        $.ajax({
            type: 'POST',
            url: "{{route('getGroupAjax')}}",
            data: $('form').serialize(),
            success: function(data) {
                var table = '<table><thead><tr><th title="Порядковий номер">№</th><th title="Прізвище, ім\'я, по-батькові студента">ПІП</th><th title="Редагувати">Р</th><th title="Видалити">В</th></tr></thead><tbody>';
                var obj = $.parseJSON(data)[0];
                b=obj;
                var i=1;
                obj.students.forEach(function (student) {
                    table+='<tr><td>'+ i +'</td><td>'+student.firstName+' '+student.name+' '+student.surname+'</td><td onclick="edit('+i+', '+student.id+')"><img height="20" src="/img/edituser.png" ></td><td onclick="del('+i+', '+student.id+')"><img height="20" src="/img/removeuser.png" onclick="del('+i+', '+student.id+')"></td></tr>';
                    i++;
                });
                table+='</tbody></table>';
                $('table').html(table);
                if($('#buttonAdd').length==0) {
                    $('table').after(button);
                }
            },

        });



    });

    function edit(i, id){

        var row = $('<td><input type="hidden" name="id_student" value="'+id+'"></td><td><p><input name="student[firstName]" placeholder="Прізвище" value="'+b.students[i-1].firstName+'"></p><p><input name="student[name]" placeholder="Ім\'я" value="'+b.students[i-1].name+'"></p><p><input name="student[surname]" placeholder="По-батькові" value="'+b.students[i-1].surname+'"></p></td><td><input type="image" height="20" src="/img/Save.png" onclick="sendS(); return false;"></td><td></td>');
        if($('input[name^=student]').length==0) {
            $($('table tbody').children()[i - 1]).html(row);
        }
    };

    function del(i, id){
        $.ajax({
            type: 'POST',
            url: "{{route('delStudent')}}/"+id,
            data: $('form').serialize(),
            success: function (data) {
                var table = '<table><thead><tr><th title="Порядковий номер">№</th><th title="Прізвище, ім\'я, по-батькові студента">ПІП</th><th title="Редагувати">Р</th><th title="Видалити">В</th></tr></thead><tbody>';
                var obj = $.parseJSON(data)[0];
                var i=1;
                b=obj;
                obj.students.forEach(function (student) {
                    table+='<tr><td>'+ i +'</td><td>'+student.firstName+' '+student.name+' '+student.surname+'</td><td onclick="edit('+i+', '+student.id+')"><img height="20" src="/img/edituser.png" ></td><td onclick="del('+i+', '+student.id+')"><img height="20" src="/img/removeuser.png" onclick="del('+i+', '+student.id+')"></td></tr>';
                    i++;
                });
                table += '</tbody></table>';
                $('table').html(table);

            }

        });

    };

    function sendS(){
        $.ajax({
            type: 'POST',
            url: "{{route('saveStudent')}}",
            data: $('form').serialize(),
            success: function (data) {
                var table = '<table><thead><tr><th title="Порядковий номер">№</th><th title="Прізвище, ім\'я, по-батькові студента">ПІП</th><th title="Редагувати">Р</th><th title="Видалити">В</th></tr></thead><tbody>';
                var obj = $.parseJSON(data)[0];
                var i=1;
                b=obj;
                obj.students.forEach(function (student) {
                    table+='<tr><td>'+ i +'</td><td>'+student.firstName+' '+student.name+' '+student.surname+'</td><td onclick="edit('+i+', '+student.id+')"><img height="20" src="/img/edituser.png" ></td><td onclick="del('+i+', '+student.id+')"><img height="20" src="/img/removeuser.png" onclick="del('+i+', '+student.id+')"></td></tr>';
                    i++;
                });
                table += '</tbody></table>';
                $('table').html(table);

            }

        });
        return false;
    };
var w=1;
    $('body').on('click', '#buttonAdd', function () {
        var error = false;
        $('input[name^="FIO"]').each(function (){
            if (this.value == '') {
                error = true;
            }
        });
        if (!error) {
            var row = $('<tr style="background-color: beige;"><td></td><td><p><input name="FIO['+w+'][firstName]" placeholder="Прізвище"></p><p><input name="FIO['+w+'][name]" placeholder="Ім\'я"></p><p><input name="FIO['+w+'][surname]" placeholder="По-батькові"></p></td><td></td><td></td></tr>')
            $('table').append(row);
            w++;

        }
        if($('#save').length ==0 ){
            var save = $('<input type="button" class="btn btn-primary" id="save" style="margin: 1%;" value="Зберегти">')
            $('table').after(save);
        }
    });
    $('body').on('click', '#save', function () {

            $.ajax({
                type: 'POST',
                url: "{{route('saveGroupAjax')}}",
                data: $('form').serialize(),
                success: function (data) {
                    var table = '<table><thead><tr><th title="Порядковий номер">№</th><th title="Прізвище, ім\'я, по-батькові студента">ПІП</th><th title="Редагувати">Р</th><th title="Видалити">В</th></tr></thead><tbody>';
                    var obj = $.parseJSON(data)[0];
                    b=obj;
                    var i=1;
                    obj.students.forEach(function (student) {
                        table+='<tr><td>'+ i +'</td><td>'+student.firstName+' '+student.name+' '+student.surname+'</td><td onclick="edit('+i+', '+student.id+')"><img height="20" src="/img/edituser.png" ></td><td onclick="del('+i+', '+student.id+')"><img height="20" src="/img/removeuser.png" onclick="del('+i+', '+student.id+')"></td></tr>';
                        i++;
                    });
                    table += '</tbody></table>';
                    $('table').html(table);

                },

            });

    });
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
            padding: 8px;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
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
        select{
            width: 10%;

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
        .xxx form{
            text-align: center;
        }
    </style>
@endsection