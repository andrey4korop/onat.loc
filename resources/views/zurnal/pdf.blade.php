<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Document</title>
    <style>

        table{
            text-align: center;
            font-family: times;
            margin: 0 auto;
        }
        td,th{
            border: 1px solid #ddd;
            padding: 4px;

            font-size: 12px;
            text-align: center;
            font-family: times;
        }
        th{
            background: lightgrey;
        }
        input{
            text-align: center;
            font-weight: normal;
        }




        .checkbox input[type=checkbox]{
            position: relative;
            margin-right: 8px;
            margin-left: 0px;
        }

        h4{
            font-weight: bold;
            text-align: center;
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

        input[type="submit"]{
            float: right;
        }

    </style>

</head>
<body>

    <table>
        <thead>
        <tr>
            <th rowspan="3">№</th>
            <th rowspan="3">ПІП</th>
            <?php $dayy = ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'НД'];
            $i=0; ?>
            @foreach($dayss as $day)
                    <th colspan="4">{{$dayy[$i++]}} {{$day->data}}</th>
            @endforeach
            </tr>
            <tr>
            @foreach($dayss as $day)
                    <th>{{$day->subject1}}</th>
                    <th>{{$day->subject2}}</th>
                    <th>{{$day->subject3}}</th>
                    <th>{{$day->subject4}}</th>
            @endforeach
            </tr>
            <tr>
                @foreach($dayss as $day)
                    <th>{{$day->prepod1}}</th>
                    <th>{{$day->prepod2}}</th>
                    <th>{{$day->prepod3}}</th>
                    <th>{{$day->prepod4}}</th>
                @endforeach
            </tr>
            <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
        <tbody>
        <?php $i=1; ?>
        @foreach($students as $student)
            <tr><td>{{$i++}}</td><td>{{$student['FIO']}}</td>
            @foreach($student['poseysaemostss'] as $pp)

                    <td>{{$typ->find($pp->status1)->name}}</td>
                    <td>{{$typ->find($pp->status2)->name}}</td>
                    <td>{{$typ->find($pp->status3)->name}}</td>
                    <td>{{$typ->find($pp->status4)->name}}</td>
            @endforeach
            </tr>
        @endforeach
        </tbody></table>
</body>
</html>