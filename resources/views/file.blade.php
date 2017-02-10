<html>
<head>
<style>
    tr > td {
        border: 1px solid #000000;
        text-align: center;
        padding: 1px;
        font-family: "Times New Roman";
        vertical-align: middle;

    }
    thead td, .row td{
        font-weight: bold;
    }



</style>

</head>
<body>
<!-- Headings -->
<table  class="table table-bordered">
    <thead>
    <tr>
        <td rowspan="2" width="7">№</td>
        <td rowspan="2" width="60">Форма навчання Факультет</td>
        <td colspan="2">Контингент</td>
        <td rowspan="2" width="12">Норматив</td>
        <td colspan="2">Кількість ставок</td>
        <td width="1"></td>
        <td colspan="2">Контингент</td>
        <td rowspan="2" width="12">Норматив</td>
        <td colspan="2">Кількість ставок</td>
        <td colspan="3">Всього ставок пвп</td>
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
    <tr>
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
        <tr class="row">
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
        @foreach($table[$s] as $row)
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
        @endforeach
    @empty
    @endforelse

    <tr class="row">
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
        <tr class="row">
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
            <tr class="row">
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
        <tr class="row">
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

    <tr class="row">
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

</body>
</html>