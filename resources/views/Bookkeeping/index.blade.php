@extends('layouts.lay')

@section('content')


    <div class="container xxx" >
        <form action="">
            {{ csrf_field() }}
            <p style="margin-bottom: 20px">
                Виберіть групу:
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

@endsection

@section('scripts')
    <script>
        var b;
        $('body').on('change', 'select', function () {
            $.ajax({
                type: 'POST',
                url: "{{route('getGroupBookkeepingAjax')}}",
                data: $('form').serialize(),
                success: function(data) {
                    b = data;
                    var table = '<table class="table-bordered"><thead><tr><th>№</th><th>ПІП</th><th>Оплата контракту</th><th>Сума боргу</th><th>Підтвердження від студента</th><th>Коментарій від деканату</th><th>Коментарій від студента</th><th>Допуск до сесії</th></tr></thead><tbody>';
                    var obj = $.parseJSON(data);
                    var i = 1;
                    $($.parseJSON(b)[0].students).each(function(){
                        table+=
                            '<tr>' +
                            '<td>'+ i++ +'</td>' +
                            '<td>'+ this.FIO +'</td>' +
                            '<td>'+ this.oplata.status_oplatu +'</td>' +
                            '<td>'+ (this.oplata.summa_need_oplatu - this.oplata.oplacheno) +'</td>' +
                            '<td>'+ this.oplata.status_from_student +'</td>' +
                            '<td>'+ this.oplata.commentary_from_dekanat +'</td>' +
                            '<td>'+ this.oplata.commentary_from_student +'</td>' +
                            '<td>'+ this.oplata.dopusk_to_sesion +'</td>' +
                            '</tr>';
                    })
                    obj.forEach(function (student) {
                    });
                    table+='</tbody></table>';
                    $('table').html(table);
                },
                error:  function(xhr, str){
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
            font-size: 1.4em;
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