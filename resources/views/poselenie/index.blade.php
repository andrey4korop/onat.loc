@extends('layouts.lay')

@section('content')

    <div class="container xxx" >
        <h4>Формирование списка студетов на поселение</h4>
        <form action="" id="group" class="col-md-6">
            {{ csrf_field() }}

            <p style="margin-bottom: 20px">Група:
                <select name="id">
                    <option value="" disabled selected>Вибрати групу:</option>
                    @forelse($groups as $group)
                        <option value="{{$group->id}}">{{$group->group_name}}</option>
                    @empty
                    @endforelse
                </select> </p>


            <table id="group">

            </table>

        </form>
        <form action="" id="groupForPoselenie" class="col-md-6">
            {{ csrf_field() }}
            <p class="addGroupToggle">Створити нову группу: <input type="button" value="Додати групу" class="addGroupToggle btn btn-primary" onclick="toggle()"></p>
            <p class="add_group" style="margin-bottom: 10px;">
                <span>Назва групи:</span>
                <input type="text" id="nameGroup" name="nameGroup">
                <input type="button" class="btn btn-primary" value="Зберегти" onclick="addGroup()">
            </p>
            <p style="margin-bottom: 20px">Група:
                <select name="id" id="io">
                    <option value="" disabled selected>Вибрати групу:</option>
                    @forelse($groupsForPoselenie as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @empty
                    @endforelse
                </select> </p>



            <table>

            </table>
            <input type="button" id="ii" class="btn btn-primary" value="Зберегти" onclick="saveGroup()">

        </form>
    </div>



@endsection


@section('header')

@endsection

@section('scripts')

    <script>

        var b='';
        function toggle() {
            $('.addGroupToggle').toggle();
            $('.add_group').toggle();
        }

        function addGroup() {
            if($('input#nameGroup')[0].value != ''){
                $.ajax({
                    type: 'POST',
                    url: "{{route('newGroupForPoselenie')}}",
                    data: $('#groupForPoselenie').serialize(),
                    success: function(data) {

                        var select = '<select name="id">';
                        var obj = $.parseJSON(data);
                        b = $.parseJSON(data);

                        obj.forEach(function(group){
                            select+=' <option value="'+group.id+'">'+group.name+'</option>';
                        })


                        select+='</select>';
                        $('select#ii').html(select);
                        $('input#nameGroup')[0].value = '';
                        toggle();
                    },

                });
            }
        }
function saveGroup() {
    $.ajax({
        type: 'POST',
        url: "{{route('saveGroupForPoselenie')}}",
        data: $('#groupForPoselenie').serialize(),
        success: function(data) {

        }

    });
}



        $('body').on('change', '#group select[name="id"]', function () {
            $.ajax({
                type: 'POST',
                url: "{{route('getGroupAjax')}}",
                data: $('#group').serialize(),
                success: function (data) {
                    b = data;
                    var table = '<table><thead><tr><th>№</th><th>ПІП</th><th></th></tr><tbody>';

                    var obj = $.parseJSON(data);
                    var i = 1;

                    obj[0].students.forEach(function (student) {
                        table += '<tr><td>' + i++ + '</td><td>' +student.firstName+' '+student.name+' '+student.surname+ '<input type="hidden" name="idStudent[]" value="'+student.id+'"></td><td class="add" >+</td></tr>';
                    });
                    table += '</tbody></table>';
                    $('table#group').html(table);



                }

            });
        });

        $('body').on('change', '#groupForPoselenie select[name="id"]', function () {
            $.ajax({
                type: 'POST',
                url: "{{route('getGroupForPoselenie')}}",
                data: $('#groupForPoselenie').serialize(),
                success: function (data) {
                    b = data;
                    var table = '<table><thead><tr><th>ПІП</th><th></th></tr><tbody>';

                    var obj = $.parseJSON(data);
                    var i = 1;

                    obj.students.forEach(function (student) {
                        table += '<tr><td>' +student.firstName+' '+student.name+' '+student.surname+ '<input type="hidden" name="idStudent[]" value="'+student.id+'"></td><td class="remove">-</td></tr>';
                    });
                    table += '</tbody></table>';
                    $('#groupForPoselenie table').html(table);

                    $('#ii').hide();

                }

            });
        });

        $('body').on('click', '.add', function () {
            $('#groupForPoselenie table').append("<tr><td>"+$(this).prev().html()+"</td><td class='remove'>-</td></tr>");
            $('#ii').show();

        });

        $('body').on('click', '.remove', function () {
            $(this).parent().remove();
            $('#ii').show();
        });


    </script>

@endsection

@section('style')
    <style>
        .hide, .hideSubject, .hideRowQualification, .addRowQualification, .addRowImozemQualification, .add_group {display: none;}
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
        /*.add_group{
            display: none;
            margin: 1% auto;
            text-align: center;
        }*/
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
            float: right;
            display: none;
        }
        input[type="submit"]{
            float: right;
        }

    </style>
@endsection