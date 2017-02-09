<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Система розрахунку чисельності студентів</title>

    <!-- Bootstrap Core CSS -->


    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

        .rowBolid, thead{font-weight: 600;}
        table{
            text-align:center;
            font-family: times;
            border: 1px solid black;

            margin: 0;
            border-collapse:collapse
        }
        tr{
            border: 1px solid black;

            margin: 0;
            border-collapse:collapse
        }
        td{border: 1px solid black;

            margin: 0;
            border-collapse:collapse
        }
        .mini td, .mini tr{
            border: none;
        }
        .mini{
            border: none;
            margin:20px;
            text-align: left ;
            font-weight: 600;
        }
        .pad{
            padding-left: 100px;
        }
        .hide{
            color: #fff;
        }
    </style>

</head>

<body>


<!-- Page Content -->
<div class="container"  style="margin-top: 30px">

    <!-- Page Heading/Breadcrumbs -->



    <table  class="table table-bordered">
        <thead>
        <tr>
            <td >№<br>п/п</td>
            <td>Форма навчання <br>Факультет</td>
            <td colspan="2">Контингент</td>
            <td >Норматив<br>пост</td>
            <td colspan="2">Кількість ставок</td>
            <td><p class="hide">///</p></td>
            <td colspan="2">Контингент</td>
            <td >Норматив<br>пост</td>
            <td colspan="2">Кількість ставок</td>
            <td colspan="3">Всього ставок ПВП</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Б</td>
            <td>К</td>
            <td></td>
            <td>Б</td>
            <td>К</td>
            <td></td>
            <td>Б</td>
            <td>К</td>
            <td></td>
            <td>Б</td>
            <td>К</td>
            <td>Б</td>
            <td>К</td>
            <td>Б+К</td>
        </tr>
        <tr class="rowBolid">
            <td></td>
            <td></td>
            <td colspan="5">Денна форма навчання</td>
            <td></td>
            <td colspan="5">Заочна форма навчання</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @forelse($subject as $s)
            <tr class="rowBolid">
                <td>{{$subjectRows[$s]['num']}}</td>
                <td>{{$subjectRows[$s]['name']}}</td>
                <td>{{$subjectRows[$s]['freeD']}}</td>
                <td>{{$subjectRows[$s]['payD']}}</td>
                <td></td>
                <td>{{round($subjectRows[$s]['stavkaFD'],2)}}</td>
                <td>{{round($subjectRows[$s]['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$subjectRows[$s]['freeZ']}}</td>
                <td>{{$subjectRows[$s]['payZ']}}</td>
                <td></td>
                <td>{{round($subjectRows[$s]['stavkaFZ'],2)}}</td>
                <td>{{round($subjectRows[$s]['stavkaPZ'],2)}}</td>
                <td>{{round($subjectRows[$s]['allF'],2)}}</td>
                <td>{{round($subjectRows[$s]['allP'],2)}}</td>
                <td>{{round($subjectRows[$s]['all'],2)}}</td>
            </tr>
            @forelse($table[$s] as $row)
                <tr>
                    <td></td>
                    <td>{{$row['qualification']}}</td>
                    <td>{{$row['freeD']}}</td>
                    <td>{{$row['payD']}}</td>
                    <td>{{$row['normD']}}</td>
                    <td>{{round($row['stavkaFD'],2)}}</td>
                    <td>{{round($row['stavkaPD'],2)}}</td>
                    <td></td>
                    <td>{{$row['freeZ']}}</td>
                    <td>{{$row['payZ']}}</td>
                    <td>{{$row['normZ']}}</td>
                    <td>{{round($row['stavkaFZ'],2)}}</td>
                    <td>{{round($row['stavkaPZ'],2)}}</td>
                    <td>{{round($row['allF'],2)}}</td>
                    <td>{{round($row['allP'],2)}}</td>
                    <td>{{round($row['all'],2)}}</td>
                </tr>
            @empty
            @endforelse
        @empty
        @endforelse

        <tr class="rowBolid">
            <td></td>
            <td>Всього по формі навчання</td>
            <td>{{$all['freeD']}}</td>
            <td>{{$all['payD']}}</td>
            <td></td>
            <td>{{round($all['stavkaFD'],2)}}</td>
            <td>{{round($all['stavkaPD'],2)}}</td>
            <td></td>
            <td>{{$all['freeZ']}}</td>
            <td>{{$all['payZ']}}</td>
            <td></td>
            <td>{{round($all['stavkaFZ'],2)}}</td>
            <td>{{round($all['stavkaPZ'],2)}}</td>
            <td>{{round($all['allF'],2)}}</td>
            <td>{{round($all['allP'],2)}}</td>
            <td>{{round($all['all'],2)}}</td>
        </tr>

        @foreach($allSubject as $key => $row)
            <tr>
                <td></td>
                <td>{{$key}}</td>
                <td>{{$row['freeD']}}</td>
                <td>{{$row['payD']}}</td>
                <td></td>
                <td>{{round($row['stavkaFD'],2)}}</td>
                <td>{{round($row['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$row['freeZ']}}</td>
                <td>{{$row['payZ']}}</td>
                <td></td>
                <td>{{round($row['stavkaFZ'],2)}}</td>
                <td>{{round($row['stavkaPZ'],2)}}</td>
                <td>{{round($row['allF'],2)}}</td>
                <td>{{round($row['allP'],2)}}</td>
                <td>{{round($row['all'],2)}}</td>
            </tr>
        @endforeach

        @forelse($aspRow as $s)
            <tr class="rowBolid">
                <td>{{$s['num']}}</td>
                <td>{{$s['name']}}</td>
                <td>{{$s['freeD']}}</td>
                <td>{{$s['payD']}}</td>
                <td></td>
                <td>{{round($s['stavkaFD'],2)}}</td>
                <td>{{round($s['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$s['freeZ']}}</td>
                <td>{{$s['payZ']}}</td>
                <td></td>
                <td>{{round($s['stavkaFZ'],2)}}</td>
                <td>{{round($s['stavkaPZ'],2)}}</td>
                <td>{{round($s['allF'],2)}}</td>
                <td>{{round($s['allP'],2)}}</td>
                <td>{{round($s['all'],2)}}</td>
            </tr>
            @foreach($tableAsp as $row)
                <tr class="rowBolid">
                    <td></td>
                    <td>{{$row['qualification']}}</td>
                    <td>{{$row['freeD']}}</td>
                    <td>{{$row['payD']}}</td>
                    <td>{{$row['normD']}}</td>
                    <td>{{round($row['stavkaFD'],2)}}</td>
                    <td>{{round($row['stavkaPD'],2)}}</td>
                    <td></td>
                    <td>{{$row['freeZ']}}</td>
                    <td>{{$row['payZ']}}</td>
                    <td>{{$row['normZ']}}</td>
                    <td>{{round($row['stavkaFZ'],2)}}</td>
                    <td>{{round($row['stavkaPZ'],2)}}</td>
                    <td>{{round($row['allF'],2)}}</td>
                    <td>{{round($row['allP'],2)}}</td>
                    <td>{{round($row['all'],2)}}</td>
                </tr>
            @endforeach
        @empty
        @endforelse

        @if(!empty($docRow))
            <tr class="rowBolid">
                <td>{{$docRow['num']}}</td>
                <td>{{$docRow['qualification']}}</td>
                <td>{{$docRow['freeD']}}</td>
                <td>{{$docRow['payD']}}</td>
                <td>{{$docRow['normD']}}</td>
                <td>{{round($docRow['stavkaFD'],2)}}</td>
                <td>{{round($docRow['stavkaPD'],2)}}</td>
                <td></td>
                <td>{{$docRow['freeZ']}}</td>
                <td>{{$docRow['payZ']}}</td>
                <td>{{$docRow['normZ']}}</td>
                <td>{{round($docRow['stavkaFZ'],2)}}</td>
                <td>{{round($docRow['stavkaPZ'],2)}}</td>
                <td>{{round($docRow['allF'],2)}}</td>
                <td>{{round($docRow['allP'],2)}}</td>
                <td>{{round($docRow['all'],2)}}</td>
            </tr>
        @endif

        <tr class="rowBolid">
            <td></td>
            <td>ВСЬОГО</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{round($superAll['stavkaFD'],2)}}</td>
            <td>{{round($superAll['stavkaPD'],2)}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{round($superAll['stavkaFZ'],2)}}</td>
            <td>{{round($superAll['stavkaPZ'],2)}}</td>
            <td>{{round($superAll['allF'],2)}}</td>
            <td>{{round($superAll['allP'],2)}}</td>
            <td>{{round($superAll['all'],2)}}</td>
        </tr>



        </tbody>
    </table>

    <table class="mini">
        <tbody>
        <tr>
            <td>Ректор</td>
            <td class="pad">Воробієнко П.П.</td>
        </tr>
        <tr>
            <td>Проректор з НР</td>
            <td class="pad">Захарченко М.В.</td>
        </tr>
        <tr>
            <td>Головний бухгалтер</td>
            <td class="pad">Дмитренко О.Д.</td>
        </tr>
        <tr>
            <td>Начальник ПФВ</td>
            <td class="pad">Гранатурова С.В.</td>
        </tr>
        </tbody>
    </table>




</div>
<!-- /.container -->

<!-- jQuery -->


</body>

</html>






























