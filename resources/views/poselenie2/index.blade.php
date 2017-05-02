@extends('layouts.lay')

@section('content')

    <div class="container xxx" >
        <h4>Инфо по поселению</h4>
        <form action="">
            {{ csrf_field() }}

            <p style="margin-bottom: 20px">Група:
                <select name="id">
                    <option value="" disabled selected>Вибрати групу:</option>
                    @forelse($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                    @empty
                    @endforelse
                </select> </p>


            <table id="group">

            </table>

        </form>

    </div>



@endsection


@section('header')

@endsection

@section('scripts')

    <script>

        var b='';






        $('body').on('change', 'select[name="id"]', function () {
            $.ajax({
                type: 'POST',
                url: "{{route('getGroupForPoselenie2')}}",
                data: $('form').serialize(),
                success: function (data) {
                    b = data;
                    var table = '<table><thead><tr><th>№</th><th>ПІП</th><th>Поселение</th><th>Оплата</th><th>Коментарий</th><th>Заявление</th><th>Наказ</th><th>хрень</th></tr><tbody>';

                    var obj = $.parseJSON(data);
                    var i = 1;

                    obj.students.forEach(function (student) {
                        table += '<tr><td>' + i++ + '</td><td>' +student.firstName+' '+student.name+' '+student.surname+ '</td><td>'+ student.pivot.type_poselenia +'</td><td>'+ student.pivot.oplata +'</td><td>'+ student.pivot.comentary +'</td><td>'+ student.pivot.zayava +'</td><td>'+ student.pivot.nakaz +'</td><td>'+ student.pivot.hz +'</td></tr>';
                    });
                    table += '</tbody></table>';
                    $('table#group').html(table);



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
            width: calc(100% - 211px);
        }
        input[type="submit"]{
            float: right;
        }

    </style>
@endsection