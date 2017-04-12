@extends('layouts.lay')

@section('content')

    <div class="container xxx" >
        <h4>Cтворення групи і формування списку студентів</h4>
<form action="">
    <p class="addGroupToggle">Створення нової групи: <input type="button" value="Додати групу" class="addGroupToggle btn btn-primary" onclick="toggle()"></p>
    {{ csrf_field() }}
    <p style="margin-bottom: 20px">
        <select name="id">
            <option value="" disabled selected>Вибрати групу:</option>
        @forelse($groups as $group)
            <option value="{{$group->id}}">{{$group->group_name}}</option>
        @empty
        @endforelse
    </select> </p>

    <div class="add_group">
        <input type="text" id="nameGroup" name="nameGroup">
        <input type="button" class="btn btn-primary" value="addGroup" onclick="addGroup()">
    </div>
    <table>

    </table>
</form>
    </div>


@endsection


@section('header')

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
    $('body').on('change', 'select', function () {
        var button = '<input type="button" id="buttonAdd" class="btn btn-primary" value="Додати нового студента">';
        $.ajax({
            type: 'POST',
            url: "{{route('getGroupAjax')}}",
            data: $('form').serialize(),
            success: function(data) {
                var table = '<table><thead><tr><th>№</th><th>ПІП</th><th></th></tr></thead><tbody>';
                var obj = $.parseJSON(data)[0];
                var i=1;
                obj.students.forEach(function (student) {
                    table+='<tr><td>'+ i++ +'</td><td>'+student.FIO+'</td><td class="button"></td></tr>'
                });
                table+='</tbody></table>';
                $('table').html(table);

                $('.button').last().append(button);
                if($('#buttonAdd').length==0){
                    $('table').append(button);
                }
            },
            error:  function(xhr, str){

            }
        });



    });

    $('body').on('click', '#buttonAdd', function () {
        var error = false;
        $('input[name="FIO[]"]').each(function (){
            if (this.value == '') {
                error = true;
            }
        });
        if (!error) {
            var row = $('<tr><td></td><td><input name="FIO[]"></td><td class="button"></td></tr>')
            $('table').append(row);
            $('.button').last().append($('#buttonAdd'));
        }
        if($('#save').length ==0 ){
            var save = $('<input type="button" class="btn btn-primary" id="save" value="save">')
            $('table').append(save);
        }
    });
    $('body').on('click', '#save', function () {

            $.ajax({
                type: 'POST',
                url: "{{route('saveGroupAjax')}}",
                data: $('form').serialize(),
                success: function (data) {
                    var table = '<table><thead><tr><th>№</th><th>ПІП</th><th></th></tr></thead><tbody>';
                    var obj = $.parseJSON(data)[0];
                    var i=1;
                    obj.students.forEach(function (student) {
                        table+='<tr><td>'+ i++ +'</td><td>'+student.FIO+'</td><td class="button"></td></tr>'
                    });
                    table += '</tbody></table>';
                    $('table').html(table);
                    var button = '<input type="button" class="btn btn-primary" id="buttonAdd" value="Додати нового студента">';
                    $('.button').last().append(button);
                },
                error: function (xhr, str) {

                }
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
        }
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

    </style>
@endsection