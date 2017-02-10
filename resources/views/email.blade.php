<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Система розрахунку чисельності студентів</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <style>
        td{
        }
        .rowBolid{font-weight: 600;}
        table{
            text-align:center;
        }
    </style>


</head>

<body>
<!-- Page Content -->
<div class="container">

    <table  class="table table-bordered">
        <thead>
        <tr>
            <td style="" rowspan="2">№<br>п/п</td>
            <td style="" rowspan="2">Форма навчання</td>
            <td style="" colspan="2">Контингент</td>
            <td style="" rowspan="2">Норматив<br>пост</td>
            <td style="" colspan="2">Кількість ставок</td>
            <td style=""></td>
            <td style="" colspan="2">Контингент</td>
            <td style="" rowspan="2">Норматив<br>пост</td>
            <td style="" colspan="2">Кількість ставок</td>
            <td style="" colspan="3">Всього ставок ПВП</td>
        </tr>
        <tr>
            <td style="">Б</td>
            <td style="">К</td>
            <td style="">Б</td>
            <td style="">К</td>
            <td style=""></td>
            <td style="">Б</td>
            <td style="">К</td>
            <td style="">Б</td>
            <td style="">К</td>
            <td style="">Б</td>
            <td style="">К</td>
            <td style="">Б+К</td>
        </tr>
        <tr class="rowBolid">
            <td style=""></td>
            <td style=""></td>
            <td style="" colspan="5">Денна форма навчання</td>
            <td style=""></td>
            <td style="" colspan="5">Заочна форма навчання</td>
            <td style=""></td>
            <td style=""></td>
            <td style=""></td>
        </tr>
        </thead>
        <tbody>
        @forelse($subject as $s)
            <tr class="rowBolid">
                <td style="">{{$subjectRows[$s]['num']}}</td>
                <td style="">{{$subjectRows[$s]['name']}}</td>
                <td style="">{{$subjectRows[$s]['freeD']}}</td>
                <td style="">{{$subjectRows[$s]['payD']}}</td>
                <td style=""></td>
                <td style="">{{round($subjectRows[$s]['stavkaFD'],2)}}</td>
                <td style="">{{round($subjectRows[$s]['stavkaPD'],2)}}</td>
                <td style=""></td>
                <td style="">{{$subjectRows[$s]['freeZ']}}</td>
                <td style="">{{$subjectRows[$s]['payZ']}}</td>
                <td style=""></td>
                <td style="">{{round($subjectRows[$s]['stavkaFZ'],2)}}</td>
                <td style="">{{round($subjectRows[$s]['stavkaPZ'],2)}}</td>
                <td style="">{{round($subjectRows[$s]['allF'],2)}}</td>
                <td style="">{{round($subjectRows[$s]['allP'],2)}}</td>
                <td style="">{{round($subjectRows[$s]['all'],2)}}</td>
            </tr>
            @forelse($table[$s] as $row)
                <tr>
                    <td style=""></td>
                    <td style="">{{$row['qualification']}}</td>
                    <td style="">{{$row['freeD']}}</td>
                    <td style="">{{$row['payD']}}</td>
                    <td style="">{{$row['normD']}}</td>
                    <td style="">{{round($row['stavkaFD'],2)}}</td>
                    <td style="">{{round($row['stavkaPD'],2)}}</td>
                    <td style=""></td>
                    <td style="">{{$row['freeZ']}}</td>
                    <td style="">{{$row['payZ']}}</td>
                    <td style="">{{$row['normZ']}}</td>
                    <td style="">{{round($row['stavkaFZ'],2)}}</td>
                    <td style="">{{round($row['stavkaPZ'],2)}}</td>
                    <td style="">{{round($row['allF'],2)}}</td>
                    <td style="">{{round($row['allP'],2)}}</td>
                    <td style="">{{round($row['all'],2)}}</td>
                </tr>
            @empty
            @endforelse
        @empty
        @endforelse

        <tr class="rowBolid">
            <td style=""></td>
            <td style="">Всього по формі навчання</td>
            <td style="">{{$all['freeD']}}</td>
            <td style="">{{$all['payD']}}</td>
            <td style=""></td>
            <td style="">{{round($all['stavkaFD'],2)}}</td>
            <td style="">{{round($all['stavkaPD'],2)}}</td>
            <td style=""></td>
            <td style="">{{$all['freeZ']}}</td>
            <td style="">{{$all['payZ']}}</td>
            <td style=""></td>
            <td style="">{{round($all['stavkaFZ'],2)}}</td>
            <td style="">{{round($all['stavkaPZ'],2)}}</td>
            <td style="">{{round($all['allF'],2)}}</td>
            <td style="">{{round($all['allP'],2)}}</td>
            <td style="">{{round($all['all'],2)}}</td>
        </tr>

        @foreach($allSubject as $key => $row)
            <tr>
                <td style=""></td>
                <td style="">{{$key}}</td>
                <td style="">{{$row['freeD']}}</td>
                <td style="">{{$row['payD']}}</td>
                <td style=""></td>
                <td style="">{{round($row['stavkaFD'],2)}}</td>
                <td style="">{{round($row['stavkaPD'],2)}}</td>
                <td style=""></td>
                <td style="">{{$row['freeZ']}}</td>
                <td style="">{{$row['payZ']}}</td>
                <td style=""></td>
                <td style="">{{round($row['stavkaFZ'],2)}}</td>
                <td style="">{{round($row['stavkaPZ'],2)}}</td>
                <td style="">{{round($row['allF'],2)}}</td>
                <td style="">{{round($row['allP'],2)}}</td>
                <td style="">{{round($row['all'],2)}}</td>
            </tr>
        @endforeach

        @forelse($aspRow as $s)
            <tr class="rowBolid">
                <td style="">{{$s['num']}}</td>
                <td style="">{{$s['name']}}</td>
                <td style="">{{$s['freeD']}}</td>
                <td style="">{{$s['payD']}}</td>
                <td style=""></td>
                <td style="">{{round($s['stavkaFD'],2)}}</td>
                <td style="">{{round($s['stavkaPD'],2)}}</td>
                <td style=""></td>
                <td style="">{{$s['freeZ']}}</td>
                <td style="">{{$s['payZ']}}</td>
                <td style=""></td>
                <td style="">{{round($s['stavkaFZ'],2)}}</td>
                <td style="">{{round($s['stavkaPZ'],2)}}</td>
                <td style="">{{round($s['allF'],2)}}</td>
                <td style="">{{round($s['allP'],2)}}</td>
                <td style="">{{round($s['all'],2)}}</td>
            </tr>
            @foreach($tableAsp as $row)
                <tr class="rowBolid">
                    <td style=""></td>
                    <td style="">{{$row['qualification']}}</td>
                    <td style="">{{$row['freeD']}}</td>
                    <td style="">{{$row['payD']}}</td>
                    <td style="">{{$row['normD']}}</td>
                    <td style="">{{round($row['stavkaFD'],2)}}</td>
                    <td style="">{{round($row['stavkaPD'],2)}}</td>
                    <td style=""></td>
                    <td style="">{{$row['freeZ']}}</td>
                    <td style="">{{$row['payZ']}}</td>
                    <td style="">{{$row['normZ']}}</td>
                    <td style="">{{round($row['stavkaFZ'],2)}}</td>
                    <td style="">{{round($row['stavkaPZ'],2)}}</td>
                    <td style="">{{round($row['allF'],2)}}</td>
                    <td style="">{{round($row['allP'],2)}}</td>
                    <td style="">{{round($row['all'],2)}}</td>
                </tr>
            @endforeach
        @empty
        @endforelse

        @if(!empty($docRow))
            <tr class="rowBolid">
                <td style="">{{$docRow['num']}}</td>
                <td style="">{{$docRow['qualification']}}</td>
                <td style="">{{$docRow['freeD']}}</td>
                <td style="">{{$docRow['payD']}}</td>
                <td style="">{{$docRow['normD']}}</td>
                <td style="">{{round($docRow['stavkaFD'],2)}}</td>
                <td style="">{{round($docRow['stavkaPD'],2)}}</td>
                <td style=""></td>
                <td style="">{{$docRow['freeZ']}}</td>
                <td style="">{{$docRow['payZ']}}</td>
                <td style="">{{$docRow['normZ']}}</td>
                <td style="">{{round($docRow['stavkaFZ'],2)}}</td>
                <td style="">{{round($docRow['stavkaPZ'],2)}}</td>
                <td style="">{{round($docRow['allF'],2)}}</td>
                <td style="">{{round($docRow['allP'],2)}}</td>
                <td style="">{{round($docRow['all'],2)}}</td>
            </tr>
        @endif

        <tr class="rowBolid">
            <td style=""></td>
            <td style="">ВСЬОГО</td>
            <td style=""></td>
            <td style=""></td>
            <td style=""></td>
            <td style="">{{round($superAll['stavkaFD'],2)}}</td>
            <td style="">{{round($superAll['stavkaPD'],2)}}</td>
            <td style=""></td>
            <td style=""></td>
            <td style=""></td>
            <td style=""></td>
            <td style="">{{round($superAll['stavkaFZ'],2)}}</td>
            <td style="">{{round($superAll['stavkaPZ'],2)}}</td>
            <td style="">{{round($superAll['allF'],2)}}</td>
            <td style="">{{round($superAll['allP'],2)}}</td>
            <td style="">{{round($superAll['all'],2)}}</td>
        </tr>



        </tbody>
    </table>






</div>

</body>

</html>






























