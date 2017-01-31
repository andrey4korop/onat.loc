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
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" rowspan="2">№<br>п/п</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" rowspan="2">Форма навчання</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" colspan="2">Контингент</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" rowspan="2">Норматив<br>пост</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" colspan="2">Кількість ставок</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" colspan="2">Контингент</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" rowspan="2">Норматив<br>пост</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" colspan="2">Кількість ставок</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" colspan="3">Всього ставок ПВП</td>
        </tr>
        <tr>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">Б</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">К</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">Б</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">К</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">Б</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">К</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">Б</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">К</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">Б</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">К</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">Б+К</td>
        </tr>
        <tr class="rowBolid">
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" colspan="5">Денна форма навчання</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;" colspan="5">Заочна форма навчання</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
        </tr>
        </thead>
        <tbody>
        @forelse($subject as $s)
            <tr class="rowBolid">
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$subjectRows[$s]['num']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$subjectRows[$s]['name']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$subjectRows[$s]['freeD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$subjectRows[$s]['payD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($subjectRows[$s]['stavkaFD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($subjectRows[$s]['stavkaPD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$subjectRows[$s]['freeZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$subjectRows[$s]['payZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($subjectRows[$s]['stavkaFZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($subjectRows[$s]['stavkaPZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($subjectRows[$s]['allF'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($subjectRows[$s]['allP'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($subjectRows[$s]['all'],2)}}</td>
            </tr>
            @forelse($table[$s] as $row)
                <tr>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['qualification']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['freeD']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['payD']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['normD']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaFD'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaPD'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['freeZ']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['payZ']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['normZ']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaFZ'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaPZ'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['allF'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['allP'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['all'],2)}}</td>
                </tr>
            @empty
            @endforelse
        @empty
        @endforelse

        <tr class="rowBolid">
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">Всього по формі навчання</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$all['freeD']}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$all['payD']}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($all['stavkaFD'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($all['stavkaPD'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$all['freeZ']}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$all['payZ']}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($all['stavkaFZ'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($all['stavkaPZ'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($all['allF'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($all['allP'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($all['all'],2)}}</td>
        </tr>

        @foreach($allSubject as $key => $row)
            <tr>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$key}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['freeD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['payD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaFD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaPD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['freeZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['payZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaFZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaPZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['allF'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['allP'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['all'],2)}}</td>
            </tr>
        @endforeach

        @forelse($aspRow as $s)
            <tr class="rowBolid">
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$s['num']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$s['name']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$s['freeD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$s['payD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($s['stavkaFD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($s['stavkaPD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$s['freeZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$s['payZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($s['stavkaFZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($s['stavkaPZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($s['allF'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($s['allP'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($s['all'],2)}}</td>
            </tr>
            @foreach($tableAsp as $row)
                <tr class="rowBolid">
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['qualification']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['freeD']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['payD']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['normD']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaFD'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaPD'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['freeZ']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['payZ']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$row['normZ']}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaFZ'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['stavkaPZ'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['allF'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['allP'],2)}}</td>
                    <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($row['all'],2)}}</td>
                </tr>
            @endforeach
        @empty
        @endforelse

        @if(!empty($docRow))
            <tr class="rowBolid">
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['num']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['qualification']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['freeD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['payD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['normD']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($docRow['stavkaFD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($docRow['stavkaPD'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['freeZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['payZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{$docRow['normZ']}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($docRow['stavkaFZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($docRow['stavkaPZ'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($docRow['allF'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($docRow['allP'],2)}}</td>
                <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($docRow['all'],2)}}</td>
            </tr>
        @endif

        <tr class="rowBolid">
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">ВСЬОГО</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($superAll['stavkaFD'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($superAll['stavkaPD'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;"></td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($superAll['stavkaFZ'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($superAll['stavkaPZ'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($superAll['allF'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($superAll['allP'],2)}}</td>
            <td style="border-style:solid; border-width:1px; border-color:black; text-align:center; margin-top:0; margin-left:0; margin-right:0; margin-bottom:0;">{{round($superAll['all'],2)}}</td>
        </tr>



        </tbody>
    </table>






</div>

</body>

</html>






























